<?php

use Illuminate\Database\Seeder;
use App\Model\Admin\Role;
use App\Model\Admin\Permission;
class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // les roles
            Role::create(
            [
                'name' => 'Admin'
            ]);
            Role::create(
            [
                'name' => 'Codifier'
            ]);
            Role::create(
            [
                'name' => 'Logement'
            ]);
            Role::create(
            [
                'name' => 'Article'
            ]);
            // fin des role

            Permission::create(
            [
                'name' => 'index',
                'for' => 'Admin'
            ]);
            Permission::create(
            [
                'name' => 'create',
                'for' => 'Admin'
            ]);
            Permission::create(
            [
                'name' => 'update',
                'for' => 'Admin'
            ]);
            Permission::create(
            [
                'name' => 'delete',
                'for' => 'Admin'
            ]);


            Permission::create(
            [
                'name' => 'index',
                'for' => 'Codifier'
            ]);
            Permission::create(
            [
                'name' => 'create',
                'for' => 'Codifier'
            ]);
            Permission::create(
            [
                'name' => 'update',
                'for' => 'Codifier'
            ]);
            Permission::create(
            [
                'name' => 'delete',
                'for' => 'Codifier'
            ]);


            Permission::create(
            [
                'name' => 'index',
                'for' => 'Logement'
            ]);
            Permission::create(
            [
                'name' => 'create',
                'for' => 'Logement'
            ]);
            Permission::create(
            [
                'name' => 'update',
                'for' => 'Logement'
            ]);
            Permission::create(
            [
                'name' => 'delete',
                'for' => 'Logement'
            ]);



            Permission::create(
            [
                'name' => 'index',
                'for' => 'Article'
            ]);
            Permission::create(
            [
                'name' => 'create',
                'for' => 'Article'
            ]);
            Permission::create(
            [
                'name' => 'update',
                'for' => 'Article'
            ]);
            Permission::create(
            [
                'name' => 'delete',
                'for' => 'Article'
            ]);
    }
}
