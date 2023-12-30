@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total User</h4>
            </div>
            @php
                $user = \App\Models\User::count()
            @endphp
            <div class="card-body">
              {{ $user }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="fas fa-columns"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Buku</h4>
            </div>
            @php
                $buku = \App\Models\Buku::count()
            @endphp
            <div class="card-body">
              {{ $buku }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="fas fa-bookmark"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Peminjaman</h4>
            </div>
            @php
                $peminjaman = \App\Models\Peminjaman::count()
            @endphp
            <div class="card-body">
              {{ $peminjaman }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-money-check"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Denda</h4>
            </div>
            @php
                $denda = \App\Models\Denda::count()
            @endphp
            <div class="card-body">
              {{ $denda }}
            </div>
          </div>
        </div>
      </div>                  
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Statistics</h4>
          </div>
          <div class="card-body">
            <canvas id="myChart" height="182"></canvas>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var chartColors = {
        red: 'rgb(255, 99, 132)',
        orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 205, 86)',
        green: 'rgb(75, 192, 192)',
        info: '#41B1F9',
        blue: '#3245D1',
        purple: 'rgb(153, 102, 255)',
        grey: '#EBEFF6'
    };
  
    var ctxBar = document.getElementById("myChart")
    var peminjamans = JSON.parse('{!! json_encode($peminjamans) !!}');
    var labels = peminjamans.map(peminjaman => peminjaman.date); 
    var counts = peminjamans.map(peminjaman => peminjaman.count);
    var myBar = new Chart(ctxBar, {
    type: 'bar',
    data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah peminjaman',
                data: counts,
                backgroundColor: chartColors.blue,
                barPercentage: 0.1,
                categoryPercentage: 0.1
            }]
        },
    options: {
        responsive: true,
        barRoundness: 1,
        title: {
        display: false,
        text: "Chart.js - Bar Chart with Rounded Tops (drawRoundedTopRectangle Method)"
        },
        legend: {
        display:false
        },
        scales: {
        yAxes: [{
            ticks: {
            beginAtZero: true,
            suggestedMax: 100,
            padding: 10,
            },
            gridLines: {
            drawBorder: false,
            }
        }],
        xAxes: [{
                gridLines: {
                    display:false,
                    drawBorder: false
                }
            }]
        }
    }
    });
    })
  </script>

@endsection