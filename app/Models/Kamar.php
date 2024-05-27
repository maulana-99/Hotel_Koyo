<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    protected $table = 'kamar';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_kamar',
        'tipe_kamar',
        'harga',
        'foto_kamar',
    ];
}
