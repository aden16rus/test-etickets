<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = false;
    protected $fillable = ['name'];

    protected $hidden = ['pivot'];
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
