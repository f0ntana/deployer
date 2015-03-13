<?php namespace App\Models;

use App\Events\DeployWasCreated;
use Event;
use Illuminate\Database\Eloquent\Model;

class Deploy extends Model
{

    protected $table = 'deploys';

    protected $fillable = ['user_id', 'project_id', 'environment_id', 'commit'];

    protected static function boot()
    {
        parent::boot();

        Deploy::creating(function ($deploy) {
            Event::fire(new DeployWasCreated($deploy));
        });
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function environment()
    {
        return $this->belongsTo('App\Models\Environment');
    }

}
