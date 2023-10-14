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


                            <form action="{{ route('store.wilayah') }}" method="post">
                              @csrf
                              <div class="form-group">
                                <label for="exampleInputUsername1">Nama Wilayah</label>
                                <input type="text" class="form-control" name="name" >
                              </div>
                              

                              <button type="submit" class="btn btn-primary me-2">Submit</button>
                              <a href="{{ route('index.wilayah') }}" class="btn btn-warning me-2">Kembali</a>
                            </form>


                          </div>
                        </div>
                      </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
