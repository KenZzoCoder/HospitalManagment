<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.styles')
    <style>
        label {
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
            
            @if (session()->has('message'))
        
            <div class="alert alert-success">
    
              {{ session()->get('message') }}
    
            </div>
    
            @endif  

              <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data">
                @csrf
                  <div style="padding: 15px">
                      <label for="name">Doctor Name</label>
                      <input style="color: black" type="text" name="name" placeholder="Add Doctor Name" required>
                  </div>
                  <div style="padding: 15px">
                    <label for="phone">Doctor Phone</label>
                    <input style="color: black" type="number" name="phone" placeholder="Add Doctor Phone" required>
                  </div>
                  <div style="padding: 15px">
                    <label for="specialty">Doctor Speciality</label>
                    <select name="speciality" style="color: black; width: 200px">
                        <option>--Select--</option>
                        <option value="skin">Skin</option>
                        <option value="heart">Heart</option>
                        <option value="eye">Eye</option>
                        <option value="nose">Nose</option>
                    </select>
                  </div>
                  <div style="padding: 15px">
                    <label for="roomnb">Room Number</label>
                    <input style="color: black" type="number" name="room" placeholder="Add Doctor Room Number" required>
                  </div>
                  <div style="padding: 15px">
                    <label for="image">Doctor Image</label>
                    <input type="file" name="file">
                  </div>
                  <div style="padding: 15px;">
                    <input type="submit" class="btn btn-success">
                  </div>
              </form>
          </div>
      </div>
      <!-- container-scroller -->
      <!-- plugins:js -->
      @include('admin.scripts')
  </body>
</html>