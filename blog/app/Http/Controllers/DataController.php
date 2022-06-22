<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Http\Strategie\StaregyMessage;
use Illuminate\Support\Facades\Http;

class DataController extends BaseController
{
    public function newMessage(){
    	try{
    		$data = date('D');
    		$ano = date('Y');
			$feriados = Http::get('https://brasilapi.com.br/api/feriados/v1/'+$ano);
			$strategy = new StrategyMessage();
			$strategy->constructor($data,$feriados);
			$mensagem = $strategy->generator();

    	}
    }
}
