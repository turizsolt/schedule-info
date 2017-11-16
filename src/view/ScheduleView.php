<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Schedule</title>
    <link href="/src/view/style/style.css" rel="stylesheet" type="text/css" />
    <meta http-equiv="refresh" content="15;url=" />
</head>
<body>

<div id="stop-name"><?=$stopName?></div>
<div id="info-screen"><?php
        foreach($departures as $departure) {
            if($departure['in'] < 1) { ?>
            <div class="screen-row">
                <div class="screen-cell-line"><?=$departure['line']?></div>
                <div class="screen-cell-destination flash"><?=$departure['destination']?></div>
                <div class="screen-cell-in">&nbsp;</div>
            </div>
        <?php } else { ?>
            <div class="screen-row">
                <div class="screen-cell-line"><?=$departure['line']?></div>
                <div class="screen-cell-destination"><?=$departure['destination']?></div>
                <div class="screen-cell-in"><?=$departure['in']?>'</div>
            </div>
        <?php }
            }
    ?></div>
</body>
</html>
