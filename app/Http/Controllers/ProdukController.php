<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Produk;
use App\Models\Ruangan;
use App\Models\Kategori;

use Illuminate\Http\Request;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $listProduct = Produk::join('merks', 'merks.id', '=', 'produks.merk_id')
            ->join('kategoris', 'kategoris.id', '=', 'produks.kategori_id')
            ->select('produks.*', 'merks.nama as nama_merk', 'kategoris.nama as nama_kategori')
            ->orderBy('produks.id', 'asc')
            ->get();


        return view('master.produk.daftarproduk', compact('listProduct'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merks = Merk::all();
        // $kategoris = Kategori::all();
        $ruangans = Ruangan::all();
        $kategoris = kategori::all();

        return view('master.produk.insertproduk', compact('merks', 'kategoris', 'ruangans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        $validatedData = $request->validate([
            'merk_id' => 'required',
            'kategori_id' => 'required',
            'sku' => 'required',
            'nama' => 'required',
            'tipe' => 'required',
            'harga' => 'required',
            'ruangan' => 'required',
            'foto_produk' => 'image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'merk_id.required' => 'Wajib diisi!',
            'kategori_id.required' => 'Wajib diisi!',
            'sku.required' => 'Wajib diisi!',
            'nama.required' => 'Wajib diisi!',
            'tipe.required' => 'Wajib diisi!',
            'harga.required' => 'Wajib diisi!',
            'ruangan.required' => 'Wajib diisi!',
            'foto_produk.image' => 'File harus bertipe gambar!',
            'foto_produk.mimes' => 'File harus bertipe jpeg/png/jpg!',
            'foto_produk.max' => 'File melebihi batas ukuran 2MB!',
        ]);

        try {
            if ($request->hasFile('foto_produk')) {
                $image = $request->file('foto_produk');
                $image->getClientOriginalName();
                $imageName = 'produks/' . $image->getClientOriginalName();      
            }

            $produk = Produk::create([
                'merk_id' => $validatedData['merk_id'],
                'kategori_id' => $validatedData['kategori_id'],
                'sku' => $validatedData['sku'],
                'nama' => $validatedData['nama'],
                'tipe' => $validatedData['tipe'],
                'foto_produk' => $imageName,
                'harga' => $validatedData['harga'],
                'total_stok' => 0,
                'publikasi' => $request->input('publikasi'),
                'warna' => $request->input('warna'),
                'permukaan' => $request->input('permukaan'),
                'bentuk' => $request->input('bentuk'),
                'material' => $request->input('material'),
                'finishing' => $request->input('finishing'),
                'penggunaan' => $request->input('penggunaan'),
                'ukuran' => $request->input('ukuran'),
                'volume' => $request->input('volume'),
                'harga_spesial' => $request->input('harga_spesial'),
                'tgl_mulai_harga_spesial' => $request->input('tgl_mulai_harga_spesial'),
                'tgl_selesai_harga_spesial' => $request->input('tgl_selesai_harga_spesial'),
                'deskripsi' => $request->input('deskripsi'),
            ]);

            $ruanganArray = json_decode($validatedData['ruangan']);

            foreach ($ruanganArray as $value) {

                $id_ruangan = Ruangan::where('nama', $value->value)
                    ->value('id');

                ProdukRuangan::insert([
                    'produk_id' => $produk->id,
                    'ruangan_id' => $id_ruangan,
                ]);
            }

            DB::commit();

            $image->move(public_path('uploads/'), $imageName);

            toast('Penambahan data berhasil!', 'success');
            return redirect()->route('produk.create');

        } catch (\Exception $e) {
            DB::rollback();

            // dd($e);

            toast('Penambahan data gagal!', 'warning');
            return redirect()->route('produk.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailProduk = Produk::join('merks', 'merks.id', '=', 'produks.merk_id')
        ->join('kategoris', 'kategoris.id', '=', 'produks.kategori_id')
        ->join('kategoris', 'kategoris.id', '=', 'kategoris.kategori_id')
        ->select('produks.*', 'merks.nama as nama_merk', 'kategoris.nama as nama_kategori', 'kategoris.nama as nama_kategori')
        ->where('produks.id', $id)
        ->get();


        $tokos = Toko::join('produk_tokos', 'produk_tokos.toko_id', '=', 'tokos.id')
            ->select('produk_tokos.*', 'tokos.*')
            ->where('produk_tokos.produk_id', $id)
            ->orderBy('tokos.id')
            ->get();

    return view('master.produk.detailproduk', compact('detailProduk', 'tokos'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detailProduk = Produk::join('merks', 'merks.id', '=', 'produks.merk_id')
        ->join('kategoris', 'kategoris.id', '=', 'produks.kategori_id')
        ->select('produks.*', 'merks.id as id_merk', 'kategoris.nama as nama_kategori', 'kategoris.id as id_kategoris')
        ->where('produks.id', $id)
        ->get();



    $merks = Merk::all();
    $ruangans = Ruangan::all();
    $kategoris = kategori::all();

    // dd($detailRuangan);

    return view('master.produk.editproduk', compact('detailProduk', 'merks', 'ruangans', 'kategoris'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::beginTransaction();

        $validatedData = $request->validate([
            'merk_id' => 'required',
            'kategori_id' => 'required',
            'sku' => 'required',
            'nama' => 'required',
            'tipe' => 'required',
            'harga' => 'required',
            'ruangan' => 'required',
            'foto_produk' => 'image|mimes:jpeg,png,jpg',
        ], [
            'merk_id.required' => 'Wajib diisi!',
            'kategori_id.required' => 'Wajib diisi!',
            'sku.required' => 'Wajib diisi!',
            'nama.required' => 'Wajib diisi!',
            'tipe.required' => 'Wajib diisi!',
            'harga.required' => 'Wajib diisi!',
            'ruangan.required' => 'Wajib diisi!',
            'foto_produk.image' => 'File harus bertipe gambar!',
            'foto_produk.mimes' => 'File harus bertipe jpeg/png/jpg!',
            'foto_produk.max' => 'File melebihi batas ukuran 2MB!',
        ]);

        $imageName = Produk::where('id', $id)
            ->value('foto_produk');

        $imageNameBefore = $imageName;

        $filePath = public_path('uploads/') . $imageNameBefore;

        // try {

            if ($request->hasFile('foto_produk')) {
                $image = $request->file('foto_produk');
                $image->getClientOriginalName();
                $imageName = 'produks/' . $image->getClientOriginalName();
            }

            Produk::where('id', $id)
                ->update([
                    'merk_id' => $validatedData['merk_id'],
                    'kategori_id' => $validatedData['kategori_id'],
                    'sku' => $validatedData['sku'],
                    'nama' => $validatedData['nama'],
                    'tipe' => $validatedData['tipe'],
                    'foto_produk' => $imageName,
                    'harga' => $validatedData['harga'],
                    // 'publikasi' => $request->input('publikasi'),
                    // 'warna' => $request->input('warna'),
                    // 'permukaan' => $request->input('permukaan'),
                    // 'bentuk' => $request->input('bentuk'),
                    // 'material' => $request->input('material'),
                    // 'finishing' => $request->input('finishing'),
                    // 'penggunaan' => $request->input('penggunaan'),
                    'ukuran' => $request->input('ukuran'),
                    // 'volume' => $request->input('volume'),
                    // 'harga_spesial' => $request->input('harga_spesial'),
                    // 'tgl_mulai_harga_spesial' => $request->input('tgl_mulai_harga_spesial'),
                    // 'tgl_selesai_harga_spesial' => $request->input('tgl_selesai_harga_spesial'),
                    // 'deskripsi' => $request->input('deskripsi'),
                ]);

            $ruanganArray = json_decode($validatedData['ruangan']);

            DB::statement('SET foreign_key_checks=0;');
            ProdukRuangan::where('produk_id', $id)->delete();
            DB::statement('SET foreign_key_checks=1;');

            foreach ($ruanganArray as $value) {

                $id_ruangan = Ruangan::where('nama', $value->value)
                    ->value('id');

                ProdukRuangan::insert([
                    'produk_id' => $id,
                    'ruangan_id' => $id_ruangan,
                ]);
            }

            DB::commit();

            $image->move(public_path('uploads/'), $imageName);

            if (File::exists($filePath)) {

                File::delete($filePath);
            }

            // toast('Perubahan data berhasil!', 'success');
            // return redirect()->route('produk.edit', $id);

        // } catch (\Exception $e) {
        //     DB::rollback();

        //     // dd($e);

        //     toast('Perubahan data gagal!', 'warning');
        //     return redirect()->route('produk.edit', $id);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {

            $imageName = Produk::where('id', $id)
                ->value('foto_produk');

            $filePath = public_path('uploads/') . $imageName;

            $cekProdukNotaBeli = PembelianDetail::where('produk_id', $id)
                ->first();

            $cekProdukNotaJual = DetailTransaksi::where('produk_id', $id)
                ->first();

            if ($cekProdukNotaJual == null && $cekProdukNotaBeli == null) {
                DB::statement('SET foreign_key_checks=0;');
                Produk::where('id', $id)->delete();
                DB::statement('SET foreign_key_checks=1;');

                DB::commit();

                if (File::exists($filePath)) {

                    File::delete($filePath);
                }

                alert()->success('Hore!', 'Data Deleted Successfully');
                return redirect()->route('produk.index');
            }
            else{
                alert()->error('Gagal!', 'Tidak bisa menghapus data karena data produk terdapat di data penjualan dan pembelian');
                return redirect()->route('produk.index');
            }

            if ($cekProdukNotaJual == null) {
                DB::statement('SET foreign_key_checks=0;');
                Produk::where('id', $id)->delete();
                DB::statement('SET foreign_key_checks=1;');

                DB::commit();

                if (File::exists($filePath)) {

                    File::delete($filePath);
                }

                alert()->success('Hore!', 'Data Deleted Successfully');
                return redirect()->route('produk.index');
            } else {
                alert()->error('Gagal!', 'Tidak bisa menghapus data karena data produk terdapat di data penjualan');
                return redirect()->route('produk.index');
            }

            if ($cekProdukNotaBeli == null) {
                DB::statement('SET foreign_key_checks=0;');
                Produk::where('id', $id)->delete();
                DB::statement('SET foreign_key_checks=1;');

                DB::commit();

                if (File::exists($filePath)) {

                    File::delete($filePath);
                }
                
                alert()->success('Hore!', 'Data Deleted Successfully');
                return redirect()->route('produk.index');
            } else {
                alert()->error('Gagal!', 'Tidak bisa menghapus data karena data produk terdapat di data pembelian');
                return redirect()->route('produk.index');
            }


        } catch (\Exception $e) {

            DB::rollBack();

            alert()->error('Yahhh..', 'Menghapus data tidak berhasil!');
            return redirect()->route('produk.index');
        }
    }

    public function album(){
        $ProdukList = DB::table('produks')->get();
        return view('produk.album',compact('ProdukList'));
    }

    public function katalog(Request $request)
    {
        $user = Auth::user();

        $selectedkategori = $request->input('kategori', []);
        $selectedstore = $request->input('store', []);
        $search = $request->query('search');

        $listProduct = Produk::select('id', 'foto_produk', 'nama', 'harga', (DB::raw("CONCAT(SUBSTRING_INDEX(deskripsi, ' ', 20),'...') AS deskripsi")))->get();

        if ($selectedkategori != null) {

            $listProduct = Produk::join('produk_tokos', 'produk_tokos.produk_id', '=', 'produks.id')
                ->join('kategoris', 'kategoris.id', '=', 'produks.kategori_id')
                ->select('produks.id', 'produks.foto_produk', 'produks.nama', 'produks.harga', (DB::raw("CONCAT(SUBSTRING_INDEX(produks.deskripsi, ' ', 20),'...') AS deskripsi")))
                ->whereIn('kategoris.kategori_id', $selectedkategori)
                ->where('produk_tokos.stok', '>', 0)
                ->get();
        }

        if ($selectedstore != null) {

            $listProduct = Produk::join('produk_tokos', 'produk_tokos.produk_id', '=', 'produks.id')
                ->select('produks.id', 'produks.foto_produk', 'produks.nama', 'produks.harga', (DB::raw("CONCAT(SUBSTRING_INDEX(produks.deskripsi, ' ', 20),'...') AS deskripsi")))
                ->whereIn('produk_tokos.toko_id', $selectedstore)
                ->where('produk_tokos.stok', '>', 0)
                ->get();
        }

        if ($selectedstore && $selectedkategori != null) {

            $listProduct = Produk::join('produk_tokos', 'produk_tokos.produk_id', '=', 'produks.id')
                ->join('kategoris', 'kategoris.id', '=', 'produks.kategori_id')
                ->select('produks.id', 'produks.foto_produk', 'produks.nama', 'produks.harga', (DB::raw("CONCAT(SUBSTRING_INDEX(produks.deskripsi, ' ', 20),'...') AS deskripsi")))
                ->whereIn('kategoris.kategori_id', $selectedkategori)
                ->whereIn('produk_tokos.toko_id', $selectedstore)
                ->where('produk_tokos.stok', '>', 0)
                ->get();
        }

        if ($search != null) {

            $listProduct = Produk::select('id', 'foto_produk', 'nama', 'harga', (DB::raw("CONCAT(SUBSTRING_INDEX(deskripsi, ' ', 20),'...') AS deskripsi")))
                ->where('nama', 'like', '%' . $search . '%')
                ->get();
        }


        $listCart = Keranjang::join('produks', 'produks.id', '=', 'keranjangs.pt_produk_id')
            ->select('produks.foto_produk', 'keranjangs.id', 'produks.nama', 'produks.harga', 'keranjangs.kuantitas')
            ->where('keranjangs.user_id', $user->id)
            ->get();


        $subTotal = Keranjang::join('produk_tokos', 'produk_tokos.produk_id', '=', 'keranjangs.pt_produk_id')
            ->join('produks', 'produks.id', '=', 'produk_tokos.produk_id')
            ->select('produks.foto_produk', 'keranjangs.id', 'produks.nama', 'produks.harga', 'keranjangs.kuantitas')
            ->where('keranjangs.user_id', $user->id)
            ->sum(DB::raw('produks.harga * keranjangs.kuantitas'));

        $vat = $subTotal * 20 / 100;
        $total = $subTotal + $vat;


        $count = Keranjang::join('produk_tokos', 'produk_tokos.produk_id', '=', 'keranjangs.pt_produk_id')
            ->join('produks', 'produks.id', '=', 'produk_tokos.produk_id')
            ->select('produks.foto_produk', 'keranjangs.id', 'produks.nama', 'produks.harga', 'keranjangs.kuantitas')
            ->where('keranjangs.user_id', $user->id)
            ->count();

        $kategoris = Kategori::all();
        $stores = Toko::all();

        return view('checkout.index', compact('listProduct', 'listCart', 'subTotal', 'vat', 'total', 'count', 'kategoris', 'stores', 'selectedkategori', 'selectedstore'));
        // dd($listCart);
    }

    public function detail($id)
    {
        $user = Auth::user();

        $listCart = Keranjang::join('produks', 'produks.id', '=', 'keranjangs.pt_produk_id')
            ->select('produks.foto_produk', 'keranjangs.id', 'produks.nama', 'produks.harga', 'keranjangs.kuantitas')
            ->where('keranjangs.user_id', $user->id)
            ->get();


        $produk = Produk::join('produk_tokos', 'produk_tokos.produk_id', '=', 'produks.id')
            ->select('produks.*', 'produk_tokos.stok')
            ->where('produks.id', $id)
            ->first();


        $lokasi = Toko::join('produk_tokos', 'produk_tokos.toko_id', '=', 'tokos.id')
            ->select('tokos.*')
            ->where('produk_tokos.produk_id', $id)
            ->where('produk_tokos.stok', '>', 0)
            ->distinct('tokos.nama')
            ->get();


        $stok = ProdukToko::select('stok')
            ->where('produk_tokos.produk_id', $id)
            ->groupBy('produk_tokos.produk_id')
            ->sum('stok');

        $cekStock = ProdukToko::join('tokos', 'produk_tokos.toko_id', '=', 'tokos.id')
            ->select(DB::raw('SUM(produk_tokos.stok) as stok'), 'tokos.nama')
            ->where('produk_tokos.produk_id', $id)
            ->groupBy('produk_tokos.toko_id', 'tokos.nama')
            ->get();

        return view('checkout.detail', compact('produk', 'lokasi', 'stok', 'listCart', 'cekStock'));
        // dd($produk);
        }

        public function transactionHistory()
        {
            $user = Auth::user();
            $transactionList = Transaksi::where('user_id', $user->id)->get();
            return view('pelanggan.profile.transactionHIstory', compact('transactionList'));
            // dd($transactionList);
        }
}
