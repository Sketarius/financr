<?php
require_once('../core/FinancrStore.php');

$store = new FinancrStore();

$res = $store->userCompletedFirstTimeSetup('sketarius@gmail.com');

if($res) { echo "true!"; } else { echo "false"; }
?>