<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\User;

class Invite extends Model
{
    protected $fillable = [
        'email', 'token',
    ];
    // TODO: later
    // FIXME: new models??
    // public function sender()
    // {
    //         return $this->belongsTo(User::class);
    // }
    // public function receiever()
    // {
    //         return $this->belongsTo(User::class);
    // }
}
