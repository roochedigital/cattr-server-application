<?php

use Illuminate\Database\Seeder;

/**
 * Class InitialSeeder
 */
class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(PrioritiesSeeder::class);
        $this->call(CompanyManagementSeeder::class);
    }
}
