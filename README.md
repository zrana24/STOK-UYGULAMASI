# Stok Yönetim Projesi

Bu proje, bir işletmenin stok yönetimini, alış satış işlemlerini, firma ve cari kartlarını kaydetme, fatura kaydı ve kasa işlemlerini gerçekleştirme amacıyla geliştirilmiştir.

## Kurulum

1. Projeyi bilgisayarınıza klonlayın:
git clone https://github.com/zrana24/STOK-UYGULAMASI


2. Projeyi yerel bir sunucuda çalıştırın (ör. XAMPP,AppServ, WAMP, MAMP).

3. Veritabanını oluşturun:

- phpMyAdmin veya benzeri bir araç kullanarak, `stok.sql` dosyasını içe aktarın.

4. Veritabanı bağlantı ayarlarını yapın:

- `gelirgiderveritabani.php` dosyasını açın.
- Veritabanı bağlantı bilgilerinizi (`DB_HOST`, `DB_USER`, `DB_PASS`, `DB_NAME`) girin.

5. Tarayıcınızda projenin bulunduğu dizini açın (ör. `(http://localhost/STOK-UYGULAMASI-main/)`) ve uygulamayı kullanmaya başlayın.

## Kullanım

- **Ürün Kaydı Oluşturma:** Ana menüde yer alan "Ürünler" sekmesinden yeni ürün ekleyebilir, düzenleyebilir veya silebilirsiniz.
![urun](https://github.com/zrana24/STOK-UYGULAMASI/assets/126763047/3f7c8dfe-cd34-421c-9032-03808974b3e8)

- **Fatura Oluşturma:** "Fatura Oluştur" sekmesinden alış veya satış yaparak fatura oluşturabilirsiniz.
![firmacari](https://github.com/zrana24/STOK-UYGULAMASI/assets/126763047/436d9ced-5ca5-49d0-9a5c-bf4265786c66)

- **Firma ve Cari Kartları Kaydı:** "Firmalar" ve "Cari Kartlar" sekmesinden yeni firma veya cari kart ekleyebilir ve bilgilerini düzenleyebilirsiniz.
 ![fatura](https://github.com/zrana24/STOK-UYGULAMASI/assets/126763047/1c45fb59-ab97-492d-b57b-1f8f48b82ca2)

- **Kasa İşlemleri:** "Kasa" sekmesinden kasadaki gelir ve giderleri görüntüleyebilirsiniz.
![kasa](https://github.com/zrana24/STOK-UYGULAMASI/assets/126763047/c9af223b-6258-419c-b271-04c0528a87d0)


## Lisans

Bu proje MIT lisansı altında lisanslanmıştır. Daha fazla bilgi için [LICENSE](LICENSE) dosyasına bakabilirsiniz.
