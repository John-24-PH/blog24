<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use app\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   
    
        private $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
        ]; 
   
     public function run(): void
     {

     }
}

{
    foreach ($this->premissions as $permission) {
        Permission::create(['name'=> $permission]);
    }

    $user = User::create([
        'name' =>'Ciubotaru ionut',
        'mail' =>'admin@admin.com',
        'password'=> Hash::make('Secret2024')
    ]);

    $role = Role::create(['name'=>'Admin']);

    $permission = Permission::pluck('id','id')->all();

    $role->syncPermissions($permissions);
    $user->assignRole([$role->id]);
}