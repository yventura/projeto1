<?php

use Illuminate\Database\Seeder;

class EquipamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipamentos')->insert([
            [
                'tipo_equipamento' => 'Placa-Mãe',
                'modelo' => 'ASUS',
                'nome' => 'B450',
                'observacao' => null,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'tipo_equipamento' => 'Placa de Video',
                'modelo' => 'Nvidia',
                'nome' => 'GTX 1050 TI',
                'observacao' => null,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
