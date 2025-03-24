-- Create database
CREATE DATABASE phpdasar;

-- Use database
USE phpdasar;

-- Create tabel mahasiswa
CREATE TABLE mahasiswa (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nama VARCHAR(100),
  nim CHAR(5),
  email VARCHAR(100),
  jurusan VARCHAR(100),
  foto VARCHAR(100)
);

-- Insert data ke tabel mahasiswa
INSERT INTO mahasiswa (nama, nim, email, jurusan, foto)
VALUES
  ('Revo Nando', '98971', 'refo@gmail.com', 'Teknik Wayang Kulit', 'revo.jpeg'),
  ('Alya Putri', '12345', 'alya@gmail.com', 'Teknik Informatika', 'alya.jpg'),
  ('Budi Santoso', '67890', 'budi@gmail.com', 'Sistem Informasi', 'budi.jpg'),
  ('Citra Lestari', '54321', 'citra@gmail.com', 'Teknik Elektro', 'citra.jpg'),
  ('Dedi Pratama', '98765', 'dedi@gmail.com', 'Teknik Mesin', 'dedi.jpg'),
  ('Eka Ramadhan', '11122', 'eka@gmail.com', 'Manajemen Informatika', 'eka.jpg'),
  ('Fanny Wijaya', '33344', 'fanny@gmail.com', 'Ilmu Komputer', 'fanny.jpg'),
  ('Gilang Saputra', '55566', 'gilang@gmail.com', 'Teknik Sipil', 'gilang.jpg');

-- Update data di tabel mahasiswa
UPDATE mahasiswa
SET nama = 'Revo Nando'
WHERE id = 1;

-- Update jurusan di tabel mahasiswa
UPDATE mahasiswa
SET jurusan = 'Teknik Wayang Kulit'
WHERE id = 1;

-- Delete data di tabel mahasiswa
DELETE FROM mahasiswa
WHERE nama = 'Gilang Saputra';