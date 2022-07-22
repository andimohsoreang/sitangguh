@extends('partials.app', ['title' => '| Dashboard'])
@section('section')
<div class="d-flex align-items-center justify-content-between">
    <div>
        <h3>Dashboard</h3>
    </div>
</div>
<section class="section">
    <div class="row align-items-center">
        <div class="col-12 col-md-6">
            <div class="row">
                <div class="col-12">
                    <div class="card bg-primary">
                        <div class="card-body p-4">
                            <div class="d-flex flex-column">
                                <div class='px-3 d-flex align-items-center justify-content-between'>
                                    <div>
                                        <h3 class='card-title m-0 mb-1 text-white'>Total Laporan</h3>
                                        {{-- <a href="{{ route('user.laporanbencana') }}" class="text-white small"><span data-feather="chevron-right"></span> Selengkapnya</a> --}}
                                    </div>
                                    <div class="card-right d-flex align-items-center">
                                        <h1 class="m-0 text-white" style="font-size: 80px;">{{ $lb_total }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card bg-dark">
                        <div class="card-body p-4">
                            <div class='px-3 d-flex align-items-center justify-content-between'>
                                <h3 class="text-white m-0" style="font-size: 25px">{{ $today }}</h3>
                                <h1 class="text-light my-3" style="font-size: 50px"><span id="jam"></span> : <span id="menit"></span> : <span id="detik"></span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card w-100">
                <div class="card-header">
                    <h4 class="card-title">Status Laporan</h4>
                </div>
                <div class="card-body">
                    <canvas id="myChart" height="120"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script type="text/javascript">
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Ditolak', 'Diproses', 'Selesai'],
            datasets: [{
                label: '# of Votes',
                data: [{{ $lb_tolak }}, {{ $lb_proses }}, {{ $lb_selesai }}],
                backgroundColor: [
                    'rgba(255, 91, 92, 1)',
                    'rgba(0, 207, 221, 1)',
                    'rgba(57, 218, 138, 1)'
                ],
                borderColor: [
                    '#fff',
                    '#fff',
                    '#fff'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
<script>
    function refreshTime() {
        var waktu = new Date();
        document.getElementById("jam").innerHTML = waktu.getHours();
        document.getElementById("menit").innerHTML = waktu.getMinutes();
        document.getElementById("detik").innerHTML = waktu.getSeconds();
    }
    
    setInterval(refreshTime, 1000);
</script>
@endsection