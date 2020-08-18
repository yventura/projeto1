<?php

use Illuminate\Database\Seeder;

class ComercioFixoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Não Funciona
     * @return void
     */
    public function run()
    {
        DB::table('comercio_fixo')->insert([
            [
                'data'               => now(),
                'vistoria_processos' => Str::random(10),
                'vistoria_vre'       => Str::random(10),
                'viabilidade_vre'    => Str::random(10),
                'ciencia'            => Str::random(10),
                'intimacao'          => Str::random(10),
                'plantao_interno'    => Str::random(10),
                'atendimento_guiche' => Str::random(10),
                'created_at'         => now(),
                'updated_at'         => now()
            ],
        ]);
    }
}
