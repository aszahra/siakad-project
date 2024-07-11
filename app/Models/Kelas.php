<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_kelas',
        'kode_jurusan',
        'kelas',
    ];

    protected $table = 'kelas';

    public static function createCode()
    {
        $latestCode = self::orderBy('kode_jurusan', 'desc')->value('kode_kelas');
        $latestCodeNumber = intval(substr($latestCode, 2));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%05d", $nextCodeNumber);
        return 'KR' . $formattedCodeNumber;
    } 
}
