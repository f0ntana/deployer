<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{

    protected $table = 'environments';

    protected $fillable = ['slug', 'name', 'repository', 'envoy'];

    public function servers()
    {
        return $this->belongsToMany('App\Models\Server')->withTimestamps();
    }

    public function projects()
    {
        return $this->belongsToMany('App\Models\Project')->withTimestamps();
    }

    public function deploy()
    {
        return $this->hasMany('App\Models\Deploy');
    }
}
