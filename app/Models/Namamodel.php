<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Namamodel extends Model
{
    use HasFactory;

    protected $table = "data";
    protected $fillable = [
        "nama",
        "alamat",
    ];
}
