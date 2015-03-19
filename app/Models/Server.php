<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{

    protected $table = 'servers';

    protected $fillable = ['slug', 'name', 'folder', 'ip'];

    public function environments()
    {
        return $this->belongsToMany('App\Models\Environment')->withTimestamps();
    }
}
