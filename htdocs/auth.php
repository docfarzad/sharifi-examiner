<?php


function passwcheck ($username, $password) {

if(($password==null)||($username==null)){


return "false";

}else{


$con = mysqli_connect("sql310.byethost7.com","b7_28074641","NyY2pL8xb6nNk9gz","b7_28074641_azmoon");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();	
}
        
mysqli_query($con, "SET NAMES utf8");


$username = str_replace(" ", "", $username);
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);


$query = "SELECT * from users where username='$username' and password='$password'";
$result = mysqli_query($con, $query);



if(mysqli_num_rows($result)!='0'){

    return "true";

}else{

    return "false";

}

}

mysqli_close($con);
}

function generateRandomString($length = 10) {

    $cont = mysqli_connect("sql310.byethost7.com","b7_28074641","NyY2pL8xb6nNk9gz","b7_28074641_azmoon");
    
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();	
        }
    
    mysqli_query($cont, "SET NAMES utf8");
    
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
    $query = mysqli_query($cont, "SELECT * FROM uniqstrings WHERE codestring='$randomString'");
    
        if (!$query)
        {
            die('Error: ' . mysqli_error($cont));
        }
    
    if(mysqli_num_rows($query) > 0){
    
        return generateRandomString($length);
    
    }else{
    
        $queryb = mysqli_query($cont, "INSERT INTO `uniqstrings` (`codestring`) VALUES ('$randomString')");
        if (!$queryb)
        {
            die('Error: ' . mysqli_error($con));
        }
    
    
        mysqli_close($cont); 
        return $randomString;
    
    }
        
    }

?>