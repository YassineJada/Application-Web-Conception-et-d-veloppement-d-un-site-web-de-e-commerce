<?php


class daoges{
    function __construct(){

    }

    function connexion(){
        $sqldt = new PDO('mysql:host=localhost;dbname=ecommestg','root','toor');
		return $sqldt;
    }
    
    function today(){
        return date("Y-m-d");
    }

    function todaytime(){
        return date("h:i:s");
}

    function returndateby($nbr){
        return date('d.m.Y',strtotime("$nbr days"));
    }


    //gestion client 

    function insertclient($user, $password, $email, $nomc, $adress, $ville, $codepostal, $cin, $tele){
        $bdd = $this->connexion();
        $log = $bdd->query("INSERT INTO tclient values ( '$user', '$password', '$email', '$nomc', '$adress', '$ville', '$codepostal', '$cin', '$tele')");
        echo "INSERT INTO tclient values ( '$user', '$password', '$email', '$nomc', '$adress', '$ville', '$codepostal', '$cin', '$tele')";
    }
    

    function lofincltrait($login,$password){
        $bdd = $this->connexion();
        $log = $bdd->query("SELECT * FROM tclient WHERE cuser = '$login'");
	    $admin = $log->fetch();
     if($log->rowCount() > 0){
 
       if($admin["cuser"] == $login && $admin["cpassword"]== $password){
       
       return 1;


       }else{
        
        return 0;
       }


    }else{
         return 0;
    }
    }

    function returnclientinfo($user){
        $bdd = $this->connexion();
        $log = $bdd->query("SELECT * FROM tclient WHERE cuser = '$user'");
        

        while($ligne= $log->fetch()){
                
            $liste[]=[$ligne['cuser'],$ligne['cpassword'],$ligne['email'],$ligne['nomc'],$ligne['adress'],$ligne['ville'],$ligne['codepostal'],$ligne['cin'],$ligne['tele']];
            
            }

        return $liste;

    }

    function updateclient($user, $password, $email, $nomc, $adress, $ville, $codepostal, $cin, $tele){
        $bdd = $this->connexion();
        $log = $bdd->query("UPDATE tclient SET cuser = '$user', cpassword = '$password', email = '$email', nomc = '$nomc', adress = '$adress', ville = '$ville', codepostal = '$codepostal', cin ='$cin', tele = '$tele' WHERE cuser = '$user'");
        echo "UPDATE tclient SET cuser = '$user', cpassword = '$password', email = '$email', nomc = '$nomc', adress = '$adress', ville = '$ville', codepostal = '$codepostal', cin ='$cin', tele = '$tele' WHERE cuser = '$user'";
    }

    function deleteclient($user){
        $bdd = $this->connexion();
        $log = $bdd->query("DELETE FROM tclient WHERE cuser = '$user'");
    }
    // login system 

    function adminlogin($login,$password){
		$bdd = $this->connexion();
        $log = $bdd->query("SELECT * FROM administration WHERE user = '$login'");
	    $admin = $log->fetch();
     if($log->rowCount() > 0){
 
       if($admin["user"] == $login && $admin["password"]== $password){
       
       return 1;


       }else{
        
        return 0;
       }


    }else{
         return 0;
    }


    }
    function deleteadm($usernam){
        $bdd = $this->connexion();
        $respose = $bdd->query("DELETE FROM administration WHERE user = '$usernam' ");

    }

    function insertadm($fullname,$password,$email,$user,$type){
        $bdd = $this->connexion();
        $respose = $bdd->query("INSERT INTO administration VALUES ('$user','$password','$email','$fullname','$type')");

    }

    function alladminstration($user){
        $bdd = $this->connexion();
        if($user!=""){
            $respose = $bdd->query("SELECT * FROM administration WHERE user = '$user'");

            while($ligne= $respose->fetch()){
                
                $liste[]=[$ligne['user'],$ligne['Email'],$ligne['FullNom'],$ligne['type']];
            }


        }else{

       
        $respose = $bdd->query("SELECT * FROM administration");

        while($ligne= $respose->fetch()){
            
            $liste[]=[$ligne['user'],$ligne['Email'],$ligne['FullNom'],$ligne['type']];
        }
        }   
        return $liste;

    }

    //command gestion 

