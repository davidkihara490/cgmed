<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutSection;

class AboutSectionSeeder extends Seeder
{
    public function run()
    {
        $sections = [
            [
                'section_type' => AboutSection::TYPE_HISTORY,
                'content' => 'Founded in 2003, MediCare Solutions has been at the forefront of medical innovation for over two decades. We started as a small medical supply company and have grown into a trusted partner for healthcare facilities nationwide.',
                'sort_order' => 1,
                'is_active' => true
            ],
            [
                'section_type' => AboutSection::TYPE_MISSION,
                'content' => json_encode([
                    'mission' => 'To provide high-quality medical supplies and equipment that enhance patient care and support healthcare professionals in delivering exceptional medical services.',
                    'vision' => 'To be the leading innovator in medical solutions, transforming healthcare delivery through cutting-edge technology and reliable products.',
                    'philosophy' => 'We believe in putting patient safety first and building lasting relationships with our partners through trust and excellence.'
                ]),
                'sort_order' => 2,
                'is_active' => true
            ],
            [
                'section_type' => AboutSection::TYPE_TEAM,
                'data' => [
                    'team_members' => [
                        [
                            'name' => 'Dr. Sarah Johnson',
                            'position' => 'Chief Executive Officer',
                            'department' => 'management',
                            'description' => 'With over 20 years of experience in healthcare management, Dr. Johnson leads our company with vision and dedication.',
                            'email' => 's.johnson@medicaresolutions.com'
                        ],
                        [
                            'name' => 'Michael Chen',
                            'position' => 'Chief Medical Officer',
                            'department' => 'medical',
                            'description' => 'Board-certified physician with extensive experience in medical device innovation and patient care.',
                            'email' => 'm.chen@medicaresolutions.com'
                        ]
                    ]
                ],
                'sort_order' => 3,
                'is_active' => true
            ],
            [
                'section_type' => AboutSection::TYPE_VALUES,
                'content' => 'Our core values guide everything we do, from product development to customer service.',
                'data' => [
                    'values' => ['Integrity', 'Innovation', 'Excellence', 'Patient Safety', 'Collaboration']
                ],
                'sort_order' => 4,
                'is_active' => true
            ],
            [
                'section_type' => AboutSection::TYPE_QUALITY,
                'content' => 'We maintain the highest quality standards across all our products and services.',
                'data' => [
                    'standards' => ['ISO 9001', 'FDA Approved', 'Good Manufacturing Practices']
                ],
                'sort_order' => 5,
                'is_active' => true
            ],
            [
                'section_type' => AboutSection::TYPE_INNOVATION,
                'content' => 'Our commitment to innovation drives us to develop cutting-edge medical solutions.',
                'data' => [
                    'focus_areas' => ['Medical Devices', 'Telemedicine', 'AI in Healthcare'],
                    'rd_investment' => 5000000,
                    'patents_count' => 15
                ],
                'sort_order' => 6,
                'is_active' => true
            ],
            [
                'section_type' => AboutSection::TYPE_PARTNERSHIPS,
                'content' => 'We collaborate with leading healthcare institutions and technology partners.',
                'data' => [
                    'partners' => [
                        ['name' => 'General Medical Hospital', 'type' => 'hospital'],
                        ['name' => 'TechMed Solutions', 'type' => 'technology']
                    ]
                ],
                'sort_order' => 7,
                'is_active' => true
            ],
            [
                'section_type' => AboutSection::TYPE_CERTIFICATIONS,
                'data' => [
                    'certifications' => [
                        [
                            'name' => 'ISO 9001:2015',
                            'authority' => 'International Organization for Standardization',
                            'issue_date' => '2023-01-15',
                            'expiry_date' => '2026-01-15'
                        ]
                    ],
                    'compliance' => ['HIPAA', 'CE Marking']
                ],
                'sort_order' => 8,
                'is_active' => true
            ]
        ];

        foreach ($sections as $section) {
            AboutSection::create($section);
        }
    }
}