<?php

namespace Database\Seeders;

use App\Models\Hospital;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Bangladesh Medical College Hospital', 'address' => 'Dhaka'],
            ['name' => 'Dhaka Community Hospital', 'address' => 'Dhaka'],
            ['name' => 'Ad-din Womens Medical College Hospital', 'address' => 'Dhaka'],
            ['name' => 'Aichi Hospital', 'address' => 'Dhaka'],
            ['name' => 'Al Haramain Hospital', 'address' => 'Sylhet'],
            ['name' => 'Ambia Memorial Hospital', 'address' => 'Barisal'],
            ['name' => 'Anwer Khan Modern Hospital Ltd', 'address' => 'Dhaka'],
            ['name' => 'Apollo Hospitals', 'address' => 'Dhaka'],
            ['name' => 'Gazi Medical College Hospital', 'address' => 'Khulna'],
            ['name' => 'Genuine Cancer Hospital Limited', 'address' => 'Chittagong'],
            ['name' => 'Gonoshasthaya Nagar Hospital', 'address' => 'Dhaka'],
            ['name' => 'Government Homeopathic Medical College Hospital', 'address' => 'Dhaka'],
            ['name' => 'Greenland Hospital Limited', 'address' => 'Dhaka'],
            ['name' => 'Holy Family Red Crescent Medical College Hospital', 'address' => 'Dhaka'],
            ['name' => 'Ibn Sina Hospitals', 'address' => 'Dhaka'],
            ['name' => 'Institute of Child and Mother Health', 'address' => 'Dhaka'],
            ['name' => 'Institute of Laser Surgery & Hospital', 'address' => 'Dhaka'],
            ['name' => 'Asgar Ali Hospital', 'address' => 'Dhaka'],
            ['name' => 'Aysha Memorial Specialised Hospital', 'address' => 'Dhaka'],
            ['name' => 'Bangabandhu Memorial Hospital', 'address' => 'Chittagong'],
            ['name' => 'Bangladesh Eye Hospital Ltd', 'address' => 'Dhaka'],
            ['name' => 'Bangladesh Specialized Hospital', 'address' => 'Dhaka'],
            ['name' => 'Bangladesh Spine & Orthopaedic General Hospital Ltd', 'address' => 'Dhaka'],
            ['name' => 'Basundhura Hospital (Pvt.) Ltd', 'address' => 'Dhaka'],
            ['name' => 'Bangladesh Rifles Hospital', 'address' => 'Dhaka'],
            ['name' => 'BRB Hospital', 'address' => 'Dhaka'],
            ['name' => 'Cardio Care Specialized and General Hospital Ltd', 'address' => 'Dhaka'],
            ['name' => 'Care Zone Hospital', 'address' => 'Dhaka'],
            ['name' => 'Central Hospital', 'address' => 'Dhaka'],
            ['name' => 'Chittagong Maa-O-Shishu Hospital', 'address' => 'Chittagong'],
            ['name' => 'Chittagong Diabetic General Hospital', 'address' => 'Chittagong'],
            ['name' => 'Chittagong Medical College Hospital', 'address' => 'Chittagong'],
            ['name' => 'Combined Military Hospital', 'address' => 'Dhaka'],
            ['name' => 'Comilla Medical College Hospital', 'address' => 'Comilla'],
            ['name' => 'Dhaka Central International Medical College Hospital', 'address' => 'Dhaka'],
            ['name' => 'Dhaka Dental College and Hospital', 'address' => 'Dhaka'],
            ['name' => 'Dhaka Medical College and Hospital', 'address' => 'Dhaka'],
            ['name' => 'Dhaka National Medical College', 'address' => 'Dhaka'],
            ['name' => 'Dhaka Shishu Hospital', 'address' => 'Dhaka'],
            ['name' => 'Dinajpur Medical College Hospital', 'address' => 'Dinajpur'],
            ['name' => 'Esperto Health Care & Research Center', 'address' => 'Dhaka'],
            ['name' => 'Farazy Hospital Ltd', 'address' => 'Dhaka'],
            ['name' => 'Ispahani Islamia Eye Institute and Hospital', 'address' => 'Dhaka'],
            ['name' => 'Khulna Medical College Hospital', 'address' => 'Khulna'],
            ['name' => 'Kumudini Hospital', 'address' => 'Tangail'],
            ['name' => 'Sir Salimullah Medical College and Mitford Hospital', 'address' => 'Dhaka'],
            ['name' => 'Square Hospital Ltd', 'address' => 'Dhaka'],
            ['name' => 'Sylhet Maa O Shishu Hospital', 'address' => 'Sylhet'],
            ['name' => 'Sylhet Medical College Hospital', 'address' => 'Sylhet'],
            ['name' => 'Union Specialized Hospital Limited', 'address' => 'Dhaka'],
            ['name' => 'Labaid Cardiac Hospital', 'address' => 'Dhaka'],
            ['name' => 'Labaid Specialized Hospital', 'address' => 'Dhaka'],
            ['name' => 'Medinova Medical Services Ltd', 'address' => 'Dhaka'],
            ['name' => 'MH Samorita Hospital & Medical College', 'address' => 'Dhaka'],
            ['name' => 'Moulana Bhasani Medical College Hospital', 'address' => 'Dhaka'],
            ['name' => 'Mount Adora Hospital', 'address' => 'Sylhet'],
            ['name' => 'Mymensingh Medical College Hospital', 'address' => 'Mymensingh'],
            ['name' => 'National Heart Foundation', 'address' => 'Sylhet'],
            ['name' => 'National Institute of Mental Health', 'address' => 'Dhaka'],
            ['name' => 'Nurjahan Hospital Ltd', 'address' => 'Sylhet'],
            ['name' => 'Oasis Hospital (Pvt) Ltd', 'address' => 'Sylhet'],
            ['name' => 'Sylhet, M.A.G Osmani Medical College and Hospital', 'address' => 'Sylhet'],
            ['name' => 'Pongu Hospital Jessore', 'address' => 'Jessore'],
            ['name' => 'Popular Specialized Hospital Ltd', 'address' => 'Dhaka'],
            ['name' => 'Rajshahi Medical College Hospital', 'address' => 'Rajshahi'],
            ['name' => 'Rangpur Medical College Hospital', 'address' => 'Rangpur'],
            ['name' => 'Royal Hospital and research Center Ltd', 'address' => 'Chittagong'],
            ['name' => 'Rashmono General Hospital', 'address' => 'Dhaka'],
            ['name' => 'Samorita Hospital Ltd', 'address' => 'Dhaka'],
            ['name' => 'Shaheed Monsur Ali Medical College Hospital', 'address' => 'Dhaka'],
            ['name' => 'Shaheed Ziaur Rahman Medical College Hospital', 'address' => 'Bogra'],
            ['name' => 'Sher-e-Bangla Medical College Hospital', 'address' => 'Barisal'],
            ['name' => 'Siddiqia Eye Foundation', 'address' => 'Mymensingh'],
        ];

        $count = Hospital::count();
        if ($count == count($data)) return;
        Hospital::truncate();
        Hospital::insert($data);
    }
}
