<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use User\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name' => 'Alice Jane',
            'email' => 'alice.jane@domain.com',
            'password' => bcrypt('secret'),
        ));
    }

}
