<?php 

	abstract class Fighter
	{
		public $type;

		abstract public function fight($fighter);

		public function __construct($name) {
			$this->type = $name;
		}

	}

?>