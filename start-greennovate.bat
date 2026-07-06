@echo off
REM ============================================================
REM  Jalankan server website Greennovate (Laravel + Neon cloud DB)
REM  Setelah jalan, buka portofolio dan klik "Buka Website Live".
REM  Biarkan jendela ini terbuka selama ingin website aktif.
REM  Tutup jendela / tekan Ctrl+C untuk menghentikan server.
REM ============================================================
title Greennovate Live Server (port 8001)
cd /d "C:\Users\egiag\Downloads\greennovate_Finall - Copy"
echo Menjalankan Greennovate di http://127.0.0.1:8001 ...
echo (Biarkan jendela ini terbuka. Tekan Ctrl+C untuk berhenti.)
"C:\xampp\php\php.exe" artisan serve --host=127.0.0.1 --port=8001
pause
