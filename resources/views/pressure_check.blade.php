<!DOCTYPE html>
  <html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
            <li class="nav-item">
              <a class="nav-link" href="/dashboard">Dashboard</a>
            </li>
            <li class="nav-item navbar-right active">
              <a class="nav-link" href="/new">New Entry<span class="sr-only">(current)</span></a>
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

        <!-- <div class="bp-monitor">
            <img src="image_2.png" alt="Blood pressure monitor" width="600" height="600">
        </div> -->

        <form style="margin-top: 1rem; margin-bottom: 5rem;" method="POST" action="{{ route('new') }}">
          @csrf

          <div class="form-group">
            <label for="systolicReading">Systolic Pressure</label>
            <input type="text" class="form-control" id="systolic" name="systolic" required>
          </div>
          <div class="form-group">
            <label for="diastolicReading">Diastolic Pressure</label>
            <input type="text" class="form-control" id="diastolic" name="diastolic" required>
          </div>
          <div class="form-group">
            <label for="pulseReading">Pulse Reading</label>
            <input type="text" class="form-control" id="pulse" name="pulse" required>
          </div>

          <button type="submit" class="btn btn-danger">Submit</button>
        </form>


        <!-- <div class="row">

        </div> -->

        <!--<div class="alert alert-danger" role="alert">
          Your blood pressure is high!
        </div>

        <div class="alert alert-danger" role="alert">
          Your blood pressure is low!
        </div>

        <div class="alert alert-success" role="alert">
          Your blood pressure is normal.
        </div>-->
      </div>

      <!-- Optional JavaScript -->
      <!-- Query first, then Popper.js, then Bootstrap JS -->

      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
