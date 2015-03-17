<?php namespace App\Models;

use App\Events\DeployWasCreated;
use Event;
use Illuminate\Database\Eloquent\Model;
use URL;

class Deploy extends Model
{

    protected $table = 'deploys';

    protected $fillable = ['user_id', 'project_id', 'environment_id', 'commit'];

    protected static function boot()
    {
        parent::boot();

        self::created(function ($deploy) {
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

    public function urlExecuteRollback()
    {
        $commit = $this->getRollbackHash();

        if ($commit) {
            return URL::route('deploy.execute', [
                $this->project->slug,
                $commit,
                $this->environment->slug,
            ]);
        }

        return null;
    }

    public function getRollbackHash()
    {
        $Rollback = $this->whereEnvironmentId($this->environment_id)->whereProjectId($this->project_id)->skip(1)->orderBy('created_at', 'desc')->first();

        if ($Rollback) {
            return $Rollback->commit;
        }

        return null;
    }

}
