@echo off
REM ============================================================
REM  Jalankan PORTOFOLIO dengan PHP.
REM  Website Greennovate (php artisan serve, port 8001) akan
REM  OTOMATIS ikut nyala begitu portofolio dibuka (lihat router.php).
REM
REM  Portofolio : http://127.0.0.1:8080
REM  Greennovate: http://127.0.0.1:8001  (dibuka lewat tombol di portofolio)
REM
REM  Biarkan jendela ini terbuka. Tekan Ctrl+C untuk berhenti.
REM ============================================================
title Portfolio (8080) + auto Greennovate (8001)
cd /d "%~dp0"
start "" http://127.0.0.1:8080
"C:\xampp\php\php.exe" -S 127.0.0.1:8080 router.php
pause
