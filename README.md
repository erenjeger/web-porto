# DevPortfolio — Laravel + Tailwind + MySQL

Implementasi Laravel dari desain DevPortfolio pada Figma Make. UI mempertahankan tema dark, kartu, gradient cyan/blue, dashboard sidebar, halaman autentikasi, portfolio publik, filtering tag, modal preview media, serta form CV terstruktur.

Stack: Laravel 13, PHP 8.3+, Blade, Tailwind CSS 4, Vite, MySQL 8+.

Setup:
1. Salin .env.example menjadi .env.
2. Jalankan composer install.
3. Jalankan php artisan key:generate.
4. Buat database MySQL bernama devportfolio dan isi DB_* di .env.
5. Jalankan php artisan migrate --seed.
6. Jalankan php artisan storage:link.
7. Jalankan npm install lalu npm run build.
8. Jalankan php artisan serve dan npm run dev untuk development.

Akun demo:
Email: demo@example.com
Password: demo123
URL: /portfolio/johndev

Google SSO pada prototype ditampilkan sebagai entry point tetapi belum aktif; provider OAuth perlu ditambahkan di backend sebelum production.

Laravel 13 dirilis 17 Maret 2026 dan mendukung PHP 8.3–8.5 menurut dokumentasi rilis resmi Laravel. Tailwind CSS v4 menggunakan @import "tailwindcss" dan integrasi Vite.
