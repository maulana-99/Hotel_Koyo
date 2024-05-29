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
        'id',
        'nama_kamar',
        'harga',
        'tipe_kamar',
        'deskripsi',
        'jenis_kasur',
        'kapasitas',
        'foto_kamar',
    ];
}
