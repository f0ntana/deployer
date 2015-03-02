<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['role_id', 'name'];

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
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roles()
    {
        return $this->hasMany('App\Models\Role');
    }

}
