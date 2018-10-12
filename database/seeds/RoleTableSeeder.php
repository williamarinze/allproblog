<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        DB::beginTransaction();

    	Role::firstOrCreate([
    		'name' => 'regular'
    	]);
    	Role::firstOrCreate([
    		'name' => 'admin'
    	]);

    	DB::commit();
    }
}
