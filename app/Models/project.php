<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_siswa',
        'deskripsi',
        'nama_project',
        'tanggal'
    ];

    protected $table = 'project';

    public function siswa()
    {
        return $this->belongsTo('app\models\siswa', 'id');
    }
}
