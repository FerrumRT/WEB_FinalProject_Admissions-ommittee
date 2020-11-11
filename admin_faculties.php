<?php
    include "db_faculty.php";

    $handle = fopen('db_faculty.php', 'a+');

    $is_added = 0;
    $check_adding = true;

    if(!empty($_POST["name"]) && !empty($_POST["code"]) && !empty($_POST["description"]) && !empty($_POST["skills"])
    && !empty($_POST["outcomes"]) && !empty($_POST["leading_position"])){
            foreach ($faculties as $key=>$f)
                if(!($f->get_code() == $_POST["code"])){
                    $check_adding = true;
                }
                else{
                    $check_adding = false;
                    break;
                }

            if($check_adding){
                fwrite($handle, "\n\$faculties[] = new Faculty(".(sizeof($faculties)+1).",\"".
                $_POST["name"]."\",\"".
                $_POST["code"]."\",\"".
                $_POST["description"]."\",\"".
                $_POST["skills"]."\",\"".
                $_POST["outcomes"]."\",\"".
                $_POST["leading_position"].
                "\",\$edu_degrees[".$_POST["edu_deg"]."]);");
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
      <a class="nav-link link text-white" href="admin.php">Students</a>
      <a class="nav-link link text-white" href="admin_ad_mem.php">Admission members</a>
      <a class="nav-link link text-white" href="admin_deu_deg.php">Education degrees</a>
      <a class="nav-link link text-white disabled" href="">Faculties</a>
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
                There already has this faculty!
            </div>
            <?php
                }
            ?>
            <h3>Student adding</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Faculty name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="code" placeholder="Faculty code">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="description" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="skills" placeholder="Skills">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="outcomes" placeholder="Outcomes">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="leading_position" placeholder="Leading Position">
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
                <button type="submit" class="btn btn-outline-success">Add</button>
            </form>

            <h3 class= "pt-5">Admission member list</h3>
            <table class = "table table-striped mt-3">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Faculty name</th>
                  <th scope="col">Faculty code</th>
                  <th scope="col">Description</th>
                  <th scope="col">Skills</th>
                  <th scope="col">Outcomes</th>
                  <th scope="col">Leading Position</th>
                  <th scope="col">Options</th>
                </tr>
              </thead>
              <tbody>
              <?php
                    foreach($faculties as $id => $faculty){
                  ?>
                <tr>

                  <td><?=$faculty->get_faculty_id()?></td>
                  <td><?=$faculty->get_faculty_name()?></td>
                  <td><?=$faculty->get_code()?></td>
                  <td><?=$faculty->get_description()?></td>
                  <td><?=$faculty->get_skills()?></td>
                  <td><?=$faculty->get_outcomes()?></td>
                  <td><?=$faculty->get_leading_position()?></td>
                  <td>
                    <form action="get">
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
