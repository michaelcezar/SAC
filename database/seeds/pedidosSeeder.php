<?php

use Illuminate\Database\Seeder;

class pedidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pedidos')->insert([
            'id_cliente'  => 1,
            'item'        => 'Computador',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('pedidos')->insert([
            'id_cliente'  => 2,
            'item'        => 'Computador',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('pedidos')->insert([
            'id_cliente'  => 2,
            'item'        => 'Notebook',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('pedidos')->insert([
            'id_cliente'  => 3,
            'item'        => 'Celular',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('pedidos')->insert([
            'id_cliente'  => 7,
            'item'        => 'Tablet',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('pedidos')->insert([
            'id_cliente'  => 9,
            'item'        => 'Monitor',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('pedidos')->insert([
            'id_cliente'  => 10,
            'item'        => 'Impressora',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('pedidos')->insert([
            'id_cliente'  => 6,
            'item'        => 'Teclado',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('pedidos')->insert([
            'id_cliente'  => 8,
            'item'        => 'Telefone',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('pedidos')->insert([
            'id_cliente'  => 3,
            'item'        => 'Radio',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
    }
}
