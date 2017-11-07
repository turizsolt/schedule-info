<?php

    class TextFileScheduleService {
        public function __construct() {

        }

        public function getDepartures($stop) {
            $content = file_get_contents('data.csv');
            $rows = explode("\r\n", $content);
            $output = array();
            foreach($rows as $row){
                $explodedRow = explode(',',$row);
                $output[] = array(
                    'line' => $explodedRow[0],
                    'destination' => $explodedRow[1],
                    'in' => $explodedRow[2]
                );
            }
            return $output;
        }
    }

?>

