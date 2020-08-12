<?php

use Illuminate\Database\Seeder;

class TiposLaudosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_laudos')->insert([
            [
                'nome' => 'Perda Total',
                'sigla' => 'PT',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Perda Parcial',
                'sigla' => 'PP',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
