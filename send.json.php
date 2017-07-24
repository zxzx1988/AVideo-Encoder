<?php
header('Content-Type: application/json');
require_once 'configuration.php';
require_once $global['systemRootPath'].'objects/Encoder.php';
$obj = new stdClass();
$obj->error = true;
if (!empty($_POST['id'])) {
    $obj->item = $_POST['id'];
    $e = new Encoder($_POST['id']);
    if (!empty($e->getId())) {
        $obj->error = false;
        $obj->msg = $e->send();
    } else {
        $obj->msg = "Queue Item not found";
    }
} else {
    $obj->msg = "Id not found";
}
echo json_encode($obj->msg);