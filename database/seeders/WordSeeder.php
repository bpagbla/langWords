<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // JSON file
        $jsonPath = storage_path('/app/json/sm1_new_kap1.json');
        
        // read JSON
        $jsonData = File::get($jsonPath);
        
        // JSON to array
        $words = json_decode($jsonData, true);
        
        // Insert data to table
        foreach ($words as $word) {
            DB::table('words')->insert([
                'wordFirstLang' => $word['wordFirstLang'],
                'sentenceFirstLang' => $word['sentenceFirstLang'],
                'wordSecondLang' => $word['wordSecondLang'],
                'sentenceSecondLang' => $word['sentenceSecondLang'],
                'created_at' => now(), // Timestamp de creación
                'updated_at' => now(), // Timestamp de actualización
            ]);
        }
    }
}
