<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'link',
        'needPresc',
        'price',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function tag(){
        return $this->belongsToMany(Tag::class);
    }
}
