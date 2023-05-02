<!doctype html>
<html >

<head>

   
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
    <link rel="stylesheet" href="../css/dashboard.css">

</head>

<body>
        <?php   include("headerdash.php")    ?>


            <section class="stat">
                

                                            

                    <div id="commandsect">





                    <div class="commandtable">
                    <nav class="navbar navbar-light bg-light">


                    <div class="filter">

                    <a class="btn btn-info" href="lescommandes.php?cstatus=En attendre	" >En Attendre </a>
                    <a class="btn btn-success" href="lescommandes.php?cstatus=Expédié" >Expédié </a>
                    <a class="btn btn-dark" href="lescommandes.php?cstatus=annulé" >annulé </a>
                    

                    </div>

                    <div class="container-fluid">
                        <form class="d-flex" action=lescommandes.php>
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="commandnum">
                        <button class="btn btn-outline-success" type="submit" name="commandSearch">Search</button>
                        </form>
                    </div>
                    </nav>
                    <div class="alert alert-success a" role="alert">
                    <p>
                    <?php

                    echo $nbrC ." " .  " Commande trouvés";
                    ?>

                    </p>
                    </div>


                    <table class="table table-hover">
                    <tr>
                    <th scope="col">Num  :</th>
                    <th scope="col">Produit :</th>
                    <th scope="col">Date :</th>
                    <th scope="col">Quantité :</th>
                    <th scope="col">Prix :</th>
                    <th scope="col">Satus :</th>
                    <th scope="col">Nom Client :</th>
                    
                    <th scope="col" columnspan =2>Action</th>
                    


                    </tr>

                    <?php


                    if($nbrC > 0){




                    foreach($lst2 as $ligne2  ){
                    ?>

                    <tr>
                    <td><?php   echo $ligne2[0] ?></td>
                    <td><?php   echo $ligne2[1] ?></td>
                    <td><?php   echo $ligne2[2] ?></td>
                    <td><?php   echo $ligne2[3] ?></td>
                    <td><?php   echo $ligne2[4] ?></td>
                    <td><?php   echo $ligne2[5] ?></td>
                    <td><?php   echo $ligne2[6] ?></td>

                    <?php   
                    if($ligne2[5] == 'En Attendre') {
                        
                    ?>
                        <td><a class="btn btn-success" href="../php/commandprocess.php?action=v&ncommand=<?php echo $ligne2[0]; ?>" >Expédié </a></td>
                        <td><a class="btn btn-dark" href="../php/commandprocess.php?action=c&ncommand=<?php echo $ligne2[0]; ?>" >annulé </a></td>
                    <?php   
                    } 
                    ?>
                    


                    <td><a class="btn btn-info" href="comanddt.php?commanddtid=<?php echo $ligne2[0]; ?>" >detail </a></td>

                    <td><a class="btn btn-danger" href="../php/commandprocess.php?action=s&ncommand=<?php echo $ligne2[0]; ?>">supprimé</a></td>
                    <?php
                    if($ligne2[5] == 'Expédié') {
                        
                        ?>
                            <td><a class="btn btn-success" href="../php/commandprocess.php?action=a&ncommand=<?php echo $ligne2[0]; ?>" >Retour </a></td>
                        <?php   
                        } 
                        ?>

                    </tr>

                    <?php

                    }
                    }
                    ?>

                    </table>
                    <?php




                    ?>
                    </div>
                    </div>

               
            </section>

            <section class="stat" >
                

              
            </section>


        </div>



</section>
    
</body>

</html>