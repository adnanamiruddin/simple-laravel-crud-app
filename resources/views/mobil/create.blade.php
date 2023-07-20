@extends('layout/template')

@section('konten')
    <form method='POST' action='{{ url('mobil') }}'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nomor_seri" class="col-sm-2 col-form-label">Nomor Seri</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='nomor_seri' id="nomor_seri"
                        value="{{ Session::get('nomor_seri') }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="merek" class="col-sm-2 col-form-label">Merek</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='merek' id="merek"
                        value="{{ Session::get('merek') }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='deskripsi' id="deskripsi"
                        value="{{ Session::get('deskripsi') }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="deskripsi" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                </div>
            </div>
    </form>
    </div>
@endsection
