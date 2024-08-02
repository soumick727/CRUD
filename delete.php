<?php   
    include "dbcon.php";
    $query = "DELETE FROM `students` WHERE id = '".$_REQUEST['id']."'";
    $query_run = mysqli_query($con,$query);
    header("location:index.php
    
    ");
?>