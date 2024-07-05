<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;


class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            ['rut'=>'12345678-9','nombre'=>'Mini Dago', 'fecha_nac'=>Carbon::parse('2000/07/14')],
            ['rut'=>'98765432-1','nombre'=>'Mini Anyluz', 'fecha_nac'=>Carbon::parse('1982/03/21')],
            ['rut'=>'20389025-k','nombre'=>'Carlitos alten', 'fecha_nac'=>Carbon::parse('2004/03/21')],
        ]);
    }
}
