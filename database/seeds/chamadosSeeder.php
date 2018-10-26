<?php

use Illuminate\Database\Seeder;

class chamadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chamados')->insert([
            'id_pedido'   => 1,
            'titulo'      => 'Problema no computador',
            'observacoes' => 'Não liga ao apertar o botão',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('chamados')->insert([
            'id_pedido'   => 2,
            'titulo'      => 'Problema no computador',
            'observacoes' => 'Não carrega nada',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('chamados')->insert([
            'id_pedido'   => 3,
            'titulo'      => 'Problema no notebook',
            'observacoes' => 'Só funciona na tomada',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('chamados')->insert([
            'id_pedido'   => 4,
            'titulo'      => 'Problema no celular',
            'observacoes' => 'Desliga sozinho',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('chamados')->insert([
            'id_pedido'   => 5,
            'titulo'      => 'Tablet travou',
            'observacoes' => 'Não abre nada, tudo travado',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('chamados')->insert([
            'id_pedido'   => 6,
            'titulo'      => 'Monitor quebrou',
            'observacoes' => 'Imagem escura e super aquecimento',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('chamados')->insert([
            'id_pedido'   => 7,
            'titulo'      => 'Não imprime',
            'observacoes' => 'Impressora imprime paginas em branco',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('chamados')->insert([
            'id_pedido'   => 8,
            'titulo'      => 'Tecla sumiu',
            'observacoes' => 'Perdeu a tecla enter, usuário disse que não foi ele',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('chamados')->insert([
            'id_pedido'   => 9,
            'titulo'      => 'Som muito baixo',
            'observacoes' => 'Não é possível escutar nada',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('chamados')->insert([
            'id_pedido'   => 10,
            'titulo'      => 'Som muito alto',
            'observacoes' => 'Incomoda todo mundo',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
    }
}
