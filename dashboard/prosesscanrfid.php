<?php
require_once '../core_database.php';
date_default_timezone_set('Asia/Jakarta'); // Pastikan timezone sesuai

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uid = $_POST['uid'] ?? '';
    $db = new CoreDatabase();

    try {
        // 1. Cari user berdasarkan UID RFID
        $db->query("SELECT id, nama FROM users WHERE rfid_uid = :uid LIMIT 1");
        $db->bind(':uid', $uid);
        $user = $db->single();

        if (!$user) {
            echo json_encode(['status' => 'error', 'message' => 'Kartu tidak terdaftar!']);
            exit;
        }

        $userId = $user->id;
        $tglSekarang = date('Y-m-d');
        $jamSekarang = date('H:i:s');

        // 2. Cek apakah hari ini sudah ada data absen masuk
        $db->query("SELECT id, jam_keluar FROM absensi WHERE user_id = :uid AND tanggal = :tgl LIMIT 1");
        $db->bind(':uid', $userId);
        $db->bind(':tgl', $tglSekarang);
        $absenHariIni = $db->single();

        if (!$absenHariIni) {
            // JIKA BELUM ADA ABSEN HARI INI -> PROSES ABSEN MASUK
            $db->query("INSERT INTO absensi (user_id, tanggal, jam_masuk) VALUES (:uid, :tgl, :jam)");
            $db->bind(':uid', $userId);
            $db->bind(':tgl', $tglSekarang);
            $db->bind(':jam', $jamSekarang);
            $db->execute();

            echo json_encode([
                'status' => 'success', 
                'message' => "Halo {$user->nama}, Berhasil Absen MASUK pada jam $jamSekarang"
            ]);
        } else {
            // JIKA SUDAH ADA ABSEN MASUK -> CEK APAKAH SUDAH ABSEN KELUAR?
            if ($absenHariIni->jam_keluar == null || $absenHariIni->jam_keluar == '00:00:00') {
                // UPDATE JAM KELUAR
                $db->query("UPDATE absensi SET jam_keluar = :jam WHERE id = :id_absen");
                $db->bind(':jam', $jamSekarang);
                $db->bind(':id_absen', $absenHariIni->id);
                $db->execute();

                echo json_encode([
                    'status' => 'success', 
                    'message' => "Sampai Jumpa {$user->nama}, Berhasil Absen KELUAR pada jam $jamSekarang"
                ]);
            } else {
                // JIKA SUDAH MASUK DAN SUDAH KELUAR
                echo json_encode([
                    'status' => 'info', 
                    'message' => "Halo {$user->nama}, Anda sudah melakukan absen masuk & keluar untuk hari ini."
                ]);
            }
        }

    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'Error: ' . $e->getMessage()]);
    }
}