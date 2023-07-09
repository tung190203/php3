<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','email','address','phone','total','pttt','status_bill','user_id','cart_id',
    ];
    protected $casts =[
        'cart_id' => 'json',
    ];
}
