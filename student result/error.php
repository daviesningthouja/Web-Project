<?php

if($update || $delete){
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Student has been updated successfully!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
if($upfailed){
    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>ERROR404!</strong> Due to technical error in our server Student was not updated!!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
  
  if($empty){
      echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Please!</strong> fill the data to add student.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      </div>';
  }
  if($notInt){
      echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>INVALID DATA FILLED!</strong> fill the Roll no. & Mark with numeric value.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      </div>';
  }
  if($unknownresult){
      echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>INVALID DATA FILLED!</strong> fill the Result with pass or fail.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      </div>';
  }
  if($insert){        
      echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong> ROLL NO.'.$id.'  student have added successfully!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      </div>';
  }
  if($infailed){
      echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>ERROR404!</strong> Due to technical error in our server your note was not created!!!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      </div>';
  }
  if($connection == false){
      echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>ERROR404!</strong> Due to technical error in our server we can\'t reach the server sorry for the incovenience!!!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      </div>';
  }
    

    



?>