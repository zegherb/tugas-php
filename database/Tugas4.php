<?php
// ini adalah file untuk update data
$host = 'localhost';
$db   = 'pbp2026';
$user = 'root';
$pass = '';

// ==========================
// KONFIGURASI DATABASE
// ==========================
$dsn  = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("Koneksi DB gagal: " . $e->getMessage() . "\n");
}

// ==========================
// TAMPILAN INTERAKTIF CLI
// ==========================
echo "===============================\n";
echo "      UPDATE DATA USER CLI     \n";
echo "===============================\n";

// Meminta input dari user melalui terminal (STDIN)
echo "Masukkan Username LAMA yang ingin diubah : ";
$old_username = trim(fgets(STDIN));

echo "Masukkan Username BARU                   : ";
$new_username = trim(fgets(STDIN));

echo "Masukkan Email BARU                      : ";
$new_email = trim(fgets(STDIN));

echo "Masukkan Password BARU                   : ";
$new_password = trim(fgets(STDIN));

// Validasi input kosong
if (empty($old_username) || empty($new_username) || empty($new_email) || empty($new_password)) {
    die("\n[ERROR] Update dibatalkan. Semua kolom harus diisi!\n");
}

// ==========================
// PROSES UPDATE KE DATABASE
// ==========================
try {
    // Hash password baru
    $passwordHash = password_hash($new_password, PASSWORD_BCRYPT, ['cost' => 13]);

    $updateUser = $pdo->prepare("
        UPDATE user 
        SET username = :new_username, 
            email = :new_email, 
            password_hash = :password_hash, 
            updated_at = :updated_at 
        WHERE username = :old_username
    ");

    $updateUser->execute([
        ':new_username'  => $new_username,
        ':new_email'     => $new_email,
        ':password_hash' => $passwordHash,
        ':updated_at'    => time(),
        ':old_username'  => $old_username
    ]);

    // Cek apakah ada data yang berhasil diubah
    echo "\n===============================\n";
    if ($updateUser->rowCount() > 0) {
        echo "[BERHASIL] Data user '$old_username' berhasil diupdate!\n";
        echo " -> Username : $new_username\n";
        echo " -> Email    : $new_email\n";
    } else {
        echo "[GAGAL] User '$old_username' tidak ditemukan atau tidak ada perubahan data.\n";
    }
    echo "===============================\n";

} catch (PDOException $e) {
    echo "\n[ERROR SYSTEM] Gagal Update: " . $e->getMessage() . "\n";
    echo "Pastikan username atau email baru belum dipakai oleh user lain.\n";
}
?>