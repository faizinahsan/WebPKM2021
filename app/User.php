<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table='users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function mahasiswa()
    {
        return $this->hasOne('App\Models\Mahasiswa','users_id');
    }
    public function pendamping()
    {
        return $this->hasOne('App\Models\DosenPendamping', 'users_id');
    }
    public function reviewer()
    {
        return $this->hasOne('App\Models\DosenReviewer', 'users_id');
    }
}
