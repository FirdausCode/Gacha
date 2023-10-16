@section('title')
    {{ 'Pengundian' }}
@endsection
@extends('layout')
@section('content')
  
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          {{-- <h1>Tingkatkan saldo & Transaksi</h1> --}}
          <h2>
            Tabungan Mitra Usaha Anda dan MENANGKAN HADIAN</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <img src="{{ asset('img/' . $hadiahNasabah->img) }}" alt="" style="width:200px; height:200px; object-fit:cover">
          </div>
        </div>
        <div class="">
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

        <a href="/pilih/hadiah/undiPemenang/hasilUndi/{{ $hadiahNasabah->id }}" class="btn btn-primary">Undi Pemenang</a>

        </div>
      </div>
    </div>

  </section><!-- End Hero -->
@endsection