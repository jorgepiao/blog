<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        User::truncate();

        $adminRole  = Role::create(['name' => 'Admin']);
        $writerRole = Role::create(['name' => 'Writer']);
        
        $admin = new User;
        $admin->name = 'Jorge';
        $admin->email = 'jorge@blog.com';
        $admin->password = bcrypt('123123');
        $admin->save();

        $admin->assignRole($adminRole);

        //=========================================

        $writer = new User;
        $writer->name = 'Gon';
        $writer->email = 'gon@blog.com';
        $writer->password = bcrypt('123123');
        $writer->save();

        $writer->assignRole($writerRole);
    }
}
