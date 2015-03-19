<?php namespace App\Services\Db\Environments;

use App\Models\Environment;
use Illuminate\Support\Str;
use Validator;

class UpdateEnvironmentService extends EnvironmentService
{

    public function execute(array $data, $id)
    {
        $Environment = Environment::find($id);
        $Environment->password = $data['password'] ? $data['password'] : null;
        $Environment->slug = Str::slug($data['name']);
        $Environment->folder = $data['folder'];
        $Environment->name = $data['name'];

        return $Environment->save();
    }

}
