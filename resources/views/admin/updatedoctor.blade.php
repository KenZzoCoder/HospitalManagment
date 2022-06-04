
<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">

    @include('admin.styles')

    <style>
        label{
            display: inline-block;
            width: 200px;

        }
    </style>

  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div>
            
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <div class="container" align='center' style="padding-top: 100px">
    
                  <form action="{{ url('editdoctor',$data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div style="padding: 15px">
                          <label for="name">Doctor Name</label>
                          <input style="color: black" type="text" name="name" value="{{ $data->name }}">
                      </div>
                      <div style="padding: 15px">
                        <label for="phone">Doctor Phone</label>
                        <input style="color: black" type="number" name="phone" value="{{ $data->phone }}">
                      </div>
                      <div style="padding: 15px">
                        <label for="phone">Doctor Speciality</label>
                        <input style="color: black" type="text" name="speciality" value="{{ $data->speciality }}">
                      </div>
                      <div style="padding: 15px">
                        <label for="roomnb">Room Number</label>
                        <input style="color: black" type="number" name="room" value="{{ $data->room }}">
                      </div>
                      <div style="padding: 15px">
                        <label for="image">Old Image</label>
                        <img height="200px" width="200px" src="doctorimage/{{ $data->image }}">
                      </div>
                      <div style="padding: 15px;">
                        <input type="submit" class="btn btn-success">
                      </div>
                      <div style="padding: 15px">
                        <label for="changeimage">Change Image</label>
                        <input type="file" name="file">
                      </div>
                      <div style="padding: 15px">
                        <input type="submit" class="btn btn-primary">
                      </div>
                  </form>
              </div>

        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('admin.scripts')
  </body>
</html>