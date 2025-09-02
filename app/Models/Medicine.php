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

    //Eloquent (ORM - Object Relational Mapper)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    //Controller index
    public static function getAllSorted($sortBy = 'name', $sortDir = 'asc', $perPage = 5)
    {
        //Sortolja név szerint kövekvő-csökkenő, értékek megjelenitése = 5/oldal
        return self::with('tags')
                ->orderBy($sortBy, $sortDir)
                ->paginate($perPage);
    }

    //Controller show
    public static function getSingle(string $medicine_id){
        $medicine = self::with('tags')->findOrFail($medicine_id);
        return $medicine;
    }

    //Controller create
    public static function createMedicine(){
        //Tömbel tér vissza ($data) ami beállitja a kategóriát és a tageket.
       return [
            'categories' => Category::all(),
            'tags' => Tag::all()
        ];
    }

    //Controller store
    public static function storeMedicine(array $medicine_data, array $tags = []){
        $medicine = self::create($medicine_data);

        if(!empty($tags)){
            $medicine->tags()->attach($tags);
        }

        return $medicine;
    }

    //Controller update
    public static function updateMedicine(string $medicine_id, array $data, array $tags = [])
    {
        $medicine = self::findOrFail($medicine_id);
        $medicine->update($data);
        $medicine->tags()->sync($tags);
        return $medicine;
    }

    //Controller destroy
    public static function deleteMedicine(string $medicine_id){
        $medicine = self::findOrFail($medicine_id);
        $medicine->tags()->detach();
        $medicine->delete();

        return $medicine;
    }

    //Controller edit
    public static function editMedicine(string $id)
    {
        return [
            'medicine' => self::findOrFail($id),
            'categories' => Category::all(),
            'tags' => Tag::all()
        ];
    }

}
