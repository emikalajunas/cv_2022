<?php

class CoreClass {
        
    public static function find_by_ids($records_ids_array){ 
        global $databaseClass;        
        return $the_result_array = static::find_by_query("SELECT * FROM " .  static::$db_table . " WHERE id IN ('". implode("', '", array_values($records_ids_array)) . "')");        
        //ternary sintax, bellow it works ok Too
        //return !empty($the_result_array) ? array_shift($the_result_array) : false; //The array_shift() function removes the first element from an array, and returns the value of the 
    }

    public static function find_by_id($id){ 

        global $databaseClass; //to call query() method
        $the_result_array = static::find_by_query("SELECT * FROM " .  static::$db_table . " WHERE id=$id LIMIT 1"); //limit is better to set to avoid mess with overload loop

        //ternary sintax, bellow it works ok Too
        return !empty($the_result_array) ? array_shift($the_result_array) : false; //The array_shift() function removes the first element from an array, and returns the value of the removed element.
    }
    
    public static function find_by_client($client){ 

        global $databaseClass;
        $the_result_array = static::find_by_query("SELECT * FROM " .  static::$db_table . " WHERE client='$client' LIMIT 1");

        //ternary sintax, bellow it works ok Too
        return !empty($the_result_array) ? array_shift($the_result_array) : false; //The array_shift() function removes the first element from an array, and returns the value of the removed element.

    }

    public static function find_by_query($sql){
        global $databaseClass;
        $result_set = $databaseClass->query($sql);
        $the_object_array = array(); //sets an empty array

        while($row = mysqli_fetch_array($result_set)){
         $the_object_array[] =  static::instantiation($row);
        }
        return $the_object_array;
    }

    public static function instantiation($the_record){

        $calling_class = get_called_class();

        //instantiating a Class User
        $the_object = new $calling_class;

        //$the_object->id         = $found_user['id'];
        //$the_object->username   = $found_user['username'];
        //$the_object->password   = $found_user['password'];
        //$the_object->first_name = $found_user['first_name'];
        //$the_object->last_name  = $found_user['last_name'];

        foreach($the_record as $the_attribute => $value){

        //checks if $the_object not empty array, so instantiates the key and value
        if($the_object->has_the_attribute($the_attribute)){

            //IF $the_object was empty, we set up it with VALUES
            $the_object->$the_attribute = $value;
        }
        }

        return $the_object;
    }


    private function has_the_attribute($the_attribute){

        //using $this sudo variable to check all the User class array
        $object_properties = get_object_vars($this);

        //checking if the key exists $object_properties array. Returns true/false
        return array_key_exists($the_attribute, $object_properties);
    }

    protected function properties () {

        //return get_object_vars($this); //get_object_vars gets ALL propierties of object but all we dont need :)

        $properties = array();

        foreach (static::$db_table_fields as $db_field){      //static->for static propertie

            if(property_exists($this, $db_field)){

                $properties[$db_field] = $this->$db_field; //??
            }
        }
            return $properties;
    }

    protected function clean_properties(){
        global $databaseClass;

        $clean_properties = array();
        foreach ($this->properties() as $key => $value){
            $clean_properties[$key]=$databaseClass->escape_string($value);
        }

        return $clean_properties;
    }

    public function save() {
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function create(){
        global $databaseClass;

        $properties = $this->clean_properties();//holds all properties

        $sql = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) . ")"; //implode — Join array elements with a string The array_keys() function returns an array containing the keys.
        $sql .= "VALUES ('". implode("','", array_values($properties)) . "')";

        if($databaseClass->query($sql)){

            $this->id = $databaseClass->the_insert_id();
            return true;

        } else {

            return false;
        }
    }

    public function delete(){
        global $databaseClass;
        $sql  = "DELETE FROM " . static::$db_table . " ";
        $sql .= "WHERE id=" . $databaseClass->escape_string($this->id);
        $sql .= " LIMIT 1";
        $databaseClass->query($sql);
        return (mysqli_affected_rows($databaseClass->connection) == 1) ? true : false;
    }
}

?>
