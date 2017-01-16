<?php 

	abstract class Lannister
	{
		public function check_sleep($obj) {
			return (true);
		}

		public function sleepWith($obj) {
			if ($this->check_sleep($obj) === true) {
				print "Let's do this\n";	
			} else {
				print "Not even if I'm drunk !\n";
			}
		}
	}

?>