<?php 

	class UnholyFactory {

		public $absorb = array();

		public function absorb($obj)  {
			if (!($obj instanceof Fighter)) {
				print "(Factory can't absorb this, it's not a fighter)\n";
				return;
			}
			if ($ob instanceof Fighter) {
				$this->absorb[$obj->type] = $obj->type;
			}
			if ($this->absorb[$obj->type]["count"] < 1) {
				$this->absorb[$obj->type]["count"] = 1;
				$this->absorb[$obj->type]["class"] = get_class($obj);
				print "(Factory absorbed a fighter of type ". $obj->type .")\n";
			} else {
				print "(Factory already absorbed a fighter of type ". $obj->type .")\n";
			}
		}

		public function fabricate($req) {
			if (!$this->absorb[$req] || $this->absorb[$req] < 1) {
					print "(Factory hasn't absorbed any fighter of type " . $req . ")\n";
					return (null);
			}
			print "(Factory fabricates a fighter of type " . $req . ")\n";
			return new $this->absorb[$req]["class"];
		}

	}

?>