    function checkquantitéprod($prodpid,$pquantité){
        $bdd = $this->connexion();
        $respose = $bdd->query("SELECT * FROM produit WHERE pid = $prodpid");
        $ligne = $respose->fetch();
        if($pquantité > $ligne['quantité']  ){
            return 0;
        }else{
            return 1;
        }
    }
    function changeproquan($prodpid,$pquantité){
        $bdd = $this->connexion();
        $respose = $bdd->query("SELECT * FROM produit WHERE pid = $prodpid");
        $ligne = $respose->fetch();
        $prodquan = $ligne['quantité'];
        $newq = $prodquan - $pquantité;

        //echo 'new quntité '.$newq;
        $respose = $bdd->query("UPDATE  produit SET quantité = $newq WHERE pid = $prodpid");
        //echo "\n UPDATE  produit SET quantité = $newq WHERE pid = $prodpid";
    }



    function addcommande($numcomand,$prodpid,$pquantité,$prix,$Cfullnome,$Cadress,$cPmode,$Cphone,$CIN,$emailad,$ville,$zipcode,$time){
        $bdd = $this->connexion();
        $dt = $this->today();
        

        if($this->checkquantitéprod($prodpid,$pquantité) == 1 ){
            $respose = $bdd->query("INSERT INTO commande Values ($numcomand,$prodpid,'$dt','$time',$pquantité,$prix,'En Attendre','$Cfullnome','$ville','$Cadress',$zipcode,'$cPmode','$Cphone','$CIN','$emailad') "); 
            //echo "INSERT INTO commande Values ($numcomand,$prodpid,'$dt','$time',$pquantité,$prix,NULL,'$Cfullnome','$ville','$Cadress',$zipcode,'$cPmode','$Cphone','$CIN','$emailad') ";
            $this->changeproquan($prodpid,$pquantité);
            return 1;
        }else{
            return 0 ; 
        }


    }


    function nombrecommande($nomc){
        $bdd = $this->connexion();
        if($nomc==""){
            $respose = $bdd->query("SELECT DISTINCT numcomand FROM commande ");
            return $respose->rowCount();
        }else{
            $respose = $bdd->query("SELECT * FROM commande WHERE numcomand = '$nomc' ");
            return $respose->rowCount();
        }
        
    }



    function nbcommandparstat($etat){
        $bdd = $this->connexion();

        $respose = $bdd->query("SELECT * FROM commande  WHERE  cstatus = '$etat'");
        return $respose->rowCount();

    }

    function listecommandesparstat($etat){
        

            $respose = $bdd->query("SELECT * FROM commande  NATURAL JOIN produit WHERE commande.prodpid = produit.pid AND commande.cstatus = '$etat' ");

            while($ligne= $respose->fetch()){
                $liste[]=[$ligne['numcomand'],$ligne['ptitre'],$ligne['cdate'],$ligne['pquantité'],$ligne['prix'],$ligne['cstatus'],$ligne['Cfullnome'],$ligne['Cadress'],$ligne['cPmode'],$ligne['Cphone'],$ligne['CIN']];
            }

            return $liste;

        
        
    }

    function listeparetat($etat){
        $bdd = $this->connexion();
        $respose = $bdd->query("SELECT * FROM commande  NATURAL JOIN produit WHERE commande.prodpid = produit.pid AND commande.cstatus = '$etat' ");

        while($ligne= $respose->fetch()){
            $liste[]=[$ligne['numcomand'],$ligne['ptitre'],$ligne['cdate'],$ligne['pquantité'],$ligne['prix'],$ligne['cstatus'],$ligne['Cfullnome'],$ligne['Cadress'],$ligne['cPmode'],$ligne['Cphone'],$ligne['CIN']];
        }

        return $liste;
    }

