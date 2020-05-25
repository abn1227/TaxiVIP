<?php

use Illuminate\Database\Seeder;

class TypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_users')->insert([
            'description' => 'Administrador',
        ]);
        DB::table('type_users')->insert([
            'description' => 'Operario',
        ]);
        DB::table('type_users')->insert([
            'description' => 'Taxista',
        ]);
    }
}
