<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Isso foi criado por mim, não estava no curso.
        //Queria criar um usuario padrão para as seeds.
        $usuario = new User; //Instancia e usuario
        $usuario->name = "Padrão";
        $usuario->email = "padrao@gmail.com";
        $usuario->password = "123";
        $usuario->save();
        User::create([
            'name' => 'Victor Oliveira Silva',
            'email' => 'victoroliveirasilva@gmail.com',
            'password' => '123',
        ]);
        DB::table('users')->insert([
            'name' => 'Pedro Alvarez Cabral',
            'email' => 'pedroalvarezcabral@gmail.com',
            'password' => 'brazil',
        ]);
    }
}
