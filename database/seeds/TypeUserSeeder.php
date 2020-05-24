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
            'id'=>1,
            'description' => 'Administrador',
        ]);
        DB::table('type_users')->insert([
            'id'=>2,
            'description' => 'Operario',
        ]);
        DB::table('type_users')->insert([
            'id'=>3,
            'description' => 'Taxista',
        ]);
    }
}
