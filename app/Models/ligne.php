<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ligne extends Model
{
protected $primaryKey = 'id_ligne';
public $timestamps = false;

    use HasFactory;
}
