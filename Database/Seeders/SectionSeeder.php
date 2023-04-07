<?php

namespace Lumis\Organization\Database\Seeders;

use Illuminate\Database\Seeder;
use Lumis\Organization\Entities\Section;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            'Administration',
            'Academics',
            'Registry',
            'Finance',
            'Human Resource',
            'Procurement',
            'Internal Audit',
            'Quality Assurance',
            'ICT',
            'Marketing and Communication',
            'Programs Coordinating Office',
            'Estates and Development',
            'CARD',
            'Research and Outreach',
            'Library',
            'Clinic',
            'Transport',
            'Maintenance',
            'Farm',
            'Filling Station'
        ];

        foreach ($sections as $name) {
            $section = new Section();
            $section->name = $name;
            $section->save();
        }
    }


}
