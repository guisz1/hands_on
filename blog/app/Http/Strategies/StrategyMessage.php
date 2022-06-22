<?php
	namespace App\Http\Strategies;

	class StrategyMessage implements strategyInterface{
		protected $data,$feriados;

		public function constructor(date $data, array $feriados){
			$this->data = $data;
			$this->feriados = $feriados;
		}

		public function generator(){
			
		}
	}

?>