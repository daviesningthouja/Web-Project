<?php
 
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.dataTables.css" />
        <title>SRM System</title>
    </head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
    <a class="navbar-brand" style="margin-right: 54rem;" href="#">Students Result Management</a>
    <div class="collapse navbar-collapse"  id="navbarSupportedContent" >
        <form class="form-inline my-2 my-lg-0" action="<?php htmlspecialchars("PHP_SELF")?>" method="post">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="admin">Admin</button>
            <?php
            if($_SERVER["REQUEST_METHOD"]== "POST")
            if(isset($_POST["admin"])){
                header("location:login.php");
            }else {
                echo "failed";
            }
            ?>
        </form>
    </div>
</nav>


<div class="container">
<table class="table" id="myTable">
    <thead>
        <tr>
        <th scope="col">Sno.</th>
        <th scope="col">Roll no.</th>
        <th scope="col">Name</th>
        <th scope="col">Semester</th>
        <th scope="col">Result</th>
        <th scope="col">Mark</th>
        </tr>
    </thead>
<tbody>
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
</tbody>
</table>
</div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
    <script>$(document).ready( function () {
        $('#myTable').DataTable();
    } );
    </script>
  </body>
</html>
<?php


?>
