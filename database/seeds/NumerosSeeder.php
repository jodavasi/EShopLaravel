<?php

use Illuminate\Database\Seeder;
use App\Numeros;

class NumerosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Numeros();
        $admin->cantidad = 0;
        $admin->total = 0;
        $admin->save();
    }
}
