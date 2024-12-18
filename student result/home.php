<?php
    session_start();
    include("session.php");
    $insert = false;
    $update = false;
    $empty = false;
    $upfailed = false;
    $infailed = false;
    $connection = true;
    $delete = false;
    $notInt = false;
    $unknownresult = false;
    
  require("sqldb.php");
?>
<!doctype html>
<html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.dataTables.css" />
      <title>Admin</title>

    </head>
<body>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?php htmlspecialchars("PHP_SELF")?>" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="id">Roll.no</label>
              <input type="text" class="form-control" id="idEdit" name="idEdit" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="nameEdit" name="nameEdit" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="semester">Semester</label>
              <input type="text" class="form-control" id="semesterEdit" name="semesterEdit" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="result">Result</label>
              <input type="text" class="form-control" id="resultEdit" name="resultEdit" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="mark">Mark</label>
              <input type="text" class="form-control" id="markEdit" name="markEdit" aria-describedby="emailHelp">
            </div>

            
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="update">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
    <a class="navbar-brand" style="margin-right: 54rem;" href="#">Students Result Management</a>
    <div class="collapse navbar-collapse"  id="navbarSupportedContent">
        <form class="form-inline my-2 my-lg-0" action="<?php htmlspecialchars("PHP_SELF")?>" method="post">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="logout">Log out</button>
            <?php
            if($_SERVER["REQUEST_METHOD"]== "POST")
            if(isset($_POST["logout"])){
                header("location:index.php");
            }
            ?>       
        </form>
    </div>
</nav>

<?php
  include('error.php');
?>

<div class="container my-5">
    <h2>Add Student Result</h2>
    <form action="<?php htmlspecialchars("PHP_SELF")?>" method="post">
        
        <div class="form-group">
          <label for="id">Roll no.</label>
          <input type="text" class="form-control" name="id" id="id" aria-describedby="emailHelp">
        </div>

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
        </div>

        <div class="form-group">
          <label for="semester">Semester</label>
          <input type="text" class="form-control" name="semester" id="semester" aria-describedby="emailHelp">
        </div>

        <div class="form-group">
          <label for="result">Result</label>
          <input type="text" class="form-control" name="result" id="result" aria-describedby="emailHelp">
        </div>

        <div class="form-group">
          <label for="mark">Mark</label>
          <input type="text" class="form-control" name="mark" id="mark" aria-describedby="emailHelp">
        </div>
        
        
        

        <button type="submit"   name="addstudent" class="btn btn-primary">Add Student</button>

    </form>
</div>




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
        <th scope="col">Actions</th>
        </tr>
    </thead>
<tbody>
<?php
    require("dtTable.php");
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
<script>
document.addEventListener("DOMContentLoaded", function() {
 
  var editModal = document.getElementById("editModal");


  var editButtons = document.querySelectorAll(".edit");


  var idEdit = document.getElementById("idEdit");
  var nameEdit = document.getElementById("nameEdit");
  var semesterEdit = document.getElementById("semesterEdit");
  var resultEdit = document.getElementById("resultEdit");
  var markEdit = document.getElementById("markEdit");
  var snoEdit = document.getElementById("snoEdit");


  editButtons.forEach(function(button) {
    button.addEventListener("click", function() {
      var row = this.closest("tr");
      var sno = row.querySelector("th").innerText;
      var id = row.querySelectorAll("td")[0].innerText;
      var name = row.querySelectorAll("td")[1].innerText;
      var semester = row.querySelectorAll("td")[2].innerText;
      var result = row.querySelectorAll("td")[3].innerText;
      var mark = row.querySelectorAll("td")[4].innerText;

      idEdit.value = id;
      nameEdit.value = name;
      semesterEdit.value = semester;
      resultEdit.value = result;
      markEdit.value = mark;
      snoEdit.value = id;
      $('#editModal').modal('toggle');
    });
  });
});
</script>
<script>
   
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
    element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) {
        console.log("yes");
        window.location = `<?php htmlspecialchars("PHP_SELF")?>?delete=${sno}`;
        }
        else {
        console.log("no");
        }
    })
    })
</script>
</body>
</html>

