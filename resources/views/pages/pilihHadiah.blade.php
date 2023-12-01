@section('title')
    {{ 'Pengundian' }}
@endsection
@extends('layout')
@section('content')

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container text-center">
          <h2>Pengundian Wilayah {{ $wilayah->name }}</h2>
            <div class="row">
                @foreach ($hadiah as $item)
                    <div class="col">
                        <div class="d-flex flex-column align-items-center">
                            <img src="{{ asset('img/' . $item->img) }}" alt=""
                                style="width: 200px; height: 200px; object-fit: cover; border-radius:20px">
                            <a href="/pilih/hadiah/undiPemenang/{{ $item->id }}"
                                class="btn btn-warning mt-3">{{ $item->name }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section><!-- End Hero -->

    {{-- @endsection
    @foreach ($hadiah as $item)
    <tr><a href="/pilih/hadiah/undiPemenang/{{ $item->id }}" class="btn btn-primary" >{{ $item->name }}</a></tr>
    @endforeach --}}

    {{-- @dd($nasabah); --}}
    {{-- @dd($hadiah); --}}
    {{-- @dd($wilayah); --}}
