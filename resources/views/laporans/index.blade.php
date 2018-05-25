@extends('blank')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

          <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Statistik Jumlah Penduduk (gender) / wilayah
            </div>

            <div class="card-body">
              <canvas id="myChart"></canvas>
            </div>

            <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: [
                      @foreach($nagari as $data)
                        <?php echo "'".$data['nama']."',"; ?>
                      @endforeach

                    ],
                    datasets: [{
                            label: '# of Votes',
                            data: [{{$hitungPenduduk}},10,20],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                      },
                      options: {
                          scales: {
                              yAxes: [{
                                      ticks: {
                                          beginAtZero: true
                                      }
                                  }]
                          }
                      }
                  });
              </script>

          </div>
        </div>

        <div class="col-md-4">
          <div class="card">
              <div class="card-header">
                  <i class="fa fa-align-justify"></i> Cetak Kartu Keluarga
              </div>

              <div class="card-body">
                <table class="table">
                    <tr>
                        <th>KK ID</th>
                        <th>Action</th>
                    </tr>
                    @foreach($kartukeluarga as $penduduk)
                    <tr>
                        <td>{{$penduduk->id}}</td>
                        <td><a class="btn btn-primary" href="{!!url('/print'.$penduduk->id)!!}">cetak Kartu Keluarga</a></td>
                    </tr>
                    @endforeach
                <table>
              </div>
          </div>

        </div>
    </div>
</div>
@endsection
