<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliticalEconomy extends Model
{

 protected $fillable = [
        'title',
        'description',
        'file_path',
        'type',
        'image_path',
        'tutor_name',
        'file_size',
    ];
}
