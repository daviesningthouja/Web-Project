<?php
function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["username"])){

        echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>INVALID!</strong> USERNAME is missing.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';

        if(empty($_POST["password"]))
        echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>INVALID!</strong> PASSWORD is missing.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
        if(!empty($_POST["username"]) && !empty($_POST["password"])){
            try{
            $conn = new mysqli($servername, $username, $password, $database);
                $_SESSION["username"] = sanitize($_POST["username"]);
                $_SESSION["password"] = sanitize($_POST["password"]);
                $username = $_SESSION["username"];
                $password = $_SESSION["password"];
            if(!empty($_POST["username"]) && !empty($_POST["password"])){
                $sql = "SELECT * FROM users WHERE user = '$username' AND password = '$password'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "Login successful!";
                    header("location:home.php");
                    $conn->close();
                } 
                else {
                    echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>INVALID!</strong> You should check username & passeword.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
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
    }   
    
}


?>