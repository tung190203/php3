<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','amount','description','price','images','author_id','category_id',
    ];
    protected $casts = [
        'size' => 'json',
    ];
    public function category() :BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function author() :BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
