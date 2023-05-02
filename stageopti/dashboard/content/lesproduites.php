<!doctype html>
<html >

<head>

   
    <meta charset="UTF-8">
    <title>Produites : </title>
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
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/addprouit.css">
    <link rel="stylesheet" type="text/css" href="../css/typestyle.css">



</head>

<body>
        <?php   include("headerdash.php")    ?>


            <section class="stat">
                                                
                                <section id="prodectsection">





                                <div class="tablepro">
                                <nav class="navbar navbar-light bg-light">
                                <div class="container-fluid">
                                    <form class="d-flex" action=lesproduites.php>
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="pidpro">
                                    <button class="btn btn-outline-success" type="submit" name="Search">Search</button>
                                    </form>
                                </div>
                                </nav>
                                <div class="alert alert-success a" role="alert">
                                <p>
                                <?php

                                echo $nbr ." " .  " résultats trouvés";

                                ?>



                                </p>
                                </div>
                                <?php if($lowq != 0 ) {
                                  
                                  ?>
                                <div class="alert alert-warning" role="alert">
                                    <a href="lesproduites.php?lowq=1">  <?php echo $lowq;?> produits sont presque en rupture de stock</a>
                                </div>
                                <?php  
                                  }
                                   if($zeroq != 0 ) {
                                  
                                    
                                  ?>
                                <div class="alert alert-danger" role="alert">
                                  <a href="lesproduites.php?lowq=0"><?php  echo $zeroq; ?> produits sont Rupture de stock</a>
                                </div>
                                <?php  
                                  }
                                  ?>
                                <table class="table table-striped">
                                <tr>
                                <th scope="col">ID  :</th>
                                <th scope="col">Titre :</th>
                                <th scope="col">Catégorie :</th>
                                <th scope="col">Quantité :</th>
                                <th scope="col">discount :</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Prix A</th>
                                <th scope="col">type</th>
                                <th scope="col" columspan=2>Action</th>
                                


                                </tr>

                                <?php


                                if($nbr >0){




                                foreach($lst as $ligne  ){
                                ?>

                                <tr>
                                <td><?php   echo $ligne[0] ?></td>
                                <td><?php   echo $ligne[1] ?></td>
                                <td><?php   echo $ligne[2] ?></td>
                                <td><?php   echo $ligne[3] ?></td>
                                <td><?php   echo $ligne[4] ?></td>
                                <td><?php   echo $ligne[5] ?></td>
                                <td><?php   echo $ligne[6] ?></td>
                                <td><?php   echo $ligne[7] ?></td>
                                <td><a class="btn btn-success" href="../../single-product.php?pid=<?php echo $ligne[0]; ?>" >View </a></td>

                                <td><a class="btn btn-warning" href="lesproduites.php?nbrproduit=<?php echo $ligne[0]; ?>#prodectform" >Edite </a></td>

                                <td><a class="btn btn-danger" href="../php/deleteprocess.php?pid=<?php echo $ligne[0]; ?>">Delete</a></td>
                                

                                </tr>

                                <?php

                                }
                                }
                                ?>

                                </table>
                                <?php




                                ?>
                                </div>
                                </section>

               
            </section>
            

            <?php

                    if(isset($_GET['nbrproduit'])){
                      $pid = $_GET['nbrproduit'];

    
                      $bdd = $dao->connexion();
                  
                      $respose = $bdd->query("SELECT * FROM produit WHERE pid = $pid  ");
                     
                      $ligne = $respose->fetch();
                    
                    ?>

            <section class="stat" >
            <form id="prodectform" action="../php/editeprudect.php?pid=<?php echo $ligne[0]; ?>"  method="POST" enctype="multipart/form-data">
            <div class="form-group">
      <div class="row">
        <div class="col">
          <input type="text" class="form-control" placeholder="Titre" name="Titre" value="<?php echo $ligne[1]; ?>">
        </div>
        <div class="col">
          <input type="text" class="form-control" placeholder="description"   name="discription"  value="<?php echo $ligne[8]; ?>">
        </div>

        <div class="col">
            <input type="text" class="form-control" placeholder="type"   name="type" value="<?php echo $ligne['ptype']; ?>" required>
          </div>
      </div>
      </div>

      <div class="form-group">

      <div class="row">
        <div class="col">
            <input type="number" name="prixv" class="form-control" placeholder="Prix a vendre DH" value="<?php echo $ligne['prixV']; ?>" >
        </div>
        <div class="col">
          <input type="number" class="form-control" placeholder="prix a achat  DH"   name="prixa" value="<?php echo $ligne['prixA']; ?>" >
        </div>
        <div class="col">
          <input type="number" class="form-control" placeholder="quantité"   name="quantité"  value="<?php echo $ligne['quantité']; ?>">
        </div>
        <div class="col">
          <input type="number" class="form-control" placeholder="discount %"   name="discont" value="<?php echo $ligne['discount']; ?>" >
        </div>
        <div class="col">
          <input type="number" class="form-control" placeholder="tva %"   name="tva" value="<?php echo $ligne['tva']; ?>" >
        </div>
      </div>
      

     </div>



      <div class="row">

        <div class="col">
                <select class="form-control form-control-lg" name="Categ" required>
                    <option value="<?php echo $ligne[2]; ?>" ><?php echo $ligne[2]; ?></option>
                    <?php
                       foreach($catliste as $cate  ){
                    ?>
                    <option value="<?php echo $cate[0] ?>"><?php echo $cate[0] ?></option>

                    <?php

                    }
                    ?>
                    
                
                </select>
              </div>
    
       
        
      </div>

      <div class="row">
        <div class="col">
                <input type="file"  name="img1"  class="form-control">
        </div>
        <div class="col">
                <input type="file"  name="img2"  class="form-control">
        </div>
        <div class="col">
                <input type="file"  name="img3"  class="form-control">
        </div>

        </div>


            <div class="btngroup">

         <button  class="btn btn-primary btn-lg btn-block" type="submit" name="btn">Edité</button>

           </div>
            </form>

            </section>

            <?php

            }
            ?>
            <section class="stat" >
                
            <form id="prodectform" action="../php/addprodectpro.php"  method="POST" enctype="multipart/form-data">
            <div class="form-group">
      <div class="row">
        <div class="col">
          <input type="text" class="form-control" placeholder="Titre" name="Titre" >
        </div>
        <div class="col">
          <input type="text" class="form-control" placeholder="description"   name="discription" >
        </div>

        <div class="col">
            
            <select class="form-control form-control-lg" name="type" required>
                    <?php
                       foreach($typeliste as $type  ){
                    ?>
                    <option value="<?php echo $type[0] ?>"><?php echo $type[0] ?></option>

                    <?php

                    }
                    ?>
                    
            </select>
          </div>
      </div>
      </div>

      <div class="form-group">

      <div class="row">
        <div class="col">
            <input type="number" name="prixa" class="form-control" placeholder="Prix achat DH" >
        </div>
        <div class="col">
          <input type="number" class="form-control" placeholder="prix a vendre  DH"   name="prixv" >
        </div>
        <div class="col">
          <input type="number" class="form-control" placeholder="quantité"   name="quantité" >
        </div>
        <div class="col">
          <input type="number" class="form-control" placeholder="discount %"   name="discont" >
        </div>
        <div class="col">
          <input type="number" class="form-control" placeholder="TVA %"   name="tva" >
        </div>
      </div>

     </div>



      <div class="row">

        <div class="col">
                <select class="form-control form-control-lg" name="Categ" required>
                    <option value="Pére" >selectioné la catégorie : </option>
                    <?php
                       foreach($catliste as $cate  ){
                    ?>
                    <option value="<?php echo $cate[0] ?>"><?php echo $cate[0] ?></option>

                    <?php

                    }
                    ?>
                    
                
                </select>
              </div>
    
       
        
      </div>
      <div class="form-group">

        <div class="row">
        <div class="col">
                <input type="file"  name="prodim1"  class="form-control">
        </div>
        <div class="col">
                <input type="file"  name="prodim2"  class="form-control">
        </div>
        <div class="col">
                <input type="file"  name="prodim3"  class="form-control">
        </div>

        </div>

        </div>

            <div class="btngroup">

         <button  class="btn btn-primary btn-lg btn-block" type="submit" name="btn">Ajouté</button>
         <button  class="btn btn-secondary btn-lg btn-block" type="reset">reset value</button>

           </div>
            </form>
              
            </section>

                    
            <section class="stat" >
                        <section id="typegest">

            <form class="typedt"  method="POST" action="../php/addtype.php">
                <h3>Add Type</h3>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Type :</label>
                    <input type="text" name="ntype" class="form-control" id="exampleFormControlInput1" placeholder="Type ..." >
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Unité : </label>
                    <input type="text" name="unite" class="form-control" id="exampleFormControlInput1" placeholder="Unité .." >
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" placeholder="Description"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary" name="catbtn">Ajouté </button>


            </form>

            <aside  class="typeaside">

            <h4>Liste Type :</h4>

            <table class="table">

            <?php
            if(isset($_GET['msgt'])){
                if($_GET['msgt'] == 1) {
                    ?>
                    
                    <div class="alert alert-success" role="alert">
                    A simple success alert—check it out!
                    </div>
                    <?php 
                }else{

                ?>
                <div class="alert alert-danger" role="alert">
                A simple danger alert—check it out!
                </div>
                <?php 
            }
            }
                ?>

            <thead>

                <tr>

                    <th scope="col">Type </th>
                    <th scope="col">unité </th>

                    <th scope="col" columspan=2>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($typeliste as $typel  ){
            ?>
                  <tr>

                    <td><a href="#"><?php echo $typel[0] ?></a></td>
                    <td><a href="#"><?php echo $typel[1] ?></a></td>

                    <td><a class="btn btn-danger" href="../php/deleteprocess.php?ntype=<?php echo $typel[0]; ?>">Delete</a></td>
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