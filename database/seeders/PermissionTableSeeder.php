<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'dashboard',

           'role-list',
           'role-create',
           'role-edit',
           'role-delete',

           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           
           'clinic-list',
           'clinic-create',
           'clinic-show',
           'clinic-edit',
           'clinic-print',
           'clinic-delete',

           'doctor-list',
           'doctor-create',
           'doctor-edit',
           'doctor-show',
           'doctor-deiete',

           'clinichistory-list',

           'licencetype-list',
           'licencetype-create',
           'licencetype-show',
           'licencetype-edit',
           'licencetype-delete',

           'sublicence-list',
           'sublicence-create',
           'sublicence-show',
           'sublicence-edit',
           'sublicence-delete',

           'township-list',
           'township-create',
           'township-show',
           'township-edit',
           'township-delete',
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
