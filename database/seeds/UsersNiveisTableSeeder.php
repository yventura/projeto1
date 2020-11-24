<?php

use Illuminate\Database\Seeder;

class UsersNiveisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_niveis')->insert([
            'id' => '1',
            'nome' => 'Administrador',
            'permissoes' => '[{"criar_usuario": true,"editar_usuario": true,"gerenciar_niveis": true,"gerar_relatorio": true,"visualizar_relatorio": true,"imprimir_relatorio": true }]',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
