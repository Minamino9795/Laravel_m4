<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $dates = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
         'name','slug','price','decscription','quantity','status','category_id','deleted_at','image'
    ];
    protected $primaryKey = 'id';
    protected $table = 'categories';
    public $timestamps = true;

}
