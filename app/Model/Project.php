<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Project extends Model
{
    protected $fillable = [
        'title',
        'details',
        'lead_id'
    ];
    public function users()
    {
            return $this->belongsToMany(User::class);
    }
}
