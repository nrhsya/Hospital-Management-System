<div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

      <form class="main-form" action="{{url('appointment')}}" method="POST">
        @csrf

        <div class="row mt-5 ">
            <!-- name -->
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" name="name" class="form-control" placeholder="Full name">
          </div>

          <!-- email -->
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input type="text" name="email" class="form-control" placeholder="Email address..">
          </div>

          <!-- date -->
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" name="date" class="form-control">
          </div>

          <!-- doctor -->
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="doctor" id="departement" class="custom-select">

              <option>- Select Doctor -</option>
                <!-- display doctor names from database -->
              @foreach($doctor as $doctors)
              <option value="{{$doctors->name}}">
                {{$doctors->name}} ( {{$doctors->specialty}} )
              </option>
              @endforeach

            </select>
          </div>

          <!-- contact -->
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input type="text" name="contact" class="form-control" placeholder="Number..">
          </div>

          <!-- message -->
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-success mt-3 wow zoomIn">Submit Request</button>
      </form>
    </div>
  </div> <!-- .page-section -->