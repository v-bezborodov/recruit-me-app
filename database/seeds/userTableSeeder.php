<?php

use Illuminate\Database\Seeder;
use App\User;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'first_name' => 'slawek',
            'last_name'=>'B',
            'position_name'=>'developer',
            'company'=>'self-employed',
            'website'=>'slawek.dev',
            'linkedin'=>'wwwlinkedin.com/slawek',
            'facebook'=>'www.facebook.com/slawek',
            'ranking'=>10,
            'fee'=>100,
            'email'=>'slawek@slawek.dev',
            'phone'=>'097852097',
            'country_id'=>1,
            'avatar'=>'no_avatar.jpg',
            'password'=>'$2y$10$38q5agyEgDBrV2XIskbbJe1Vl9K0ggwsiafKTdw07enms4VcjnHki'
        ]);



        factory(User::class, 20)->create();
    }
}



