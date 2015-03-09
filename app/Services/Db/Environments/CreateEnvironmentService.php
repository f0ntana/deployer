<?php namespace App\Services\Db\Environments;

use App\Models\Environment;
use Illuminate\Support\Str;
use Validator;

class CreateEnvironmentService extends EnvironmentService
{

    public function execute(array $data)
    {
        return Environment::create([
            'slug' => Str::slug($data['name']),
            'name' => $data['name']
        ]);
    }

}
