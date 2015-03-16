<?php namespace App\Services\Db\Projects;

use Exception;
use Validator;

class AttachEnvironmentService extends ProjectService
{

    public function execute($Project, array $data)
    {
        try {
            $Project->environments()->detach();

            if (count($data)) {
                foreach ($data as $item) {
                    $Project->environments()->attach($item);
                }
            }

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

}
