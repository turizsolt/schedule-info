<?php
    require_once('../model/DummyScheduleService.php');
    require_once('../model/TextFileScheduleService.php');
    require_once('../model/BKKScheduleService.php');

    // 1. bemenő adatok, validálni
    if(!isset($_GET['stop']) || !preg_match('/^[0-9A-Z]*$/',$_GET['stop'])) {
        $stop = 1;
    } else {
        $stop = $_GET['stop'];
    }

    // 2. model-beli osztálynak valami függvényét
    $scheduleService = new BKKScheduleService();
    $departures = $scheduleService->getDepartures($stop);
    $stopName = $scheduleService->getStopName($stop);

    // 3. meghívunk egy view-t
    require('../view/ScheduleView.php');
?>

