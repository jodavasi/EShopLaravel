<?php

use Illuminate\Database\Seeder;
use App\Usuario;
class usuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $uId = 2;
        for ($i=0; $i < 50; $i++) { 
            $admin = new Usuario();
            $admin->usuario_id = $uId;
            $admin->total = 0;
            $admin->cantidad = 0;
            $admin->save();
            $uId++;
        }
    }
}
