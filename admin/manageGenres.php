<?php include "../dbConfig.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | book store</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php include "include/header.php";?>

    <div class="container mt-3">
        <div class="row">
            <div class="col-3">
               <div class="list-group">
                   <a href="index.php" class="list-group-item list-group-item-action">Dashboard</a>
                   <a href="manageGenres.php" class="list-group-item list-group-item-action">Manage Genres</a>
                   <a href="manageBooks.php" class="list-group-item list-group-item-action">Manage Books</a>
                   <a href="../logout.php" class="list-group-item list-group-item-action">logout</a>
               </div>
            </div>
            <div class="col-9">
                <div class="row">
                    <div class="col-8">
                        <h4>Manage Books</h4>
                    </div>
                    <div class="col-4">
                        <a href="insertBook.php" class="btn btn-success float-end">Add Book</a>
                    </div>
                </div>
              <div class="row">
                  <div class="col-9">
                  <table class="table">
                  <tr>
                      <th>id</th>
                      <th>title</th>
                      <th>Action</th>
                  </tr>
                  <?php 
                  $callinggenres = mysqli_query($connect,"select * from genres");
                  while($row = mysqli_fetch_array($callinggenres)){
                ?>

                <tr>
                    <td><?= $row['id'];?></td>
                    <td><?= $row['cat_title'];?></td>
                    <td>
                        <a href="?del=<?= $row['id'];?>" class="btn btn-danger">X</a>
                        <a href="" class="btn btn-info">edit</a>
                        <a href="" class="btn btn-success">View</a>
                    </td>
                </tr>

            <?php } ?>
              </table>
                  </div>
                  <div class="col-3">
                      <div class="card">
                          <div class="card-body">
                              <h5>Insert Genre</h5>
                              <form action="" method="post">
                                  <div class="mb-3">
                                      <label for="">title</label>
                                      <input type="text" name="cat_title" class="form-control">
                                  </div>
                                  <div class="mb-3">
                                      <input type="submit" name="send" class="btn btn-danger w-100">
                                  </div>
                              </form>
                              <?php 
                              if(isset($_POST['send'])){
                                    $cat_title = $_POST['cat_title'];

                                    $query = mysqli_query($connect,"insert into genres (cat_title) value ('$cat_title')");

                                    if($query){
                                        echo "<script>window.open('manageGenres.php','_self')</script>";
                                    }
                              }
                              ?>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>

    
</body>
</html>
<?php 
if(isset($_GET['del'])){
    $del = $_GET['del'];
    $query = mysqli_query($connect,"delete from genres where id='$del'");
    echo "<script>window.open('manageGenres.php','_self')</script>";
}
?>