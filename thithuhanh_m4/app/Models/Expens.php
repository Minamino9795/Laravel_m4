<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expens extends Model
{
    use HasFactory;
    protected $table = 'qlchitieu';
    protected $fillable = [
        'DANHMUCCHITIEU',
        'NGAYCHITIEU',
        'SOTIEN',
        'GHICHU',
    ];
    public $timestamps = false;
}
