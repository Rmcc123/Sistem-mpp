<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Persona;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
        // \App\Models\User::factory(10)->create();
        Persona::factory(200)->create();   
        //$this->call(PersonaSeader::class);
        $this->call(UserSeader::class);
        User::factory(50)->create();
            

    
    }
}
