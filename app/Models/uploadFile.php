<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class uploadFile extends Model
{
    use HasFactory;
    protected $fillable=[
       'file'
    ];
}
