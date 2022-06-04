<!DOCTYPE html>
<html lang="en">
<head>
   @include('user.head')
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +212 777 911 881</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> sserrouk.achraf@gmail.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><span class="text-primary">Our</span>-Health</a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="doctors.html">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.html">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>

            @if (Route::has('login'))

            @auth
               
            <li class="nav-item">
              <a class="nav-link" href="{{ url('myappointment') }}">My Appointements</a>
            </li>

            <x-app-layout>

            </x-app-layout>            
            
            @else

            <li class="nav-item">
               <a class="btn btn-primary ml-lg-3" href="{{ Route('login') }}">Login</a>
             </li>
             <li class="nav-item">
                <a class="btn btn-primary ml-lg-3" href="{{ Route('register') }}">Register</a>
              </li>

            @endauth

            @endif

          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

  
  <div  align="center" style="padding-top: 70px;">

    <table>

        <tr style="background-color: #09dba8">
            <th style="padding:10px; font-size:20px; color:white; ">Doctor Name</th>
            <th style="padding:10px; font-size:20px; color:white; ">Date</th>
            <th style="padding:10px; font-size:20px; color:white; ">Message</th>
            <th style="padding:10px; font-size:20px; color:white; ">Status</th>
            <th style="padding:10px; font-size:20px; color:white; ">Cancel Appointment</th>
        </tr>

        @foreach ($appoint as $appoints)
        <tr style="background-color: #09dba8" align="center">
            <td style="padding:10px; font-size:20px; color:white; ">{{ $appoints->doctor }}</td>
            <td style="padding:10px; font-size:20px; color:white; ">{{ $appoints->date }}</td>
            <td style="padding:10px; font-size:20px; color:white; ">{{ $appoints->message }}</td>
            <td style="padding:10px; font-size:20px; color:white; ">{{ $appoints->status }}</td>
            <td><a class="btn btn-danger" onclick="return confirm('Are you sure?')"  href="{{ url('cancel_appoint',$appoints->id) }}">Cancel</a></td>
        </tr>
        @endforeach

    </table>

  </div>

  @include('user.scripts')
  
</body>
</html>