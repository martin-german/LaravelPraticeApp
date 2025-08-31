<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Medicine;
use App\Models\Category;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Fájdalomcsillapítók' => Category::where('name', 'Fájdalomcsillapítók')->first()->id,
            'Antibiotikumok' => Category::where('name', 'Antibiotikumok')->first()->id,
            'Antidepresszánsok' => Category::where('name', 'Antidepresszánsok')->first()->id,
            'Vízhajtók' => Category::where('name', 'Vízhajtók')->first()->id,
            'Allergiagyógyszerek' => Category::where('name', 'Allergiagyógyszerek')->first()->id,
        ];

        $medicines = [
            // Fájdalomcsillapítók
            [
                'category_id' => $categories['Fájdalomcsillapítók'],
                'name' => 'MST CONTINUS',
                'description' => 'Súlyos, akut és krónikus fájdalom (pl. daganatos betegségekkel összefüggő fájdalom) kezelésére szolgál.',
                'link' => 'https://www.hazipatika.com/gyogyszerkereso/termek/mst_continus_100_mg_retard_filmtabletta/1091',
                'needPresc' => true,
                'price' => 3205.00
            ],
            [
                'category_id' => $categories['Fájdalomcsillapítók'],
                'name' => 'CODOXY RAPID',
                'description' => 'Súlyos fájdalom csillapítására használják, gyakran más fájdalomcsillapítóval kombinálva.',
                'link' => 'https://www.webbeteg.hu/gyogyszerkereso/codoxy-rapid-10/901639',
                'needPresc' => true,
                'price' => 5000.00
            ],
            [
                'category_id' => $categories['Fájdalomcsillapítók'],
                'name' => 'RELTEBON',
                'description' => 'A Reltebon hatóanyagként oxikodon-hidrokloridot tartalmaz, ami az opiátoknak nevezett gyógyszercsoportba tartozik. Ezek erős fájdalomcsillapítók. A Reltebon felnőtteknél és 12 éves, valamint idősebb serdülőknél alkalmazható olyan, erős fájdalom csillapítására, amelyet kizárólag opiopid fájdalomcsillapítókkal lehet megszüntetni.',
                'link' => 'https://www.webbeteg.hu/gyogyszerkereso/reltebon-10-mg/900586',
                'needPresc' => true,
                'price' => 1350.00
            ],
            [
                'category_id' => $categories['Fájdalomcsillapítók'],
                'name' => 'ALGOFLEX',
                'description' => 'Nem-szteroid gyulladáscsökkentő szer (NSAID). Fejfájás, izomfájdalom, menstruációs fájdalom és láz enyhítésére használják.',
                'link' => 'https://benu.hu/shop/ibuprofen-polfa-200-mg-bevont-tabletta-100x',
                'needPresc' => false,
                'price' => 1000.00
            ],
            [
                'category_id' => $categories['Fájdalomcsillapítók'],
                'name' => 'BEN-U-RON',
                'description' => 'A Ben-u-ron szirup fájdalom és lázcsillapító gyógyszer, paracetamol hatóanyagot tartalmaz. Alkalmazható enyhe és mérsékelten erős fájdalom csillapítására, pl. fejfájás, reumatikus fájdalom, izomfájdalmak, fogfájás, menstruációs fájdalom esetén. Enyhíti a megfázás, influenza, torokfájás tüneteit, csökkenti a lázat.',
                'link' => 'https://www.webbeteg.hu/gyogyszerkereso/ben-u-ron-szirup/904325',
                'needPresc' => false,
                'price' => 2920.00
            ],

            // Antibiotikumok
            [
                'category_id' => $categories['Antibiotikumok'],
                'name' => 'ALMOWILL-DUO',
                'description' => 'Széles spektrumú antibiotikum, amelyet gyakori bakteriális fertőzések, például fülgyulladás, torokgyulladás és tüdőgyulladás kezelésére használnak.',
                'link' => 'https://www.webbeteg.hu/gyogyszerkereso/almowill-duo-875-mg-125/901358',
                'needPresc' => true,
                'price' => 4700.00
            ],
            [
                'category_id' => $categories['Antibiotikumok'],
                'name' => 'Neomagnol',
                'description' => 'Vízben feloldva higiénés kézfertőtlenítés, fogászati gyökérkezelés, kis felületű sebek, gyümölcs, mosható textíliák, rozsdamentes fémtárgyak, gumi-, műanyag tárgyak, orvosi kézi-eszközök, evőeszközök, konyhaedények, mosható bútorok, berendezési tárgyak, fésűk, kefék, borotválkozási eszközök, gumi-, műanyag gyermekjátékok, WC-, mosdókagylók, kádak, váladékgyűjtő edények és ivóvíz fertőtlenítésére szolgál.',
                'link' => 'https://benu.hu/shop/neomagnol-tabletta-10x',
                'needPresc' => false,
                'price' => 2200.00
            ],

            // Antidepresszánsok
            [
                'category_id' => $categories['Antidepresszánsok'],
                'name' => 'AGOMELATIN ANPHARM',
                'description' => 'Az Agomelatin Anpharm hatóanyagként agomelatint tartalmaz. Ez az antidepresszánsoknak nevezett gyógyszerek csoportjába tartozik, és Ön a depressziója kezelésére kapta az Agomelatin Anpharm filmtablettát. Az Agomelatin Anpharmot felnőtteknél alkalmazzák. A depresszió egy állandó kedélyállapot-zavar, ami befolyásolja a mindennapi életvitelt.',
                'link' => 'https://www.webbeteg.hu/gyogyszerkereso/agomelatin-anpharm-25/901327',
                'needPresc' => true,
                'price' => 4210.00
            ],

            // Allergiagyógyszerek
            [
                'category_id' => $categories['Allergiagyógyszerek'],
                'name' => 'MOMEPAX CONTROL',
                'description' => 'A Momepax Control orrspray mometazon-furoátot tartalmaz, amely a kortikoszteroidok nevű gyógyszercsoporthoz tartozik. Az orrba permetezett mometazon-furoát segíthet abban, hogy csökkenjen az orrnyálkahártya-gyulladás. A Momepax Control orrspray-t orvos által megállapított szénanátha kezelésére alkalmazzák felnőtteknél.',
                'link' => 'https://www.webbeteg.hu/gyogyszerkereso/momepax-control-50/902368',
                'needPresc' => true,
                'price' => 1450.00
            ],
            [
                'category_id' => $categories['Allergiagyógyszerek'],
                'name' => 'Cetirizin HEXAL',
                'description' => 'A Cetirizin HEXAL filmtabletta felnőttek, valamint 6 éves és a feletti gyermekek alábbi tüneteinek kezelésére javasolt: szezonális és egész éven át tartó allergiás nátha orr- és szemtüneteinek enyhítésére; krónikus csalánkiütés (krónikus idiopátiás urtikária) enyhítésére.',
                'link' => 'https://benu.hu/shop/cetirizin-hexal-10-mg-filmtabletta-30x',
                'needPresc' => false,
                'price' => 1520.00
            ],
        ];

        foreach ($medicines as $medicineData) {
            Medicine::updateOrCreate(
                ['name' => $medicineData['name']],
                $medicineData
            );
        }
    }
}