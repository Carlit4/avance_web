<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class VehiculosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vehiculos')->insert([
            ['patente'=>'123ABC', 'marca'=>'Toyota' , 'anio'=>'2003', 'tipo_id'=>3, 'estado'=>'Disponible'],
            ['patente'=>'456DEF', 'marca'=>'Suzuki' , 'anio'=>'2023', 'tipo_id'=>1, 'estado'=>'Arrendado'],
            ['patente'=>'789GHI', 'marca'=>'Nissan' , 'anio'=>'2012', 'tipo_id'=>2, 'estado'=>'De baja'],
            ['patente'=>'321CBA', 'marca'=>'Chevrolet' , 'anio'=>'2004', 'tipo_id'=>1, 'estado'=>'En mantenimiento'],
            
        ]);
    }
}
