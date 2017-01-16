<?php 

	class Tyrion extends Lannister
	{
		
		public function check_sleep($obj) {
			if (get_class($obj) == "Sansa") {
				return (true);
			}
			return (false);
		}

	}

?>