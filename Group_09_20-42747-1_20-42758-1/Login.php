<?php
if($_SERVER['REQUEST_METHOD']==="POST"){
    function test_input($data){
        $data = trim($data);

        $data = stripcslashes($data);

        $data = htmlspecialchars($data);
        return $data;
    }
    $fname=test_input($_POST['firstName']);
    $lname=test_input($_POST['lastName']);
    $username=test_input($_POST['userName']);
    $pass=test_input($_POST['password']);
    $store=array(
        'firstName'=>$fname,
        'lastName'=>$lname,
        'userName'=>$username,
        'password'=>$pass

    );
    if(empty($fname) or empty($lname) or empty($username) or empty($pass)){
        echo "Fill up the form properlty";
    }
    else{
        if(filesize("data.json")==0){
            $record=array($store);
            $data=$record;
            echo "Registration successful";

        }
        else{
            $olddata=json_decode(file_get_contents("data.json"));
            array_push($olddata,$store);
            $data=$olddata;
        }
        if(!file_put_contents("data.json",json_encode($data,JSON_PRETTY_PRINT),LOCK_EX)){
            $error="please try again";

        }
        else{
            $success="message store  successfully";
        }
    }
    echo '<a href="http://127.0.0.1/CreateMyFile/Login.html">Login Form</a>';
}

?>