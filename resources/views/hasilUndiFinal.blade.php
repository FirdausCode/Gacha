@section('title')
    {{ 'Hadiah' }}
@endsection
@extends('user.layout')
@section('content')
    <div class="container">
        <h2>Hadiah Wilayah {{ $hadiahNasabah->wilayah->name }}</h2>

        <div class="body">

            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <img src="{{ asset('img/' . $hadiahNasabah->img) }}" alt=""
                            style="width:200px; height:200px; object-fit:cover">
                        <h3>Hadiah {{ $hadiahNasabah->name }}</h3>
                    </div>
                    <div class="col">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Iteration</th>
                                    <th>Name</th>
                                    <th>Name Cabang</th>
                                    <th>WhatsApp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($hadiahNasabah->nasabah as $nasabah)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $nasabah->name }}</td>
                                        <td>{{ $nasabah->nameCabang }}</td>
                                        <td>{{ $nasabah->wa }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No related nasabah found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>


                        <div>
                            <!-- Button trigger modal -->

                            {{-- <a href="/pilih/hadiah/undiPemenang/hasilUndi/{{ $hadiahNasabah->id }}"
                                class="btn btn-primary">Undi Pemenang</a> --}}
                            <a href="{{ route('welcome') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                        </table>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
