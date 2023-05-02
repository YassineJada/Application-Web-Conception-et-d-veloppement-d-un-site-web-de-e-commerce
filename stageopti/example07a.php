<?php

session_start();

$commnd =  $_GET['ncommand'];
include("dtb.php");
$dao = new daoges();

$bdd = $dao->connexion();
$respose = $bdd->query("SELECT * FROM commande  NATURAL JOIN produit WHERE commande.prodpid = produit.pid AND numcomand = $commnd ");     
$info = $respose->fetch();


if(isset($_GET['ncommand'])){
    $idcommand = $_GET['ncommand'];
    $cdtlign = $dao->listecommand($idcommand);
    
}


?>

<style type="text/css">
<!--

#tabinfo{

    margin-top: 100px;
    line-height: 5mm; 
    border-collapse: collapse; 
    

}
#tabinfo tr{
    padding: 30px;
    color:grey;
    font-size:15px;
    margin-left:50px;
}
#toptable{
    width: 500px;
    line-height: 5mm; 
	 
}

#toptable tr td{
    width: 250px;
   margin-left: 30px;
}

font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
#customers{
    width: 100%;
    margin-top:100px;
}
#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}


#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
-->
</style>
<page backcolor="#FEFEFE" backimg="./res/bas_page.png" backimgx="center" backimgy="bottom" backimgw="100%" backtop="0" backbottom="30mm" footer="date;time;page" style="font-size: 12pt">
    
<page_header>
		<table id="toptable">
			<tr>
				<td>
					<img src="assets/images/logo/logogo.png" />
				</td>
				<td>
					<b>Facturé à :</b><br />
					<?php echo $info['Cfullnome']; ?><br />
					
				</td>
				<td>
					<b>Détails :</b><br />
					Date de facturation : <?php echo $info['cdate'];; ?><br />
					Numéro de facture : <?php echo $idcommand; ?>
				</td>
			</tr>
		</table>
</page_header> 


    
    <br>
    <br>
   


    <table id="tabinfo">
        
        <tr>
            <td ></td>
            <td >Client :</td>
            <td> <?php echo $info['Cfullnome']; ?></td>
        </tr>
        <tr>
            <td "></td>
            <td  ">Adresse : </td>
            <td >
            <?php echo  $info['Cadress']; ?><br>
            <?php echo  $info['Ville']; ?><br>
            <?php echo  $info['Zipcode']; ?><br>
            </td>
        </tr>
        <tr>
            <td ></td>
            <td >Email :</td>
            <td > <?php echo  $info['cemail']; ?></td>
        </tr>
        <tr>
            <td ></td>
            <td >Tel :</td>
            <td > <?php  echo  $info['Cphone']; ?></td>
        </tr>
    </table>
    <br>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left;font-size: 10pt">
        <tr>
            <td style="width:50%;"></td>
            <td style="width:50%; "> Casa Blanca, le <?php echo date('d/m/Y'); ?></td>
        </tr>
    </table>
    <br>
   
    <br>
    <br>
    Madame, Monsieur, Cher Client,<br>
    <br>
    <br>
    Nous souhaitons vous informer que votre commande Numero <b><?php echo $idcommand ?></b> est bien recu . <br>
    <br>
 


    <table align="center" cellspacing="0" id="customers">
					<tr>
						<th style="border-bottom: solid 1px black; width: 110px; height: 10px; padding: 5px;">Produite </th>
						<th style="border-bottom: solid 1px black;width: 110px; height: 10px;padding: 5px;">Quantité</th>
                        <th  style="border-bottom: solid 1px black;width: 110px; height: 10px;padding: 5px;">Price</th>
					</tr>
					<?php
                    $total = 0;
                    $totaltva= 0;
						foreach($cdtlign as  $cdtlign2)
						{
					?>
					<tr>
						<td style="border-bottom: solid 1px black; width: 50px; height: 10px; padding: 5px;"><?php echo $cdtlign2[1]; ?></td>
						<td style="border-bottom: solid 1px black; width: 50px; height: 10px; padding: 5px;"><?php echo $cdtlign2[3]; ?></td>
						<td style="border-bottom: solid 1px black; width: 50px; height: 10px; padding: 5px;"><?php echo $cdtlign2[4]; ?></td>

					</tr>

					<?php
                            $total = $total +  $cdtlign2[4] + ($cdtlign2[3] * $dao->calcultva(number_format($dao->calcultprix($cdtlign2[16],$cdtlign2[14]),2),$cdtlign2[15]));
                            $totaltva = $totaltva + $cdtlign2[3] * $cdtlign2[15];
						}
                    ?>

                    <tr>
						
                        <td align="right" colspan="3" style="width: 110px; height: 10px;padding: 5px;">TVA : <?php echo $totaltva; ?> DH</td>

					</tr>
                    
					<tr>
						<td align="right" colspan="3" style="width: 110px; height: 10px;padding: 5px;">Total : <?php   echo $total; ?> DH</td>
					</tr>
					
						
    </table>

        



        
</page>