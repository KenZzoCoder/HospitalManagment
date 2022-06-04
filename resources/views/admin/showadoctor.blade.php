
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.styles')
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
          <div align='center' style="padding-top: 15vh; margin-left:20vh">
            <table>
              <tr style="background-color: #09dba8">
                <th style="padding: 15px">Doctor Name</th>
                <th style="padding: 15px">Phone</th>
                <th style="padding: 15px">Speciality</th>
                <th style="padding: 15px">Room Number</th>
                <th style="padding: 15px">Image</th>
                <th style="padding: 15px">Delete</th>
                <th style="padding: 15px">Update</th>
            </tr>
            @foreach ($data as $doctor)
            <tr style="background-color: #0e5c48">
              <td style="padding: 15px">{{ $doctor->name }}</td>
              <td style="padding: 15px">{{ $doctor->phone }}</td>
              <td style="padding: 15px">{{ $doctor->speciality }}</td>
              <td style="padding: 15px">{{ $doctor->room }}</td>
              <td style="padding: 15px"><img src="doctorimage/{{ $doctor->image }}" height="100px" width="100px" ></td>
              <td>
                <a onclick="return confirm('Are you sure?')" class="btn btn-danger" href="{{ url('deletdoctor',$doctor->id) }}">Delete</a>
              </td>
              <td>
                <a class="btn btn-primary" href="{{ url('updatedoctor',$doctor->id)}}">Update</a>
              </td>
          </tr>
            @endforeach
            </table>
          </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('admin.scripts')
  </body>
</html>