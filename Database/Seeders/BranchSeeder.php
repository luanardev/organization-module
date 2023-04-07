<?php

namespace Lumis\Organization\Database\Seeders;

use Illuminate\Database\Seeder;
use Lumis\Organization\Entities\Branch;
use Lumis\Organization\Entities\Campus;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branches = [
            [
                'name'     => 'University Office',
                'campuses' => [
                    ['code' => 'UOC', 'name' => 'University Office'],
                ]
            ],
            [
                'name'     => 'Bunda College of Agriculture',
                'campuses' => [
                    ['code' => 'BND', 'name' => 'Bunda College'],
                    ['code' => 'ODL', 'name' => 'Open and Distance eLearning'],
                    ['code' => 'CTC', 'name' => 'City Campus']
                ]
            ],
            [
                'name' => 'Natural Resources College',
                'campuses' => [
                    ['code' => 'NRC', 'name' => 'Natural Resources College']
                ]
            ]

        ];

        foreach ($branches as $record) {
            $branch = new Branch();
            $branch->name = $record['name'];
            $branch->save();
            foreach($record['campuses'] as $row){
                $campus = new Campus();
                $campus->code = $row['code'];
                $campus->name = $row['name'];
                $campus->branch()->associate($branch);
                $campus->save();
            }
        }
    }

}
