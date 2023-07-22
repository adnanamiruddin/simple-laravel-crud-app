@extends('layout/template')

@section('konten')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form method="GET" action="{{ url('mobil') }}" class="d-flex">
                <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                    placeholder="Masukkan item yang ingin dicari" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>

        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='{{ url('mobil/create') }}' class="btn btn-primary">+ Tambah Data</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-3">Nomor Seri</th>
                    <th class="col-md-4">Merek</th>
                    <th class="col-md-2">Deskripsi</th>
                    <th class="col-md-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstItem(); ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->nomor_seri }}</td>
                        <td>{{ $item->merek }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                            <a href='{{ url("mobil/$item->nomor_seri/edit") }}' class="btn btn-warning btn-sm">Ubah</a>
                            <form method="POST" action="{{ url("mobil/$item->nomor_seri") }}"
                                onsubmit="return confirm('Apakah kamu yakin ingin menghapus data?')" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
        {{ $data->withQueryString()->links() }}
    </div>
@endsection
