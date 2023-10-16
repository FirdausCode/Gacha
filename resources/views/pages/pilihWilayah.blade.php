@section('title')
    {{ 'Pengundian' }}
@endsection
@extends('layout')
@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

  <div class="container text-center">
    <div class="row">
      @foreach ($wilayah as $item)
      <div class="col"><a href="/pilih/hadiah/{{ $item->id }}" class="btn btn-warning p-4 m-3" >{{ $item->name }}</a></div>
      @endforeach
    </div>
  </div>

</section><!-- End Hero -->

  @endsection