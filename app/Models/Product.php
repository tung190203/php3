<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','amount','description','price','images','gender','brand_id','category_id','size'
    ];
    protected $casts = [
        'size' => 'json',
    ];
    public function brand() :BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
    public function category() :BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
