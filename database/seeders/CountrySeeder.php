<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('countries')->truncate();

        $countries = [
            [
                "code" => "+7 840",
                "name" => "Abkhazia"
            ],
            // ... (toutes les autres entrées du tableau)
            [
                "code" => "+255",
                "name" => "Zanzibar"
            ],
            [
                "code" => "+263",
                "name" => "Zimbabwe"
            ]
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
