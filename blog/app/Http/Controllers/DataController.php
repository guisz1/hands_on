<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Http\Strategies\StrategyMessage;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class DataController extends BaseController
{
    public function newMessage(Request $req){
        try{
            if(!isset($req->all()['data']))
    		    $data = new DateTime('now');
            else
                $data = new DateTime($req->all()['data']);
            $curl = curl_init();
            curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://brasilapi.com.br/api/feriados/v1/'.$data->format('Y')
            ]);
            $feriados = curl_exec($curl);
            curl_close($curl);
			$strategy = new StrategyMessage();
			$strategy->constructor($data,$feriados);
			$mensagem = $strategy->generator();
            return $mensagem;
        }catch(Exception $e){
            return response()->json([
                'msg' => $e->getMessage()
            ], 400);
        }
    }
}
