<!DOCTYPE html>
<html lang="en">
  <head>
    <style type="text/css">

        label
        {
            display: inline-block;
            width: 100%;
        }
    </style>

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

      <!-- insert doctor details section -->
      <div class="container-fluid page-body-wrapper">
        
        <div class="container p-3" align="center">
        @if(session()->has('message'))

        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                X
            </button>

            {{session()->get('message')}}

        </div>
        @endif
            <h1>Add Doctor</h1>

            <!-- form to add doctor details -->
            <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Doctor Name -->
                <div class="p-3">
                    <label>Doctor Name</label>
                    <input type="text" style="color:black;" name="name" placeholder="Doctor Name" required></input>
                </div>

                <!-- Doctor Contact Number -->
                <div class="p-3">
                    <label>Doctor Contact Number</label>
                    <input type="number" style="color:black;" name="contact" placeholder="Contact Number" required></input>
                </div>

                <!-- Doctor Specialty -->
                <div class="p-3">
                    <label>Doctor Specialty</label>
                    <select name="specialty" style="color:black; width:100%;">
                        <option>- Select Specialty -</option>
                        <option value="dermatologist">Dermatologist</option>
                        <option value="surgeon">Heart Surgeon</option>
                        <option value="dentist">Dentist</option>
                        <option value="optometrist">Optometrist</option>
                        <option value="pediatrician">Pediatrician</option>
                    </select>
                </div>

                <!-- Doctor Room Number -->
                <div class="p-3">
                    <label>Doctor Room Number</label>
                    <input type="text" style="color:black;" name="room_num" placeholder="Room Number" required></input>
                </div>

                <!-- Doctor Image -->
                <div class="p-3">
                    <label>Doctor Image</label>
                    <input type="file" name="file"></input>
                </div>

                <!-- Submit Button -->
                <div class="p-3">
                    <input type="submit" class="btn btn-success">
                </div>
            </form>
        </div>
      </div>
        
    <!-- container-scroller -->
    @include('admin.js')
  </body>
</html>