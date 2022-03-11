@extends('admin.admin_master')

@section('admin')
    
<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Add Slider Page</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('store.slider') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Slider Title</label>
                    <input type="text" class="form-control"  name="title" placeholder="Enter title">
                    {{-- <span class="mt-2 d-block">We'll never share your email with anyone else.</span> --}}
                </div>
                {{-- <div class="form-group">
                    <label for="exampleFormControlPassword">Password</label>
                    <input type="password" class="form-control" id="exampleFormControlPassword" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect12">Example select</label>
                    <select class="form-control" id="exampleFormControlSelect12">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div> --}}
                {{-- <div class="form-group">
                    <label for="exampleFormControlSelect2">Example multiple select</label>
                    <select multiple class="form-control" id="exampleFormControlSelect2">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div> --}}
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" name="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Slider Image</label>
                    <input type="file" class="form-control-file" name="image" >
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection