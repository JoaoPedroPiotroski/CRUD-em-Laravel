<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cartas')->insert([
            'id' => 1,
            'name' => 'Starphytis',
            'class' => 'Cósmica',
            'desc' => 'Nephytis em seu estado de maior poder',
            'owner' => 'Joao',
            'arquivo' => 'imgup/321cf415a5f7cd14f8e6734fc781c0d0b07dfca87452a982afb1ded7071e5392.png'
        ]);
        DB::table('cartas')->insert([
            'id' => 2,
            'name' => 'Nephytis',
            'class' => 'Normal',
            'owner' => 'Kamila',
            'desc' => 'A fênix sagrada em seu estado cotidiano, talvez ela vá visitar o garunix amanhã',
            'arquivo' => 'imgup/321cf415a5f7cd14f8e6734fc781c0d0cc4418610d5fea99eee50917933be252.png'
        ]);
        DB::table('cartas')->insert([
            'id' => 3,
            'name' => 'Nefibus',
            'class' => 'Succubus',
            'owner' => 'Kamila',
            'desc' => 'Eu queria pegar uma versão mais normal dela mas não achei',
            'arquivo' => 'imgup/321cf415a5f7cd14f8e6734fc781c0d0fed975cc7dadf7c9dc8d9daf8ffbbef6.png'
        ]);
    }
}
