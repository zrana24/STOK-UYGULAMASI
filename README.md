# Stok Yönetim Projesi

Bu proje, bir işletmenin stok yönetimini, alış satış işlemlerini, firma ve cari kartlarını kaydetme, fatura oluşturma ve kasa işlemlerini gerçekleştirme amacıyla geliştirilmiştir.

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
- **Fatura Oluşturma:** "Fatura Oluştur" sekmesinden alış veya satış yaparak fatura oluşturabilirsiniz.
- **Firma ve Cari Kartları Kaydı:** "Firmalar" ve "Cari Kartlar" sekmesinden yeni firma veya cari kart ekleyebilir ve bilgilerini düzenleyebilirsiniz.
- **Kasa İşlemleri:** "Kasa" sekmesinden kasadaki gelir ve giderleri görüntüleyebilirsiniz.


## Lisans

Bu proje MIT lisansı altında lisanslanmıştır. Daha fazla bilgi için [LICENSE](LICENSE) dosyasına bakabilirsiniz.