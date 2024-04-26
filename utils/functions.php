<?php

include 'urls.php';

function getStoredData()
{
    $json_file = file_get_contents('../'.$GLOBALS['data_path']);
    $json_data = json_decode($json_file, true);
    return $json_data;
}

function storeData($json_data)
{
    $json = json_encode($json_data);
    $res = file_put_contents('../'.$GLOBALS['data_path'], $json);
    return $res;
}

function clearData(){
    file_put_contents('../'.$GLOBALS['data_path'], json_encode([]));
}

?>

