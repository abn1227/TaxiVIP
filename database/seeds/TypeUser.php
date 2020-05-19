<?php

use Illuminate\Database\Seeder;
use App\Type_User;

class TypeUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Type_User::truncate();
        /*type_users->description = 'administrador';
        type_users->save();*/
        /*type_users::create(['description' => 'administrador']);
        type_users::create(['description' => 'Operario']);
        type_users::create(['description' => 'Taxista']);*/

        //DB::table('type_users')->insert(['description' => 'Taxista']);

        $role=new Type_User();
        $role->description="administrador";
        $role->save();

        $role->description="Operario";
        $role->save();

        $role->description="Taxista";
        $role->save();
    }
}
