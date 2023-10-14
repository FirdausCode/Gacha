@section('title')
    {{ 'Nasabah' }}
@endsection
@extends('user.layout')
@section('content')
    <div class="container">
        <h1>Data Nasabah</h1>

        <div class="body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nama Cabang</th>
                        <th scope="col">Nomor Handphone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nasabah as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->nameCabang }}</td>
                            <td>{{ $item->wa }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            <div>
                <!-- Button trigger modal -->

                <a href="/undiPemenang" class="btn btn-primary">Undi Pemenang</a>
            </div>
        </div>
    </div>
@endsection