    function listecommand($numcomm){
        $bdd = $this->connexion();
        if($numcomm==""){

            $respose = $bdd->query("SELECT * FROM commande  NATURAL JOIN produit WHERE commande.prodpid = produit.pid ");

            while($ligne= $respose->fetch()){
                $liste[]=[$ligne['numcomand'],$ligne['ptitre'],$ligne['cdate'],$ligne['pquantité'],$ligne['prix'],$ligne['cstatus'],$ligne['Cfullnome'],$ligne['Cadress'],$ligne['cPmode'],$ligne['Cphone'],$ligne['CIN']];
            }

            return $liste;

        }else{
            $respose = $bdd->query("SELECT * FROM commande  NATURAL JOIN produit WHERE commande.prodpid = produit.pid AND numcomand = $numcomm ");     
            while($ligne= $respose->fetch()){
                $liste[]=[$ligne['numcomand'],$ligne['ptitre'],$ligne['cdate'],$ligne['pquantité'],$ligne['prix'],$ligne['cstatus'],$ligne['Cfullnome'],$ligne['Cadress'],$ligne['cPmode'],$ligne['Cphone'],$ligne['CIN'],$ligne['cemail'],$ligne['Ville'],$ligne['Zipcode'],$ligne['discount'],$ligne['tva'],$ligne['prixV']];
            }
            return $liste;
        }
        



    }

    function listepersatatus($status){
        $bdd = $this->connexion();
        $respose = $bdd->query("SELECT * FROM  commande WHERE cstatus = $status  ");
        while($ligne= $respose->fetch()){
            $liste[]=[$ligne['numcomand'],$ligne['ptitre'],$ligne['cdate'],$ligne['pquantité'],$ligne['prix'],$ligne['cstatus'],$ligne['Cfullnome'],$ligne['Cadress'],$ligne['cPmode'],$ligne['Cphone'],$ligne['CIN']];
        }
        return $liste;
    }


    function Expédié($numcommand){
        $bdd = $this->connexion();
        $respose = $bdd->query("UPDATE  commande  SET cstatus ='Expédié' WHERE numcomand = $numcommand ");
        echo "UPDATE commande  SET cstatus ='Expédié' WHERE numcomand = $numcommand";

    }

    function annulé($numcomand){
        $bdd = $this->connexion();
        $respose = $bdd->query("UPDATE  commande  SET cstatus ='annulé' WHERE numcomand = $numcomand  ");
        echo "UPDATE  commande  SET cstatus ='annulé' WHERE numcomand = $numcomand ";
    }

    function cancel($numcomand){
        $bdd = $this->connexion();
        $respose = $bdd->query("DELETE FROM  commande  WHERE numcomand = $numcomand  ");
        echo "DELETE FROM  commande  WHERE numcomand = $numcomand  ";

    }
    // gestion type 
 
    function slecttype(){
           $bdd = $this->connexion();
           $respose = $bdd->query("SELECT * FROM typeproduite ");

            while($ligne= $respose->fetch()){
                $liste[]=[$ligne['ntype'],$ligne['unite'],$ligne['description']];
            }

            return $liste;
    }

    function addtype($ntype , $unite , $description){
        $bdd = $this->connexion();
        $respose = $bdd->query("INSERT INTO typeproduite VALUES('$ntype','$unite','$description')");


    }

    function returnunite($ntype){
        $bdd = $this->connexion();
        $respose = $bdd->query("SELECT * FROM typeproduite WHERE ntype='$ntype'");
       // echo "SELECT * FROM typeproduite WHERE ntype='$ntype'";

        while($ligne= $respose->fetch()){
            $liste[]=[$ligne['unite']];
        }

        return $liste;
    }

    function deletetype($ntype){
        $bdd = $this->connexion();
        $respose = $bdd->query("DELETE FROM typeproduite WHERE ntype='$ntype'");
        // echo "DELETE FROM typeproduite WHERE ntype='$ntype'";
    }

    //prudect gestion 
    function calcultva($prix , $tva){
        $rs = $prix * $tva / 100;
        return $rs;
    }
    
    function nombreprudect($pid){
        $bdd = $this->connexion();

        if($pid==""){
            $respose = $bdd->query("SELECT * FROM produit ");
        }else{
            $respose = $bdd->query("SELECT * FROM produit WHERE pid =$pid");
        }
        return $respose->rowCount();
    }

    function addprude($ptitre,$pcategorie,$quantité,$discount,$prixV,$prixA,$ptype,$desci){
        $bdd = $this->connexion();
        $respose = $bdd->query("INSERT INTO produit Values (NULL,'$ptitre','$pcategorie',$quantité,$discount,$prixV,$prixA,'$ptype','$desci') ");
        echo "INSERT INTO produit Values (NULL,'$ptitre','$pcategorie',$quantité,$discount,$prixV,$prixA,'$ptype','$desci')"; 
    }

    function deleteprude($pid){
        $bdd = $this->connexion();
        
        $respose1 = $bdd->query("DELETE FROM produit WHERE pid = $pid"); 


    }

