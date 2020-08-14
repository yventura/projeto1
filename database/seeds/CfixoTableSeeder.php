<?php

use Illuminate\Database\Seeder;

class CfixoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cfixo')->insert([
            [
                'pro' => '7',
                'vis' => '8',
                'via' => '4',
                'cie' => '5',
                'int' => '3',
                'pla' => '4',
                'ate' => '0',
                'obs' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
