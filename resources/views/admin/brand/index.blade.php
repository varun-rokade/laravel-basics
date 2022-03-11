 @extends('admin.admin_master')

  @section('admin')


  <div class="py-12">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="card">

            @if(session('success'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{session('success')}}</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="card-header">All category</div>


            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Brand Name</th>
                  <th scope="col">Brand Image</th>
                  <th scope="col">Created At</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($brands as $brand)
                <tr>
                  <td scope="row">{{$brand -> id}}</td>
                  <td>{{$brand -> brand_name}}</td>
                  <td> <img src="{{ asset($brand->brand_image) }}" width="200" > </td>
                  <td>
                    @if($brand -> created_at == NULL)
                    <span class="text-danger">No Date Entered</span>
                    @else
                    {{$brand -> created_at}}
                    @endif
                  </td>
                  <td>
                    <a href="{{ url('brand/edit/'.$brand->id) }}" class="btn btn-info">Edit</a>
                    <a href="{{url('brand/delete/'.$brand->id) }}" onclick="return confirm('Are You Sure You Want To Delete This Record')" class="btn btn-danger">Delete</a>
                  </td>

                </tr>
                @endforeach
              </tbody>
            </table>

            {{$brands -> links() }}


          </div>
        </div>

        <div class="col-md-4">
          <div class="card">
            <div class="card-header">Add Brand</div>
            <div class="card-body">

              <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="" class="form-label">Brand Name</label>
                  <input type="text" name="brand_name" class="form-control" aria-describedby="">

                  @error('brand_name')
                  <span class="text-danger">{{$message}} </span>
                  @enderror

                </div>


                <div class="form-group">
                  <label for="" class="form-label">Brand Image</label>
                  <input type="file" name="brand_image" class="form-control" aria-describedby="">

                  @error('brand_name')
                  <span class="text-danger">{{$message}} </span>
                  @enderror

                </div>



                <button type="submit" class="btn btn-primary">Add Brand</button>
              </form>


            </div>
          </div>
        </div>

      </div>

    </div>


    <!-- TRASH PART -->




  </div>
   @endsection 