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

                        <form action="/admin/hadiah/update/{{ $hadiah->id }}}" method="post" enctype="multipart/form-data">
                            @csrf @method('put')

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Hadiah</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ $hadiah->name }}">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi Hadiah</label>
                                <input type="text" name="description" class="form-control" row="3"
                                    id="description" value="{{ $hadiah->description }}">
                            </div>

                            <div class="mb-3">
                                <label for="wilayah_id" class="form-label">Wilayah</label>
                                <select name="wilayah_id" class="form-select" id="wilayah_id">
                                    <option selected disabled>=== Pilih Wilayah ==</option>
                                    @foreach ($wilayah as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $item->id ? 'selected' : '' }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="jumlahHadiah" class="form-label">Jumlah Hadiah</label>
                                <select name="jumlahHadiah" class="form-select" id="jumlahHadiah">
                                    <option selected disabled>=== Jumlah Hadiah ==</option>
                                    <option value="1" {{ $hadiah->jumlahHadiah == '1' ? 'selected' : '' }}>1 Buah
                                    </option>
                                    <option value="2" {{ $hadiah->jumlahHadiah == '2' ? 'selected' : '' }}>2 Buah
                                    </option>
                                    <option value="3" {{ $hadiah->jumlahHadiah == '3' ? 'selected' : '' }}>3 Buah
                                    </option>
                                    <option value="4" {{ $hadiah->jumlahHadiah == '4' ? 'selected' : '' }}>4 Buah
                                    </option>
                                    <option value="5" {{ $hadiah->jumlahHadiah == '5' ? 'selected' : '' }}>5 Buah
                                    </option>
                                    <option value="6" {{ $hadiah->jumlahHadiah == '6' ? 'selected' : '' }}>6 Buah
                                    </option>
                                    <option value="7" {{ $hadiah->jumlahHadiah == '7' ? 'selected' : '' }}>7 Buah
                                    </option>
                                    <option value="8" {{ $hadiah->jumlahHadiah == '8' ? 'selected' : '' }}>8 Buah
                                    </option>
                                    <option value="9" {{ $hadiah->jumlahHadiah == '9' ? 'selected' : '' }}>9 Buah
                                    </option>
                                </select>
                            </div>


                            {{-- <div class="mb-3">
    <label for="description" class="form-label">Deskripsi Hadiah</label>
    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
  </div> --}}

                            <div class="mb-3">
                                <label for="img" class="form-label">Gambar Hadiah</label>
                                <input type="file" name="img" class="form-control" id="img" 
                                value="{{ $hadiah->img }}">
                            </div>

                            <div class="mb-3">
                              <p>Gambar Saat Ini</p>
                                <img src="{{ asset('img/'.$hadiah->img) }}" alt="" 
                                style="width: 200px; height:200px; object-fit:cover">
                            </div>

                            <a href="{{ route('index.hadiah') }}" class="btn btn-warning">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endsection
