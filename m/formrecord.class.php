<?php 

class FormRecord {
	protected $_fields = array();
	public function populasi($data) {
		foreach ($this->_fields as $field => $value) {
			if (isset($data[$field])) {
                $this->_fields[$field] = $data[$field];
            }
		}
	}
	public function __get($field){
        return $this->getValue($field);
    }
    public function getValue($field){
        if(isset($this->_fields[$field])){
            return $this->_fields[$field];
        } else {
            throw new Exception('Unknown field `'.$field.'`');
        }
    }
    public function __set($field, $value){
        return $this->setValue($field, $value);
    }
    public function setValue($field, $value){
        
        if(isset($this->_fields[$field])){
            $this->_fields[$field] = $value;
            return $this->_fields[$field];
        }else{
            throw new Exception('Unknown field `'.$field.'`');
        }
    }
}