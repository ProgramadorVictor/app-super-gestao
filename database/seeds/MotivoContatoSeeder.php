<?php

use Illuminate\Database\Seeder;
use App\MotivoContato;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $motivo_contatos = ['Dúvida', 'Elogio', 'Reclamação'];
        foreach($motivo_contatos as $motivo_contato){
            MotivoContato::create(['motivo_contato' => $motivo_contato]);
        }
    }
}
