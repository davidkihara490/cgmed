<?php

namespace Database\Seeders;

use App\Models\CompanyProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Clear existing company profile
        DB::table('company_profiles')->truncate();

        // Create company profile
        CompanyProfile::create([
            'company_name' => 'MediCare Solutions Inc.',

            'logo' => 'company-logo.png',

            'hero_image' => 'hero-medical.jpg',
            'hero_title' => 'Your Trusted Partner in Healthcare',
            'hero_sub_title' => 'Providing Quality Medical Supplies and Equipment for Over 20 Years',

            'about' => 'MediCare Solutions is a leading provider of medical equipment, pharmaceuticals, and healthcare supplies. Founded in 2003, we have been serving hospitals, clinics, and healthcare professionals with reliable and high-quality medical products. Our commitment to excellence and patient safety drives everything we do.',

            'phone' => '+1 (555) 123-4567',
            'email' => 'info@medicaresolutions.com',
            'address' => '123 Healthcare Avenue, Medical District, Cityville, State 12345',

            'facebook' => 'https://facebook.com/medicaresolutions',
            'twitter' => 'https://twitter.com/medicaresolutions',
            'instagram' => 'https://instagram.com/medicaresolutions',
            'linkedin' => 'https://linkedin.com/company/medicaresolutions',
            'youtube' => 'https://youtube.com/medicaresolutions',
            'pinterest' => 'https://pinterest.com/medicaresolutions',
            'tiktok' => 'https://tiktok.com/@medicaresolutions',

            'copyright' => '© 2024 MediCare Solutions Inc. All rights reserved.',
        ]);

        $this->command->info('Company profile seeded successfully!');
        $this->command->info('Company: MediCare Solutions Inc.');
    }
}
