<?php
    session_start();
    require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container mt-5">

    <?php include('message.php') ?> 
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>
                Student Details
                <a href="student_create.php" class="btn btn-primary float-end">Add Student</a>              
              </h4>
            </div>
            <div class="card-body">
            <table class="table table-dark table-hover">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Course</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $query = "SELECT * from students";
                    $query_run = mysqli_query($con,$query);

                    if(mysqli_num_rows($query_run)>0)
                    {
                      foreach ($query_run as $student)
                      {   
                        ?>
                           <tr>
                            <th scope="row"><?= $student['id']?></th>
                            <td><?= $student['name']?></td>
                            <td><?= $student['email']?></td>
                            <td><?= $student['phone']?></td>
                            <td><?= $student['course']?></td>
                            <td>
                              <a href="view.php?id=<?= $student['id']; ?>" class="btn btn-info btn-sm">View</a>
                              <a href="student_edit.php?id=<?= $student['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                              <a href="delete.php?id=<?= $student['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                           </tr>

                        <?php
                      }

                    }
                    else
                    {
                      echo "<h5>No record found</h5>";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>