<?php

require 'func.php';

$cb = getenv('cb');
$query = getenv('query');

if ($query) {
    $query = trim($query);
    $cb = getenv('cbsel');
    // get second item in clipboard, as text is selected
}

if ($query && is_snowflake($query)) die($query);

/*
 * Clipboard offset via history (see above):
 *
 * When text is selected we're using the second item in Alfred's clipboard history, instead of
 * pbpaste, because default Alfred workflow behaviour is to copy any selected text to the
 * clipboard when Alfred triggers.
 *
 * Clipboard history will need to be enabled in Alfred.
 */

if ($cb) {
    $cb = trim($cb);
    if (is_snowflake($cb)) {
        die($cb);
    }
}
