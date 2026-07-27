@echo off
echo ===================================================
echo   Menyalakan Backend Laravel & Online Tunnel...
echo ===================================================
start "Laravel Server" cmd /k "cd /d d:\Kuliah\projek\rental_ps_backend && php artisan serve --host=0.0.0.0 --port=8000"
timeout /t 2 >nul
start "Online Tunnel" cmd /k "cd /d d:\Kuliah\projek\rental_ps_backend && npx localtunnel --port 8000 --subdomain rental-ps-timeless"
echo ===================================================
echo   Server & Tunnel Aktif! Siap digunakan.
echo ===================================================
