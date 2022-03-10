<?php

namespace Database\Seeders;
//use Illuminate\Support\Facades\DB;
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


        /*DB::table('estudiantes')->insert([
            'id'=> '01',
            'nombre' => 'JUAN CAAL',
            'email' => 'JUANCAAL@example.es',
            'direccion' => 'col. el INDE',
            'edad' => '18',
            'grado' => '2',

        ]);
        DB::table('estudiantes')->insert([
            'id'=> '02',
            'nombre' => 'Maria Choc',
            'email' => 'Marich@example.es',
            'direccion' => 'barrio las nubes',
            'edad' => '19',
            'grado' => '1',

        ]);*/

        estudiantes::factory(100)->create();
    }
}
