<?php

use Illuminate\Database\Seeder;

class clientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'nome'        => 'José',
            'email'       => 'teste1@emailteste.com',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('clientes')->insert([
            'nome'        => 'Maria',
            'email'       => 'teste2@emailteste.com',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('clientes')->insert([
            'nome'        => 'João',
            'email'       => 'teste3@emailteste.com',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('clientes')->insert([
            'nome'        => 'Gabriel',
            'email'       => 'teste4@emailteste.com',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('clientes')->insert([
            'nome'        => 'Matheus',
            'email'       => 'teste5@emailteste.com',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('clientes')->insert([
            'nome'        => 'Pedro',
            'email'       => 'teste6@emailteste.com',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('clientes')->insert([
            'nome'        => 'Paulo',
            'email'       => 'teste7@emailteste.com',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('clientes')->insert([
            'nome'        => 'Marcos',
            'email'       => 'teste8@emailteste.com',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('clientes')->insert([
            'nome'        => 'Tiago',
            'email'       => 'teste9@emailteste.com',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
        DB::table('clientes')->insert([
            'nome'        => 'Tadeu',
            'email'       => 'teste10@emailteste.com',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now(),
        ]);
    }
}
