<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Schedule</title>
    <link href="/src/view/style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<pre id="info-screen"><?php
        require_once('mb_pad_str.php');

        foreach($departures as $departure) {
            printf("% -4s %s %2s'<br />",
                $departure['line'],
                mb_str_pad($departure['destination'], 16),
                $departure['in']
            );
        }
    ?></pre>
</body>
</html>
