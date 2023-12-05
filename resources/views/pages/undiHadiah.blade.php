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
                                <th>Cif</th>
                                <th>Name Cabang</th>
                                <th>WhatsApp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($hadiahNasabah->nasabah as $nasabah)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $nasabah->name }}</td>
                                    <td>{{ $nasabah->cif }}</td>
                                    <td>{{ $nasabah->nameCabang }}</td>
                                    <td>{{ substr($nasabah->wa, 0, -4) . 'XXXX' }}</td>
                                </tr>
                            @empty
                                {{-- <tr>
                                    <td colspan="5">No related nasabah found.</td>
                                </tr> --}}
                            @endforelse

                            <tr>
                                <td></td>
                                <td id="randomName"></td>
                                <td id="randomCif"></td>
                                <td id="randomCabang"></td>
                                <td id="randomWa"></td>
                            </tr>
                        </tbody>
                    </table>

                    <div id="kondisiSamaDenganJumlahHadiah" style="display: none;">
                        <h4>Pemenang Sudah Terpilih</h4>
                        <a href="{{ route('welcome') }}" class="btn btn-secondary">Kembali</a>
                    </div>

                    <div class="text-center" id="kondisi0SampaiSamaDenganJumlahHadiah">
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
    window.jsonjumlahHadiah = {!! json_encode($jumlahHadiah) !!};

    function updateVisibility() {
        // Hitung jumlah isi tabel (mengabaikan elemen head)
        var jumlahIsiTabel = document.querySelectorAll('.table tbody tr:not(:first-child)').length;

        // Ambil elemen div berdasarkan ID
        var kondisiSamaDenganJumlahHadiah = document.getElementById('kondisiSamaDenganJumlahHadiah');
        var kondisi0SampaiSamaDenganJumlahHadiah = document.getElementById('kondisi0SampaiSamaDenganJumlahHadiah');

        // Tampilkan atau sembunyikan div berdasarkan jumlah isi tabel
        if (jumlahIsiTabel < window.jsonjumlahHadiah) {
            kondisiSamaDenganJumlahHadiah.style.display = 'none';
            kondisi0SampaiSamaDenganJumlahHadiah.style.display = 'block';
        } else {
            kondisiSamaDenganJumlahHadiah.style.display = 'block';
            kondisi0SampaiSamaDenganJumlahHadiah.style.display = 'none';
        }
    }

    // Panggil fungsi ketika halaman dimuat
    window.onload = updateVisibility;





    // Panggil fungsi ketika halaman dimuat
    window.onload = updateVisibility;

    window.jsonData = {!! json_encode($nasabah) !!};


    let intervalId;

    const startGenerator = () => {
        intervalId = setInterval(generateRandomName, 80);
    };

    const stopGenerator = () => {
        clearInterval(intervalId);
    };

    const generateRandomName = () => {
        // List of possible array for animation
        const names = ['', '',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '', 
        ];
        const Cif = ['1234', '1434', '4321', '5323', '2342', '8765', '5463', '3456', '5678', '8765', '1234', '0985', '2346', '76512',
        ];
        const cabang = ['', '',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '', 
        ];
        const wa = ['',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '',  '', 
      ];

        // Choose a name randomly
        const randomIndex = Math.floor(Math.random() * names.length);
        const randomName = names[randomIndex];
        const randomCif = Cif[randomIndex];
        const randomCabang = cabang[randomIndex];
        const randomWa = wa[randomIndex];

        // Display the name in the element with id "randomName"
        document.getElementById('randomName').textContent = randomName;
        document.getElementById('randomCif').textContent = randomCif;
        document.getElementById('randomCabang').textContent = randomCabang;
        document.getElementById('randomWa').textContent = randomWa;
    };
</script>
