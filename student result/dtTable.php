<?php
try{
include("session.php");
$conn = mysqli_connect($servername , $username,$password, $database);
$show = $conn;

    if($show){
        $sql =  "SELECT * FROM `exam_result`";
        $result = mysqli_query($conn, $sql);    
        $num = mysqli_num_rows($result);
        $sno = 0;
        if($num > 0){ 
            while($row = mysqli_fetch_assoc($result)){ 
            $sno += 1;
            echo "
                <tr>
                <th scope='row'>". $sno ."</th>
                <td>".$row["student_id"] ."</td> 
                <td>".$row['student_name']."</td>
                <td>". $row['semester']."</td>
                <td>". $row['result']."</td>
                <td>". $row['mark']."</td>
                <td> <button class='edit btn btn-sm btn-primary' id=".$row['student_id'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['student_id'].">Delete</button>  </td>
                </tr>";
                // ". ." string hppa
            }
        }
    }
}
catch(mysqli_sql_exception){
echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>ERROR404!</strong> Due to technical error we can\'t reach to the server!!!
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>';
}


?>