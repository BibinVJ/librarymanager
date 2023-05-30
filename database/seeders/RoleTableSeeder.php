<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('roles')->truncate();

        $admin_role = Role::create([
            'name' => 'admin',
        ]);

        $admin_role->givePermissionTo([
            'book.create',
            'book.read',
            'book.edit',
            'book.delete',
            'user.create',
            'user.read',
            'user.edit',
            'user.delete',
            'admin.dashboard',
        ]);

        $customer_role = Role::create([
            'name' => 'customer',
        ]);
        $customer_role->givePermissionTo([
            'book.read',
            'book.borrow',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $this->command->info('Completed roles table seeder');
    }
}
