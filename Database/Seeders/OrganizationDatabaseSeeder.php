<?php

namespace Lumis\Organization\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class OrganizationDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call([
            SectionSeeder::class,
            BranchSeeder::class,
            FacultySeeder::class
        ]);
    }
}
