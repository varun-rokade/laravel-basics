@extends('admin.admin_master')

@section('admin')


<div class="py-12">
  <div class="container">
    <div class="row">
<h4>Home Slider</h4>
        <a href="{{route('add.slider')}}"><button class="btn btn-info">Add Slider</button></a>
<br>
      <div class="col-md-12">
        <div class="card">

          @if(session('success'))

          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          <div class="card-header">All Slider</div>


          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($sliders as $slider)
              <tr>
                <td scope="row">{{$slider -> id}}</td>
                <td>{{$slider -> title}}</td>
                <td>{{ $slider -> description }}</td>
                <td> <img src="{{ asset($slider->image) }}" width="200" > </td>
                <td>
                  {{-- @if($slider -> created_at == NULL)
                  <span class="text-danger">No Date Entered</span>
                  @else
                  {{$brand -> created_at}}
                  @endif --}}
                </td>
                <td>
                  <a href="{{ url('slider/edit/'.$slider->id) }}" class="btn btn-info">Edit</a>
                  <a href="{{url('slider/delete/'.$slider->id) }}" onclick="return confirm('Are You Sure You Want To Delete This Record')" class="btn btn-danger">Delete</a>
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