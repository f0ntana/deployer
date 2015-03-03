<?php namespace App\Services\Utils;

use DB;
use Exception;

class GetRecursiveDbList
{

    static $pairs = [];

    public static function pairs($table, $value, $label, $parentField = null, $parentValue = null, $count = 1, $first = false)
    {
        if (empty($table) || empty($value) || empty($label)) {
            throw new Exception("Wrong parameters.");
        }

        if ($first) {
            self::$pairs[0] = '';
        }

        $Select = DB::table($table);

        if (isset($parentField) && isset($parentValue)) {
            $Select->where($parentField, $parentValue);
        } elseif (isset($parentField) && empty($parentValue)) {
            $Select->whereNull($parentField);
        }

        $Rs = $Select->get();

        if (count($Rs)) {
            foreach ($Rs as $Row) {
                self::$pairs[$Row->{$value}] = ($count > 1 ? str_repeat(' - ', $count) : '') . $Row->{$label};

                if ($parentField) {
                    self::pairs($table, $value, $label, $parentField, $Row->{$value}, ($count * 2));
                }
            }
        }

        return self::$pairs;
    }

}