<?php
class Validate {
	private $_passed = false,
			$_errors = array(),
			$_db     = null,
			$_mc     = null;


	public function __construct() {
		$this->_db = DB::getInstance();
		$this->_mc = new Minecraft;
	}

	public function check($source, $items = array()) {
		foreach($items as $item => $rules){
			foreach($rules as $rule => $rule_value){

				$value = trim($source[$item]);

				$item_name  = $items[$item]['display_name'];

				if($rule == 'required' && empty($value)){
					$this->addError("{$item_name} is required!");
				}else if(!empty($value)){
						switch($rule) {
							case 'numstart':
    							if(is_numeric(substr($value, 0, 1))){
        							$this->addError("{$item_name} cannot start with a number.");
    							}
							break;
							case 'min':
								if(strlen($value) < $rule_value){
									$this->addError("The min length for {$item_name} is {$rule_value}");
								}
							break;
							case 'max':
								if(strlen($value) > $rule_value){
									$this->addError("The max length of {$item_name} is {$rule_value}");
								}
							break;
							case 'matches':
								if($value != $source[$rule_value]){
									$this->addError("{$item_name} must match {$rule_value}");
								}
							break;
							case 'minecraft':
								if($this->_mc->isPremium($value) == false){
									$this->addError("You must enter a valid Minecraft account (Yours)");
								}
							break;
							case 'unique':
								$check = $this->_db->get($rule_value, array($item, '=', $value));
								if($check->count()) {
									$this->addError("{$item_name} already exists.");
								}
							break;
					}
				}
			}
		}

		if(empty($this->_errors)) {
			$this->_passed = true;
		}
		return $this;
	}

	public function addError($error) {
		$this->_errors[] = $error;
	}

	public function errors(){
		return $this->_errors;
	}

	public function passed(){
		return $this->_passed;
	}
}
?>