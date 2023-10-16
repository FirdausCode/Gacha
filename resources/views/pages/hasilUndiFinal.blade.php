@section('title')
    {{ 'Pengundian' }}
@endsection
@extends('layout')
@section('content')
  
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
  <div class="container">
    <div class="row">
      <h2>Pengundian WIlayah {{ $hadiahNasabah->wilayah->name }}</h2>
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img src="{{ asset('img/' . $hadiahNasabah->img) }}" class="img-fluid animated" alt="" style="width: 400px; height:auto; border-radius:25px">
      </div>
      <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
        <table class="table"> 
          <thead>
              <tr>
                  <th>No</th>
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

      <a href="{{ route('welcome') }}" class="btn btn-secondary">Kembali</a>

      </div>
    </div>
  </div>
</section><!-- End Hero -->

@endsection