<?php

namespace Database\Seeders;
use App\Models\estudiantes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* desactivar constraint de llaves foraneas*/
        Schema::disableForeignKeyConstraints();

            estudiantes::truncate(); //truncamos las tablas a travez de los modelos en el orden que queramos


        Schema::enableForeignKeyConstraints(); // volvemos activar los constraint de las fk


        //tablas
      $this->call(EstudianteSeeder::class);


    }
}
