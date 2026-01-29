<?php
session_start();
require_once "../models/JadwalLatihan.php";

if (!isset($_SESSION['login'])) {
    header("Location: ../views/auth/login.php");
    exit;
}

if (isset($_POST['simpan'])) {
    JadwalLatihan::store($_POST);
    header("Location: ../views/jadwal_latihan/index.php");
}

if (isset($_POST['update'])) {
    JadwalLatihan::update($_POST['id'], $_POST);
    header("Location: ../views/jadwal_latihan/index.php");
}

if (isset($_GET['hapus'])) {
    JadwalLatihan::delete($_GET['hapus']);
    header("Location: ../views/jadwal_latihan/index.php");
}

if (isset($_GET['export']) && $_GET['export'] == 'pdf') {
    require_once "../libs/fpdf/fpdf.php";
    require_once "../config/database.php";

    $db = Database::connect();
    $data = $db->query("
        SELECT jl.*, k.nama_kegiatan
        FROM jadwal_latihan jl
        JOIN kegiatan k ON jl.kegiatan_id = k.id
        ORDER BY jl.tanggal ASC
    ");

    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'LAPORAN JADWAL LATIHAN', 0, 1, 'C');
    $pdf->Ln(5);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(10, 8, 'No', 1);
    $pdf->Cell(30, 8, 'Tanggal', 1);
    $pdf->Cell(25, 8, 'Waktu', 1);
    $pdf->Cell(45, 8, 'Tempat', 1);
    $pdf->Cell(70, 8, 'Kegiatan', 1);
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 10);
    $no = 1;
    while ($row = $data->fetch_assoc()) {
        $pdf->Cell(10, 8, $no++, 1);
        $pdf->Cell(30, 8, $row['tanggal'], 1);
        $pdf->Cell(25, 8, $row['waktu'], 1);
        $pdf->Cell(45, 8, $row['tempat'], 1);
        $pdf->Cell(70, 8, $row['nama_kegiatan'], 1);
        $pdf->Ln();
    }

    $pdf->Output('I', 'Jadwal_Latihan.pdf');
}
