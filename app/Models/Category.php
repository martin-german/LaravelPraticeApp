<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    
    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }

    //Controller index
    public static function getAll(){
        return self::all();
    }

    //Controller store
    public static function createCategory(array $data){
        return self::create($data);
    }

    //Controller update
    public static function updateCategory(string $id, array $data)
    {
        $category = self::findOrFail($id);
        $category->update($data);
        return $category;
    }
}
