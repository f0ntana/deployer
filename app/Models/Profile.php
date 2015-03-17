<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Profile extends Model
{

    protected $table = 'profiles';

    protected $fillable = ['user_id', 'vcs', 'user', 'password'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Crypt::encrypt($value);
    }

    public function getPasswordAttribute()
    {
        return Crypt::decrypt($this->attributes['password']);
    }

}