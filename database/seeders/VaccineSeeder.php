<?php

namespace Database\Seeders;

use App\Models\Vaccine;
use Illuminate\Database\Seeder;

class VaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Diphtheria and Tetanus', 'dose_count' => 1],
            ['name' => 'Hepatitis A (Child)', 'dose_count' => 2],
            ['name' => 'Hexaxim (DTaP/IPV/ HIB/Hep B)', 'dose_count' => 4],
            ['name' => 'Tetraxim (DTap/IPV)', 'dose_count' => 1],
            ['name' => 'Pneumococcal Conjugate Vaccine 13 (Prevenar-13)', 'dose_count' => 4],
            ['name' => 'Mumps, Measels, Rubella', 'dose_count' => 2],
            ['name' => 'Chicken Pox (Varilrix)', 'dose_count' => 2],
            ['name' => 'Typhoid Conjugate Vaccine (Typhibev)', 'dose_count' => 1],
            ['name' => 'Typhoid polysaccharide Vaccine (Typhim Vi)', 'dose_count' => 1],
            ['name' => 'Meningococcal Conjugate (Menactra)', 'dose_count' => 1],
            ['name' => 'Rabies', 'dose_count' => 5],
            ['name' => 'Influenza (Vaxigrip)', 'dose_count' => 2],
        ];

        $count = Vaccine::count();
        if ($count == count($data)) return;
        Vaccine::truncate();
        Vaccine::insert($data);
    }
}
