@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm">
                <tr>
                    <th>ID</th>
                    <td>{{ $barang->barang_id }}</td>
                </tr>
                <tr>
                    <th>Kode Level</th>
                    <td>{{ $barang->barang_kode }}</td>
                </tr>
                <tr>
                    <th>Nama Level</th>
                    <td>{{ $barang->barang_nama }}</td>
                </tr>
            </table>
            <a href="{{ url('barang') }}" class="btn btn-default">Kembali</a>
        </div>
    </div>
@endsection