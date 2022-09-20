<?php

class CoreClass {

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
        $the_object = new $calling_class;
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
        $object_properties = get_object_vars($this);
        //checking if the key exists $object_properties array. Returns true/false
        return array_key_exists($the_attribute, $object_properties);
    }
}
?>
