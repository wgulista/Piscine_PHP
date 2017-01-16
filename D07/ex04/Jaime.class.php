<?php 

	class Jaime extends Lannister
	{

		public function check_sleep($obj) {
			if (get_class($obj) === "Cersei") {
				return (true);
			} else if (get_class($obj) === "Sansa") {
				return (true);
			} else if (get_class($obj) === "Tyrion") {
				return (false);
			} else {
				return (false);
			}
		}

		public function sleepWith($obj) {
			if ($this->check_sleep($obj) === true && get_class($obj) === "Cersei") {
				print "With pleasure, but only in a tower in Winterfell, then.\n";	
			} else if ($this->check_sleep($obj) === true && get_class($obj) !== "Cersei") {
				print "Let's do this\n";
			}else {
				print "Not even if I'm drunk !\n";
			}
		}
	}

?>