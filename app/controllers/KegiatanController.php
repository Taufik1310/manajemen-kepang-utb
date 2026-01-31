<?php
session_start();
require_once "../models/Kegiatan.php";

if (!isset($_SESSION['login'])) {
    header("Location: ../views/auth/login.php");
    exit;
}

if (isset($_POST['simpan'])) {
    Kegiatan::store($_POST);
    header("Location: ../views/kegiatan/index.php");
}

if (isset($_POST['update'])) {
    Kegiatan::update($_POST['id'], $_POST);
    header("Location: ../views/kegiatan/index.php");
}

if (isset($_GET['hapus'])) {
    Kegiatan::delete($_GET['hapus']);
    header("Location: ../views/kegiatan/index.php");
}

if (isset($_GET['export']) && $_GET['export'] == 'pdf') {
    require_once  __DIR__ . "/../libs/fpdf/fpdf.php";

    $data = Kegiatan::all();

    $pdf = new FPDF('L', 'mm', 'A4');
    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'LAPORAN DATA KEGIATAN', 0, 1, 'C');
    $pdf->Ln(5);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(10, 8, 'No', 1);
    $pdf->Cell(60, 8, 'Nama Kegiatan', 1);
    $pdf->Cell(35, 8, 'Tanggal', 1);
    $pdf->Cell(50, 8, 'Penanggung Jawab', 1);
    $pdf->Cell(110, 8, 'Deskripsi', 1);
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 10);
    $no = 1;
    while ($row = $data->fetch_assoc()) {
        $pdf->Cell(10, 8, $no++, 1);
        $pdf->Cell(60, 8, $row['nama_kegiatan'], 1);
        $pdf->Cell(35, 8, $row['tanggal'], 1);
        $pdf->Cell(50, 8, $row['nama_anggota'], 1);
        $pdf->Cell(110, 8, substr($row['deskripsi'], 0, 80), 1);
        $pdf->Ln();
    }

    $pdf->Output('I', 'Data_Kegiatan.pdf');
    exit;
}
