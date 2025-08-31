<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medicine;
use App\Models\Tag;

class MedicineTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
  
        $medicineTagRelations = [
            1 => [2, 11, 14], // MST CONTINUS: morfin-szulfát, fájdalomcsillapító, Tabletta
            2 => [1, 11, 14], // CODOXY RAPID: oxicodon, fájdalomcsillapító, Tabletta  
            3 => [1, 11, 14], // RELTEBON: oxicodon, fájdalomcsillapító, Tabletta
            4 => [3, 11, 14], // ALGOFLEX: ibuprofen, fájdalomcsillapító, Tabletta
            7 => [5, 14, 16], // ALMOWILL-DUO: amoxicillin, Tabletta, Antibiotikum
            8 => [6, 16, 17], // Neomagnol: chlorogenium, Antibiotikum, Oldat
            9 => [9, 15, 19], // MOMEPAX CONTROL: mometasone-furoate, Spray, Allergiagyógyszer
            10 => [8, 14, 19], // Cetirizin HEXAL: antihisztamin, Tabletta, Allergiagyógyszer
            11 => [4, 11, 12], // BEN-U-RON: paracetamol, fájdalomcsillapító, Szirup
            12 => [7, 14, 18], // AGOMELATIN ANPHARM: agomelatin, Tabletta, Antidepresszán
        ];

        foreach ($medicineTagRelations as $medicineId => $tagIds) {
            $medicine = Medicine::find($medicineId);
            
            if ($medicine) {
                foreach ($tagIds as $tagId) {
                    $tag = Tag::find($tagId);
                    
                    if ($tag) {
                        $medicine->tags()->syncWithoutDetaching([$tag->id]);
                    }
                }
            }
        }
    }
}