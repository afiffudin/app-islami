**Cara menjalankan** 

## *Noted ( Harus buat akun docker cloud )
## **Referensi : (https://buddy.works/guides/laravel-in-docker)**
## **Pastikan Socket tidak di masukin** ![image](https://github.com/user-attachments/assets/dc847e6b-a720-4b3a-bc7e-6d05a874cb76) Error ini karena DB_Socket dimasukin, solusi nya hapus baris itu.

## **Versi Docker & NGINX**
## 1. Npm run dev
## 2. Buka Docker Dekstop kemudian jalankan docker compose up ( Lihat apakah jalan atau tidak )
**![image](https://github.com/user-attachments/assets/ee3d799e-f5b4-4bb1-ab5a-08eb5c026b77)
**
## 3. Pastikan Container NGINX, Container DB, Container Applikasi Laravel Berjalan
## 4. Jika Container salah satu tidak berjalan maka solve/creat container dengan ( docker-compose up --build ) 
## 5. Untuk Melihat List Container ( docker container ls )
## 6. Untuk menghapus container ( docker-compose down -v )
## 7. Untuk build container db ( docker-compose up -d mysql )
