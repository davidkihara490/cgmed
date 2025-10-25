<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\CategoryProduct;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Clear existing data
        CategoryProduct::truncate();
        SubCategory::truncate();
        Category::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Medical categories
        $categories = [
            ['name' => 'Pharmaceuticals', 'status' => true],
            ['name' => 'Medical Equipment', 'status' => true],
            ['name' => 'Surgical Supplies', 'status' => true],
            ['name' => 'Diagnostic Tools', 'status' => true],
            ['name' => 'First Aid', 'status' => false],
            ['name' => 'Dental Supplies', 'status' => false],
            ['name' => 'Veterinary Medicine', 'status' => true],
            ['name' => 'Home Healthcare', 'status' => false],
            ['name' => 'Laboratory Equipment', 'status' => false],
            ['name' => 'Rehabilitation Products', 'status' => false],
        ];

        // Medical subcategories for each category
        $subCategoriesMap = [
            'Pharmaceuticals' => [
                'Antibiotics',
                'Pain Relievers',
                'Cardiovascular Drugs',
                'Diabetes Medication',
                'Respiratory Medication',
                'Gastrointestinal Drugs',
                'Hormone Therapy',
                'Vitamins & Supplements',
                'Mental Health Medication',
                'Topical Medications'
            ],
            'Medical Equipment' => [
                'Patient Monitors',
                'Infusion Pumps',
                'Ventilators',
                'Defibrillators',
                'Hospital Beds',
                'Wheelchairs',
                'Oxygen Concentrators',
                'Nebulizers',
                'Stethoscopes',
                'Blood Pressure Monitors'
            ],
            'Surgical Supplies' => [
                'Surgical Instruments',
                'Sutures & Staples',
                'Gloves & Masks',
                'Drapes & Gowns',
                'Catheters',
                'Implants',
                'Wound Care',
                'Anesthesia Supplies',
                'Sterilization Equipment',
                'Surgical Lights & Tables'
            ],
            'Diagnostic Tools' => [
                'Thermometers',
                'Blood Glucose Meters',
                'ECG Machines',
                'Ultrasound Machines',
                'X-ray Equipment',
                'MRI Machines',
                'CT Scanners',
                'Microscopes',
                'Lab Test Kits',
                'Otoscopes & Ophthalmoscopes'
            ],
            'First Aid' => [
                'Bandages & Dressings',
                'Antiseptics',
                'First Aid Kits',
                'Burn Care',
                'Emergency Blankets',
                'Splints & Braces',
                'CPR Masks',
                'Tourniquets',
                'Ice Packs',
                'Eye Wash Stations'
            ],
            'Dental Supplies' => [
                'Dental Chairs',
                'Dental Drills',
                'X-ray Systems',
                'Dental Implants',
                'Fillings & Cement',
                'Orthodontic Supplies',
                'Prosthetics',
                'Cleaning Instruments',
                'Anesthesia Equipment',
                'Preventive Care Products'
            ],
            'Veterinary Medicine' => [
                'Animal Vaccines',
                'Flea & Tick Control',
                'Animal Antibiotics',
                'Surgical Supplies',
                'Diagnostic Equipment',
                'Dental Care',
                'Nutritional Supplements',
                'Grooming Products',
                'Animal First Aid',
                'Reproduction & Breeding'
            ],
            'Home Healthcare' => [
                'Mobility Aids',
                'Personal Care',
                'Monitoring Devices',
                'Therapy Equipment',
                'Commodes & Toilet Aids',
                'Bathroom Safety',
                'Daily Living Aids',
                'Communication Aids',
                'Comfort & Positioning',
                'Medication Management'
            ],
            'Laboratory Equipment' => [
                'Centrifuges',
                'Analyzers',
                'Incubators',
                'Microscopes',
                'Pipettes & Tips',
                'Lab Furniture',
                'Safety Equipment',
                'Water Baths',
                'Spectrophotometers',
                'Chromatography Systems'
            ],
            'Rehabilitation Products' => [
                'Physical Therapy Equipment',
                'Occupational Therapy',
                'Sports Medicine',
                'Mobility Training',
                'Therapeutic Modalities',
                'Orthotics',
                'Prosthetics',
                'Balance Training',
                'Strength Equipment',
                'Hydrotherapy'
            ]
        ];

        // Common medical product names for variety
        $productNames = [
            'Professional',
            'Advanced',
            'Premium',
            'Standard',
            'Economy',
            'Deluxe',
            'Portable',
            'Digital',
            'Wireless',
            'Smart',
            'Compact',
            'Heavy Duty',
            'Disposable',
            'Reusable',
            'Sterile',
            'Non-sterile',
            'Pediatric',
            'Adult',
            'Senior',
            'Emergency'
        ];

        $productTypes = [
            'Kit',
            'System',
            'Device',
            'Equipment',
            'Machine',
            'Monitor',
            'Meter',
            'Scanner',
            'Analyzer',
            'Pump',
            'Set',
            'Pack',
            'Unit',
            'Model',
            'Version',
            'Edition'
        ];

        $medicalTerms = [
            'Medical',
            'Clinical',
            'Hospital',
            'Surgical',
            'Diagnostic',
            'Therapeutic',
            'Patient',
            'Healthcare',
            'Laboratory',
            'Pharmaceutical',
            'Veterinary',
            'Dental'
        ];

        foreach ($categories as $categoryData) {
            $category = Category::create($categoryData);

            $subCategoryNames = $subCategoriesMap[$categoryData['name']];

            foreach ($subCategoryNames as $subCatName) {
                $subCategory = SubCategory::create([
                    'category_id' => $category->id,
                    'name' => $subCatName,
                    'description' => "High-quality {$subCatName} for medical professionals and healthcare facilities.",
                    'status' => $categoryData['status'] // Inherit status from parent category
                ]);

                // Create 20 products for each subcategory
                for ($i = 1; $i <= 20; $i++) {
                    $productName = $this->generateProductName(
                        $productNames,
                        $productTypes,
                        $medicalTerms,
                        $subCatName
                    );

                    CategoryProduct::create([
                        'name' => $productName,
                        'image' => $this->getMedicalImage($subCatName),
                        'sub_category_id' => $category->id,
                        'description' => $this->generateProductDescription($productName, $subCatName),
                        'status' => $i <= 15 ? true : false // 15 active, 5 inactive
                    ]);
                }
            }
        }

        $this->command->info('Successfully created:');
        $this->command->info('- 10 categories (4 active, 6 inactive)');
        $this->command->info('- 100 subcategories (40 active, 60 inactive)');
        $this->command->info('- 2000 products (1500 active, 500 inactive)');
    }

    /**
     * Generate a realistic medical product name
     */
    private function generateProductName(array $names, array $types, array $terms, string $subCategory): string
    {
        $randomName = $names[array_rand($names)];
        $randomType = $types[array_rand($types)];
        $randomTerm = $terms[array_rand($terms)];

        $patterns = [
            "{$randomName} {$subCategory} {$randomType}",
            "{$randomTerm} {$randomName} {$randomType}",
            "{$subCategory} {$randomName} {$randomType}",
            "{$randomName} {$randomTerm} {$randomType}"
        ];

        return $patterns[array_rand($patterns)];
    }

    /**
     * Generate appropriate image placeholder based on subcategory
     */
    private function getMedicalImage(string $subCategory): string
    {
        $imageMap = [
            'Antibiotics' => 'products/LNtNL6DL7fX1NbI5g7WZlIpvpIXbqDYODdCFzbOJ.jpg',
            'Pain Relievers' => 'products/LNtNL6DL7fX1NbI5g7WZlIpvpIXbqDYODdCFzbOJ.jpg',
            'Patient Monitors' => 'products/LNtNL6DL7fX1NbI5g7WZlIpvpIXbqDYODdCFzbOJ.jpg',
            'Ventilators' => 'products/LNtNL6DL7fX1NbI5g7WZlIpvpIXbqDYODdCFzbOJ.jpg',
            'Surgical Instruments' => 'products/LNtNL6DL7fX1NbI5g7WZlIpvpIXbqDYODdCFzbOJ.jpg',
            'Thermometers' => 'products/LNtNL6DL7fX1NbI5g7WZlIpvpIXbqDYODdCFzbOJ.jpg',
            'Bandages & Dressings' => 'products/LNtNL6DL7fX1NbI5g7WZlIpvpIXbqDYODdCFzbOJ.jpg',
            'Dental Chairs' => 'products/LNtNL6DL7fX1NbI5g7WZlIpvpIXbqDYODdCFzbOJ.jpg',
            'Animal Vaccines' => 'products/LNtNL6DL7fX1NbI5g7WZlIpvpIXbqDYODdCFzbOJ.jpg',
            'Mobility Aids' => 'products/LNtNL6DL7fX1NbI5g7WZlIpvpIXbqDYODdCFzbOJ.jpg'
        ];

        foreach ($imageMap as $key => $image) {
            if (str_contains($subCategory, $key)) {
                return $image;
            }
        }

        return 'medical-equipment.jpg'; // default image
    }

    /**
     * Generate product description
     */
    private function generateProductDescription(string $productName, string $subCategory): string
    {
        $descriptions = [
            "The {$productName} provides reliable performance and accurate results for healthcare professionals. Designed with patient safety and comfort in mind.",
            "Advanced {$productName} featuring the latest technology in {$subCategory}. Ideal for clinical settings and hospital use.",
            "Professional-grade {$productName} manufactured to meet strict medical standards. Ensures precision and durability in healthcare environments.",
            "The {$productName} offers innovative solutions for {$subCategory} needs. Trusted by medical professionals worldwide.",
            "High-quality {$productName} designed for efficient and effective medical procedures. Supports better patient outcomes."
        ];

        return $descriptions[array_rand($descriptions)];
    }
}
