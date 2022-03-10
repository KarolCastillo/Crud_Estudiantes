<?php

namespace Database\Seeders;
//use App\Models\grado;
use Illuminate\Database\Seeder;

class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grado')->insert([
            'id'=> '01',
            'descripcion' => 'Primero',

        ]);
        DB::table('grado')->insert([
            'id'=> '02',
            'descripcion' => 'Segundo',

        ]);
        DB::table('grado')->insert([
            'id'=> '03',
            'descripcion' => 'Tercero',

        ]);
    }
}
