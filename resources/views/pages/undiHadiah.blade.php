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
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1 hero-img"
                    data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('img/' . $hadiahNasabah->img) }}" class="img-fluid animated" alt=""
                        style="width: 400px; height:auto; border-radius:25px">
                </div>
                <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Wilayah</th>
                                <th>Name Cabang</th>
                                <th>WhatsApp</th>
                            </tr>
                        </thead>
                        <tbody>
                          {{-- @dd($hasilUndiNasabah) --}}
                            @forelse ($hadiahNasabah->nasabah as $nasabah)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $nasabah->name }}</td>
                                    <td>{{ $nasabah->wilayah->name }}</td>
                                    <td>{{ $nasabah->nameCabang }}</td>
                                    <td>{{ $nasabah->wa }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No related nasabah found.</td>
                                </tr>
                            @endforelse

                            <tr>
                                <td></td>
                                <td id="randomName"></td>
                                <td id="randomWilayah"></td>
                                <td id="randomCabang"></td>
                                <td id="randomWa"></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="text-center">
                        <h3>UNDI PEMENANG</h3>
                        <button onclick="startGenerator()" class="btn btn-primary lg-btn">Start</button>
                        <a href="/pilih/hadiah/undiPemenang/hasilUndi/{{ $hadiahNasabah->id }}"
                            class="btn btn-primary lg-btn" onclick="stopGenerator()">Stop</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero -->
@endsection

<script>
    window.jsonData = {!! json_encode($nasabah) !!};
    console.log(jsonData)

    let intervalId;

    const startGenerator = () => {
        intervalId = setInterval(generateRandomName, 80);
    };

    const stopGenerator = () => {
        clearInterval(intervalId);
    };

    const generateRandomName = () => {
        // List of possible names
        const names = ['RIFQI', 'MUNAWAR', 'RIDWAN', 'NISA', 'AZKA', 'FAUZIAH'];
        const wilayah = ['BANDUNG', 'JAKARTA', 'SURABAYA', 'JATENG', 'JABAR', 'JATIM'];
        const cabang = ['BANDUNG', 'JAKARTA', 'SURABAYA', 'JATENG', 'JABAR', 'JATIM'];
        const wa = ['0864645213', '087674325', '08765321', '08234567', '097654', '0865432'];

        // Choose a name randomly
        const randomIndex = Math.floor(Math.random() * names.length);
        const randomName = names[randomIndex];
        const randomWilayah = wilayah[randomIndex];
        const randomCabang = cabang[randomIndex];
        const randomWa = wa[randomIndex];

        // Display the name in the element with id "randomName"
        document.getElementById('randomName').textContent = randomName;
        document.getElementById('randomWilayah').textContent = randomWilayah;
        document.getElementById('randomCabang').textContent = randomCabang;
        document.getElementById('randomWa').textContent = randomWa;
    };
</script>
