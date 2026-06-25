<?php

require_once "../app/Controllers/AdherentController.php";

$controller = new AdherentController();

echo "<pre>";
print_r($controller->index());
echo "</pre>";