<?php

use Illuminate\Database\Seeder;

class recruitmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Recruitment::class, 20)->create();
    }
}

