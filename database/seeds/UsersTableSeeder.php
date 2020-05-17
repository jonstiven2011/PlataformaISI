<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$usr 			= new User;
    	$usr->fullname  = 'Johnnathan Steven Navarro';
    	$usr->document  = '1234567890';
    	$usr->email     = 'jonstivennava@gmail.com';
    	$usr->phone     = '3156205482';
    	$usr->address   = 'Carrera 25 # 12-1';
    	$usr->password  = bcrypt('Stiven923731');
    	$usr->role      = 'admin';
    	$usr->save();
       factory(App\User::class, 10)->create();
    }
}