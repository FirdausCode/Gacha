@section('title')
    {{ 'Hadiah' }}
@endsection
@extends('admin.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <div class="home-tab">

                      <div>
                        <a href="{{ route('create.hadiah') }}" class="btn btn-primary">Tambah</a>
                      </div>
                      <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">img</th>
                                <th scope="col">Hadiah</th>
                                <th scope="col">Wilayah</th>
                                <th scope="col">Jumlah Pemenang</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hadiah as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td><img src="{{ asset('img/'. $item->img) }}" alt="img" style="width: 50px; height:50px; object-fit:cover"></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->wilayah->name }}</td>
                                    <td>{{ $item->nasabah->count() }} Winner</td>
                                    <td class="d-flex justify-content-center">
                                        {{-- <a href="/hadiahNasabah/{{ $item->id }}" class="btn btn-success btn-sm">Lihat</a> --}}
                                        <a href="/admin/hadiah/edit/{{ $item->id }}" class="btn btn-warning btn-sm"
                                          style="text-decoration: none; margin-right: 3px">Edit</a>
                                      <form action="{{ route('hadiah.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                          <button type="submit" class="btn btn-danger btn-sm pl-2" onclick="return confirm
                                        ('Apakah Anda yakin ingin menghapus item ini?')">Hapus</button>
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
@endsection












