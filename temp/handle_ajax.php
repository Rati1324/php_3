<?php
    $data = file_get_contents("php://input");
    $data = json_decode($data, true);
    $data['f_name'] = 1;
    echo json_encode($data, true);