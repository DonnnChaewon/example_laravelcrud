<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kdrama extends Model {
    use HasFactory;

    protected $table = "kdramas";

    protected $fillable = ['title', 'production', 'episodes', 'start', 'end'];
}