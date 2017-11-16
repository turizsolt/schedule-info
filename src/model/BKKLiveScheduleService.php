<?php
    require_once '../config.php';

    class BKKLiveScheduleService {
        private $stops;

        public function __construct() {

        }

        private function howManyMinutesLeft($time){
            $now = time();
            $diff = floor(($time-$now)/60);
            return $diff;
        }

        private function getRouteShortNameFromTripId($tripId, $routes, $trips) {
            $routeId = $trips->$tripId->routeId;
            return $routes->$routeId->shortName;
        }

        public function getDepartures($stop) {
            $json = file_get_contents(getBkkLiveUrl($stop));
            $dataObject = json_decode($json);

            $stopTimes = $dataObject->data->entry->stopTimes;
            $this->stops = $dataObject->data->references->stops;
            $routes = $dataObject->data->references->routes;
            $trips = $dataObject->data->references->trips;

            $result = array();
            foreach($stopTimes as $stopTime) {
                $result[] = array(
                    'line' => $this->getRouteShortNameFromTripId($stopTime->tripId, $routes, $trips),
                    'destination' => $stopTime->stopHeadsign,
                    'in' => $this->howManyMinutesLeft(isset($stopTime->predictedDepartureTime)?$stopTime->predictedDepartureTime:$stopTime->departureTime)
                );
            }

            return $result;
        }

        public function getStopName($stop) {
            $stop = "BKK_".$stop;
            return $this->stops->$stop->name;
        }

    }

?>

