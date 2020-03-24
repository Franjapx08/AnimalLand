<?php
    session_start();
    session_destroy();
    $data = array(
        'code' => 1,
        'message' => 'Cerro sessión!'
    );
echo(json_encode($data));