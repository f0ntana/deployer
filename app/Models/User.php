<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function getProfile($vcs)
    {
        $output = ['user' => null, 'password' => null];
        $Profile = $this->profiles()->whereVcs($vcs)->first();

        if ($Profile) {
            $output['password'] = $Profile->password;
            $output['user'] = $Profile->user;
        }

        return $output;
    }

    public function profiles()
    {
        return $this->hasMany('App\Models\Profile');
    }
}
