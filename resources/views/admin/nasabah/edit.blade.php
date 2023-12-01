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

                      

                      <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Edit Nasabah</h4>
                            <p class="card-description">
                            </p>


                            <form action="{{ route('update.nasabah', ['id' => $nasabah->id]) }}" method="post">
                              @csrf @method('put')
                              <div class="form-group mb-3">
                                <label for="exampleInputUsername1">Nama Nasabah</label>
                                <input type="text" class="form-control" name="name" value="{{ $nasabah->name }}" >
                              </div>
                              <div class="form-group mb-3">
                                <label for="exampleInputUsername1">Wilayah</label>
                                <select class="form-select" aria-label="Default select example" name="wilayah_id">
                                    <option selected disabled>== Pilih Wilayah ==</option>
                                    @foreach ($wilayah as $item)
                                        @if ($nasabah->wilayah_id == $item->id)
                                            <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                              <div class="form-group mb-3">
                                <label for="exampleInputUsername1">Nama Cabang</label>
                                <input type="text" class="form-control" name="nameCabang" value="{{ $nasabah->nameCabang }}" >
                              </div>
                              <div class="form-group mb-3">
                                <label for="exampleInputUsername1">CIF</label>
                                <input type="text" class="form-control" name="cif" value="{{ $nasabah->cif }}">
                              </div>
                              <div class="form-group mb-3">
                                <label for="exampleInputUsername1">Telpone</label>
                                <input type="text" class="form-control" name="wa" value="{{ $nasabah->wa }}" >
                              </div>
                              
                              

                              <button type="submit" class="btn btn-primary me-2">Submit</button>
                              <a href="{{ route('index.nasabah') }}" class="btn btn-warning me-2">Kembali</a>
                            </form>


                          </div>
                        </div>
                      </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
