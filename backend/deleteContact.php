<?php
    include '../utils/functions.php';

    if (isset($_POST['submit'])) {

        $id = $_POST['id'];
        $json_data = getStoredData();
        
        foreach($json_data as $key => $value) {
            if($value['id'] == $id){
                unset($json_data[$key]);
            }
        }

        clearData();
        $res = storeData($json_data);
        header("Location: " . $homeUrl . '?e=User deleted successfully&s=1');

    } else {
        header("Location: " . $homeUrl . '?e=Please fill the form&s=0');
    }
?>
