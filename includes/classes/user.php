<?php
class UserClass extends CoreClass
{

    protected static $db_table = "user";
    protected static $db_table_fields = array(
        'id',
        'username',
        'password'
    );
    public $id;
    public $username;
    public $password;

    public static function verify_user($username, $password)
    {
        global $databaseClass;

        $username = $databaseClass->escape_string($username);
        $password = $databaseClass->escape_string($password);

        $sql = "SELECT * FROM " . self::$db_table . " WHERE ";
        $sql .= "username = '{$username}'";
        $sql .= "LIMIT 1";

        //IF SQL IS SUCCESFULL
        if (self::find_by_query($sql))
        {
            foreach (self::find_by_query($sql) as $db_content)
            {
                $db_content->password;
            }

            //PASSWORD VERIFY and returns result array and USER ID to set $_SESSION
            if (password_verify($password, $db_content->password))
            {
                $results_array = self::find_by_query($sql);
                //Removes the first element from an array, and return the value of the removed element
                return !empty($results_array) ? array_shift($results_array) : false;
            }
        }
        else
        {
            return false;
        }
    }
}

$userClass = new UserClass();

?>
