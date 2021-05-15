<?php
require 'vendor/autoload.php'; // Memanggil file autoload.php di dalam folder vendor
// Menggunakan namespace dari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Membuat object dengan nama $spreadsheet dengan menggunakan class Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet(); // Membuat variabel $sheet yang digunakan sebagai activesheet di file excel
$sheet->setCellValue('A1', 'Hello World!'); // Mengisi Cell A1 dengan text “Hello World !”

$writer = new Xlsx($spreadsheet); // Render menjadi file Xlsx hasil dari object $spreadsheet 
$writer->save('hello world.xlsx'); // Menyimpan file excel dengan nama hello world.xlsx
?>