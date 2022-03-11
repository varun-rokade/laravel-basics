<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- {{ __('Dashboard') }} -->
        
            <b> All category   </b>
            <b style = "float:right;"> 
            <span class=""></span>
            </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class = "container">
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
      <th scope="col">Category Name</th>
      <th scope="col">User</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($categories as $category)
    <tr>
      <th scope="row">{{$category -> id}}</th>
      <td>{{$category -> category_name}}</td>
      <td>{{$category ->user->name}}</td>
      <td>
        @if($category -> created_at == NULL)
        <span class="text-danger">No Date Entered</span>
        @else   
      {{$category -> created_at}}
        @endif
        </td>
        <td>
          <a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-info">Edit</a>
          <a href="{{url('softdelete/category/'.$category->id) }}" class="btn btn-danger">Delete</a>
        </td>

    </tr>
    @endforeach
  </tbody>
</table>

{{$categories -> links() }}


</div>
</div>

<div class="col-md-4">
                <div class="card">
                    <div class="card-header">Add category</div>
                        <div class="card-body">

  <form action="{{ route('store.category') }}" method = "POST">
      @csrf
  <div class="mb-3">
    <label for="" class="form-label">Category Name</label>
    <input type="text" name="category_name" class="form-control" id="category" aria-describedby="">
  
        @error('category_name')
            <span class="text-danger">{{$message}} </span>
        @enderror

</div>
  
  <button type="submit" class="btn btn-primary">Add Category</button>
</form>


</div>
                </div>
</div>

        </div>    

        </div>

    <!-- TRASH PART -->

        <div class = "container">
            <div class="row">
            
            <div class="col-md-8">
                <div class="card">
      
          

<div class="card-header">Trash List</div>
                

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category Name</th>
      <th scope="col">User</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($trashcat as $category)
    <tr>
      <th scope="row">{{$category -> id}}</th>
      <td>{{$category -> category_name}}</td>
      <td>{{$category ->user->name}}</td>
      <td>
        @if($category -> created_at == NULL)
        <span class="text-danger">No Date Entered</span>
        @else   
      {{$category -> created_at}}
        @endif
        </td>
        <td>
          <a href="{{ url('category/restore/'.$category->id) }}" class="btn btn-info">Restore</a>
          <a href="{{url('category/pdelete/'.$category->id) }}" class="btn btn-danger">P Delete</a>
        </td>

    </tr>
    @endforeach
  </tbody>
</table>

{{$trashcat -> links() }}


</div>
</div>

<div class="col-md-4">
                
</div>

        </div>    

        </div>


    </div>
</x-app-layout>
