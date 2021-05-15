<?php
include('koneksi.php'); // Menyambungkan dengan koneksi
require 'vendor/autoload.php'; // Memanggil file autoload.php di dalam folder vendor
// Menggunakan namespace dari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet; 
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Membuat object dengan nama $spreadsheet dengan menggunakan class Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Menuliskan nama kolom
$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Nama');
$sheet->setCellValue('C1', 'Kelas');
$sheet->setCellValue('D1', 'Alamat');


// Mengambil data pada tabel tb_siswa dengan memanggil koneksi
$query = mysqli_query($koneksi, "select * from tb_siswa"); 
$i = 2;
$no = 1;
while ($row = mysqli_fetch_array($query))
{
	$sheet->setCellValue('A'.$i, $no++);
	$sheet->setCellValue('B'.$i, $row['nama']);
	$sheet->setCellValue('C'.$i, $row['kelas']);
	$sheet->setCellValue('D'.$i, $row['alamat']);
	$i++;
}

$styleArray = [
			'borders' => [
				'allborders' => [
					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
				],
			],
		];
$i = $i - 1;
$sheet->getStyle('A1:D'.$i)->applyFromArray($styleArray);

$writer = new Xlsx($spreadsheet); // Render menjadi file Xlsx hasil dari object $spreadsheet 
$writer->save('Report Data Siswa.xlsx'); // Menyimpan file excel dengan nama Report Data Siswa.xlsx
?>