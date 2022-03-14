@extends('admin.admin_master')

@section('admin')


<div class="py-12">
  <div class="container">
    <div class="row">
<h4>Contact Form</h4>
        <a href="{{route('add.contact')}}"><button class="btn btn-info">Add Contact</button></a>
<br>
      <div class="col-md-12">
        <div class="card">

          @if(session('success'))

          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          <div class="card-header">All Contacts Form Info</div>


          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
              </tr>
            </thead>
            <tbody>
              @foreach($conform as $conf)
              <tr>
                <td scope="row">{{$conf -> id}}</td>
                <td>{{$conf -> name}}</td>
                <td>{{ $conf -> email }}</td>
                <td>{{ $conf -> subject }}</td>
                <td>{{ $conf -> message }}</td>
                {{-- <td> <img src="{{ asset($about->image) }}" width="200" > </td> --}}
                {{-- <td>
                  {{-- @if($slider -> created_at == NULL)
                  <span class="text-danger">No Date Entered</span>
                  @else
                  {{$brand -> created_at}}
                  @endif --}}
                {{-- </td>  --}}
                <td>
                  <a href="{{ url('contact/edit/'.$conf->id) }}" class="btn btn-info">Edit</a>
                  <a href="{{url('contact/delete/'.$conf->id) }}" onclick="return confirm('Are You Sure You Want To Delete This Record')" class="btn btn-danger">Delete</a>
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