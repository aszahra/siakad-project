<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_ruang',
        'ruang',
    ];

    protected $table = 'ruang';

    public static function createCode()
    {
        $latestCode = self::orderBy('kode_ruang', 'desc')->value('kode_ruang');
        $latestCodeNumber = intval(substr($latestCode, 2));
        $nextCodeNumber = $latestCodeNumber ? $latestCodeNumber + 1 : 1;
        $formattedCodeNumber = sprintf("%05d", $nextCodeNumber);
        return 'KR' . $formattedCodeNumber;
    } 
}
