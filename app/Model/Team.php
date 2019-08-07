<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Team extends Model
{
    protected $fillable = [
        'title',
        'lead_id'
    ];
    public function users()
    {
            return $this->hasMany(User::class);
    }
}
