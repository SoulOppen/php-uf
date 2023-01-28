<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Value;
use File;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Value::truncate();
  
        $json = File::get("database/data/seed.json");
        
        $values = json_decode($json);
        $array=$values->serie;
        foreach ($array as $key => $item) {
            Value::create([
                "fecha" => date('Y-m-d',strtotime($item->fecha)),
                "valor" => $item->valor
            ]);
        }
        
    }
}