    function updateproduite($pid,$ptitre,$pcategorie,$quantité,$discount,$prixV,$prixA,$ptype,$desci){
        $bdd = $this->connexion();
        $respose = $bdd->query("UPDATE produit SET ptitre = '$ptitre' , pcategorie = '$pcategorie' , quantité='$quantité',discount='$discount', prixV= $prixV , prixA= $prixA , ptype = '$ptype' ,desci='$desci' WHERE pid = '$pid'");
        echo "UPDATE produit SET ptitre = '$ptitre' , pcategorie = '$pcategorie' , quantité='$quantité',discount='$discount', prixV= $prixV , prixA= $prixA , ptype = '$ptype' ,desci='$desci' WHERE pid = '$pid'";
    }

    function listeprudect($pid){
        $bdd = $this->connexion(); 
        
        if($pid == ""){
            $respose = $bdd->query("SELECT * FROM produit  ");

            while($ligne= $respose->fetch()){
                $liste[]=[$ligne['pid'],$ligne['ptitre'],$ligne['pcategorie'],$ligne['quantité'],$ligne['discount'],$ligne['prixV'],$ligne['prixA'],$ligne['ptype'],$ligne['desci']];
            }

            return $liste;


        }else{
            $respose = $bdd->query("SELECT * FROM produit WHERE pid = $pid  ");

            while($ligne= $respose->fetch()){
                $liste[]=[$ligne['pid'],$ligne['ptitre'],$ligne['pcategorie'],$ligne['quantité'],$ligne['discount'],$ligne['prixV'],$ligne['prixA'],$ligne['ptype'],$ligne['desci']];
            }

            return $liste;

        }
    }

    function iserpruduitimages($ptitre , $dest1, $dest2,$de3){
        $bdd = $this->connexion(); 
        $respose2 = $bdd->query("SELECT * FROM produit WHERE ptitre = '$ptitre'  ");
        $ligh = $respose2->fetch();
        $pid = $ligh['pid'];
        $respose = $bdd->query("INSERT INTO prodimages VALUES ($pid , '$dest1' , '$dest2' ,'$de3')  ");
        echo "INSERT INTO prodimages VALUES ($pid , '$dest1' , '$dest2' ,'$de3') ";

    }

    function iserpruduitimages2($pid , $dest1, $dest2,$de3){
        $bdd = $this->connexion(); 
        $respose = $bdd->query("INSERT INTO prodimages VALUES ($pid , '$dest1' , '$dest2' ,'$de3')  ");

    }



    function calcultprix($oldprix , $coupon){
        $newprix = $oldprix - ($oldprix * $coupon / 100) ;

        return $newprix;  
    }

//    gestion catégorie
    function nombrecat(){
        $bdd = $this->connexion();
        $respose = $bdd->query("SELECT * FROM catégorie  ");
        return $respose->rowCount();
    }

    function addcate($nomcat , $des,$image){
        $bdd = $this->connexion();
        echo "INSERT INTO catégorie VALUES ('$nomcat','$des','$image')";

        $respose = $bdd->query("INSERT INTO catégorie VALUES ('$nomcat','$des','$image') "); 

    }

    


    function deletecat($nomcat){
        $bdd = $this->connexion();
        $respose = $bdd->query("DELETE FROM catégorie WHERE Ncatégorie = '$nomcat' "); 
    }

    function listecat(){
        $bdd = $this->connexion();
        $respose = $bdd->query("SELECT * FROM catégorie ");
        
        while($ligne= $respose->fetch()){
            $nomcat = $ligne['Ncatégorie'];
            $response2 = $bdd->query("SELECT * FROM produit WHERE pcategorie ='$nomcat' ");
           # echo "SELECT * FROM produit WHERE pcategorie ='$nomcat'";
            $nbprd = $response2->rowCount();
            $liste[]=[$ligne['Ncatégorie'],$ligne['desci'],$ligne['cimage'],$nbprd];
        }
        return $liste;
    }

    


    // administration gestion
    
