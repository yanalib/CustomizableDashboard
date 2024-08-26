<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Button extends Model
{
    use HasFactory;

     protected $table = 'buttons';

     protected $primaryKey = 'id';

     public $timestamps = false;

     protected $fillable = ['title', 'color', 'link'];
}
