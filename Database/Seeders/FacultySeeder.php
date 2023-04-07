<?php

namespace Lumis\Organization\Database\Seeders;

use Illuminate\Database\Seeder;
use Lumis\Organization\Entities\Department;
use Lumis\Organization\Entities\Faculty;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faculties = [
            ['code' => 'ADM', 'name' => 'Administration'],
            ['code' => 'FHS', 'name' => 'Faculty of Food and Human Sciences'],
            ['code' => 'FAG', 'name' => 'Faculty of Agriculture'],
            ['code' => 'FDS', 'name' => 'Faculty of Development Studies'],
            ['code' => 'FNR', 'name' => 'Faculty of Natural Resources'],
            ['code' => 'FLNR', 'name' => 'Faculty of Life Sciences and Natural Resources'],
            ['code' => 'FVM', 'name' => 'Faculty of Veterinary Medicine'],
            ['code' => 'FPS', 'name' => 'Faculty of Postgraduate Studies']
        ];

        $departments = [
            'ADM' =>  [
                ['code' => 'ADMIN', 'name' => 'Administration']
            ],
            'FHS' => [
                ['code' => 'HNH', 'name' => 'Human Nutrition and Health'],
                ['code' => 'HEC', 'name' => 'Human Ecology'],
                ['code' => 'FTS', 'name' => 'Food Science and Technology']
            ],
            'FAG' => [
                ['code' => 'AGE', 'name' => 'Agricultural Engineering'],
                ['code' => 'ANS', 'name' => 'Animal Science'],
                ['code' => 'BSC', 'name' => 'Basic Sciences'],
                ['code' => 'CSS', 'name' => 'Crop and Soil Sciences'],
                ['code' => 'HOT', 'name' => 'Horticulture']
            ],
            'FDS' => [
                ['code' => 'ABM', 'name' => 'Agribusiness Management'],
                ['code' => 'EDC', 'name' => 'Agriculture Education and Development Communication'],
                ['code' => 'AAE', 'name' => 'Agricultural and Applied Economics'],
                ['code' => 'EXT', 'name' => 'Extension']
            ],
            'FNR' => [
                ['code' => 'FOR', 'name' => 'Forestry'],
                ['code' => 'AQF', 'name' => 'Aquaculture and Fisheries Science'],
                ['code' => 'ASM', 'name' => 'Environment and Natural Resource Management']
            ],
            'FLNR' => [
                ['code' => 'AGR', 'name' => 'Agriculture'],
                ['code' => 'NRS', 'name' => 'Natural Resources']
            ],
            'FVM' => [
                ['code' => 'VMS', 'name' => 'Veterinary Biomedical Sciences'],
                ['code' => 'VPB', 'name' => 'Veterinary Pathobiology'],
                ['code' => 'VCS', 'name' => 'Veterinary Clinic Studies'],
                ['code' => 'VEPH', 'name' => 'Veterinary Epidemiology and Public Health']
            ]
        ];


        foreach ($faculties as $record) {
            $faculty = new Faculty();
            $faculty->code = $record['code'];
            $faculty->name = $record['name'];
            $faculty->save();

            $departmentList =  $departments[$faculty->code];

            if(count($departmentList) > 0){
                foreach ($departmentList as $row){
                    $department = new Department();
                    $department->code = $row['code'];
                    $department->name = $row['name'];
                    $department->faculty()->associate($faculty);
                    $department->save();
                }
            }

        }


    }


}
