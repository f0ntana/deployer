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

    public function environments()
    {
        return $this->belongsToMany('App\Models\Environment')->withTimestamps();
    }

    public function type()
    {
        preg_match("/@([a-z]+)/", $this->repository, $output);

        if (array_key_exists(1, $output)) {
            return $output[1];
        }

        return;
    }

}
