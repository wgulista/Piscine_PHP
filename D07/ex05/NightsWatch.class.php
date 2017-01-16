<?php 

	class NightsWatch
	{
		
		private $recruit = [];

		public function recruit($obj) {
			if ($obj instanceof IFighter) {
				 $this->recruit[] = $obj;
			}
			return (false);
		}

		public function fight() {
			foreach ($this->recruit as $fighter) {
				$fighter->fight();
			}
		}

	}

?>