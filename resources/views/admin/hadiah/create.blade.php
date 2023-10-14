@section('title')
    {{ 'Wilayah' }}
@endsection
@extends('admin.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="home-tab">

                      <a href=""></a>

                        <form action="{{ route('store.hadiah') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Hadiah</label>
                                <input type="text" name="name" class="form-control" id="name">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi Hadiah</label>
                                <input type="text" name="description" class="form-control" row="3"
                                    id="description">
                            </div>

                            <div class="mb-3">
                              <label for="wilayah_id" class="form-label">Wilayah</label>
                              <select name="wilayah_id" class="form-select" id="wilayah_id">
                                  <option selected disabled>=== Pilih Wilayah ==</option>
                                  @foreach ($wilayah as $item)
                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                                  @endforeach
                              </select>
                          </div>
                          

                            {{-- <div class="mb-3">
    <label for="description" class="form-label">Deskripsi Hadiah</label>
    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
  </div> --}}

                            <div class="mb-3">
                                <label for="img" class="form-label">Gambar Hadiah</label>
                                <input type="file" name="img" class="form-control" id="img">
                            </div>

                            <a href="{{ route('index.hadiah') }}" class="btn btn-warning">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection
