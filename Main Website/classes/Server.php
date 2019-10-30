<?php
class Server {
	private $_db,
			$_data;

	public function __construct($server = null) {
		$this->_db = DB::getInstance();
		$this->find($server);
	}

	public function create($fields = array()) {
		if(!$this->_db->insert('servers', $fields)){
			throw new Exception('There was a problem creating the server.');
		}
	}

	public function find($name = null) {
			$field = (is_numeric($name)) ? 'id' : 'name';
			$data  = $this->_db->get('servers', array($field, '=', $name));

			if($data->count()) {
				$this->_data = $data->first();
				return true;
			}
		return false;
	}
		
	public function update($id, $fields = array()) 
	{
			$set = '';
			$x   = 1;
	
			foreach($fields as $name => $value) {
				$set .= "{$name} = ?";
				if($x < count($fields)) {
					$set .= ', ';
				}
				$x++;
			}
	
			$sql = "UPDATE servers SET {$set} WHERE id = {$id}";
	
			if($this->_db->query($sql, $fields)->error()){
				return false;
			}
		return true;
	}
	
	public function data() {
		return $this->_data;
	}
	public function exists(){
		return (!empty($this->_data)) ? true : false;
	}
	public function delete($id = null){
		$id = ($id == null) ? $this->data()->id : $id; 
		$this->_db->action('DELETE','servers',array('id','=',$id));
	}
}