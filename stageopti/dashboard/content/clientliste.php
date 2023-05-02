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
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/addprouit.css">
    <link rel="stylesheet" type="text/css" href="../css/typestyle.css">

</head>



<body>
        <?php   include("headerdash.php")    ?>



        <section class="stat">
               

               <div class="container">
           <br />
           <h3 align="center">Exporter des données de tous les clients  vers Excel</h3>
           <br />
       <div class="panel panel-default">
         <div class="panel-heading">
           <form method="post" action="../php_spreadsheet_export.php">
             <div class="row">
               <div class="col-md-6">Les clients  : </div>
               <div class="col-md-4">
                 <select name="file_type" class="form-control input-sm">
                   <option value="Xlsx">Xlsx</option>
                   <option value="Xls">Xls</option>
                   <option value="Csv">Csv</option>
                 </select>
               </div>
               <div class="col-md-2">
                 <input type="submit" name="exportclient" class="btn btn-primary btn-sm" value="export" />
               </div>
             </div>
           </form>
         </div>
         
       </div>
       </div>
       </section>


            <section class="stat">

                    <nav class="navbar navbar-light bg-light">
                                <div class="container-fluid">
                                    <form class="d-flex" action=clientliste.php>
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="cuser">
                                    <button class="btn btn-outline-success" type="submit" name="Searchcl">Search</button>
                                    </form>
                                </div>
                    </nav>

            <div class="Clientinfo">
            
                <table class="table table-striped">
                    <tr>
                        <th>USername </th>
                        <th>Nome Complete :</th>
                        <th>CIN</th>
                        <th>Ville : </th>
                        <th>Adress :</th>
                        
                        <th>zipcode : </th>
                        <th>Phone number :</th>
                        <th>Email :</th>
                        <th>Nombre commande :</th>
                       
                    </tr>

                    <?php
                    if($clientlst != NULL){

                         foreach($clientlst as $client  ){
                    ?>

                    <tr>
                    <td><?php   echo $client[0] ?></td>
                        <td><?php   echo $client[3] ?></td>
                        <td><?php   echo $client[7] ?></td>
                        <td><?php   echo $client[5] ?></td>
                        <td><?php   echo $client[4] ?></td>
                        <td><?php   echo $client[6] ?></td>

                        <td><?php   echo $client[8] ?></td>
                        <td><?php   echo $client[2] ?></td>
                        
                        <td><?php   echo $dao->nbcommand($client[2]); ?></td>

                    </tr>

                    <?php

                        }
                    }
                    ?>
                </table>

            </div>



            </section>
    
</body>

</html>