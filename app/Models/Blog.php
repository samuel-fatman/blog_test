<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'orderhenkan';
    protected $primaryKey = 'bango';
    public $timestamps = false;
    
    protected $visible = [
        'bango', 'kokyakubango', 'date', 'datachar04', 'datachar05', 'datachar06', 'comments', 'categories'
    ];


    public function comments()
    {
        return $this->hasMany(Comments::class, 'orderbango','bango');
    }
    
    public function categories()
    {
        return $this->hasMany(Category::class, 'bango', 'intorder01');
    }
}
