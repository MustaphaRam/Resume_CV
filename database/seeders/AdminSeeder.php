<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
		$user = ['name' => 'MUSTAPHA','email' => 'mtpha53@gmail.com','password' => bcrypt('12345678'), 'is_admin' => 'true'];
		$db = DB::table('users')->insert($user);
    }
}
