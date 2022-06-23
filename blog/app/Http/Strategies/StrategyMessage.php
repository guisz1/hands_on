<?php
	namespace App\Http\Strategies;

    use Symfony\Component\HttpFoundation\Response;

	class StrategyMessage implements strategyInterface{
		protected $data,$feriados;

		public function constructor($data,$feriados){
			$this->data = $data;
			$this->feriados = $feriados;
		}

		public function generator(){
            $semana = array(
                'Sun' => 'Domingo',
                'Mon' => 'Segunda-Feira',
                'Tue' => 'Terca-Feira',
                'Wed' => 'Quarta-Feira',
                'Thu' => 'Quinta-Feira',
                'Fri' => 'Sexta-Feira',
                'Sat' => 'Sábado'
            );
            $feriados = json_decode($this->feriados);
            $message = 'Hoje é';
            $i=0;
            foreach ($feriados as $feriado){
                if($feriado->date == $this->data->format('Y-m-d')){
                    $i++;
                    $message = $message." ".$feriado->name;
                    break;
                }
            }
            if ($i==0){
                $message = $message." ".$semana[$this->data->format('D')];
            }
            return response()->json([
                'msg' => $message
            ], 200);
		}
	}

?>
