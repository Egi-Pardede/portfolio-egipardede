<?php
/**
 * Router untuk PHP built-in server.
 * Jalankan portofolio dengan:
 *     php -S 127.0.0.1:8080 router.php
 * (atau cukup dobel-klik run-portfolio.bat)
 *
 * Efek: begitu portofolio diakses, server website Greennovate
 * (php artisan serve, port 8001) otomatis dinyalakan bila belum jalan.
 */

// ── Konfigurasi ─────────────────────────────────────────────
$GN_PORT = 8001;
$GN_APP  = 'C:\\Users\\egiag\\Downloads\\greennovate_Finall - Copy';
$PHP_BIN = 'C:\\xampp\\php\\php.exe';

// ── Auto-start Greennovate (sekali) ─────────────────────────
(function () use ($GN_PORT, $GN_APP, $PHP_BIN) {
    // Sudah jalan? -> tidak usah start lagi.
    $sock = @fsockopen('127.0.0.1', $GN_PORT, $errno, $errstr, 0.25);
    if ($sock) { fclose($sock); return; }

    // Cegah start ganda saat beberapa request datang berbarengan.
    $lock = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'gn_portfolio_boot.lock';
    if (file_exists($lock) && (time() - filemtime($lock) < 20)) return;
    @touch($lock);

    // Spawn "php artisan serve" di jendela terpisah, tidak memblok portofolio.
    $cmd = 'start "Greennovate Live (' . $GN_PORT . ')" /D "' . $GN_APP . '" "'
         . $PHP_BIN . '" artisan serve --host=127.0.0.1 --port=' . $GN_PORT;
    @pclose(@popen('cmd /c ' . $cmd, 'r'));
})();

// ── Sajikan file statis portofolio apa adanya ───────────────
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$file = __DIR__ . str_replace('/', DIRECTORY_SEPARATOR, $path);

if ($path !== '/' && $path !== '' && is_file($file)) {
    return false; // biarkan PHP built-in server mengirim file (css/js/gambar)
}

// Selain itu -> tampilkan halaman utama.
header('Content-Type: text/html; charset=UTF-8');
readfile(__DIR__ . DIRECTORY_SEPARATOR . 'index.html');
