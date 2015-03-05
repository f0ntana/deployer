<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Action extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'actions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['action_id', 'name', 'action', 'order', 'type'];

    /**
     * Set default value for slug
     *
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
        $this->attributes['name'] = $value;
    }

    /**
     * Return parent roles of role
     */
    public function actions()
    {
        return $this->hasMany('App\Models\Action');
    }

    /**
     * Return roles of action
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

}
