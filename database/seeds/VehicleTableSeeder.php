<?php

use Illuminate\Database\Seeder;
use App\Person;
use App\User;
use App\Taxi_Driver;
use App\Type_User;
use App\Client;

class VehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Registros en la tabla persona
        Person::truncate();
        $person= new Person();
        $person->identification='0801199707054';
        $person->name='Emerson';
        $person->mobile='98674567';
        $person->save();

        $person->identification='0801199707054';
        $person->name='Daniel';
        $person->mobile='98674867';
        $person->save();

        $person->identification='0801199707054';
        $person->name='Laura';
        $person->mobile='98474567';
        $person->save();
        $person->identification='0801199707054';
        $person->name='Karen';
        $person->mobile='98874567';
        $person->save();

        //Registros de la tabla Type_user 

        Type_User::truncate();

        $role=new Type_User();
        $role->description='administrador';
        $role->save();

        $role->description='Operario';
        $role->save();

        $role->description='Taxista';
        $role->save();

        //Registros para la tabla users

        User::truncate();

        $user= new User();
        $user->email='emerson@yahoo.com';
        $user->password->bcrypt('asd.45678');
        $user->type_users_id=1;
        $user->persons_id=1;
        $user->save();

        $user->email='daniel@yahoo.com';
        $user->password->bcrypt('asd.45678');
        $user->type_users_id=2;
        $user->persons_id=2;
        $user->save();
        
        $user->email='laura@yahoo.com';
        $user->password->bcrypt('asd.45678');
        $user->type_users_id=3;
        $user->persons_id=3;
        $user->save();

        Taxi_Driver::truncate();
        $taxiDriver=new Taxi_Driver();

        $taxiDriver->mileage=10;
        $taxiDriver->percentage=15;
        $taxiDriver->drivingLicense='1234567';
        $taxiDriver->cutDate=1;
        $taxiDriver->persons_id=3;
        $taxiDriver->save();

        Client::truncate();

        $client=new Client();
        $client->persons_id=4;
        $client->save();
    }
}
