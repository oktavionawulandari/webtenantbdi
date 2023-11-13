@extends('main-layouts.template')
@section('title', 'Dashboard Admin')
@include('navigasi.nav-admin')
@section('container')
    <div>
        <div class="card-title mb-4 border-bottom">Dashboard</div>
    </div>
    <!-- first row starts here -->
    <div class="row">
        <div class="col-sm-4 stretch-card grid-margin">
            <div class="card">
                <div class="card-body px-3 text-dark">
                    <a href="{{ route('admins.tenants.account') }}">
                        <div class="d-flex justify-content-between">
                            <p class="hovertext text-muted font-20 mb-0" data-hover="Jumlah total tenant ">
                                Total Tenant</p>
                            <h5 class="font-weight-semibold text-center font-20">{{ $totalTenant }}</h5>
                        </div>
                    </a>
                    <div class="text-muted mr-5 mt-3" style="font-size: 14px">Kategori:</div>

                    <div class="d-flex mr-5 mt-2">
                        <button type="button" class="btn btn-social-icon btn-outline-sales">
                            <i class="mdi mdi-camera-enhance"></i>
                        </button>
                        <div class="pl-2">
                            <h4 class="mb-0 font-weight-semibold head-count text-center">
                                {{ $totalDigital }}
                            </h4>
                            <span class="font-10 font-weight-semibold text-muted">Digital</span>
                        </div>
                        <button type="button" class="btn btn-social-icon btn-outline-sales ml-4">
                            <i class="mdi mdi-ruler"></i>
                        </button>
                        <div class="pl-2">
                            <h4 class="mb-0 font-weight-semibold head-count text-center">
                                {{ $totalKriya }}
                            </h4>
                            <span class="font-10 font-weight-semibold text-muted">Kriya</span>
                        </div>
                        <button type="button" class="btn btn-social-icon btn-outline-sales ml-4">
                            <i class="mdi mdi-walk"></i>
                        </button>
                        <div class="pl-2">
                            <h4 class="mb-0 font-weight-semibold head-count text-center">
                                {{ $totalAnimasi }}
                            </h4>
                            <span class="font-10 font-weight-semibold text-muted">Animasi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 stretch-card grid-margin">
            <div class="card">
                <a href="{{ route('admins.registration') }}">
                    <div class="card-body px-3 text-dark">
                        <div class="d-flex justify-content-between">
                            <p class="hovertext text-muted font-20 mb-0"
                                data-hover="Jumlah data teregistrasi dengan status 'Pending' ">Register</p>
                        </div>
                        <h5 class="font-weight-semibold text-center font-20 mt-3">{{ $totalRegister }}</h5>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-4 stretch-card grid-margin">
            <div class="card">
                <div class="card-body px-3 text-dark">
                    <a href="{{ route('admins.validation') }}">
                        <div class="d-flex justify-content-between">
                            <p class="hovertext text-muted font-20 mb-0"
                                data-hover="Jumlah data anggota tenant tervalidasi">Total
                                Tervalidasi</p>
                            <h5 class="font-weight-semibold text-center font-20">{{ $totalValidasi }}</h5>
                        </div>
                    </a>

                    <div class="d-flex mr-5 mt-4">
                        <button type="button" class="btn btn-social-icon btn-outline-sales">
                            <i class="mdi mdi-checkbox-marked-circle"></i>
                        </button>
                        <div class="pl-2">
                            <h4 class="mb-0 font-weight-semibold head-count text-center">
                                {{ $totalSuccess }}
                            </h4>
                            <span class="font-10 font-weight-semibold text-muted">Sukses</span>
                        </div>
                        <button type="button" class="btn btn-social-icon btn-outline-sales ml-3">
                            <i class="mdi mdi-close-circle"></i>
                        </button>
                        <div class="pl-2">
                            <h4 class="mb-0 font-weight-semibold head-count text-center">
                                {{ $totalFailed }}
                            </h4>
                            <span class="font-10 font-weight-semibold text-muted">Failed</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- chart row starts here -->
    <div class="row">
        <div class="col-sm-6 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-title">Jumlah Tenant Berdasarkan Angkatan</div>
                        {{-- <div class="d-flex text-muted font-20">
                            <i class="mdi mdi-printer mouse-pointer"></i>
                            <i class="mdi mdi-help-circle-outline ml-2 mouse-pointer"></i>
                        </div> --}}
                    </div>
                    {{-- <h3 class="font-weight-bold mb-0"> 2,409 <span class="text-success h5">4,5%<i
                                class="mdi mdi-arrow-up"></i></span>
                    </h3>
                    <span class="text-muted font-13">Avg customers/Day</span> --}}
                    <div class="line-chart-wrapper">
                        <canvas id="barChart" style="height: 230px;"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- javascript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
        <script>
            $(function() {
                //get the pie chart canvas
                var cData = JSON.parse(`<?php echo $chart_batch; ?>`);
                var ctx = $("#barChart");

                //bar chart data
                var data = {
                    labels: cData.label,
                    datasets: [{
                        label: "Angkatan",
                        data: cData.data,
                        backgroundColor: [
                            "#757BC8",
                            "#8E94F2",

                        ],
                        borderColor: [
                            "#757BC8",
                            "#8E94F2",
                        ],
                        borderWidth: [1, 1]
                    }]
                };

                //options
                var options = {
                    responsive: true,
                    title: {
                        display: true,
                        position: "top",
                        // text: "Jumlah Pegawai Berdasarkan Jenis Kelamin",
                        fontSize: 18,
                        fontColor: "#111"
                    },
                    legend: {
                        display: true,
                        position: "bottom",
                        labels: {
                            fontColor: "#333",
                            fontSize: 12
                        }
                    }
                };

                //create pie Chart class object
                var chart1 = new Chart(ctx, {
                    type: "bar",
                    data: data,
                    options: options
                });

            });
        </script>

        <div class="col-sm-6 stretch-card grid-margin">
            <div class="card">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0">
                            <div class="card-body">
                                <div class="card-title">Jumlah Tenant Per Kategori</div>
                                <div class="d-flex flex-wrap">
                                    <div class="doughnut-wrapper">
                                        <canvas id="pieChartTenant" width="300" height="300"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- javascript -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
            <script>
                $(function() {
                    //get the pie chart canvas
                    var cData = JSON.parse(`<?php echo $chart_tenant; ?>`);
                    var ctx = $("#pieChartTenant");

                    //pie chart data
                    var data = {
                        labels: cData.label,
                        datasets: [{
                            label: "Jumlah Tenant",
                            data: cData.data,
                            backgroundColor: [
                                "#757BC8",
                                "#8E94F2",

                            ],
                            borderColor: [
                                "#757BC8",
                                "#8E94F2",
                            ],
                            borderWidth: [1, 1]
                        }]
                    };

                    //options
                    var options = {
                        responsive: true,
                        title: {
                            display: true,
                            position: "top",
                            // text: "Jumlah Pegawai Berdasarkan Jenis Kelamin",
                            fontSize: 18,
                            fontColor: "#111"
                        },
                        legend: {
                            display: true,
                            position: "bottom",
                            labels: {
                                fontColor: "#333",
                                fontSize: 12
                            }
                        }
                    };

                    //create pie Chart class object
                    var chart1 = new Chart(ctx, {
                        type: "pie",
                        data: data,
                        options: options
                    });

                });
            </script>
        </div>
    </div>
@endsection
