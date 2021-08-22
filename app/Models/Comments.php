<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'misyukko';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
    
    

}
