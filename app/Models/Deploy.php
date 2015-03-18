<?php namespace App\Models;

use App\Events\DeployWasCreated;
use Event;
use Illuminate\Database\Eloquent\Model;
use URL;

class Deploy extends Model
{

    protected $table = 'deploys';

    protected $fillable = ['user_id', 'project_id', 'environment_id', 'branch', 'commit'];

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

    public function getExecuteUrl()
    {
        if ($this->environment->password) {
            return URL::route('deploy.password', [
                $this->project->slug,
                $this->branch,
                $this->commit,
                $this->environment->slug,
            ]);
        } else {
            return URL::route('deploy.execute', [
                $this->project->slug,
                $this->branch,
                $this->commit,
                $this->environment->slug,
            ]);
        }

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
