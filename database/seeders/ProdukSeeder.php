<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //AVIAN
        DB::table('produks')->insert([
            'nama' => 'AVIAN GLOSS SUPER WHITE',
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
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/a/v/avian0300060023_pa.jpg',
            'tipe' => 'CAT KAYU DAN BESI',
            'harga' => '73100',
            'merk_id' => '3', 
        ]);
        
        //DEKSON
        DB::table('produks')->insert([
            'nama' => 'DEKKSON PADLOCK PL200 L 50MM',
            'deskripsi' => 'Upgrade engsel pintu atau jendela Anda dengan engsel kupu-kupu dari Dekkson tipe ESS EL 4X3X3MM 4BB SSS. Terbuat dari stainless steel dan dilengkapi dengan 4 ball bearing, engsel ini memiliki kapasitas beban maksimum 75 Kg per pasang. Dapatkan kualitas dan kekuatan terbaik untuk pintu atau jendela Anda dengan engsel Dekkson."

            Berikut adalah beberapa informasi mengenai Dekkson Engsel S4BB:
            
            Kualitas: Engsel ini terbuat dari bahan berkualitas tinggi yang tahan lama dan kuat. Material yang digunakan memberikan kekuatan dan daya tahan yang baik terhadap beban pintu atau jendela.
            
            Desain: Dekkson Engsel S4BB memiliki desain yang elegan dan tampilan yang menarik. Desainnya yang ergonomis memudahkan pemasangan dan penggunaan engsel ini.
            
            Fungsi: Engsel ini digunakan untuk menghubungkan pintu atau jendela dengan bingkai atau dinding. Engsel ini memungkinkan pintu atau jendela untuk dibuka dan ditutup dengan lancar.
            
            Keamanan: Dekkson Engsel S4BB dirancang dengan fitur keamanan yang kuat, menjaga pintu atau jendela tetap stabil dan terkunci dengan aman.
            
            Perawatan: Untuk menjaga kinerja dan keawetan engsel ini, disarankan untuk membersihkannya secara rutin dan memeriksa apakah ada keausan atau kerusakan yang perlu diperbaiki.
            
            Aplikasi: Engsel ini cocok untuk digunakan pada pintu atau jendela di rumah, kantor, atau bangunan komersial lainnya. Engsel ini dapat digunakan untuk berbagai jenis pintu atau jendela dengan berat yang sesuai.
            
            Spesifikasi Produk :
                - Merk : Dekkson
                - Tipe : ESS EL 4X3X3MM 4BB SSS
                - Ball Bearing = 4 Ball Bearing
                - Kapasitas : Beban Maksimum 75 Kg / Pasang (2 Pcs)
                - Material : Stainless Steel',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/d/e/dekks0204240001_bu.png',
            'tipe' => 'PADLOCK',
            'harga' => '122700',
            'merk_id' => '4', 
        ]);
        DB::table('produks')->insert([
            'nama' => 'DEKKSON KUNCI LACI DL138',
            'deskripsi' => 'Kunci laci Dekkson DL138 adalah jenis kunci laci yang digunakan untuk mengunci laci atau drawer Kunci laci ini memiliki ukuran 19 mm x 22 mm dan terbuat dari bahan paduan seng (zinc alloy) dengan finishing chrome  plate. Kunci laci Dekkson DL138 juga memiliki dimensi ukuran 40 x 40 mm dengan ketebalan 5 mm dan diameter kunci 20 mm.
            Spesifikasi Produk :
                - Merk : Dekkson
                - Tipe : DL 138
                - Ukuran : 19 Mm x 22 Mm
                - Material : Zinc Alloy
                - Finishing / Warna : Chrome Plate',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/d/e/dekks030004_bu.jpg',
            'tipe' => 'DRAWER LOCK',
            'harga' => '13400',
            'merk_id' => '4', 
        ]);
        DB::table('produks')->insert([
            'nama' => 'DEKKSON CASEMENT CH425 R/H',
            'deskripsi' => '',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/d/e/dekks030004_bu.jpg',
            'tipe' => '	RAMBUNCIS',
            'harga' => '15000',
            'merk_id' => '4', 
        ]);

        //DULUX
        DB::table('produks')->insert([
            'nama' => 'DULUX PENTALITE A923 CEILING PAINT 25KG',
            'deskripsi' => '',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/d/u/dulux0300180001_pa.jpg',
            'tipe' => '	CAT CEILING',
            'harga' => '855000',
            'merk_id' => '5', 
        ]);
        DB::table('produks')->insert([
            'nama' => 'DULUX PENTALITE A923 CEILING PAINT 25KG',
            'deskripsi' => '',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/d/u/dulux0300180001_pa.jpg',
            'tipe' => '	CAT CEILING',
            'harga' => '855000',
            'merk_id' => '5', 
        ]);
        DB::table('produks')->insert([
            'nama' => 'DULUX WEATHERSHIELD DUAL SHIELD A918-2290M BRILLIANT WHITE 20LT',
            'deskripsi' => '',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/d24a6b57e355322e93abe513866d1b5c/d/u/dulux0300290013_pa.png',
            'tipe' => '	CAT TEMBOK',
            'harga' => '2473600',
            'merk_id' => '5', 
        ]);
        DB::table('produks')->insert([
            'nama' => 'DULUX EASY CLEAN ANTI VIRAL A937-1501 WHITE 20LT',
            'deskripsi' => '',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/d/u/dulux0300280005_pa.jpg',
            'tipe' => '	CAT TEMBOK',
            'harga' => '1844300',
            'merk_id' => '5', 
        ]);

        //MERIDIAN
        DB::table('produks')->insert([
            'nama' => 'MERIDIAN WHITE SHOWER BOX NON TRAY SIKU SSC-20 (B)',
            'deskripsi' => '',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/m/e/merid0400340001_p1.jpg',
            'tipe' => '	SHOWER BOX SET',
            'harga' => '2301000',
            'merk_id' => '6', 
        ]);
        DB::table('produks')->insert([
            'nama' => 'MERIDIAN BASIN CABINET BC 619-60',
            'deskripsi' => '',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/m/e/merid0900800001_p1.jpg',
            'tipe' => 'BASIN CABINET SET',
            'harga' => '2558000',
            'merk_id' => '6', 
        ]);

        //MODENA
        DB::table('produks')->insert([
            'nama' => 'MODENA KOMPOR TANAM BIH BH1725 (BL) CRISTA',
            'deskripsi' => '',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/m/e/merid0900800001_p1.jpg',
            'tipe' => 'BUILT IN HOB',
            'harga' => '4049444',
            'merk_id' => '7', 
        ]);
        DB::table('produks')->insert([
            'nama' => 'MODENA DISPENSER DD 68 L',
            'deskripsi' => '',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/m/o/moden040015_hw.jpg',
            'tipe' => 'BUILT IN HOB',
            'harga' => '4173000',
            'merk_id' => '7', 
        ]);
        DB::table('produks')->insert([
            'nama' => 'MODENA KOMPOR TANAM HOB BH 2723 LL',
            'deskripsi' => '',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/m/e/merid0900800001_p1.jpg',
            'tipe' => 'BUILT IN HOB',
            'harga' => '6115278',
            'merk_id' => '7', 
        ]);
        DB::table('produks')->insert([
            'nama' => 'MODENA DISPENSER DD 65 L',
            'deskripsi' => '',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/m/o/moden040017_hw.png',
            'tipe' => '	DISPENSER',
            'harga' => '3622917',
            'merk_id' => '7', 
        ]);

        //Nippon Paint
        DB::table('produks')->insert([
            'nama' => 'NIPPON SAND PAPER 240',
            'deskripsi' => '',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/n/i/nippo0500110003_pa.jpg',
            'tipe' => 'AMPLAS',
            'harga' => '3500',
            'merk_id' => '9', 
        ]);

        //Panasonic
        DB::table('produks')->insert([
            'nama' => 'PANASONIC SAKLAR SERI PUTIH WIDE SERIES WEJ5531X2+78029W',
            'deskripsi' => 'Panasonic Saklar Seri Putih Wide Series WEJ5531X2+78029W adalah produk saklar ganda yang berkualitas tinggi dan memiliki desain yang elegan. Saklar ini cocok digunakan untuk berbagai kebutuhan, baik untuk rumah tangga maupun komersial.

            Dengan fitur-fitur canggih yang dimilikinya, Panasonic Saklar Seri Putih Wide Series WEJ5531X2+78029W dapat memberikan kemudahan dan kenyamanan bagi penggunanya. Selain itu, saklar ini juga dapat meningkatkan keamanan dan estetika ruangan.',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/w/i/wide_series_wej5531x2_78029w.jpg',
            'tipe' => 'SERI DUA',
            'harga' => '30300',
            'merk_id' => '10', 
        ]);
        DB::table('produks')->insert([
            'nama' => 'PANASONIC STOP KONTAK PUTIH WIDE SERIES WEJP1131-7',
            'deskripsi' => 'Panasonic Stop Kontak Putih Wide Series WEJP1131-7 memberikan kepraktisan dan keamanan yang luar biasa. Dibuat dengan material berkualitas tinggi, stop kontak ini tahan lama dan dapat diandalkan untuk penggunaan sehari-hari yang intens. Anda dapat menggunakan berbagai perangkat listrik dengan nyaman dan aman.

            Panasonic Stop Kontak Putih Wide Series WEJP1131-7 juga dilengkapi dengan perlindungan keamanan yang tinggi. Fitur perlindungan dari arus pendek dan lonjakan listrik menjaga peralatan Anda tetap aman dari risiko kebakaran atau kerusakan akibat gangguan listrik.
            
            Stop Kontak Putih Wide Series WEJP1131-7 dapat dipasang di dalam tembok dan dilengkapi dengan standar SNI
            
            Keterangan :
            - Stop Kontak Tanam didinding/ tembok (inbow)
            - Warna : Putih
            - Dimensi Product :8.5x8.5x4cm',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/w/i/wide_series_wej5531x2_78029w.jpg',
            'tipe' => 'STOP KONTAK',
            'harga' => '19100',
            'merk_id' => '10', 
        ]);
        DB::table('produks')->insert([
            'nama' => 'PANASONIC DOWNLIGHT OUT BOW NLP72306 HITAM',
            'deskripsi' => '',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/p/a/panas060225_el.jpg',
            'tipe' => 'DOWNLIGHT KONVENSIONAL (E27)',
            'harga' => '92900',
            'merk_id' => '10', 
        ]);
        DB::table('produks')->insert([
            'nama' => 'PANASONIC MESIN CUCI NA-127XB1WNE',
            'deskripsi' => '',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/1/2/127xb1wne.jpg',
            'tipe' => 'MESIN CUCI',
            'harga' => '5331000',
            'merk_id' => '10', 
        ]);

        //Philips
        DB::table('produks')->insert([
            'nama' => 'PHILIPS UFO LED BULB 24W E27 6500K 230V',
            'deskripsi' => '',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/p/h/phili050179_el.png',
            'tipe' => 'BOHLAM LED',
            'harga' => '220900',
            'merk_id' => '11', 
        ]);
        DB::table('produks')->insert([
            'nama' => 'PHILIPS TL LED T8 16W 765 1200MM DAYLIGHT',
            'deskripsi' => '',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/p/h/phili0500270003_2_el.jpg',
            'tipe' => 'TL LED',
            'harga' => '87000',
            'merk_id' => '11', 
        ]);
        DB::table('produks')->insert([
            'nama' => 'PHILIPS MESON 59464 13W 65K DOWNLIGHT DAYLIGHT PACK/3',
            'deskripsi' => '',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/p/h/phili061101_el.jpg',
            'tipe' => 'DOWNLIGHT LED',
            'harga' => '287200',
            'merk_id' => '11', 
        ]);
        DB::table('produks')->insert([
            'nama' => 'PHILIPS LED BULB 6W E27 6500K GEN8 PACK/4',
            'deskripsi' => '',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/p/h/phili050167_el.png',
            'tipe' => 'BOHLAM LED',
            'harga' => '158700',
            'merk_id' => '11', 
        ]);

        //ROMAN
        DB::table('produks')->insert([
            'nama' => 'ROMAN CERAMIC WALL TILE 63801R DTUBE 30X60CM WHITE',
            'deskripsi' => 'Roman Ceramic Wall Tile 63801R dTube 30x60cm White adalah ubin keramik dinding berukuran 30x60 cm dengan warna putih dari koleksi dTube dari Roman Ubin ini memiliki variasi warna V1 dan tidak memiliki desain acak pada permukaannya Setiap kotak berisi 5 buah ubin dengan total luas 0,90 m2 dan berat 16 kg Kualitas ubin ini adalah KW 1

            direkomendasikan agar dipasang secara horizontal untuk mendapatkan efek yang sempurna dari susunan kotak-kotak dengan tepi yang dimiringkan (beveled edge). Selain itu, aplikasi pengisian nat agar menggunakan warna nat ang tercetak di masing-masing kepingan tersebut. 
            dTube dengan permukaan glossy ini menjadi pilihan menarik untuk diaplikasikan pada dinding cafe, resto, foyer, toko, kitchen backsplash, kamar mandi, atau interior lainnya yang menginginkan tema minimalis kontemporer.',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/d/t/dtube.jpg',
            'tipe' => 'Keramik Dinding Luar (Indoor)',
            'harga' => '197500',
            'merk_id' => '12', 
        ]);
        DB::table('produks')->insert([
            'nama' => 'ROMAN CERAMIC WALL TILE 63463R KW1 DCALAB ARABS 0.9 30X60CM',
            'deskripsi' => 'ROMAN CERAMIC WALL TILE 63463R KW1 DCALAB ARABS 0.9 30X60CM adalah ubin keramik dinding dari Roman dengan kode produk 63463R KW1 DCALAB ARABS 0.9 Ubin ini berukuran 30x60 cm dan dijual dalam kemasan 5 buah dengan total luas 0,90 m2 dan berat 16 kg Kualitas ubin ini adalah KW 1 Ubin ini memiliki desain DCALAB ARABS dan tidak memiliki variasi warna pada permukaannya',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/d/c/dcalvab.jpg',
            'tipe' => 'Keramik Dinding Luar (Indoor)',
            'harga' => '163000',
            'merk_id' => '12', 
        ]);
        DB::table('produks')->insert([
            'nama' => 'ROMAN GRANITE TILE GT602523R DFOSDINOVO GRG 1.08 60X60CM GRIGIO',
            'deskripsi' => 'Granit adalah salah satu bahan berkualitas tinggi yang digunakan di setiap area rumah atau bangunan seperti area Indoor atau Outdoor. Dapat digunakan baik untuk dinding maupun lantai.',
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/r/o/roman0302810001_fl.jpg',
            'tipe' => 'Granite Dinding, Granite Lantai',
            'harga' => '168500',
            'merk_id' => '12', 
        ]);
        DB::table('produks')->insert([
            'nama' => 'ROMAN GRANITE TILE GTA332706R DAVERSA 1.08M2 30X30CM ORNATO',
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
            'fotoProduk' => 'https://www.depobangunan.co.id/media/catalog/product/cache/71f305564ac6e04ecc05726940a4946c/d/a/daversa.jpg',
            'tipe' => 'Granite Dinding, Granite Lantai',
            'harga' => '267500',
            'merk_id' => '12', 
        ]);
    }
}
