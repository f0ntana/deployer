<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $table = 'projects';

    protected $fillable = ['slug', 'name', 'repository', 'envoy', 'folder'];

    public function deploy()
    {
        return $this->hasMany('App\Models\Deploy')->orderBy('created_at', 'desc');
    }

    public function environments()
    {
        return $this->belongsToMany('App\Models\Environment')->withTimestamps();
    }

    public function lastDeploy($id)
    {
        return $this->hasOne('App\Models\Deploy')->whereEnvironmentId($id)->latest()->first();
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
