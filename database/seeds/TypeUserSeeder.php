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
        Type_Users::truncate();
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
