<?php
	namespace App\Http\Strategies;

	interface strategyInterface{
		public function constructor($data, $feriados);

   		public function generator();
	}
?>
