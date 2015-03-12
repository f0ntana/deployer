<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $table = 'projects';

    protected $fillable = ['slug', 'name', 'repository', 'envoy'];

    public function deploy()
    {
        return $this->hasMany('App\Models\Deploy');
    }

}
