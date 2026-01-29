<?php
session_start();
require_once "../models/Divisi.php";

if (!isset($_SESSION['login'])) {
    header("Location: ../views/auth/login.php");
    exit;
}

if (isset($_GET['export']) && $_GET['export'] === 'pdf') {

    require_once "../libs/fpdf/fpdf.php";

    $data = Divisi::all();

    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'DATA DIVISI KEPANG UTB', 0, 1, 'C');
    $pdf->Ln(5);

    $pdf->SetFont('Arial', 'B', 11);
    $pdf->Cell(15, 8, 'No', 1);
    $pdf->Cell(170, 8, 'Nama Divisi', 1);
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 11);
    $no = 1;

    while ($row = $data->fetch_assoc()) {
        $pdf->Cell(15, 8, $no++, 1);
        $pdf->Cell(170, 8, $row['nama_divisi'], 1);
        $pdf->Ln();
    }

    $pdf->Output('I', 'Data_Divisi_KEPANG_UTB.pdf');
    exit;
}

if (isset($_POST['simpan'])) {
    Divisi::store($_POST);
    header("Location: ../views/divisi/index.php");
}

if (isset($_POST['update'])) {
    Divisi::update($_POST['id'], $_POST);
    header("Location: ../views/divisi/index.php");
}

if (isset($_GET['hapus'])) {
    Divisi::delete($_GET['hapus']);
    header("Location: ../views/divisi/index.php");
}
