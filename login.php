<?php
    session_start();

    //intializating variables
    $name="";

    //connect to database
    $db = mysqli_connect('localhost', 'root', 'project');

    //Register user
    if(isset($_POST['login_user'])){
        //receive all the input values from the form
        $name=mysqli_real_escape_varchar($db,$_POST('name'));
        
        //form validarion
        if (empty($name)){array_push($errors,"Name is required");}
    }
    //first check the da(tabase 
    $user_name_check_query="Select * FROM user_name WHERE name='$name' LIMIT 1";
    $result=mysqli_query($db, $user_name_check_query);
    $user_name=mysqli_fetch_assoc($result);

    //if user exit
    if($user_name){
        if($user_name['name']==$name){
            array_push($errors,"Name already exits");
        }
    }

    //finally if no erroe form
    if(count($errors)==0){
        $query="Insert INTO uesr_name(name)VALUES('$name')";
        mysqli_query($db,$query);
        $_SESSION['name']=$name;
        header('location:start.html');
    }
    ?>