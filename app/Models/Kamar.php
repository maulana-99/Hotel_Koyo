<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    protected $table = 'kamar';
    protected $fillable = [
        'id',
        'nama_kamar',
        'tipe_kamar',
        'deskripsi',
        'jenis_kasur',
        'kamar_mandi',
        'kapasitas',
        'foto_kamar',
    ];
}
