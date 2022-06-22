<?php
	namespace App\Http\Strategies;

	interface strategyInterface{
		public function constructor(date $data, array $feriados);

   		public function generator():string;
	}
?>