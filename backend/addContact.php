<?php

    include '../utils/functions.php';

    if(isset($_POST['submit'])){
        $name = $_POST['name'] | '';
        $phone = $_POST['phone']| '';

        if($name == '' || $phone == ''){
            header("Location: " . $homeUrl . '?e=Please fill the form&s=0');    
        }

        $res = storeUserRecord($name , $phone);
        header("Location: " . $homeUrl . '?e=User added successfully&s=1');
         
    } else {
        header("Location: " . $homeUrl . '?e=Please fill the form&s=0');
    }



    function storeUserRecord($name , $phone) {
        
        $json_data = getStoredData();
        
        array_push($json_data , Array(
            "id" => sizeof($json_data),
            "name" => $name ,
            "phone" => $phone,
        ));
        
        $res = storeData($json_data);
        return $res;
    }

?>