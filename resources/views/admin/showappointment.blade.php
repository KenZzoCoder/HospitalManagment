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
            <div align='center' style="padding-top: 15vh; margin-left:3vh">
                <table>
                    <tr style="background-color: #09dba8">
                        <th style="padding: 20px">Customer Name</th>
                        <th style="padding: 20px">Email</th>
                        <th style="padding: 20px">Phone</th>
                        <th style="padding: 20px">Doctor Name</th>
                        <th style="padding: 20px">Date</th>
                        <th style="padding: 20px">Message</th>
                        <th style="padding: 20px">Status</th>
                        <th style="padding: 20px">Aprroved</th>
                        <th style="padding: 20px">Canceled</th>
                        <th style="padding: 20px">Send Mail</th>
                    </tr>
                    @foreach ($data as $appoint)
                    <tr align="center" style="background-color: #0e5c48">
                        <td>{{ $appoint->name }}</td>
                        <td>{{ $appoint->email }}</td>
                        <td>{{ $appoint->phone }}</td>
                        <td>{{ $appoint->doctor }}</td>
                        <td>{{ $appoint->date }}</td>
                        <td>{{ $appoint->message }}</td>
                        <td>{{ $appoint->status }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ url('approved',$appoint->id) }}">Aprroved</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="{{ url('canceled',$appoint->id) }}">Canceled</a>
                        </td>
                        <td>
                          <a class="btn btn-primary" href="{{ url('emailview',$appoint->id) }}">Send Email</a>
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