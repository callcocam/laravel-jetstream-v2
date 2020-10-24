<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Role::factory(1)->create(
           [
               'name'=>'Super Admin',
               'slug'=>'super-admin',
               'description'=>'Controle Total',
               'special'=>'all-access',
               'status'=>'published'
           ]
       );
       Role::factory(1)->create(
           [
               'name'=>'Administrador',
               'slug'=>'administrador',
               'description'=>'Controle parcial do sistema',
               'status'=>'published'
           ]
       );
    }
}
