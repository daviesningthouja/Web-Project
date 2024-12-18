<?php
  $servername = "localhost";
  $username = "Davies Ningthouja";
  $password = "6*Davies";
  $database = "db_davies";
  
  
/*  
$conn = mysqli_connect($servername , $username,$password, $database);
  
  
if (!$conn){
   die("sorry we failed to connect:" . mysqli_connect_error());
}
*/
  // else{
  //     echo "connection was successfull<br>";
  // }
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.dataTables.css" />
  <title>Notepad - notes for productivity</title>
</head>


<body>

<!-- edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?php htmlspecialchars("PHP_SELF")?>" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="title">Note Title</label>
              <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
              <label for="desc">Note Description</label>
              <textarea class="form-control" id="descEdit" name="descEdit" rows="3"></textarea>
            </div> 
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a class="navbar-brand" href="#">PHP CRUD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<?php
if(isset($_GET["delete"])){
  $sno = $_GET['delete'];
  $delete = true;
  $conn = mysqli_connect($servername, $username, $password, $database);
  $sql = "DELETE FROM `notes` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
}
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["descEdit"]) || isset($_POST["titleEdit"])){
      $title = $_POST["titleEdit"];
      $desc = $_POST["descEdit"];
      $sno = $_POST["snoEdit"];
      try{
    
        $conn = mysqli_connect($servername, $username, $password, $database);
        $sql = "UPDATE `notes` SET `title` = '$title', `description` = '$desc' WHERE `notes`.`sno` = $sno; "; 
        $result = mysqli_query($conn , $sql);

        echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your note '.$title .' has been updated successfully!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    catch(mysqli_sql_exception){
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR404!</strong> Due to technical error in our server your note '.$title.' was not created!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    }
    if(isset($_POST["notesub"])){
    if(empty($_POST["title"]) || empty($_POST["desc"])){
        echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Please!</strong> fill the note title and description to create note.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    else if(!empty($_POST["title"]) && !empty($_POST["desc"])){
   
        $title = $_POST["title"];
        $desc = $_POST["desc"];
        try{
        
            $conn = mysqli_connect($servername, $username, $password, $database);
            $sql ="INSERT INTO `notes` (`title`, `description`) VALUES ('$title', '$desc');"; //NOW() current date and time
            $result = mysqli_query($conn , $sql);

            echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your note '.$title .' has been successfully created!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        catch(mysqli_sql_exception){
            echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>ERROR404!</strong> Due to technical error in our server your note '.$title.' was not created!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
      }
    }
  }
      

?>
<div class="container my-5">
    <h2>Add a Note</h2>
    <form action="<?php htmlspecialchars("PHP_SELF")?>" method="post">
        
        <div class="form-group">
          <label for="title">Note title</label>
          <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp">
        </div>
        
        <div class="form-group">
            <label for="desc">Note description</label>
            <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
        </div>
        

        <button type="submit"   name="notesub" class="btn btn-primary">Add Note</button>

    </form>
</div>
<div class="container">

<table class="table" id="myTable">
  
    <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
<tbody>
  <?php

  try{
  $conn = mysqli_connect($servername , $username,$password, $database);
  $insert = $conn;
  if($insert){
    $sql = "SELECT * FROM notes";
    $result = mysqli_query($conn, $sql);
  
  
    //find the number of records returned
    $num = mysqli_num_rows($result);
    $sno = 0;
    if($num > 0){
        
        while($row = mysqli_fetch_assoc($result)){
          $sno += 1; 
          echo "
            <tr>
            <th scope='row'>". $sno ."</th> 
            <td>".$row['title']."</td>
            <td>". $row['description']."</td>
            <td> <button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button>  </td>
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

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  

    
  <script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
  <script>$(document).ready( function () {
    $('#myTable').DataTable();
  } );
  </script>
  <script>
     edits = document.getElementsByClassName('edit');
      Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ",e);
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        description = tr.getElementsByTagName("td")[1].innerText;
        console.log(title, description);
        titleEdit.value = title;
        descEdit.value = description;
        snoEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');

      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `<?php htmlspecialchars("PHP_SELF")?>?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>
  
</body>
</html>
