<?php
    include "db_student.php";

    $handle = fopen('db_student.php', 'a+');

    $is_added = 0;
    $check_login = true;
    
    if(!empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["login"]) &&
        !empty($_POST["password"]) ){
            foreach ($students as $key=>$st)
                if(!($st->get_login() == $_POST["login"])){
                    $check_login = true;
                }
                else{
                    $check_login = false;
                    break;
                }

            if($check_login){
                fwrite($handle, "\n\$students[] = new Student(".(sizeof($students)+1).",\"".$_POST["first_name"]."\",\"".$_POST["last_name"]."\",\"".$_POST["login"]."\",\"".$_POST["password"]."\",\$edu_degrees[".$_POST["edu_deg"]."]);");
                $is_added = 1;
            }else
                $is_added = 2;
        
    }
    fclose($handle);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #b20006;">
      <a class="navbar-brand" href="home.html"><i class="fas fa-home"></i> ADMISSIONS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">+7(700)-654-02-75</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-map-marked-alt"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="far fa-question-circle"></i></a>
          </li>
        </ul>
      </div>

      <div>
        <a class="btn btn-outline-light" href="login.html">Login</a>
        <a class="navbar-brand" href="#">
          <img src="images/iitu_logo.png" height="50" alt="" loading="lazy">
        </a>
      </div>
    </nav>
    <nav class="nav nav-pills nav-fill" style="background-color: #1c1c1c;">
      <a class="nav-link link disabled" href="admin_student.php">Students</a>
      <a class="nav-link link" href="admin_ad_mem.php">Admission members</a>
      <a class="nav-link link" href="admin_edu_deg.php">Education degrees</a>
      <a class="nav-link link" href="admin_faculties.php">Faculties</a>
    </nav>


    <div class = "container py-5">
        <div class = "col align-self-center">
            <?php
                if($is_added == 1){
            ?>
            <div class="alert alert-success" role="alert">
                Successfully added!
            </div>
            <?php
                }else if($is_added == 2){
            ?>
            <div class="alert alert-danger" role="alert">
                There already has this login!
            </div>
            <?php
                }
            ?>
            <h3 class = "mb-3">Student adding</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="first_name" placeholder="Student name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="last_name" placeholder="Student lastname">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="login" placeholder="login">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <select class="form-control" name="edu_deg">
                        <?php 
                            foreach($edu_degrees as $key=>$value){
                        ?>
                            <option value = "<?=$key?>"><?=$value->get_edu_deg_name()?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-outline-dark">Add</button>
            </form>
            <h3 class= "pt-5">Students list</h3>
            <table class = "table table-striped mt-3">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">First name</th>
                  <th scope="col">Middle name</th>
                  <th scope="col">Last name</th>
                  <th scope="col">Login</th>
                  <th scope="col">Password</th>
                  <th scope="col">Birth date</th>
                  <th scope="col">Phone number</th>
                  <th scope="col">School name</th>
                  <th scope="col">University name</th>
                  <th scope="col">Edu Degree</th>
                  <th scope="col">Options</th>
                </tr>
              </thead>
              <tbody>
              <?php
                    foreach($students as $id => $student){
                  ?>
                <tr>

                  <td><?=$student->get_student_id()?></td>
                  <td><?=$student->get_first_name()?></td>
                  <td><?=$student->get_middle_name()?></td>
                  <td><?=$student->get_last_name()?></td>
                  <td><?=$student->get_login()?></td>
                  <td><?=$student->get_password()?></td>
                  <td><?=$student->get_birth_date()?></td>
                  <td><?=$student->get_phone_num()?></td>
                  <td><?=$student->get_school_name()?></td>
                  <td><?=$student->get_university_name()?></td>
                  <td><?=$student->get_edu_deg()->get_edu_deg_name()?></td>
                  <td>
                    <form action="admin_edit_student.php">
                      <input type="hidden" value="<?=$id?>">
                      <button type = "submit" class = "btn btn-sm btn-outline-success">Edit</button>
                    </form>
                    <form action="post">
                      <button type = "submit" class = "btn btn-sm btn-outline-danger mt-1">Delete</button>
                      </form>
                  </td>
                </tr>
                <?php
                    }
                  ?>
              </tbody>
            </table>
        </div>
    </div>


    <footer class="container-fluid" style="background-color:#4c5d67">
      <div class="container pt-5 pb-3 text-white">
        <div class="row justify-content-center pb-4">
          <div class="col-4">
            <h5><a href="about.html" class="text-white">About IITU</a></h5>
            <h5><a href="contact.html" class="text-white">Contacts</a></h5>
            <h5><a href="#" class="text-white">Feedback</a></h5>
          </div>
          <div class="col-3">
            <p>Manasa, 34/1 050040, Almaty city, Kazakhstan</p>
          </div>
        </div>
        <p class="text-center">Copyright All Rights Reserved 2020</p>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/6efa37f450.js" crossorigin="anonymous"></script>
  </body>
</html>
