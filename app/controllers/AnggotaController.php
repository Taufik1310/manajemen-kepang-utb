<?php
session_start();
require_once "../models/Anggota.php";

if (!isset($_SESSION['login'])) {
    header("Location: ../views/auth/login.php");
    exit;
}

if (isset($_POST['simpan'])) {
    Anggota::store($_POST);
    header("Location: ../views/anggota/index.php");
}

if (isset($_POST['update'])) {
    Anggota::update($_POST['id'], $_POST);
    header("Location: ../views/anggota/index.php");
}

if (isset($_GET['hapus'])) {
    Anggota::delete($_GET['hapus']);
    header("Location: ../views/anggota/index.php");
}

if (isset($_GET['export']) && $_GET['export'] == 'pdf') {

    require_once  __DIR__ . "/../libs/fpdf/fpdf.php";

    $data = Anggota::all();

    $pdf = new FPDF('L', 'mm', 'A4');
    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'DATA ANGGOTA KEPANG UTB', 0, 1, 'C');
    $pdf->Ln(5);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(10, 8, 'No', 1);
    $pdf->Cell(50, 8, 'Nama', 1);
    $pdf->Cell(35, 8, 'NIM', 1);
    $pdf->Cell(45, 8, 'Jurusan', 1);
    $pdf->Cell(30, 8, 'Angkatan', 1);
    $pdf->Cell(40, 8, 'Divisi', 1);
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 10);
    $no = 1;

    while ($row = $data->fetch_assoc()) {
        $pdf->Cell(10, 8, $no++, 1);
        $pdf->Cell(50, 8, $row['nama'], 1);
        $pdf->Cell(35, 8, $row['nim'], 1);
        $pdf->Cell(45, 8, $row['jurusan'], 1);
        $pdf->Cell(30, 8, $row['angkatan'], 1);
        $pdf->Cell(40, 8, $row['nama_divisi'], 1);
        $pdf->Ln();
    }

    $pdf->Output('I', 'Data_Anggota_KEPANG_UTB.pdf');
    exit;
}
