<?php
function addSuffix($data) {
      
    if (is_numeric($data)) {
      
        $last_digit = intval(substr($data, -1));
        if (($last_digit == 1) && ($data != "11")) {
            $suffix = "st";
        } elseif (($last_digit == 2) && ($data != "12")) {
            $suffix = "nd";
        } elseif (($last_digit == 3) && ($data != "13")) {
            $suffix = "rd";
        } else {
            $suffix = "th";
        }
        return $data . $suffix;
    } else {
        $notINT = true;
    }
}

if(isset($_GET["delete"])){
    $sno = $_GET['delete'];
    try{
    $conn = mysqli_connect($servername, $username, $password, $database);
    $sql = "DELETE FROM exam_result WHERE `exam_result`.`student_id` = $sno";
    $result = mysqli_query($conn, $sql);
    header("location: home.php");
    }
    catch(mysqli_sql_exception){
    header("location: index.php");
    $connection = false;
    }
}
if($_SERVER["REQUEST_METHOD"] == "POST"){

if(isset($_POST["update"])){
    if(isset($_POST["idEdit"]) || isset($_POST["nameEdit"]) || isset($_POST["semesterEdit"]) || isset($_POST["resultEdit"]) || isset($_POST["markEdit"])){
        $id = $_POST["idEdit"];
        $name = $_POST["nameEdit"];
        $semester = $_POST["semesterEdit"];
        $results =  strtoupper($_POST["resultEdit"]);
        $mark = $_POST["markEdit"];
        $Eno = $_POST["snoEdit"];
        if(is_numeric($mark) && is_numeric($id)){
            try{
                $conn = mysqli_connect($servername , $username,$password, $database);
                $sql = "UPDATE `exam_result` SET `student_id` = '$id', `student_name` = '$name', `semester` = '$semester', `result` = '$results', `mark` = '$mark' WHERE `exam_result`.`student_id` = $Eno ; "; 
                $result = mysqli_query($conn , $sql);
                if($result){
                $update = true;
                }
            }
            catch(mysqli_sql_exception){
                $connection = false;
                $upfailed = true;
            }
        } 
        else{
            $notInt = true;
        }
    }
}   


if(isset($_POST["addstudent"])){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $semester = $_POST["semester"];
    $Sresult = $_POST["result"];
    $mark = $_POST["mark"];

    if(empty($_POST["id"]) || empty($_POST["semester"]) || empty($_POST["result"]) || empty($_POST["mark"])){
        $empty = true;
    }
    else {
        $empty = false;
    }
    if(!empty($_POST["id"]) && !empty($_POST["semester"]) && !empty($_POST["result"]) && !empty($_POST["mark"])){
        
        if(is_numeric($mark) && is_numeric($id) && is_numeric($_POST["semester"])) {
            $semester = addSuffix($_POST["semester"]);
            $Sresult =  strtoupper($_POST["result"]);
            $Sresult = $Sresult .'ED';
            $conn = mysqli_connect($servername, $username, $password, $database);
            $sql ="INSERT INTO `exam_result` (`student_id`, `student_name`, `semester`, `result`, `mark`) VALUES ('$id', '$name', '$semester', '$Sresult', '$mark');"; //NOW() current date and time
            $result = mysqli_query($conn , $sql);
                if($result){
                    $insert = true;
                    
                }
                else{
                    $infailed = true;
                }
            } else{
            $notInt = true;
            }
        } 
    }
}  
?>