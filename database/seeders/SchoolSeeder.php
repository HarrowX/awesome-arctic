<?php

namespace Database\Seeders;

use App\Models\Region;
use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $r1 = Region::create([
            'name' => 'Саратовская область',
        ]);

        $r2 = Region::create([
            'name' => 'Московская область',
        ]);

        $r3 = Region::create([
            'name' => 'Якутская область',
        ]);

        $s1 = School::create([
            'region_id' => $r1->id,
            'name' => 'г. Саратов, Школа 1',
        ]);

        $s2 = School::create([
            'region_id' => $r2->id,
            'name' => 'г. Москва, Школа 1',
        ]);

        $s3 = School::create([
            'region_id' => $r3->id,
            'name' => 'г. Якутск, Школа 1',
        ]);
    }
}
