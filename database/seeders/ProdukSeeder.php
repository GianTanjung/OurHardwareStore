<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ProdukSeeder extends Seeder
{

    public function run()
    {
        //AVIAN
        DB::table('produks')->insert([
            'kategori_id' => 4,
            'merk_id' => 1,
            'nama' => 'AVIAN GLOSS SUPER WHITE',
            'sku' => 'AVIAN0300060023',
            'tipe' => 'Cat Kayu dan Besi',
            'foto_produk' => 'produks/avian0300060023_pa.jpg',
            'harga' => 73100,
            'total_stok' => 600,
            'publikasi' => 'Ya',
            'warna' => 'Putih Super',
            'penggunaan' => 'Exterior',
            'finishing' => 'Gloss',
            'volume' => '0.9L',
            'deskripsi' => 'cat Avian Gloss Super White. Cat ini memiliki beberapa keunggulan, termasuk kecerahan dan kehalusannya. Dengan formula khususnya, cat ini memberikan hasil akhir yang tahan lama, mengkilap, dan melindungi dari cuaca dan sinar UV.

            Cat Avian Gloss Super White dapat digunakan pada berbagai permukaan, seperti kayu, logam, beton, dan material lainnya. Keunggulannya adalah mudah diaplikasikan dan menghasilkan lapisan yang halus dan merata.
            
            Tingkatkan keindahan dan perlindungan permukaan Anda dengan menggunakan cat Avian Gloss Super White. Dapatkan hasil yang memukau dan tahan lama dengan cat berkualitas tinggi dari Avian. Beritahu saya jika Anda memiliki pertanyaan lebih lanjut atau jika ada hal lain yang dapat saya bantu.
            
            Spesifikasi Produk :
            - Merk : Avian
            - Kode Warna : SW Super White
            - Berat Nett : 0,9 Liter
            - Cat Kayu dan Besi
            
            Keunggulan Produk :
            - Mengkilap sempurna
            - Anti karat
            - Cepat kering
            - Tahan cuaca
            - Daya tutup terbaik
            - Fleksibel, tak mudah retak
            - Tahan air laut
            - Anti jamur dan rayap',
        ]);
        DB::table('produks')->insert([
            'kategori_id' => 6,
            'merk_id' => 6,
            'nama' => 'HABITAT KERAMIK FLOOR TILE CARRARA SLVR 1.08M2 KW1 60X60CM SILVER',
            'sku' => 'MILAN0205850001',
            'tipe' => 'Keramik Lantai',
            'foto_produk' => 'produks/milan0205850001_fl.jpg',
            'harga' => 118368,
            'total_stok' => 600,
            'publikasi' => 'Ya',
            'warna' => 'Abu-Abu',
            'material' => 'Keramik',
            'permukaan' => 'Kilap',
            'bentuk' => 'Solid and Firm',
            'ukuran' => '60X60CM',
            // 'harga_spesial' => 92327,
            // 'tgl_mulai_harga_spesial' => '2023-12-13 00:00:00',
            // 'tgl_selesai_harga_spesial' => '2023-12-31 00:00:00',
            'deskripsi' => 'Ubin Keramik Lantai Carrara Silver 60x60 adalah pilihan tepat untuk Anda yang mencari ubin keramik lantai berkualitas tinggi dengan desain yang elegan dan tahan lama. Ubin ini terbuat dari bahan keramik berkualitas tinggi yang tahan terhadap chipping, goresan, dan noda. Desain marmer klasik dengan warna silver memberikan tampilan yang elegan dan mewah, cocok untuk berbagai ruangan di rumah Anda.

                Keunggulan Ubin Keramik Lantai Carrara Silver 60x60:

                Kualitas bahan yang tinggi
                Desain yang elegan
                Tahan lama
                Mudah dirawat

                Aplikasi Ubin Keramik Lantai Carrara Silver 60x60:

                Lantai
                Dinding
                Meja dapur
                Backsplash

                Cara Perawatan Ubin Keramik Lantai Carrara Silver 60x60:

                Bersihkan noda ringan dengan air sabun
                Gunakan pembersih khusus untuk keramik untuk noda yang lebih membandel',
        ]);
        DB::table('produks')->insert([
            'kategori_id' => 7,
            'merk_id' => 4,
            'nama' => 'DEKKSON PADLOCK PL200 L 50MM',
            'sku' => 'DEKKS0204240001',
            'tipe' => 'PADLOCK',
            'foto_produk' => 'produks/dekks0204240001_bu.png',
            'harga' => 122700,
            'total_stok' => 600,
            'publikasi' => 'Ya',
            'warna' => 'Satin Nikel',
            'material' => 'Zinc Alloy',
            'ukuran' => '50MM',
        ]);

        DB::table('produks')->insert([
            'kategori_id' => 7,
            'merk_id' => 4,
            'nama' => 'DEKKSON KUNCI LACI DL138',
            'sku' => 'DEKKS030004',
            'tipe' => 'DRAWER LOCK',
            'foto_produk' => 'produks/dekks030004_bu.jpg',
            'harga' => 13400,
            'total_stok' => 600,
            'publikasi' => 'Ya',
            'material' => 'BRASS',
            'deskripsi' => 'Kunci laci Dekkson DL138 adalah jenis kunci laci yang digunakan untuk mengunci laci atau drawer Kunci laci ini memiliki ukuran 19 mm x 22 mm dan terbuat dari bahan paduan seng (zinc alloy) dengan finishing chrome  plate. Kunci laci Dekkson DL138 juga memiliki dimensi ukuran 40 x 40 mm dengan ketebalan 5 mm dan diameter kunci 20 mm.
            Spesifikasi Produk :
                - Merk : Dekkson
                - Tipe : DL 138
                - Ukuran : 19 Mm x 22 Mm
                - Material : Zinc Alloy
                - Finishing / Warna : Chrome Plate',
        ]);

        DB::table('produks')->insert([
            'kategori_id' => 7,
            'merk_id' => 4,
            'nama' => 'DEKKSON CASEMENT CH425 R/H',
            'sku' => 'DEKKS0800680001',
            'tipe' => 'RAMBUNCIS',
            'foto_produk' => 'produks/ch425.jpg',
            'harga' => 25000,
            'total_stok' => 600,
            'warna' => 'Putih',
            'publikasi' => 'Ya',
            'material' => 'ALUMINIUM',
        ]);

        DB::table('produks')->insert([
            'kategori_id' => 4,
            'merk_id' => 5,
            'nama' => 'DULUX PENTALITE A923 CEILING PAINT 25KG',
            'sku' => 'DULUX0300180001',
            'tipe' => 'CAT CEILING',
            'foto_produk' => 'produks/dulux0300180001_pa.jpg',
            'harga' => 855000,
            'total_stok' => 600,
            'warna' => 'Putih',
            'publikasi' => 'Ya',
            'penggunaan' => 'CEILING',
            'finishing' => 'MATT',
            'ukuran' => '37.5X30CM',
            'volume' => '17.85L',
        ]);

        DB::table('produks')->insert([
            'kategori_id' => 4,
            'merk_id' => 5,
            'nama' => 'DULUX WEATHERSHIELD DUAL SHIELD A918-2290M BRILLIANT WHITE 20LT',
            'sku' => 'DULUX0300290013',
            'tipe' => 'CAT TEMBOK',
            'foto_produk' => 'produks/dulux0300290013_pa.png',
            'harga' => 2473600,
            'total_stok' => 600,
            'warna' => 'Putih',
            'publikasi' => 'Ya',
            'material' => 'ACRYILIC',
            'finishing' => 'SATIN',
            'ukuran' => '20L',
            'volume' => '20L',
        ]);


        DB::table('produks')->insert([
            'kategori_id' => 3,
            'merk_id' => 6,
            'nama' => 'MERIDIAN WHITE SHOWER BOX NON TRAY SIKU SSC-20 (B)',
            'sku' => 'MERID0400340001',
            'tipe' => 'SHOWER BOX SET',
            'foto_produk' => 'produks/merid0400340001_p1.jpg',
            'harga' => 2301000,
            'total_stok' => 600,
            'publikasi' => 'Ya',
            'bentuk' => 'Square',
            'ukuran' => '90X90X190CM',
            'deskripsi' => 'Meridian Shower Box Non Tray Siku SSC-20 (B) adalah bilik shower yang terbuat dari kaca tempered dengan rangka aluminium berwarna putih. Bilik shower ini berbentuk sudut dengan lantai anti slip dan pintu geser. Bilik shower ini tidak dilengkapi dengan tray, sehingga dapat dipasang langsung di lantai.

Ukuran bilik shower ini adalah 900 x 900 x 2000 mm dan memiliki satu kepala shower. Bilik shower ini juga memiliki rak built-in untuk menyimpan perlengkapan mandi.

Panduan Keselamatan:

Jangan gunakan bilik shower jika kaca temperednya retak atau rusak.
Hati-hati saat memasuki dan meninggalkan bilik shower, karena lantainya bisa licin.
Berhati-hatilah saat menggunakan kepala shower, karena airnya bisa panas.
Jangan membebani bilik shower dengan perlengkapan mandi.

Meridian Shower Box Non Tray Siku SSC-20 (B) adalah pelengkap yang sempurna untuk kamar mandi modern apa pun. Desainnya yang ramping dan finishingnya yang putih akan menambah sentuhan kemewahan pada ruang Anda. Bilik shower ini luas dan nyaman, dan lantai anti slip akan menjaga Anda tetap aman saat mandi. Rak built-in juga sangat praktis untuk menyimpan perlengkapan mandi.

Bayangkan diri Anda bangun di pagi hari dan melangkah ke bilik shower Meridian White Shower Box Non Tray Siku SSC-20 (B). Air hangat mengalir di tubuh Anda saat Anda bersantai dan melepas lelah. Anda merasa segar dan bersemangat saat memulai hari.

Meridian Shower Box Non Tray Siku SSC-20 (B) lebih dari sekadar bilik shower. Ini adalah tempat di mana Anda dapat bersantai dan melarikan diri dari stres kehidupan sehari-hari. Ini adalah tempat di mana Anda dapat memulai hari dengan perasaan segar dan bersemangat.',
        ]);


        DB::table('produks')->insert([
            'kategori_id' => 1,
            'merk_id' => 9,
            'nama' => 'NIPPON SAND PAPER 240',
            'sku' => 'NIPPO0500110003',
            'tipe' => 'AMPLAS',
            'foto_produk' => 'produks/nippo0500110003_pa.jpg',
            'harga' => 3500,
            'total_stok' => 600,
            'warna' => 'Abu-Abu',
            'publikasi' => 'Ya',
            'material' => 'BRISTLE',
            'deskripsi' => 'NIPPON SAND PAPER 240 adalah kertas amplas yang memiliki grit 240. Grit adalah ukuran kasar/halusnya kertas amplas, semakin tinggi gritnya semakin halus kertas amplas tersebut. Kertas amplas dengan grit 240 termasuk dalam kategori kertas amplas halus, sehingga cocok digunakan untuk menghaluskan permukaan kayu, logam, plastik, dan cat.

Keunggulan

Berikut adalah keunggulan dari NIPPON SAND PAPER 240:

Halus
Kertas amplas dengan grit 240 memiliki permukaan yang halus, sehingga cocok digunakan untuk menghaluskan permukaan kayu, logam, plastik, dan cat.
Tahan lama
Kertas amplas NIPPON terbuat dari bahan-bahan berkualitas tinggi, sehingga tahan lama dan dapat digunakan berulang kali.
Mudah digunakan
Kertas amplas NIPPON mudah digunakan dan dapat diaplikasikan dengan berbagai alat, seperti amplas tangan, mesin amplas, atau sander.

Berikut adalah cara menggunakan NIPPON SAND PAPER 240:

Siapkan permukaan yang akan dihaluskan. Pastikan permukaan tersebut bersih dan kering.
Gunakan kertas amplas yang sesuai dengan kebutuhan. Jika permukaan yang akan dihaluskan sangat kasar, gunakan kertas amplas dengan grit yang lebih rendah terlebih dahulu, kemudian dilanjutkan dengan kertas amplas dengan grit 240.
Gosokkan kertas amplas pada permukaan dengan gerakan maju mundur.
Bersihkan sisa-sisa debu amplas dengan kain kering.
Tips
Berikut adalah beberapa tips untuk menggunakan NIPPON SAND PAPER 240:

Gunakan tekanan yang sedang saat menggosokkan kertas amplas.
Jika ingin menghaluskan permukaan yang luas, gunakan kertas amplas dengan ukuran yang lebih besar.
Gunakan masker dan kacamata keselamatan saat menggunakan kertas amplas.

Berikut adalah data produk NIPPON SAND PAPER 240:
Grit: 240
Kemasan: 100 lembar
Ukuran: 230x280mm
Daya sebar: 3-5m²/lembar'
        ]);

        DB::table('produks')->insert([
            'kategori_id' => 2,
            'merk_id' => 10,
            'nama' => 'PANASONIC SAKLAR SERI PUTIH WIDE SERIES WEJ5531X2+78029W',
            'sku' => 'PANAS0800990005',
            'tipe' => 'SERI DUA',
            'foto_produk' => 'produks/wide_series_wej5531x2_78029w.jpg',
            'harga' => 30300,
            'total_stok' => 600,
            'warna' => 'Putih',
            'publikasi' => 'Ya',
            'ukuran' => '15X4X13CM',
            'deskripsi' => 'Panasonic Saklar Seri Putih Wide Series WEJ5531X2+78029W adalah produk saklar ganda yang berkualitas tinggi dan memiliki desain yang elegan. Saklar ini cocok digunakan untuk berbagai kebutuhan, baik untuk rumah tangga maupun komersial.

Dengan fitur-fitur canggih yang dimilikinya, Panasonic Saklar Seri Putih Wide Series WEJ5531X2+78029W dapat memberikan kemudahan dan kenyamanan bagi penggunanya. Selain itu, saklar ini juga dapat meningkatkan keamanan dan estetika ruangan.

Fitur-fitur:

Desain elegan dan modern
Terbuat dari bahan plastik berkualitas tinggi
Kualitas tahan lama
Tombol putar yang mudah digunakan
LED indikator yang terang
Mudah dipasang

Penggunaan:

Saklar ganda ini dapat digunakan untuk mengontrol dua perangkat elektronik secara bersamaan, seperti lampu dan kipas angin. Saklar ini juga dapat digunakan untuk mengontrol lampu di ruangan yang berbeda.

Manfaat:

Memberikan kemudahan dan kenyamanan bagi penggunanya
Meningkatkan keamanan
Meningkatkan estetika ruangan'
        ]);

        DB::table('produks')->insert([
            'kategori_id' => 2,
            'merk_id' => 10,
            'nama' => 'PANASONIC STOP KONTAK PUTIH WIDE SERIES WEJP1131-7',
            'sku' => 'PANAS0800910001',
            'tipe' => 'STOP KONTAK',
            'foto_produk' => 'produks/panas0800910001_el.jpg',
            'harga' => 19100,
            'total_stok' => 600,
            'warna' => 'Putih',
            'publikasi' => 'Ya',
            'ukuran' => '15X4X13CM',
            'deskripsi' => 'Panasonic Stop Kontak Putih Wide Series WEJP1131-7 memberikan kepraktisan dan keamanan yang luar biasa. Dibuat dengan material berkualitas tinggi, stop kontak ini tahan lama dan dapat diandalkan untuk penggunaan sehari-hari yang intens. Anda dapat menggunakan berbagai perangkat listrik dengan nyaman dan aman.

Panasonic Stop Kontak Putih Wide Series WEJP1131-7 juga dilengkapi dengan perlindungan keamanan yang tinggi. Fitur perlindungan dari arus pendek dan lonjakan listrik menjaga peralatan Anda tetap aman dari risiko kebakaran atau kerusakan akibat gangguan listrik.

Stop Kontak Putih Wide Series WEJP1131-7 dapat dipasang di dalam tembok dan dilengkapi dengan standar SNI

Keterangan :
- Stop Kontak Tanam didinding/ tembok (inbow)
- Warna : Putih
- Dimensi Product :8.5x8.5x4cm',
        ]);

        DB::table('produks')->insert([
            'kategori_id' => 2,
            'merk_id' => 5,
            'nama' => 'PANASONIC DOWNLIGHT OUT BOW NLP72306 HITAM',
            'sku' => 'PANAS060225',
            'tipe' => 'DOWNLIGHT KONVENSIONAL (E27)',
            'foto_produk' => 'produks/panas060225_el.jpg',
            'harga' => 92900,
            'total_stok' => 600,
            'warna' => 'Hitam',
            'publikasi' => 'Ya',
            'ukuran' => '145.4X170MM',
        ]);

        DB::table('produks')->insert([
            'kategori_id' => 2,
            'merk_id' => 11,
            'nama' => 'PHILIPS UFO LED BULB 24W E27 6500K 230V',
            'sku' => 'PHILI050179',
            'tipe' => 'BOHLAM LED',
            'foto_produk' => 'produks/phili050179_el.png',
            'harga' => 96000,
            'total_stok' => 600,
            'warna' => 'Putih Terang',
            'publikasi' => 'Ya',
            'ukuran' => '24W',
        ]);


        DB::table('produks')->insert([
            'kategori_id' => 2,
            'merk_id' => 11,
            'nama' => 'PHILIPS TL LED T8 16W 765 1200MM DAYLIGHT',
            'sku' => 'PHILI0501200004',
            'tipe' => 'TL LED',
            'foto_produk' => 'produks/phili0500270003_2_el.jpg',
            'harga' => 87000,
            'total_stok' => 600,
            'warna' => 'Putih Terang',
            'publikasi' => 'Ya',
            'penggunaan' => 'CEILING',
            'finishing' => 'MATT',
            'ukuran' => '120X3CM',
            'deskripsi' => 'Data Produk

Nama Produk: PHILIPS TL LED T8 16W 765 1200MM DAYLIGHT
Merk: Philips
Tipe: Lampu TL LED
Daya: 16W
Watt setara: 36W
Tegangan: 220-240V
Panjang: 1200mm
Tipe soket: G13
CRI: 80
Color temperature: 6500K
Flux cahaya: 1380 lumen
Durasi hidup: 15.000 jam

Fitur:

Hemat energi hingga 80% dibandingkan lampu neon
Durasi hidup hingga 15.000 jam
Cahaya putih terang yang berkualitas
Nyala cepat
Tidak berkedip

Keunggulan:

Hemat energi
PHILIPS TL LED T8 16W 765 1200MM DAYLIGHT menggunakan teknologi LED yang hemat energi hingga 80% dibandingkan lampu neon. Dengan menggunakan lampu ini, Anda dapat menghemat biaya listrik dan mengurangi emisi karbon.

Durasi hidup yang lama
PHILIPS TL LED T8 16W 765 1200MM DAYLIGHT memiliki durasi hidup hingga 15.000 jam, yang berarti Anda dapat menggunakan lampu ini selama lebih dari 15 tahun.

Cahaya putih terang
PHILIPS TL LED T8 16W 765 1200MM DAYLIGHT menghasilkan cahaya putih terang yang ideal untuk berbagai keperluan, seperti pencahayaan umum, kantor, dan industri.

Nyala cepat
PHILIPS TL LED T8 16W 765 1200MM DAYLIGHT dapat menyala dengan cepat, sehingga Anda tidak perlu menunggu lama untuk mendapatkan cahaya yang Anda butuhkan.

Tidak berkedip
PHILIPS TL LED T8 16W 765 1200MM DAYLIGHT tidak berkedip, sehingga tidak akan mengganggu penglihatan Anda.',
        ]);

        DB::table('produks')->insert([
            'kategori_id' => 2,
            'merk_id' => 11,
            'nama' => 'PHILIPS LED BULB 6W E27 6500K GEN8 PACK/4',
            'sku' => 'PHILI050167',
            'tipe' => 'BOHLAM LED',
            'foto_produk' => 'produks/phili050167_el.png',
            'harga' => 158700,
            'total_stok' => 600,
            'warna' => 'Putih Terang',
            'publikasi' => 'Ya',
            'ukuran' => '6W',
            'deskripsi' => 'Lampu LED Philips 6W E27 6500K GEN8 Pack/4 adalah lampu LED hemat energi yang memberikan cahaya putih terang dengan suhu warna 6500K. Lampu ini cocok digunakan untuk berbagai kebutuhan, seperti di rumah, kantor, atau tempat usaha.

Fitur:

Hemat energi hingga 80% dibandingkan lampu pijar
Tahan lama hingga 25.000 jam
Cahaya putih terang
Suhu warna 6500K
Nyala cepat
Aman dan tidak menghasilkan radiasi UV

Manfaat:

Mengurangi biaya listrik
Memperpanjang umur lampu
Memberikan cahaya terang dan nyaman
Aman untuk kesehatan

Spesifikasi:

Daya: 6W
Tipe fitting: E27
Suhu warna: 6500K
Lumens: 800 lumens
Voltase: 220-240V
Frekuensi: 50-60Hz

Tips Perawatan:

Bersihkan lampu LED secara rutin dengan kain kering untuk menghilangkan debu dan kotoran.
Hindari menyentuh bohlam LED dengan tangan telanjang.
Jangan menggunakan lampu LED di tempat yang basah atau lembap.',
        ]);

        DB::table('produks')->insert([
            'kategori_id' => 6,
            'merk_id' => 12,
            'nama' => 'ROMAN CERAMIC WALL TILE 63801R DTUBE 30X60CM WHITE',
            'sku' => 'ROMAN0214580001',
            'tipe' => 'Keramik Dinding Luar (Indoor)',
            'foto_produk' => 'produks/dtube.jpg',
            'harga' => 153000,
            'total_stok' => 600,
            'warna' => 'Putih',
            'publikasi' => 'Ya',
            'material' => 'Keramik',
            'permukaan' => 'Kilap',
            'ukuran' => '30X60CM',
            'bentuk' => 'Solid and Firm',
            'deskripsi' => 'Roman Ceramic Wall Tile 63801R dTube 30x60cm White adalah ubin keramik dinding berukuran 30x60 cm dengan warna putih dari koleksi dTube dari Roman Ubin ini memiliki variasi warna V1 dan tidak memiliki desain acak pada permukaannya Setiap kotak berisi 5 buah ubin dengan total luas 0,90 m2 dan berat 16 kg Kualitas ubin ini adalah KW 1

direkomendasikan agar dipasang secara horizontal untuk mendapatkan efek yang sempurna dari susunan kotak-kotak dengan tepi yang dimiringkan (beveled edge). Selain itu, aplikasi pengisian nat agar menggunakan warna nat ang tercetak di masing-masing kepingan tersebut. 
dTube dengan permukaan glossy ini menjadi pilihan menarik untuk diaplikasikan pada dinding cafe, resto, foyer, toko, kitchen backsplash, kamar mandi, atau interior lainnya yang menginginkan tema minimalis kontemporer.

Kelebihan Ubin Keramik Roman 63801R DTube
Ubin keramik dari Roman ini hadir dengan sejumlah keunggulan yang tak dapat diabaikan:

Desain yang Elegan: Dengan sentuhan modern namun tetap klasik, desain ubin ini mampu menambahkan sentuhan elegan ke dalam ruangan Anda. Ubin dinding dengan desain yang menawan akan memberikan ruangan tampilan yang luar biasa.

Kualitas Terjamin: Roman Ceramic sudah dikenal luas akan kualitas produknya. Begitu juga dengan seri 63801R DTube ini. Terbuat dari bahan keramik pilihan, ubin ini tidak hanya indah tetapi juga tahan lama, memastikan investasi jangka panjang bagi rumah Anda.

Pemasangan yang Mudah: Ubin ini tidak hanya indah dan berkualitas, tetapi juga mudah untuk dipasang. Dengan panduan pemasangan yang jelas, Anda bisa dengan mudah melengkapi proyek dekorasi rumah Anda sendiri.',
        ]);

        DB::table('produks')->insert([
            'kategori_id' => 6,
            'merk_id' => 12,
            'nama' => 'ROMAN CERAMIC WALL TILE 63463R KW1 DCALAB ARABS 0.9 30X60CM',
            'sku' => 'ROMAN0212530001',
            'tipe' => 'Keramik Dinding Luar (Indoor)',
            'foto_produk' => 'produks/dcalvab.jpg',
            'harga' => 153000,
            'total_stok' => 600,
            'warna' => 'Putih',
            'publikasi' => 'Ya',
            'material' => 'Keramik',
            'permukaan' => 'Kilap',
            'ukuran' => '30X60CM',
            'bentuk' => 'Solid and Firm',
            'deskripsi' => 'ROMAN CERAMIC WALL TILE 63463R KW1 DCALAB ARABS 0.9 30X60CM adalah ubin keramik dinding dari Roman dengan kode produk 63463R KW1 DCALAB ARABS 0.9 Ubin ini berukuran 30x60 cm dan dijual dalam kemasan 5 buah dengan total luas 0,90 m2 dan berat 16 kg Kualitas ubin ini adalah KW 1 Ubin ini memiliki desain DCALAB ARABS dan tidak memiliki variasi warna pada permukaannya

Pilihan Ideal untuk Peningkatan Estetika Rumah Anda
Lebih dari Sekadar Ubin Dinding
Perpaduan Tradisi dan Modern: ROMAN CERAMIC WALL TILE 63463R KW1 DCALAB ARABS 0.9 30X60CM adalah perpaduan harmonis antara elemen tradisional dan desain modern. Ini membuatnya cocok untuk berbagai gaya dekorasi interior.

Keindahan dan Daya Tarik Khas Arabesque
Sentuhan Tradisi: Arabesque adalah simbol seni dan keindahan Timur Tengah. Dengan menghadirkan elemen ini dalam desain ruangan, Anda menciptakan koneksi dengan warisan budaya yang kaya.

Keharmonisan Visual: Kombinasi warna dan pola yang terdapat pada ubin ini akan menciptakan keseimbangan visual yang indah. Ruangan akan terasa serasi dan menenangkan.',
        ]);

        DB::table('produks')->insert([
            'kategori_id' => 6,
            'merk_id' => 12,
            'nama' => 'ROMAN GRANITE TILE GT602523R DFOSDINOVO GRG 1.08 60X60CM GRIGIO',
            'sku' => 'ROMAN0302810001',
            'tipe' => '	Granite Dinding, Granite Lantai)',
            'foto_produk' => 'produks/roman0302810001_fl.jpg',
            'harga' => 267500,
            'total_stok' => 600,
            'warna' => 'Abu-Abu',
            'publikasi' => 'Ya',
            'material' => 'Granite',
            'permukaan' => 'Tidak Kilap',
            'ukuran' => '60X60CM',
            'bentuk' => 'Solid and Firm',
            'deskripsi' => 'Granit adalah salah satu bahan berkualitas tinggi yang digunakan di setiap area rumah atau bangunan seperti area Indoor atau Outdoor. Dapat digunakan baik untuk dinding maupun lantai.',
        ]);

        DB::table('produks')->insert([
            'kategori_id' => 6,
            'merk_id' => 12,
            'nama' => 'ROMAN GRANITE TILE GTA332706R DAVERSA 1.08M2 30X30CM ORNATO',
            'sku' => 'ROMAN0300890001',
            'tipe' => '	Granit Dinding, Granit Lantai',
            'foto_produk' => 'produks/daversa.jpg',
            'harga' => 267500,
            'total_stok' => 600,
            'warna' => 'Abu-Abu',
            'publikasi' => 'Ya',
            'material' => 'Granite',
            'permukaan' => 'Tidak Kilap',
            'ukuran' => '30X30CM',
            'bentuk' => 'Solid and Firm',
            'deskripsi' => 'ROMAN GRANITE TILE GTA332706R DAVERSA adalah ubin granit dari merek Roman. Berikut adalah informasi yang dapat ditemukan dari hasil pencarian:

Tipe Produk: Ubin Granit
Merek: Roman
Model: DAVERSA Ornato
Ukuran: 30x30 cm
Varian Warna: Random
Tingkat Slip Resistance: R-9
Rating PEI: 4
Detail Permukaan: GTA332706R
Ubin ini memiliki ukuran 30x30 cm dan varian warna yang random. Permukaan ubin ini memiliki detail GTA332706R. Ubin ini juga memiliki tingkat slip resistance sebesar R-9 dan rating PEI 4

Granit dikenal karena ketahanan dan daya tahan yang luar biasa. ROMAN GRANITE TILE GTA332706R DAVERSA tidak hanya menawarkan keindahan visual, tetapi juga kualitas material yang superior. Ini adalah pilihan yang tahan lama dan berkelas, memberikan ruangan Anda nuansa mewah dan hangat',
        ]);

    }
}
