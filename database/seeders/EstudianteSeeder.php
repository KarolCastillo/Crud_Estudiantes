<?php

namespace Database\Seeders;
use App\Models\estudiantes;

use Illuminate\Database\Seeder;

class EstudianteSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


       /* DB::table('estudiantes')->insert([
            'id'=> '01',
            'nombre' => 'JUAN CAAL',
            'email' => 'JUANCAAL@example.es',
            'edad' => '18',
            'grado' => 'tercero',
            'direccion' => 'col. el INDE',
        ]);
        DB::table('estudiantes')->insert([
            'id'=> '02',
            'nombre' => 'Maria Choc',
            'email' => 'Marich@example.es',
            'edad' => '19',
            'grado' => 'tercero basico',
            'direccion' => 'barrio las nubes',
        ]); */
        estudiantes::factory(1000)->create();
    }
}
