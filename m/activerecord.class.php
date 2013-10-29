<?php

class ActiveRecord {
    protected static $_defaultDBConnection;
    protected $_fields = array();
    protected $_key      = null;
    protected $_keyField = null;
    protected $_dbConnection = null;
    protected $_tableName = null;
    // private static $_models=array();

    public function __construct($tableName, $key=null, PDO $dbConnection=null){
        $this->_tableName = $tableName;
        $this->_key = $key;
        
        $this->_dbConnection = (!$dbConnection && self::$_defaultDBConnection)?
                                    self::$_defaultDBConnection:
                                    $dbConnection;
                                    
        $this->_dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function getKey(){
        return $this->_key;
    }
        
    public function __get($field){
        return $this->getValue($field);
    }
    
    public function getValue($field){
        if(!$this->_fields){
            $this->deskripsi();
        }
        
        if(isset($this->_fields[$field])){
            if($this->_fields[$field]['value'] === null && $this->_key != null){
                $this->pilih();
            }
            
            return $this->_fields[$field]['value'];
        } else {
            throw new Exception('Unknown field `'.$field.'`');
        }
    }
    
    public function __set($field, $value){
        return $this->setValue($field, $value);
    }
    
    public function setValue($field, $value){
        if(!$this->_fields){
            $this->deskripsi();
        }
        
        if(isset($this->_fields[$field])){
            $this->_fields[$field]['value'] = $value;
            $this->_fields[$field]['changed'] = true;
            
            return $this->_fields[$field]['value'];
        }else{
            throw new Exception('Unknown field `'.$field.'`');
        }
    }
    
    public function setDBConnection(PDO $db){
        return $this->_dbConnection = $db;
    }
    
    public function getDBConnection(){
        return $this->_dbConnection;
    }
    
    public static function setDefaultDBConnection(PDO $db){
        return self::$_defaultDBConnection = $db;
    }
    
    public static function getDefaultDBConnection(){
        return self::$_defaultDBConnection;
    }
    
    public function simpan(){
        if(!$this->_fields){
            $this->deskripsi();
        }
        
        if(!$this->_key){
            $this->_key = $this->tambah();
        }else{
            $this->ubah();
        }

        $this->changeFields();
    }
    
    protected function tambah(){
        if(!$this->_fields){
            $this->deskripsi();
        }
        
        $fields = array();
        $values = array();    
        
        foreach($this->_fields as $field=>$data){
            if($field == $this->_keyField && !$this->_key){ //we won't insert key field if we aren't really wont it, right?
                continue;    
            }
            
            $rawValue = ":{$field}";
            if($rawExpression = $this->getDatabaseExpresion($data['value'])){
                $rawValue = $rawExpression;                
            } else {
                $values[":{$field}"] = $this->formatValue($data['value'], $data['fieldType']);
            }
            
            $fields['left'] [$field] = "`{$field}`";
            $fields['right'][$field] = $rawValue;
        }
        
        $sql = "INSERT INTO `{$this->_tableName}` (".implode(', ', $fields['left']).') VALUES ('.implode(', ', $fields['right']).');';
    
        // echo $sql;
        $db = $this->getCheckedDBConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute($values);
        
        return $this->_key = $db->lastInsertId($this->_keyField);
    }
    
    protected function changeFields(){
        foreach($this->_fields as $field=>&$data){
            $data['changed'] = false;
        }
    }

    protected function ubah(){
        if(!$this->_fields){
            $this->deskripsi();
        }
        
        if(!$this->_key || !$this->_keyField){
            throw new Exception("Key field ('{$this->_key}', `{$this->_keyField}`) are invalid");
        }
        
        $set = array();
        $values = array();    
        
        foreach($this->_fields as $field=>$data){
            if($field == $this->_keyField || !$data['changed']){ //we won't key field or unchanged field appears in set list, right?
                continue;    
            }
            
            $rawValue = ":{$field}";
            if($rawExpression = $this->getDatabaseExpresion($data['value'])){
                $rawValue = $rawExpression;                
            } else {
                $values[":{$field}"] = $this->formatValue($data['value'], $data['fieldType']);
            }
            
            $set[$field] = "`{$field}` = {$rawValue}";
            
        }
        
        $values[':PrimaryKey'] = $this->_key;
        
        if(!$set){ // nothing to update
            //throw new Exception('Nothing to update');
            return;
        }
        
        $sql = "UPDATE `{$this->_tableName}` SET ".implode(', ', $set)." WHERE `{$this->_keyField}` = :PrimaryKey";
    
        
        $stmt = $this->getCheckedDBConnection()->prepare($sql);
        $stmt->execute($values);
    }
    
    protected function pilih(){
        if(!$this->_fields){
            $this->deskripsi();
        }
        
        if(!$this->_key || !$this->_keyField){
            throw new Exception("Key field ('{$this->_key}', `{$this->_keyField}`) are invalid");
        }
        
        $db = $this->getCheckedDBConnection();    
        $sql = "SELECT * FROM `{$this->_tableName}` WHERE `{$this->_keyField}` = :key LIMIT 1";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute(array(':key'=>$this->_key));

        foreach($stmt->fetch() as $field=>$value){
            //field must present
            assert(isset($this->_fields[$field]));
            $this->_fields[$field]['changed'] = false;
            $this->_fields[$field]['value'] = $value;
        }
        
    }

    public function cari($condition, $params){
        if(!$this->_fields){
            $this->deskripsi();
        }
        
        $db = $this->getCheckedDBConnection();    
        $sql = "SELECT * FROM `{$this->_tableName}` WHERE {$condition} LIMIT 1";
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute($params);
        $result = $stmt->fetch();

        if ($result == null) return null;
        foreach($result as $field=>$value){
            //field must present
            assert(isset($this->_fields[$field]));
            $this->_fields[$field]['changed'] = false;
            $this->_fields[$field]['value'] = $value;
        }

        $this->_key = $this->_fields['id']['value'];
        $this->_keyField = 'id';


        return $this;
    }

    public function jumlahSemua($condition = null, $params = array(), $order = null, $join = null) {
        if(!$this->_fields){
            $this->deskripsi();
        }
        
        $db = $this->getCheckedDBConnection();    
        $sql = "SELECT COUNT(`{$this->_tableName}`.id) FROM `{$this->_tableName}`";
        if ($join !== null) {
            $sql .= " " . $join;
        }
        if ($condition !== null) {
            $sql .= " WHERE {$condition}";
        }
        // echo $sql;
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if (count($params))
            $stmt->execute($params);
        else 
            $stmt->execute();
        $result = $stmt->fetch();
        // echo "<pre>";
        // echo reset($result);
        // echo "</pre>";
        // die();
        return reset($result);   
    }

    public function cariSemua($condition = null, $params = array(), $offset = null, $count = null, $order = null, $select = null, $join = null) {
        if(!$this->_fields){
            $this->deskripsi();
        }
        
        $db = $this->getCheckedDBConnection();    
        $sql = "SELECT * FROM `{$this->_tableName}`";
        if ($select !== null) {
            $sql = "SELECT " . $select . " FROM `{$this->_tableName}`";
        }
        if ($join !== null) {
            $sql .= " " . $join;
        }
        if ($condition !== null) {
            $sql .= " WHERE {$condition}";
        }
        if ($order !== null) {
            $sql .= " ORDER BY {$order}";
        }
        if ($offset !== null && $count !== null) {
            $sql .= " LIMIT {$offset}, {$count}";
        }
        // echo $sql;
        $stmt = $db->prepare($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        if (count($params))
            $stmt->execute($params);
        else 
            $stmt->execute();
        $result = $stmt->fetchAll();


        if ($result == null) return null;

        $items = array();
        foreach ($result as $item) {
            $model = new $this();
            foreach($item as $field=>$value){
                $model->_fields[$field]['changed'] = false;
                $model->_fields[$field]['value'] = $value;
            }
            $model->_key = $model->_fields['id']['value'];
            $model->_keyField = 'id';
            $items[] = $model;
        }
        return $items;   
    }

    protected function deskripsi(){
        if(!$this->_tableName){
            throw new Exception("Invalid table name");
        }
        
        $db = $this->getCheckedDBConnection();
        
        $sql = "DESCRIBE `{$this->_tableName}`;";
        $result = $db->query($sql, PDO::FETCH_ASSOC);
        
        if(!$result){
            $error = $db->errorInfo();
            throw new Exception("[$error[0]}: {$error[2]}", $error[1]);
        }
        
        $mysql_index = array('','PRI', 'MUL', 'UNI');
        
        $return = array();
        
        foreach($result->fetchAll() as $row){
            $field = array();
            $field['index'] = array_search($row['Key'], $mysql_index);
            
            
            //there can't be two primary indexes in one table
            assert(!($field['index'] === 1 && $this->_keyField));
            
            if($field['index'] === 1){
                $this->_keyField = $row['Field'];
            }
            
            
            $field['changed'] = false;
            $field['value'] = null;
            $type = explode('(', $row['Type'], 2);

            $field['fieldType'] = strtolower($type[0]);
            if(isset($type[1])){
                $field['fieldLength'] = trim($type[1],')');
            }
            
            $return[$row['Field']] = $field; 
            
        }
                        
        return $this->_fields = $return;
    }
    
    protected function getCheckedDBConnection(){
        $db = $this->getDBConnection();
        if(!$db){
            $defaultDB = $this->getDefaultDBConnection();
            if(!$defaultDB){
                throw new Exception('No database connection');
            }
            
            $db = $this->setDBConnection($defaultDB);
        }
        
        return $db;
    }
    
    protected function getDatabaseExpresion($value){
        if(class_exists("Zend_Db_Expr") && $value instanceof Zend_Db_Expr){ // Zend Database expression support 
            return (string)$value;
        }
        
        return false;
    }
    
    protected function formatValue($value, $fieldType){
        $mysql_dateformats = array('datetime'=>'Y-m-d H:i:s', 'time'=>'H:i:s', 'date'=>'Y-m-d');

        if(isset($mysql_dateformats[$fieldType])){ // date
            $value = date($mysql_dateformats[$fieldType], is_numeric($value)?$value:strtotime($value));            
        }
            
        if($fieldType == 'int'){ //int
            $value = intval($value);
        }
        
        return $value;
    }

    public function populasi($data, $fields) {
        if (count($fields) > 0)  {
            $myfields = $fields;
        } else {
            $myfields = $this->_fields;
        }
        foreach ($myfields as $field) {
            if (!empty($data[$field])) {
                $this->setValue($field, $data[$field]);
            }
        }
    }
    private function __clone() {
        
    }
}