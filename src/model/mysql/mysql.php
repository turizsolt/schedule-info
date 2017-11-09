<?php
/**
 * Created by IntelliJ IDEA.
 * User: Suli
 * Date: 2017.10.17.
 * Time: 13:49
 */

class Mysql {
    private $connection;

    public function __construct($database) {
        $this->connection = mysql_connect('localhost', 'root', '');
        mysql_select_db($database, $this->connection);
        mysql_query("SET NAMES utf8;", $this->connection);
    }

    public function __destruct() {
        mysql_close($this->connection);
    }

    public function query($queryString) {
        //echo $queryString;
        $resourceId = mysql_query($queryString, $this->connection);

        $array = array();
        while($row = mysql_fetch_assoc($resourceId)){
            $array[] = $row;
        }

        return $array;
    }

    public function select($table, $where=null) {
        $queryString = "SELECT * FROM $table ";

        if($where) {
            $i = 0;
            foreach ($where as $index => $item) {
                $queryString .= ($i===0)?" WHERE ":" AND ";
                $queryString .= " $index = '$item' ";
                $i++;
            }
        }

        $queryString .= ";";

        return $this->query($queryString);
    }
}
?>

