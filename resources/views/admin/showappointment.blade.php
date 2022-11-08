<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      
      <!-- sidebar -->
      @include('admin.sidebar')

      <!-- navbar -->
      @include('admin.navbar')

      <!-- contents -->
      <div class="container-fluid page-body-wrapper">
        
        <div align="center" class="mt-3">

            <h1><strong>List of Appointments</strong></h1>

            <!-- appointment status -->
            <div class="container mt-3">
                @if(session()->has('message'))

                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        X
                    </button>

                    {{session()->get('message')}}

                </div>
                @endif
            </div>

            <table class="table table-striped table-hover mt-3">
                <tr style="background-color:black;">
                    <th style="color:white;">Patient Name</th>
                    <th style="color:white;">Email</th>
                    <th style="color:white;">Contact</th>
                    <th style="color:white;">Doctor Name</th>
                    <th style="color:white;">Date</th>
                    <th style="color:white;">Message</th>
                    <th style="color:white;">Status</th>
                    <th colspan="2" style="color:white;">ACTIONS</th>
                </tr>

                @foreach($data as $appoint)
                <tr style="background-color:white;">
                    <td style="color:black;">{{$appoint->name}}</td>
                    <td style="color:black;">{{$appoint->email}}</td>
                    <td style="color:black;">{{$appoint->contact}}</td>
                    <td style="color:black;">{{$appoint->doctor}}</td>
                    <td style="color:black;">{{$appoint->date}}</td>
                    <td style="color:black;">{{$appoint->message}}</td>
                    <td style="color:black;">{{$appoint->status}}</td>
                    <td style="color:white;"><a class="btn btn-success" onclick="" style="color:white;" href="{{url('approved',$appoint->id)}}">Approve</a></td>
                    <td style="color:white;"><a class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel this appointment?')" style="color:white;" href="{{url('cancelled',$appoint->id)}}">Reject</a></td>
                </tr>

                @endforeach
            </table>
        </div>

      </div>
        
    <!-- container-scroller -->
    @include('admin.js')
  </body>
</html>