<?php namespace App\Services\Db\Environments;

use App\Models\Environment;
use Illuminate\Support\Str;
use Validator;

class UpdateEnvironmentService extends EnvironmentService
{

    public function execute(array $data, $id)
    {
        $Environment = Environment::find($id);
        $Environment->slug = Str::slug($data['name']);
        $Environment->name = $data['name'];
        $Environment->repository = $data['repository'];
        $Environment->envoy = $data['envoy'];

        return $Environment->save();
    }

}
