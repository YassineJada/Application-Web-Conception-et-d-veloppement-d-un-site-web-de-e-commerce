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




        <section  class="stat">

        <table class="table table-dark table-striped" name="mainForm">
					<tr>
						<th width="40%">Produite </th>
						<th width="10%">Quantité</th>
						
						<th width="15%">Total</th>
					</tr>
					<?php
					
						foreach($cdtlign as  $cdtlign2)
						{
					?>
					<tr>
						<td><?php echo $cdtlign2[1]; ?></td>
						<td><?php echo $cdtlign2[3]; ?></td>
					</tr>
					<?php
						}
                    ?>
                    
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php   echo $cdtlign2[4] ?></td>
						<td></td>
					</tr>
					
						
    </table>
    <div align="center">
        <h2> <a href="../../example07.php?ncommand=<?php echo $_GET['commanddtid']; ?>" type="button" class="btn btn-primary"> Facture</a> </h2>
    
    </div>
        </section>

            <section class="stat">
                
            <div class="Clientinfo">
                <table class="table table-striped">
                    <tr>
                        <th>Numéro du commande : </th>
                        <th>Nome Complete :</th>
                        <th>CIN</th>
                        <th>Ville : </th>
                        <th>Adress :</th>
                        
                        <th>zipcode : </th>
                        <th>Phone number :</th>
                        <th>Email :</th>
                        <th>Paiment : </th>
                    </tr>
                    <tr>
                        <td><?php   echo $cdtlign2[0] ?></td>
                        <td><?php   echo $cdtlign2[6] ?></td>
                        <td><?php   echo $cdtlign2[10] ?></td>
                        <td><?php   echo $cdtlign2[12] ?></td>
                        <td><?php   echo $cdtlign2[7] ?></td>

                        <td><?php   echo $cdtlign2[13] ?></td>
                        <td><?php   echo $cdtlign2[9] ?></td>
                        <td><?php   echo $cdtlign2[11] ?></td>
                        <td><?php   echo $cdtlign2[8] ?></td>
                       

                    </tr>
                </table>

            </div>



            </section>
    
</body>

</html>