    function nombreadmin(){
        $bdd = $this->connexion();
        $respose = $bdd->query("SELECT * FROM administration  ");
        return $respose->rowCount();
    }
    function alladmin(){
        $bdd = $this->connexion();
        $respose = $bdd->query("SELECT * FROM administration ");
        while($ligne= $respose->fetch()){
            $liste[]=[$ligne['user'],$ligne['password'],$ligne['Email'],$ligne['FullNom'],$ligne['photo']];
        }
        return $ligne;
    }
    function insertadmin($user,$password,$email,$fullname,$image){

        $bdd = $this->connexion();
        $respose = $bdd->query("INSERT INTO administration VALUES ('$user','$password','$email','$fullname,'$image');");
    }

    function deletadmin($user){
        $bdd = $this->connexion();
        $respose = $bdd->query("DELETE FROM administration WHERE user = '$user'");
    }

    




// dashboard data
function allperday($dt){
    $bdd = $this->connexion();

    if($dt==""){
        $respose = $bdd->query("SELECT sum(prix) AS sump FROM commande WHERE cstatus ='Expédié'");
        $ligne= $respose->fetch();
        return round($ligne['sump'], 2);
    }else{
        
        $respose = $bdd->query("SELECT sum(prix) AS sump FROM commande WHERE cdate = '$dt' AND cstatus = 'Expédié' ");
        $ligne= $respose->fetch();
        return round($ligne['sump'], 2);
    }
}

function commp($dt){
    $bdd = $this->connexion();

    $respose = $bdd->query("SELECT sum(prix) AS sump FROM commande WHERE cdate >= '$dt' AND  cstatus ='Expédié'");
    $ligne= $respose->fetch();
    return round($ligne['sump'], 2);

}


function selectperdy($dt){
    $bdd = $this->connexion();

    $respose = $bdd->query("SELECT DISTINCT numcomand FROM commande WHERE cdate = '$dt'");
        
    return $respose->rowCount();

}
function revenusnet($what,$dt){
    $bdd = $this->connexion();

    if($what == "total"){
        $respose = $bdd->query("SELECT sum(prix-(pquantité*prixA)) AS sump FROM commande natural join produit WHERE commande.prodpid = produit.pid AND cstatus = 'Expédié' ");
        $ligne= $respose->fetch();
        return round($ligne['sump'], 2);
    }
    
    if($what == "day"){
        $respose = $bdd->query("SELECT sum(prix-(pquantité*prixA)) AS sump FROM commande natural join produit WHERE commande.prodpid = produit.pid AND cstatus = 'Expédié' AND cdate = '$dt' ");
        $ligne= $respose->fetch();
        //echo "SELECT sum(prix-(pquantité*prixA)) AS sump FROM commande natural join produit WHERE commande.prodpid = produit.pid AND cstatus = 'Expédié' AND cdate = '$dt' ";
        return round($ligne['sump'], 2);
    }

    if($what == "month"){
        $thisyear = date("Y");
        $respose = $bdd->query("SELECT sum(prix-(pquantité*prixA)) AS sump FROM commande natural join produit WHERE commande.prodpid = produit.pid AND cstatus = 'Expédié' AND MONTH(cdate) = $dt AND YEAR(cdate) = $thisyear ");
        $ligne= $respose->fetch();
        //echo "SELECT sum(prix-(pquantité*prixA)) AS sump FROM commande natural join produit WHERE commande.prodpid = produit.pid AND cstatus = 'Expédié' AND cdate = '$dt' ";
        return round($ligne['sump'], 2);
    }
    if($what == "year"){
        $thisyear = date("Y");
        // echo "$thisyear";
        $respose = $bdd->query("SELECT sum(prix-(pquantité*prixA)) AS sump FROM commande natural join produit WHERE commande.prodpid = produit.pid AND cstatus = 'Expédié'  AND YEAR(cdate) = $thisyear ");
        $ligne= $respose->fetch();
        //echo "SELECT sum(prix-(pquantité*prixA)) AS sump FROM commande natural join produit WHERE commande.prodpid = produit.pid AND cstatus = 'Expédié' AND cdate = '$dt' ";
        return round($ligne['sump'], 2);
    }


}

function revenusnetperma($dt){
    $bdd = $this->connexion();
   
        $respose = $bdd->query("SELECT sum(prix-(pquantité*prixA)) AS sump FROM commande natural join produit WHERE commande.prodpid = produit.pid AND cstatus = 'Expédié' AND cdate >= '$dt' ");
        $ligne= $respose->fetch();
        return round($ligne['sump'], 2);
    
}


}


?>