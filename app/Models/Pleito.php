<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pleito extends Model
{
    use HasFactory;


    protected $fillable =
        [
            'ano',
            'majoritaria'
        ];



}
