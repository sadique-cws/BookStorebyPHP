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
               <form action="" method="post" enctype="multipart/form-data">
                   <div class="mb-3">
                       <label for="">title</label>
                       <input type="text" class="form-control" name="title">
                   </div>
                   <div class="mb-3">
                       <label for="">author</label>
                       <input type="text" class="form-control" name="author">
                   </div>
                   <div class="mb-3">
                       <label for="">genres</label>
                       <select class="form-select" name="genres">
                       <?php 
                        $callinggenres = mysqli_query($connect,"select * from genres");
                        while($row = mysqli_fetch_array($callinggenres)){
                        ?>
                           <option value="<?= $row['id'];?>"><?= $row['cat_title'];?></option>
                           <?php } ?>
                       </select>
                   </div>
                   <div class="mb-3">
                       <label for="">description</label>
                       <textarea class="form-control" name="description"></textarea>
                   </div>
                   <div class="mb-3">
                       <label for="">price</label>
                       <input type="text" class="form-control" name="price">
                   </div>
                   <div class="mb-3">
                       <label for="">discount_price</label>
                       <input type="text" class="form-control" name="discount_price">
                   </div>
                   <div class="mb-3">
                       <label for="">cover</label>
                       <input type="file" class="form-control" name="cover">
                   </div>
                   <div class="mb-3">
                       <label for="">nop</label>
                       <input type="text" class="form-control" name="nop">
                   </div>
                   <div class="mb-3">
                       <label for="">isbn</label>
                       <input type="text" class="form-control" name="isbn">
                   </div>
                   <div class="mb-3">
                       <input type="submit" name="send" class="btn btn-success w-100">
                   </div>
               </form>
               <?php 
               if(isset($_POST['send'])){
                    $title = $_POST['title'];
                    $author = $_POST['author'];
                    $genre_id = $_POST['genres'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $discount_price = $_POST['discount_price'];

                    $cover = $_FILES['cover']['name'];
                    $tmp_cover = $_FILES['cover']['tmp_name'];

                    move_uploaded_file($tmp_cover,"../images/$cover");
                    $isbn = $_POST['isbn'];

                    $query = mysqli_query($connect, "insert into books (title,author,genre_id,description,cover,isbn,price,discount_price) value ('$title','$author','$genre_id','$description','$cover','$isbn','$price','$discount_price')");


                    if($query){
                        echo "success";
                    }
               }
               ?>
            </div>
        </div>
    </div>

    
</body>
</html>