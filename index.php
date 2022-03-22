<?php include "dbConfig.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php include "header.php";?>

    <div class="container mt-3">
        <div class="row">
            <div class="col-3">
                <div class="list-group">
                    <div class="list-group-item list-group-item-action">Drama</div>
                    <div class="list-group-item list-group-item-action">Fiction</div>
                    <div class="list-group-item list-group-item-action">Crime</div>
                    <div class="list-group-item list-group-item-action">Technology</div>
                    <div class="list-group-item list-group-item-action">Romance</div>
                    <div class="list-group-item list-group-item-action">Academic</div>
                    <div class="list-group-item list-group-item-action">Health & diets</div>
                    <div class="list-group-item list-group-item-action">Cooking</div>
                    <div class="list-group-item list-group-item-action">Beauty</div>
                </div>
            </div>
            <div class="col-9">
                <div class="row">
                    <div class="col-3">
                        <div class="card">
                            <img src="" class="w-100" style="object-fit:cover;height:200px" alt="">
                            <div class="card-body">
                                <h5>Fundamental of Programming</h5>
                                <h4 class="h6 text-primary">Rs. 500/- <del>6000/-</del></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>