<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    protected $casts = [
        'needPresc' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //Controller index
    public static function getAll(){
        $sort_by= request()->query('sort_by','name');
        $sort_dir= request()->query('sort_dir','asc');
        
        return self::all();
    }

    //Controller store
    public static function createMedicine(array $medicine_data, array $tags = []){
        $medicine_data['needPresc'] = isset($medicine_data['needPresc']) ? true : false;

        $medicine = self::create($medicine_data);

        if(!empty($tags)){
            $medicine->tags()->attach($tags);
        }

        return $medicine;
    }


}
