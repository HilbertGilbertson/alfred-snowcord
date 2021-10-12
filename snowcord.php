<?php

require 'func.php';

$ts = snow2ts($argv[1]);

if (!is_snowflake($argv[1])) {
    listError([
        listItem("Invalid Snowflake", "Please provide a valid snowflake.", null, false)
    ]);
}

$copyFormat = getenv('copyFormat');
$copyLocalFormat = getenv('copyLocalFormat');

$date = new DateTime();
$utc = $date->setTimestamp($ts);
$utcDate = $utc->format(getenv('format'));

$items = [
    listItem("$utcDate UTC", $utc->format(getenv('formatFull')),
        $copyFormat ? $utc->format($copyFormat) : "")
];

$tz = getTZ();
if ($tz) {
    $dateOther = new DateTime();
    $local = $dateOther->setTimestamp($ts)->setTimezone($tz);
    $localDate = $local->format(getenv('localFormat'));
    $localTz = $local->format("T");
    $items[] = listItem("$localDate $localTz", $local->format(getenv('localFormatFull')),
        $copyLocalFormat ? $local->format($copyLocalFormat) : "");
}

$items[] = listItem("Unix: $ts", null, $ts);

if (getenv('usingWhencord') && $tz) {
    $items[] = listItem("Use with Whencord ⮕", null, ":$ts", true, "whencord",
        "wc");
}

echo json_encode(['items' =>
    $items
]);
