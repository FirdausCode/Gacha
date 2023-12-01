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
                            <h4 class="card-title">Default form</h4>
                            <p class="card-description">
                              Basic form layout
                            </p>


                            <form action="{{ route('store.nasabah') }}" method="post">
                              @csrf
                              <div class="form-group mb-3">
                                <label for="exampleInputUsername1">Nama Nasabah</label>
                                <input type="text" class="form-control" name="name" >
                              </div>
                              <div class="form-group mb-3">
                                <label for="exampleInputUsername1">Wilayah</label>
                                <select class="form-select" aria-label="Default select example" name="wilayah_id">
                                  <option selected disabled>== Pilih Wilayah ==</option>
                                  @foreach ($wilayah as $item)
                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="form-group mb-3">
                                <label for="exampleInputUsername1">Nama Cabang</label>
                                <input type="text" class="form-control" name="nameCabang" >
                              </div>
                              <div class="form-group mb-3">
                                <label for="exampleInputUsername1">CIF</label>
                                <input type="text" class="form-control" name="cif" >
                              </div>
                              <div class="form-group mb-3">
                                <label for="exampleInputUsername1">Telpone</label>
                                <input type="text" class="form-control" name="wa" >
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
