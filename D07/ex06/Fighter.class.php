<?php 

	abstract class Fighter
	{
		public $type = null;

		abstract public function fight($fighter);

		public function __construct($name) {
			$this->type = $name;
		}

	}

?>