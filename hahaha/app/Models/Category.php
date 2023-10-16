<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
         'name','decscription'
    ];
    protected $primaryKey = 'id';
    protected $table = 'categories';
    public $timestamps = true;
}
