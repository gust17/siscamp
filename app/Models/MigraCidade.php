<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MigraCidade extends Model
{
    use HasFactory;

    protected $table = "amapa";

    protected $primaryKey = "id";
}
