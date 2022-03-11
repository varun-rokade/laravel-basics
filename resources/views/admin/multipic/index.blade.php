@extends('admin.admin_master')

@section('admin')


{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- {{ __('Dashboard') }} -->
        
            <b> Multi Picture </b>
            <b style = "float:right;"> 
            <span class=""></span>
            </b>
        </h2>
    </x-slot> --}}



    <div class="py-12">
        <div class = "container">
            <div class="row">

            <div class="col-md-8">

            <div class="card-group">
            
            @foreach($images as $multi)
            
            <div class="col-md-4 mt-5">
                <div class="card">
                
                    <img src='{{ asset($multi->image) }}'>

                </div>

        
            </div>
            
            @endforeach
        </div>

            <div class="card">
      


</div>
</div>

<div class="col-md-4">
                <div class="card">
                    <div class="card-header">Multi Image</div>
                        <div class="card-body">

  <form action="{{ route('store.image') }}" method = "POST" enctype = "multipart/form-data">
      @csrf
  
  

<div class="mb-3">
    <label for="" class="form-label">Brand Image</label>
    <input type="file" name="image[]" class="form-control"  multiple="">
  
        @error('image')
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
{{-- </x-app-layout> --}}
@endsection