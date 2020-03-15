<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fname_arr = ['Liam', 'Noah', 'William', 'Oliver', 'James'];
        $lname_arr = ['Moria', 'Kolins', 'Reevs', 'Ulianoer', 'Jiblinski'];

        for ($i=0; $i< count($fname_arr); $i++) {
            DB::table('users')->insert([
                'fname'     => $fname_arr[$i],
                'lname'     => $lname_arr[$i],
                'username'  => $fname_arr[$i] . $lname_arr[$i],
                'password'  => password_hash('123123', PASSWORD_DEFAULT),
                'email'     => strtolower($lname_arr[$i]) . random_int(10, 99) . '@gmail.com'
            ]);
        }
    }
}
