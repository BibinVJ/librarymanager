<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        // reset cached roles and categories
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // remove all existing data and seeds a new data
        DB::table('permissions')->truncate();

        $permissions = [
            'book.create',
            'book.read',
            'book.edit',
            'book.delete',
            'book.borrow',
            'user.create',
            'user.read',
            'user.edit',
            'user.delete',
            'admin.dashboard'
        ];
        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
            ]);
        }
        // reset or enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->command->info('Completed permission table seeder');
    }
}
