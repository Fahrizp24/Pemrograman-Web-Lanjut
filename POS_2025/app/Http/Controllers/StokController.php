<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangModel;
use App\Models\StokModel;
use App\Models\UserModel;
use Yajra\DataTables\Facades\DataTables;

class StokController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Data Stok Barang',
            'list' => ['Home', 'Stok']
        ];

        $page = (object) [
            'title' => 'Data Stok Barang'
        ];

        $barang = BarangModel::all();
        $activeMenu = 'stok';
        $stok = StokModel::all();
        return view('stok.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'barang' => $barang,
            'stok' => $stok
        ]);
    }

    public function list(Request $request)
    {
        $stok = StokModel::with(['barang', 'supplier']) // Pastikan memuat relasi barang & supplier
            ->select('stok_id', 'barang_id', 'stok_jumlah', 'supplier_id');

        return DataTables::of($stok)
            ->addIndexColumn()
            ->addColumn('barang_nama', function ($stok) {
                return $stok->barang->barang_nama ?? '-'; // Pastikan menggunakan $stok
            })
            ->addColumn('supplier_nama', function ($stok) {
                return $stok->supplier->supplier_nama ?? '-'; // Pastikan menggunakan $stok
            })
            ->addColumn('aksi', function ($stok) {
                $btn = '<a href="' . url('/stok/' . $stok->stok_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/stok/' . $stok->stok_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/stok/' . $stok->stok_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Hapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }


    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Stok Barang',
            'list' => ['Home', 'Stok', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Stok Barang'
        ];

        $barang = BarangModel::all();
        $users = UserModel::all(); // Ambil data user dari database
        $activeMenu = 'stok';

        return view('stok.create', compact('breadcrumb', 'page', 'barang', 'users', 'activeMenu'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'barang_id' => 'required',
    //         'stok_jumlah' => 'required|numeric',
    //         'stok_tanggal' => 'required|date',
    //         'user_id' => 'required|integer', // Validasi untuk user_id
    //     ]);

    //     StokModel::create([
    //         'barang_id' => $request->barang_id,
    //         'stok_jumlah' => $request->stok_jumlah,
    //         'stok_tanggal' => $request->stok_tanggal,
    //         'user_id' => $request->user_id, // Mengambil user_id dari form
    //     ]);

    //     return redirect('/stok')->with('success', 'Data stok berhasil disimpan');
    // }

    public function show($id)
    {
        $breadcrumb = (object) [
            'title' => 'Detail Stok Barang',
            'list' => ['Home', 'Stok', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Stok Barang'
        ];

        $stok = StokModel::with('barang')->find($id);
        $activeMenu = 'stok';

        return view('stok.show', compact('breadcrumb', 'page', 'stok', 'activeMenu'));
    }

    public function edit($id)
    {
        $breadcrumb = (object) [
            'title' => 'Edit Stok Barang',
            'list' => ['Home', 'Stok', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Stok Barang'
        ];

        $stok = StokModel::find($id);
        $barang = BarangModel::all();
        $activeMenu = 'stok';

        return view('stok.edit', compact('breadcrumb', 'page', 'stok', 'barang', 'activeMenu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required',
            'stok_jumlah' => 'required|numeric',
            'stok_tanggal' => 'required|date',
        ]);

        $stok = StokModel::find($id);

        if (!$stok) {
            return redirect('/stok')->with('error', 'Data stok tidak ditemukan');
        }

        $stok->barang_id = $request->barang_id;
        $stok->stok_jumlah = $request->stok_jumlah;
        $stok->stok_tanggal = $request->stok_tanggal;
        $stok->save();

        return redirect('/stok')->with('success', 'Data stok berhasil diubah');
    }

    public function destroy($id)
    {
        $stok = StokModel::find($id);

        if (!$stok) {
            return redirect('/stok')->with('error', 'Data stok tidak ditemukan');
        }

        $stok->delete();

        return redirect('/stok')->with('success', 'Data stok berhasil dihapus');
    }
}