<?php

use App\Roles;
use Illuminate\Database\Seeder;

class RolesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::create([
            'name' => 'admin'
        ]);
        Roles::create([
            'name' => 'proveedor'
        ]);
        Roles::create([
            'name' => 'especialClient'
        ]);
    }
}
