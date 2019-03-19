 <?php
function dbCon(){
    $dbHost="localhost";
    $dbUser="root";
    $dbPass="mysql";
    $db = "prototipo";
    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $db);

    if(mysqli_connect_errno()){
        $conn = "Error: " . mysqli_connect_error();
    } else {
        mysqli_query($conn, "SET NAMES 'utf8'");
    }
    return $conn;
}

function insUser($con, $strPat, $strMat, $strNom, $strEmail, $strPass, $strUser ){
        
    $query = "CALL insUser('$strPat', '$strMat', '$strNom', '$strEmail', '$strPass', '$strUser');";
    
    $dataSet = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($dataSet);
    return true;
}

function loginDB($con, $user, $pass, $key=null){
    #$query = "SELECT idUser, strLogin FROM ssLogin WHERE 
    #strPassword=SHA('$pass') and strLogin = '$user';";
    $query = "CALL spLogin('$user', '$pass');";
    
    $dataSet = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($dataSet);
    $flag = false;
    if($row != null){
        $_SESSION['user'] = $row['strLogin'];
        $_SESSION['password']=$pass;
        $flag = true;
    } else {
        $_SESSION['user'] ="";
        $_SESSION['password']="";
    }
    return $flag;
}