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
              <table class="table">
                  <tr>
                      <th>id</th>
                      <th>title</th>
                      <th>author</th>
                      <th>Price</th>
                      <th>ISBN</th>
                      <th>Genres</th>
                      <th>Action</th>
                  </tr>
                  <?php 
                  $callingBooks = mysqli_query($connect,"select * from books");
                  while($row = mysqli_fetch_array($callingBooks)){
                ?>

                <tr>
                    <td><?= $row['id'];?></td>
                    <td><?= $row['title'];?></td>
                    <td><?= $row['author'];?></td>
                    <td><?= $row['price'];?></td>
                    <td><?= $row['isbn'];?></td>
                    <td><?= $row['genre_id'];?></td>
                    <td>
                        <a href="?del=<?= $row['id'];?>" class="btn btn-danger">X</a>
                        <a href="" class="btn btn-info">edit</a>
                        <a href="" class="btn btn-success">View</a>
                    </td>
                </tr>

            <?php } ?>
              </table>
            </div>
        </div>
    </div>

    
</body>
</html>
<?php 
if(isset($_GET['del'])){
    $del = $_GET['del'];
    $query = mysqli_query($connect,"delete from books where id='$del'");
    echo "<script>window.open('manageBooks.php','_self')</script>";
}
?>