@extends('layouts.app')
{{-- memanggil isi konten layouts --}}

@section('title', 'Daftar Kontak')
{{-- memanggil yield title --}}

@section('content')
{{-- memanggil yield content --}}
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if(session('success'))
                {{-- jika ada pesan sukses --}}
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Daftar Kontak</h2>
                <a href="{{ route('kontaks.create') }}" class="btn btn-primary">Tambah Kontak</a>
                {{-- href bisa langsung panggil route yang dibuat --}}
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kontaks as $kontak)
                        {{-- looping data dari controller --}}
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kontak->nama }}</td>
                            <td>{{ $kontak->alamat }}</td>
                            <td>{{ $kontak->no_hp }}</td>
                            <td>
                                <a href="{{ route('kontaks.show', $kontak->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                <a href="{{ route('kontaks.edit', $kontak->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('kontaks.destroy', $kontak->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $kontaks->links() }}
            {{-- pagination dari controller --}}
        </div>
    </div>
</div>
@endsection
