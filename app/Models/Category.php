<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    
    //Eloquent (ORM - Object Relational Mapper)
    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }

    //Controller index
    public static function getAll(){
        return self::all();
    }

    //Controller show
    public static function getSingle(string $category_id){
        $category = self::findOrFail($category_id);
        return $category;
    }

    //Controller store
    public static function createCategory(array $data){
        return self::create($data);
    }

    //Controller update
    public static function updateCategory(string $category_id, array $data)
    {
        $category = self::findOrFail($category_id);
        $category->update($data);
        return $category;
    }

    //Controller destroy
    public static function deleteCategory(string $category_id){
        $category = self::findOrFail($category_id);
        $category->delete();
        return $category;
    }
}
