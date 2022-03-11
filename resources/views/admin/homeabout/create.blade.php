@extends('admin.admin_master')

@section('admin')
    
<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Add About Home Page</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('store.about') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Add Title</label>
                    <input type="text" class="form-control"  name="abouttitle" placeholder="Enter title">
                </div>
               
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Short Description</label>
                    <textarea class="form-control" name="short_desc" rows="3"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Long Description</label>
                    <textarea class="form-control" name="long_desc" rows="3"></textarea>
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