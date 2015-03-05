<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Action extends Model
{

    protected $table = 'actions';

    protected $fillable = ['action_id', 'name', 'action', 'order', 'type'];

    public function setNameAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
        $this->attributes['name'] = $value;
    }

    public function actions()
    {
        return $this->hasMany('App\Models\Action');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

}
