<?php
require_once 'mysql.php';

class Bkk {
    private $mysql;

    function __construct() {
        $this->mysql = new Mysql("bkk");
    }

    function getStopTimes($stop, $time, $date){
        return $this->mysql->query(
            "SELECT * FROM stop_times s ".
            "INNER JOIN trips t ON s.trip_id=t.trip_id ".
            "INNER JOIN routes r ON t.route_id=r.route_id ".
            "INNER JOIN calendar_dates d ON t.service_id=d.service_id ".
            "WHERE s.stop_id='$stop' ".
            "AND departure_time > '$time' ".
            "AND date = '$date' ".
            "ORDER BY departure_time ASC ".
            "LIMIT 0,5 ".
            ";");
    }

    function getStopName($stop){
        return $this->mysql->query(
            "SELECT * FROM stops s ".
            "WHERE s.stop_id='$stop' ".
            ";");
    }
}

?>

