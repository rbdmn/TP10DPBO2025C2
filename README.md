# JANJI
Saya Abdurrahman Rauf Budiman dengan NIM 2301102 mengerjakan Tugas Praktikum 10 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Desain Program
Tugas Praktikum 10 ini yaitu untuk membuat manajamen data sederhana dengan menggunakan arsitektur MVVM (Model-View-Controller). Kali ini saya ingin membuat data manajemen (CRUD) terkait restoran yang ada di bandung.

Berikut penjelasan lebih lanjutnya.

## 1. ERD dan relasinya
![image](https://github.com/user-attachments/assets/727e70a8-86e1-4d8a-af74-524eaf489cf6)

Keterangan:
Disini total tabel ada 3, yaitu restoran, minuman, dan makanan. Relasinya yaitu tabel restoran memiliki 2 kunci asing (foreign key) yang merujuk ke tabel minuman dan tabel makanan.
Jadi nanti kalo mau melakukan insert data pada tabel restoran itu akan muncul dropdown dari table minuman dan table makanan. 

## 2. Penjelasan Detail tiap tabel

### 1) Restoran
Berikut isi atribut serta deskripsinya
| Atribut        | Deskripsi                              |
|----------------|----------------------------------------|
| `RestaurantID`      | Identitas tabel Restoran (PK)             |
| `NamaRestoran`         | Nama Restoran                             |
| `jenisKuliner`  | Jenis Kuliner dari Restoran                      |
| `IDMakananUnggulan`          | Foreign Key ke tabel makanan. Menunjukkan makanan unggulan (FK)                             |
| `id_akademik`          | Foreign Key ke tabel minuman. Menunjukkan minuman unggulan (FK)                             |

Keterangan:
Tabel restoran ini adalah tabel utama yang menampung data restoran. Dua atribut foreign key tadi (IDMakananUnggulan, IDMinumanUnggulan) itu bakal digunakan buat pilih makanan/minuman kalau dropdown saat melakukan input atau edit data restoran.

### 2) Makanan
Berikut isi atribut serta deskripsinya
| Atribut        | Deskripsi                              |
|----------------|----------------------------------------|
| `MakananID`   | Identitas tabel makanan (PK)          |
| `NamaMakanan`         | Nama dari makanan                          |
| `Kategori`         | 	Jenis/kategori makanan             |
| `HargaRataRata`         | 	Harga rata-rata dari makanan                          |

Keterangan:
Tabel ini buat referensi makanan unggulan nanti pada tabel restoran. Gunanya nanti buat tampilan dropdown saat input/edit restoran.

### 3) Minuman
Berikut isi atribut serta deskripsinya
| Atribut        | Deskripsi                              |
|----------------|----------------------------------------|
| `MinumanID`      | Identitas tabel minuman (PK)             |
| `NamaMinuman`   | Nama dari minuman                             |
| `Tipe`      | Jenis minuman              |
| `HargaRataRata`   | Harga rata-rata dari makanan                             |

Keterangan:
Tabel ini buat referensi minuman unggulan pada tabel restoran. Sama gunanya nanti buat tampilan dropdown saat input/edit restoran.

## 3. Arsitektur MVC + Template
Di MVVM ini mempunyai tiga komponen utama, berikut penjelasan komponen dan fungsinya:
- Model = Bertugas untuk mengelola koneksi ke database dan melakukan operasi query (MySQL)
- View = Untuk menampilkan data ke user.
- ViewModel = Perantara antara Model dan View. ViewModel ini mengambil data dari Model, memproses atau menyesuaikannya jika perlu, lalu mengoper ke View.

Lalu ada juga template. Template ini gunanya untuk file HTML mentah. Template ini ga langsung ditampilin ke browser, tapi diproses dulu oleh kode PHP sebelum ditampilin.

## 4. Struktur Folder Proyek
![image](https://github.com/user-attachments/assets/efeab361-710d-4fbf-97d9-73bdcbecca6a)

Keterangan:
Terdapat 5 folder utama pada project ini yaitu:
- Folder Config = Koneksi database `Database.php`.
- Folder Database = File SQL untuk setup tabel `restoran.sql`.
- Folder Model = Mengelola data dan query DB `Makanan.php` , `Minuman.php`, dan `Restoran.php`.
- Folder ViewModel = Jembatan antara model dan view, mengatur logika & data sebelum ke tampilan.
- Folder View = 
1) Template: `header.php, footer.php`.
2) Form: Form input data tiap tabel (`_form.php`).
3) List: Data tiap tabel `_list.php`.

Dan terakhir ada entry point sebagai routing utama yang menghubungkan semua komponen.

# Alur Program
Pertama tama kita pastikan server Apache dan MySQL menyala, lalu buka browser dan di url nya itu ditujukan ke index.php. Setelah muncul visualisasinya, di index.php (halaman utama) terdapat judul lalu navbar diatas berisi 3, yaitu Restoran, Makanan, dan Minuman. Jika di klik salah satu yang pertama akan muncul yaitu isi data berbentuk tabel, disini kita bisa melakukan operasi CRUD. Lalu jika ingin melakukan insert data atau update/edit data akan diredirect kan ke bentukan form html nya. Untuk alur MVVM nya sebagai berikut:
- Misalkan kita ingin menambahkan data restoran, setelah tombol Add Restoran diklik akan ngegenerate URL `index.php?entity=restoran&action=add`.
- Setelah URL tadi dijalankan, index.php sebagai entry point akan ngedetek `entity=restoran` dan `action=add`, lalu memanggil RestoranViewModel.
- Di dalam RestoranViewModel, fungsi getMakanan() dan getMinuman() dipanggil untuk mengambil data dropdown dari tabel makanan dan minuman.
- Nah lalu View restoran_form.php akan ditampilkan ke user sebagai form input data restoran.
- Setelah form di-submit, index.php akan menangkap `action=save`, lalu RestoranViewModel akan memanggil method addRestoran($data) yang berisi perintah insert ke database.
- Jika aman atau proses insert berhasil, user akan diarahkan kembali ke `index.php?entity=restoran&action=list` untuk melihat tabel data restoran terbaru.
- Berlaku juga dengan edit.

# Rekaman Dokumentasi Alur Program
https://github.com/user-attachments/assets/eb092d3d-33a1-4762-bb18-38373ea0c8ce




