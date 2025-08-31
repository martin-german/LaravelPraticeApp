<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'oxicodon',
            'morfin-szulfát',
            'ibuprofen',
            'paracetamol',
            'amoxicillin',
            'chlorogenium',
            'agomelatin',
            'antihisztamin',
            'mometasone-furoate',
            'fájdalomcsillapító',
            'Szirup',
            'Csepp',
            'Tabletta',
            'Spray',
            'Antibiotikum',
            'Oldat',
            'Antidepresszán',
            'Allergiagyógyszer',
        ];

        foreach ($tags as $tagName) {
            Tag::updateOrCreate(
                ['name' => $tagName]
            );
        }
    }
}