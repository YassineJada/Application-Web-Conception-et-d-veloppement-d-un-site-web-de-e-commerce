<!doctype html>
<html >

<head>

<title>Catégories : </title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/dashboard.css">

    <script src="https://kit.fontawesome.com/4cd5ad855e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/addcate.css">

    <link rel="stylesheet" href="../css/dashboard.css">

</head>

<body>
        <?php   include("headerdash.php")    ?>

            <hr>
            <hr>

            <section class="stat">
                
            <section id="categorieges">

<form class="addcat"  method="POST" action="../php/addcatégorie.php" enctype="multipart/form-data">
    <h3>Add Catégorie</h3>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nom Catégorie</label>
        <input type="text" name="nomecate" class="form-control" id="exampleFormControlInput1" placeholder="food ...." >
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3" ></textarea>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">catégorie image </label>
        <input class="form-control" type="file" name="imagepath" id="formFile" >
    </div>
    <button type="submit" class="btn btn-primary" name="catbtn">Ajouté </button>


</form>

<aside class="listecatégories">

<h4>Liste Catégories :</h4>

<table class="table">
<thead>
    <tr>

         <th scope="col">First</th>
         <th scope="col" columspan=2>Action</th>
    </tr>
</thead>
<tbody>
<?php
     foreach($catliste as $cate  ){
 ?>
      <tr>

         <td><a href="#"><?php echo $cate[0] ?></a></td>
         <td><a class="btn btn-danger" href="../php/deleteprocess.php?nomcat=<?php echo $cate[0]; ?>">Delete</a></td>
      </tr>

<?php

 }
?>

</tbody>
</table>



</aside>
</section>

                
               
            </section>

            


        </div>



</section>
    
</body>

</html>