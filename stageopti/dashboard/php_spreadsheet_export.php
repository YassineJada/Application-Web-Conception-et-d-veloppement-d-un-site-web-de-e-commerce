<?php

//php_spreadsheet_export.php

include 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

// $connect = new PDO("mysql:host=localhost;dbname=ecommestg", "root", "toor");

include("dtb.php");
$dao = new daoges();
$connect=$dao->connexion();

if(isset($_POST["export"]))
{
  


$query = "SELECT * FROM produit";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

  $file = new Spreadsheet();

  $active_sheet = $file->getActiveSheet();
  $active_sheet->setCellValue('A1', 'titre');
  $active_sheet->setCellValue('B1', 'categorie');
  $active_sheet->setCellValue('C1', 'quantité');
  $active_sheet->setCellValue('D1', 'discount');
  $active_sheet->setCellValue('E1', 'prixV');
  $active_sheet->setCellValue('F1', 'prixA');
  $active_sheet->setCellValue('G1', 'ptype');
  $active_sheet->setCellValue('H1', 'desci');
  $active_sheet->setCellValue('I1', 'tva');

  $count = 2;

  foreach($result as $row)
  {
    $active_sheet->setCellValue('A' . $count, $row["ptitre"]);
    $active_sheet->setCellValue('B' . $count, $row["pcategorie"]);
    $active_sheet->setCellValue('C' . $count, $row["quantité"]);
    $active_sheet->setCellValue('D' . $count, $row["discount"]);
	
	$active_sheet->setCellValue('E' . $count, $row["prixV"]);
    $active_sheet->setCellValue('F' . $count, $row["prixA"]);
    $active_sheet->setCellValue('G' . $count, $row["ptype"]);
    $active_sheet->setCellValue('H' . $count, $row["desci"]);
	$active_sheet->setCellValue('I' . $count, $row["tva"]);
    $count = $count + 1;
  }

  $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, $_POST["file_type"]);

  $file_name = time() . '.' . strtolower($_POST["file_type"]);

  $writer->save($file_name);

  header('Content-Type: application/x-www-form-urlencoded');

  header('Content-Transfer-Encoding: Binary');

  header("Content-disposition: attachment; filename=\"".$file_name."\"");

  readfile($file_name);

  unlink($file_name);

  exit;

}


if(isset($_POST["exportclient"]))
{
  



$query = "SELECT * FROM tclient";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

  $file = new Spreadsheet();

  $active_sheet = $file->getActiveSheet();
  $active_sheet->setCellValue('A1', 'Nom ');
  $active_sheet->setCellValue('B1', 'Email');
  $active_sheet->setCellValue('C1', 'Tele');
  $active_sheet->setCellValue('D1', 'Adresse');
  $active_sheet->setCellValue('E1', 'Ville');
  $active_sheet->setCellValue('F1', 'Code Postal');
  $active_sheet->setCellValue('G1', 'CIN');
 

  $count = 2;

  foreach($result as $row)
  {
    $active_sheet->setCellValue('A' . $count, $row["nomc"]);
    $active_sheet->setCellValue('B' . $count, $row["email"]);
    $active_sheet->setCellValue('C' . $count, $row["tele"]);
    $active_sheet->setCellValue('D' . $count, $row["adress"]);
	
	$active_sheet->setCellValue('E' . $count, $row["ville"]);
    $active_sheet->setCellValue('F' . $count, $row["codepostal"]);
    $active_sheet->setCellValue('G' . $count, $row["cin"]);
 
    $count = $count + 1;
  }

  $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($file, $_POST["file_type"]);

  $file_name = time() . '.' . strtolower($_POST["file_type"]);

  $writer->save($file_name);

  header('Content-Type: application/x-www-form-urlencoded');

  header('Content-Transfer-Encoding: Binary');

  header("Content-disposition: attachment; filename=\"".$file_name."\"");

  readfile($file_name);

  unlink($file_name);

  exit;

}

?>

      <br />
      <br />
