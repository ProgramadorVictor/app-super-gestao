<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContato;

class PrincipalController extends Controller
{
    public function principal() {

        $motivo_contatos = MotivoContato::all(); //$motivo_contatos está recebendo todos os dados de MotivoContato

        //dd($motivo_contatos);

        /*
        $motivo_contatos = [
            '1' => 'Duvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
        ];
        */

        return view('site.principal', ['motivo_contatos' => $motivo_contatos]);
    }
}
