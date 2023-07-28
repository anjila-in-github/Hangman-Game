<?php
$db_host="localhost";
$db_user="root";
$db_password="";

$lnk=mysqli_connet($db_host,$db_user,db_password);
if(!lnk)
    die("Database connection failed");

    mysqli_select_db($lnk,"hangman") or die("falied to connect the db");

    $result=getAllScores($lnk);
    echo json_encode($result);

    function addScore($info,$lnk){
        $query="Insert INTO scores(Name ,Password) VALUES". 
        "('".$info["name"]."')";
        $rs=mysqli_query($lnk,$query);
        if (!rs){
            return false;

        }
        return true;
    }
    function getAllScores($lnk){
    $easy=getScoresWithDifficulty("Easy",$lnk);

    $medium=getScoresWithDifficulty("medium",$lnk);
    return array("easy"=>$easy,"medium"=>medium);
    
    }

    function getScoresWithDifficulty($difficulty,$lnk){
    $query="Select Name from score where difficulty like 'easy'";

    $rs=mysqli_query($lnk,$query);

    $result=array();
    if(mysqli_num_rows($rs)>0){
        while ($row = mysqli_fetch_assoc($rs)){
            array_push( $reaults,$row);
        }
    }

    return $result;
}
?>