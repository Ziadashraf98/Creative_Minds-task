<!DOCTYPE html>
<html lang="en">
  <head>
    @section('title')
    Add User
    @endsection
    @include('includes.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('includes.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('includes.header')
        <!-- partial -->
        <div class="main-panel">
        <div class="content-wrapper">
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          @if(session()->has('success'))

          <div class="alert alert-success">

          <button type="button" class="close" data-dismiss="alert">x</button>

          {{session()->get('success')}}

          </div>
          @endif
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 style="color: red" class="card-title">Add User</h4>
              {{-- <p class="card-description"> Basic form elements </p> --}}
              <form class="forms-sample" action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputName1">Name</label>
                  <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputName1" placeholder="name">
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Phone</label>
                  <input type="text" name="phone_number" value="{{old('phone_number')}}" class="form-control" id="exampleInputName1" placeholder="phone_number">
                </div>
                <div class="form-group">
                  <label for="exampleInputName1">Password</label>
                  <input type="password" name="password" value="{{old('password')}}" class="form-control" id="exampleInputName1" placeholder="password">
                </div>
                {{-- <div class="form-group">
                  <label for="exampleSelectGender">Categories</label>
                  <select name="category_id" class="form-control" id="exampleSelectGender">
                    <option value="{{null}}">select Category</option>
                    @foreach($users as $category)
                    <option value={{$category->id}}>{{$category->name}}</option>
                    @endforeach
                  </select>
                </div> --}}
                {{-- <div class="form-group">
                  <label for="exampleSelectGender">SubCategories</label>
                  <select name="subcategory_id" class="form-control" id="exampleSelectGender">
                  </select>
                </div> --}}
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
              </form>
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
      </div>
      @include('includes.footer')
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
  @include('includes.scripts')
    
    <script>
      $(document).ready(function() {
          $('select[name="category_id"]').on('change', function() {
              var category_id = $(this).val();
              if (category_id) {
                  $.ajax({
                      url: "{{ URL::to('category') }}/" + category_id,
                      type: "GET",
                      // dataType: "json",
                      success: function(data) {
                          $('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value) {
                              $('select[name="subcategory_id"]').append('<option value="' +
                                  value + '">' + key + '</option>');
                          });
                      },
                  });

              } else {
                  console.log('AJAX load did not work');
              }
          });

      });
  </script>
  
</body>
</html>