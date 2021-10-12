<?php

function is_snowflake($s)
{
    if (ctype_digit($s) && in_array(strlen($s), range(17, 19))) {
        return true;
    }
    return false;
}

function snow2ts($snowflake, $micro = false)
{
    $ms = (intval($snowflake) / 4194304) + 1420070400000;
    return floor($micro ? $ms : $ms / 1000);
}

function getTZ()
{
    $tzf = getenv('localTimezone');
    if (!$tzf) {
        $tzf = readlink('/etc/localtime');
        $tzf = substr($tzf, strpos($tzf, '/zoneinfo/') + 10);
    }
    try {
        $tz = new DateTimeZone($tzf);
    } catch (Exception $e) {
        return false;
    }
    return $tz;
}

function listItem($title, $subtitle = null, $arg = false, $valid = true, $icon = null, $launch = false)
{
    $item = [
        'valid' => $valid,
        'title' => (string)$title
    ];
    if ($subtitle) $item['subtitle'] = (string)$subtitle;
    if ($arg !== false) $item['arg'] = (string)$arg;
    if ($icon) $item['icon'] = is_array($icon) ? $icon : ['path' => "icons/$icon.png"];
    if ($launch) $item['variables']['launch'] = $launch;
    return $item;
}

function listError($items)
{
    die(json_encode(['items' => $items]));
}
