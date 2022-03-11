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
                    <div class="card-header">Edit category</div>
                        <div class="card-body">

  <form action="{{ url('category/update/'.$categories->id) }}" method = "POST">
      @csrf
  <div class="mb-3">
    <label for="" class="form-label">Category Name</label>
    <input type="text" name="category_name" class="form-control" id="category" value="{{ $categories->category_name  }}">
  
        @error('category_name')
            <span class="text-danger">{{$message}} </span>
        @enderror

</div>
  
  <button type="submit" class="btn btn-primary">Edit Category</button>
</form>


</div>
                </div>
</div>

        </div>    

        </div>

    </div>
</x-app-layout>
