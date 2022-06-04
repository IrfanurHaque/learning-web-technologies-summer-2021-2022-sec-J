<?php 
    
    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        $firstName = $_POST['name1'];
        $lastName = $_POST['name2'];
        $email = $_POST['email'];
        $mobile = $_POST['Number'];
        $address = $_POST['address'];
        $country = $_POST['country'];
        if(empty($_POST['Gender'])){
            echo "select the gender<br>";
        }
        else{
                 $gender = $_POST['Gender'];
        }
        if (empty($firstName) or empty($lastName) or  empty($email) or empty($mobile) or empty($address) or empty($country)){
            echo "please fill up the form properly<br>";
        }
             else {
            echo "Registration Successfully<br>";
        }
    }
    else {
        echo "Request Failed<br>";
    }
?>