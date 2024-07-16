<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jk',
        'dusun',
        'rtrw',
        'kelurahan',
        'kecamatan',
        'kota',
        'kode_pos',
        'no_hp',
        'pendidikan_terakhir',
        'asal_sekolah',
        'jurusan_sekolah',
        'tahun_lulus',
        'kode_kelas',
        'tahun_angkatan',
    ];

    protected $table = 'mahasiswa';

    public static function createCode()
    {
        $latestCode = self::orderBy('nim', 'desc')->value('nim');
        $latestCodeNumber = intval(substr($latestCode, 2));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%05d", $nextCodeNumber);
        return 'KL' . $formattedCodeNumber;
    } 

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kode_kelas', 'kode_kelas');
    } 
}
