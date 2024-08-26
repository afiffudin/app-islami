**Cara menjalankan** 

## *Noted ( Harus buat akun docker cloud )
## **Referensi : (https://buddy.works/guides/laravel-in-docker)**
## **Pastikan Socket tidak di masukin** ![image](https://github.com/user-attachments/assets/dc847e6b-a720-4b3a-bc7e-6d05a874cb76) Error ini karena DB_Socket dimasukin, solusi nya hapus baris itu.

## **Versi Docker & NGINX**
## 1. Npm run dev
## 2. Buka Docker Dekstop kemudian jalankan docker compose up ( Lihat apakah jalan atau tidak )
## 3. Pastikan container mysql, laravel-app, nginx sudah ada & Jalan kan php artisan migrate pada container jalankan di container 6f4c4f8754f2(container app-islam-app)untuk dimasukan di container mysql (58118900b81e) & Dipastikan php artisan migrate dulu dalam container app-laravel"![image](https://github.com/user-attachments/assets/208f9f58-fc4f-4535-b8f8-8988a586c58b)
## Pastikan php artisan tinker pada docker exec -it 6f4c4f8754f2 sh ![image](https://github.com/user-attachments/assets/9760511d-6901-4367-943b-f14c6fc32323)


**![image](https://github.com/user-attachments/assets/ee3d799e-f5b4-4bb1-ab5a-08eb5c026b77)
**
## 3. Pastikan Container NGINX, Container DB, Container Applikasi Laravel Berjalan
## 4. Jika Container salah satu tidak berjalan maka solve/creat container dengan ( docker-compose up --build )![image](https://github.com/user-attachments/assets/a0d64efc-8e6f-4a26-9fe8-a39b658e6aba)

## 5. Untuk Melihat List Container ( docker container ls )
## 6. Untuk menghapus container ( docker-compose down -v )
## 7. Untuk build container db ( docker-compose up -d mysql )
