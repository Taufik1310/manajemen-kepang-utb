<?php
session_start();
require_once "../models/Inventaris.php";

if (!isset($_SESSION['login'])) {
    header("Location: ../views/auth/login.php");
    exit;
}

if (isset($_GET['export']) && $_GET['export'] === 'pdf') {

    require_once  __DIR__ . "/../libs/fpdf/fpdf.php";

    $data = Inventaris::all();

    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'DATA INVENTARIS KEPANG UTB', 0, 1, 'C');
    $pdf->Ln(5);

    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(15, 8, 'No', 1);
    $pdf->Cell(95, 8, 'Nama Alat', 1);
    $pdf->Cell(30, 8, 'Jumlah', 1);
    $pdf->Cell(40, 8, 'Kondisi', 1);
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 11);
    $no = 1;

    while ($row = $data->fetch_assoc()) {
        $pdf->Cell(15, 8, $no++, 1);
        $pdf->Cell(95, 8, $row['nama_alat'], 1);
        $pdf->Cell(30, 8, $row['jumlah'], 1);
        $pdf->Cell(40, 8, $row['kondisi'], 1);
        $pdf->Ln();
    }

    $pdf->Output('I', 'Data_Inventaris_KEPANG_UTB.pdf');
    exit;
}

if (isset($_POST['simpan'])) {
    Inventaris::store($_POST);
    header("Location: ../views/inventaris/index.php");
}

if (isset($_POST['update'])) {
    Inventaris::update($_POST['id'], $_POST);
    header("Location: ../views/inventaris/index.php");
}

if (isset($_GET['hapus'])) {
    Inventaris::delete($_GET['hapus']);
    header("Location: ../views/inventaris/index.php");
}
