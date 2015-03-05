<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{

    protected $table = 'roles';

    protected $fillable = ['role_id', 'name'];

    public function setNameAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
        $this->attributes['name'] = $value;
    }

    public function roles()
    {
        return $this->hasMany('App\Models\Role');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Action')->withTimestamps();
    }

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

}
