<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'kokyaku1';
    protected $primaryKey = 'bango';
    public $timestamps = false;


    protected $fillable = [
        'name',
        'mail_soushin',
        'mail_toiawase_mb',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'mail_toiawase_mb',
    ];
}

