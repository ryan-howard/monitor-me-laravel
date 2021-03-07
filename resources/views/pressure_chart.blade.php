<!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

      <!-- Chart CDN -->
      <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

      <!-- CSS -->
      <style>
        .nav.navbar-nav.navbar-right li a {
          color: white;
        }
      </style>
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <a class="navbar-brand" href="/">MonitorMe</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
          <li class="nav-item active">
              <a class="nav-link" href="/dashboard">Dashboard<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/new">New Entry</a>
            </li>
          </ul>

          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/logout">Sign out</a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container">

    

        <div id="low_bp" style="margin-top:1rem;" class="alert alert-danger alert-dismissible" role="alert" hidden="true">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          Your latest blood pressure is low! <a href="https://www.heartandstroke.ca/heart-disease/risk-and-prevention/condition-risk-factors/high-blood-pressure">Take action now.</a>
        </div>

        <div id="high_bp" style="margin-top:1rem;" class="alert alert-danger alert-dismissible" role="alert" hidden="true">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          Your latest blood pressure is high! <a href="https://www.heartandstroke.ca/heart-disease/risk-and-prevention/condition-risk-factors/high-blood-pressure">Take action now.</a>
        </div>

        <div id="good_bp" style="margin-top:1rem;" class="alert alert-success alert-dismissible" role="alert" hidden="true">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          Your latest blood pressure is normal.
        </div>

        <h1 style="padding-top:0.5rem;">Personal Statistics: </h1>

        <div class="row" style="margin-bottom: 0.5rem">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Weekly Systolic Readings</h5>
                <canvas id="systolicChart" style="margin-top: 0.5rem;"></canvas>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Weekly Diastolic Readings</h5>
                <canvas id="diastolicChart" style="margin-top: 0.5rem;"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="row" style="margin-bottom: 2rem">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Weekly Pulse Readings</h5>
                <canvas id="pulseChart" style="margin-top: 0.5rem;"></canvas>
              </div>
            </div>
          </div>
        </div>

        <!-- <canvas id="systolicChart" style="margin-top: 0.5rem;"></canvas> -->
        <script>

        //var array = JSON.parse('{{ json_encode($data) }}');

        var data = @json($data);

        //console.log(data);

        sysList   = [];
        diaList   = [];
        pulseList = [];

        for (let reading of data) {
          sysList.push(reading['systolic']);
          diaList.push(reading['diastolic']);
          pulseList.push(reading['pulse']);
        }

        if (sysList[0] > 130) {
          document.getElementById('high_bp').hidden = false;
        } else if (sysList[0]<90) {
          document.getElementById('low_bp').hidden = false;
        } else {
          document.getElementById('good_bp').hidden = false;
        }

        var sys = document.getElementById('systolicChart').getContext('2d');
        var systolicChart = new Chart(sys, {
            type: 'line',
            data: {
                labels: ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
                datasets: [{
                    label: 'Systolic (mmHg)',
                    data: sysList.reverse(),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        /*'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'*/
                    ],
                    /*borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],*/
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        stacked: true,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var dia = document.getElementById('diastolicChart').getContext('2d');
        var systolicChart = new Chart(dia, {
            type: 'line',
            data: {
                labels: ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
                datasets: [{
                    label: 'Diastolic (mmHg)',
                    data: diaList.reverse(),
                    backgroundColor: [
                        /*'rgba(255, 99, 132, 0.2)',*/
                        'rgba(54, 162, 235, 0.2)',/*
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'*/
                    ],
                    /*borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],*/
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        stacked: true,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var pulse = document.getElementById('pulseChart').getContext('2d');
        var pulseChart = new Chart(pulse, {
            type: 'line',
            data: {
                labels: ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
                datasets: [{
                    label: 'Pulse (bpm)',
                    data: pulseList.reverse(),
                    backgroundColor: [
                        /*'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',*/
                        'rgba(255, 206, 86, 0.2)',
                        /*'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'*/
                    ],
                    /*borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],*/
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        stacked: true,
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        </script>

      </div>

      <!-- Optional JavaScript -->
      <!-- Query first, then Popper.js, then Bootstrap JS -->

      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
