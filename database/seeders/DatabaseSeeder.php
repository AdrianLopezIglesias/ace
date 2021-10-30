<?php

namespace Database\Seeders;

use App\Models\Salon; 
use App\Models\Pacientes; 
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use App\Models\Profesional; 
use App\Helpers\StringHelper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Hash;
use App\Models\PacienteDatosPersonales; 

class DatabaseSeeder extends Seeder {
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run() {
    $faker = Faker::create('es_AR');


    DB::table('users')->insert([
      'name' => 'Admin',
      'email' => 'admin@admin.com',
      'password' => Hash::make('sistema_ace'),
    ]);
		foreach (range(1, 5) as $index) {
			$salon = Salon::create([
				'nombre' => $faker->streetName.$faker->streetName.$faker->numberBetween($min = 1, $max = 9000)
			]);

		}
		// foreach (range(1, 7) as $index) {
		// 	DB::table('salones')->insert([
		// 		'nombre' => $faker->streetName.$faker->streetName.$faker->numberBetween($min = 1, $max = 9000)  ,
		// 	]);
		// }
    foreach (range(1, 5) as $index) {
      DB::table('tratamientos')->insert([
        'nombre' => $faker->catchPhrase,
        'descripcion' => $faker->text($maxNbChars = 600),
        'descripcion_corta' => $faker->text($maxNbChars = 200),
        'sesiones' => $faker->numberBetween($min = 1, $max = 4)* $faker->numberBetween($min = 1, $max = 4),
        'valor' => $faker->numberBetween($min = 1, $max = 30)*(pow(10,($faker->numberBetween($min = 1, $max = 3)))),
        'duracion' => $faker->numberBetween($min = 6, $max = 24)*5,
        'activo' => $faker->boolean,
        'imagen_principal' => $faker->numberBetween($min = 1, $max = 5) . ".jpg",       
      ]);
    }
    foreach (range(1, 15) as $index) {
			$paciente = Pacientes::create([
				'nombre' =>  StringHelper::remove_accents($faker->firstName . " ". $faker->lastName),
			]);
			$paciente->datospersonales()->create([
        'dni' => $faker->ean8,
        'fecha_nacimiento'=> $faker->date($format = 'Y-m-d', $max = 'now'),
        'domicilio' => $faker->streetName.$faker->streetName.$faker->numberBetween($min = 1, $max = 9000).",". $faker->city,
        'telefono_principal' => $faker->e164PhoneNumber,
        'telefono_emergencias' => $faker->e164PhoneNumber,
        'genero' => $faker->title,
			]);


    }
    foreach (range(1, 4) as $index) {
			Profesional::create([
				'nombre' =>  $faker->firstName . " ". $faker->lastName,
			]);
    }
  }
}
