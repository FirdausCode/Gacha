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

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Data Nasabah</h4>
                                    <a href="{{ route('create.nasabah') }}" class="badge badge-success"
                                        style="text-decoration: none;">Tambah Nasabah Manual</a>
                                    <a href="{{ route('create.nasabah') }}" class="badge badge-info"
                                        style="text-decoration: none;">Import Excel</a>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama </th>
                                                    <th>Wilayah</th>
                                                    <th>Nama Cabang</th>
                                                    <th>Cif</th>
                                                    <th>Telphone</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($nasabah as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->wilayah->name}}</td>
                                                        <td>{{ $item->nameCabang}}</td>
                                                        <td>{{ $item->cif}}</td>
                                                        <td>{{ $item->wa}}</td>
                                                        <td class="d-flex justify-content-center">
                                                          <a href="{{ route('edit.nasabah', ['id' => $item->id]) }}"
                                                              class="badge badge-warning"
                                                              style="text-decoration: none; margin-right: 3px">Edit</a>
                                                          <form
                                                              action="{{ route('nasabah.destroy', ['id' => $item->id]) }}"
                                                              method="POST">
                                                              @csrf
                                                              @method('DELETE')
                                                              <button type="submit" class="badge badge-danger"
                                                                  onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">Hapus</button>
                                                          </form>
                                                      </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
