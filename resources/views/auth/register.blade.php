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
              <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/login">Sign in</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="/register">Sign up<span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </nav>
      <div class="container">

        <!-- <div class="bp-monitor">
            <img src="image_2.png" alt="Blood pressure monitor" width="600" height="600">
        </div> -->

        <!-- <form style="margin-top: 1rem; margin-bottom: 5rem;">
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="userEmail" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="userPassword" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Re-type Password</label>
            <input type="password" class="form-control" id="userPasswordDuplicate" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" class="form-control" id="userPassword" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Date of Birth</label>
            <input type="text" class="form-control" id="userPassword" placeholder="YYYY-MM-DD">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Weight</label>
            <input type="text" class="form-control" id="userPassword" placeholder="in lbs">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Height</label>
            <input type="text" class="form-control" id="userPassword" placeholder="in feet">
          </div>

          <button type="submit" class="btn btn-danger">Submit</button>
        </form> -->

        <form method="POST" action="{{ route('register') }}" class="form-group" style="margin-top:1rem;">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full form-control" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full form-control"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full form-control"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4 btn btn-danger">
                    {{ __('Register') }}
                </x-button>
            </div>
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
