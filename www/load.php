<?php
if (!defined("ACCESS")) {
	die("Error: You don't have permission to access here...");
}

include "requirements.php";

$Load = new ZP_Load();
$Load->helper(array("exceptions", "i18n", "sessions", "router", "string", "debugging", "alerts", "validations", "security", "time"));

include "configuration.php";

if ($ZP["benchMark"]) {
	$Load->helper("benchmark");
	benchMarkStart();
}

execute();

if ($ZP["benchMark"]) {
	benchMarkEnd();
}
