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
    <link rel="stylesheet" href="css/dashboard.css">

</head>

<body>
        <?php   include("content/headerdash2.php");  ?>

    
        
        <section class="stat">

        <div class="container">
    		<br />
    		<h3 align="center">Importer les produits à partir d'un fichier Excel ou CSV</h3>
    		<br />
        <div class="panel panel-default">
          <div class="panel-heading"></div>
          <div class="panel-body">
        		<div class="table-responsive">
        			<span id="message"></span>
              <form method="post" id="import_excel_form" enctype="multipart/form-data">
                <table class="table">
                  <tr>
                    <td width="25%" align="right">Select Excel File</td>
                    <td width="50%"><input type="file" name="import_excel" /></td>
                    <td width="25%"><input type="submit" name="import" id="import" class="btn btn-primary" value="Import" /></td>
                  </tr>
                </table>
              </form>
              <div align="center">
                    <a href="sample_data.xlsx">Telechargé exemple Exel</a>
              
              </div>
    	    		<br />
              
        		</div>
          </div>
        </div>
    	</div>
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

        </section>
        <script>
                $(document).ready(function(){
                $('#import_excel_form').on('submit', function(event){
                    event.preventDefault();
                    $.ajax({
                    url:"import.php",
                    method:"POST",
                    data:new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    beforeSend:function(){
                        $('#import').attr('disabled', 'disabled');
                        $('#import').val('Importing...');
                    },
                    success:function(data)
                    {
                        $('#message').html(data);
                        $('#import_excel_form')[0].reset();
                        $('#import').attr('disabled', false);
                        $('#import').val('Import');
                    }
                    })
                });
                });
        </script>

                <section class="stat">
               

                <div class="container">
    		<br />
    		<h3 align="center">Exporter des données de tous les produits vers Excel</h3>
    		<br />
        <div class="panel panel-default">
          <div class="panel-heading">
            <form method="post" action="php_spreadsheet_export.php">
              <div class="row">
                <div class="col-md-6">produits : </div>
                <div class="col-md-4">
                  <select name="file_type" class="form-control input-sm">
                    <option value="Xlsx">Xlsx</option>
                    <option value="Xls">Xls</option>
                    <option value="Csv">Csv</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <input type="submit" name="export" class="btn btn-primary btn-sm" value="Export" />
                </div>
              </div>
            </form>
          </div>
          <div class="panel-body">
        		<div class="table-responsive">
        		
        		</div>
          </div>
        </div>
    	</div>

                </section>

    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


            <section class="stat">

            <div class="zonetitle">
            <h2>Les statistiques des ventes</h2>
            </div>
                

                 <div class="Zone">
                     <div class="stbox totals b">
                         <div class="boxtitle">
                             <h3>Total :</h3>
                         </div>
                         <div class="data ">
                             <h3><?php echo $dao->allperday(""); ?>  DH </h3>
                         </div>
                     </div>

                     <div class="stbox totalsrev b">
                         
                     <div class="boxtitle">
                             <h3>Revenus  :</h3>
                         </div>
                         <div class="data">
                             <h3>+<?php echo $dao->revenusnet("total","any"); ?>DH </h3>
                         </div>
                     </div>

                     <div class="stbox nbrpros b">

                     <div class="boxtitle">
                             <h3>Commandes :</h3>
                         </div>
                         <div class="data">
                             <h3><?php echo $dao->nbcommandparstat("Expédié"); ?> </h3>
                         </div>
                     </div>


                     <div class="stbox todayrev a" >
                         <div class="boxtitle">
                             <h3>Aujourd'hui :</h3>
                         </div>
                         <div class="data">
                             <h3><?php echo $dao->revenusnet("day",$dao->today()); ?> DH </h3>
                         </div>
                     </div>


                     <div class="stbox thismounthrev a">
                     <div class="boxtitle">
                             <h3>ce mois :</h3>
                         </div>
                         <div class="data">
                             <h3><?php echo $dao->revenusnet("month",date("m")); ?> DH </h3>
                         </div>
                     </div>


                     <div class="stbox thisyearrev a"> 
                         <div class="boxtitle">
                             <h3>cette annes :</h3>
                         </div>
                         <div class="data">
                             <h3><?php echo $dao->revenusnet("year",date("Y")); ?> DH </h3>
                         </div>
                        </div>

                   
                 </div>
               
            </section>

            <section class="stat" >
            <div class="zonetitle">
            <h2>stock information :</h2>
            </div>

                 <div class="Zone">
                     <div class="stbox a"> 
                     <div class="boxtitle">
                          <h3>Produites:</h3>
                     </div>
                     <div class="data">
                          <h3><?php echo $nbprud; ?> </h3>
                     </div> 
                    </div>
                     <div class="stbox a"> 
                     <div class="boxtitle">
                          <h3>Catégorie:</h3>
                     </div>
                     <div class="data">
                          <h3><?php echo $nbrcat; ?> </h3>
                     </div>
                     </div>
                     <div class="stbox a"> 
                     <div class="boxtitle">
                          <h3>Commandes:</h3>
                     </div>
                     <div class="data">
                          <h3><?php echo $nbrcommande; ?> </h3>
                     </div>
                     </div>
                     
                 </div>
               
            </section >


            <section class="stat">
            <div class="zonetitle">
            <h2>Les commandes :</h2>
            </div>
              <div class="Zone">
                        <div class="stbox totals b">
                            <div class="boxtitle">
                                <h3>Commande    :</h3>
                            </div>
                            <div class="data ">
                                <h3><?php $nbrenatt = $dao->nbcommandparstat("En Attendre"); echo $nbrenatt; ?> </h3>
                            </div>
                        </div>

                        <div class="stbox totals b">
                            <div class="boxtitle">
                                <h3>Expédié :</h3>
                            </div>
                            <div class="data ">
                                <h3><?php echo $dao->nbcommandparstat("Expédié"); ?> </h3>
                            </div>
                        </div>

                        <div class="stbox totals b">
                            <div class="boxtitle">
                                <h3>Annulé :</h3>
                            </div>
                            <div class="data ">
                                <h3><?php echo $dao->nbcommandparstat("annulé"); ?></h3>
                            </div>
                        </div>
              </div>
                 
            </section>


        </div>



</section>
    
</body>

</html>