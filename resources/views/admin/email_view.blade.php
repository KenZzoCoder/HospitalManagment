<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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

              <form action="{{ url('sendemail',$data->id) }}" method="POST" >
                @csrf
                  <div style="padding: 15px">
                      <label for="name">Greeting</label>
                      <input style="color: black" type="text" name="greeting" required>
                  </div>
                  <div style="padding: 15px">
                    <label for="phone">Body</label>
                    <input style="color: black" type="text" name="body" required>
                  </div>
                  <div style="padding: 15px">
                    <label for="roomnb">Action Text</label>
                    <input style="color: black" type="text" name="actiontext"  required>
                  </div>
                  <div style="padding: 15px">
                    <label for="roomnb">Action Url</label>
                    <input style="color: black" type="text" name="actionurl"  required>
                  </div>
                  <div style="padding: 15px">
                    <label for="roomnb">End Part</label>
                    <input style="color: black" type="text" name="endpart"  required>
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