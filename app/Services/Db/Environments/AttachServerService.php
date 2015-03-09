<?php namespace App\Services\Db\Environments;

use Exception;
use Validator;

class AttachServerService extends EnvironmentService
{

    public function execute($Environment, array $data)
    {
        try {
            $Environment->servers()->detach();

            if (count($data)) {
                foreach ($data as $item) {
                    $Environment->servers()->attach($item);
                }
            }

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}
