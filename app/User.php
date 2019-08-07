<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'contact',
        'gender',
        'email',
        'role',
        'password',
        'team_id',
        'project_id'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function project()
    {
            return $this->belongsToMany(Project::class);
    }
    public function team()
    {
            return $this->belongsTo(Team::class);
    }
    public function invites()
    {
            return $this->hasMany(Invites::class);
    }
}
