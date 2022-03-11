@extends('admin.admin_master')

@section('admin')


<div class="py-12">
  <div class="container">
    <div class="row">
<h4>About Home Page</h4>
        <a href="{{route('add.about')}}"><button class="btn btn-info">Add About</button></a>
<br>
      <div class="col-md-12">
        <div class="card">

          @if(session('success'))

          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          <div class="card-header">All About Home Info</div>


          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Short Description</th>
                <th scope="col">Long Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($homeabout as $about)
              <tr>
                <td scope="row">{{$about -> id}}</td>
                <td>{{$about -> title}}</td>
                <td>{{ $about -> short_desc }}</td>
                <td>{{ $about -> long_desc }}</td>
                {{-- <td> <img src="{{ asset($about->image) }}" width="200" > </td> --}}
                <td>
                  {{-- @if($slider -> created_at == NULL)
                  <span class="text-danger">No Date Entered</span>
                  @else
                  {{$brand -> created_at}}
                  @endif --}}
                </td>
                <td>
                  <a href="{{ url('about/edit/'.$about->id) }}" class="btn btn-info">Edit</a>
                  <a href="{{url('about/delete/'.$about->id) }}" onclick="return confirm('Are You Sure You Want To Delete This Record')" class="btn btn-danger">Delete</a>
                </td>

              </tr>
              @endforeach
            </tbody>
          </table>

          {{-- {{$slider -> links() }} --}}


        </div>
      </div>

      

    </div>

  </div>


  <!-- TRASH PART -->




</div>
 @endsection 