@extends('admin.admin_master')

@section('admin')

<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Change Password</h2>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('password.update') }}" class="form-pill">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput3">Current Password</label>
                <input type="password" name ="current_password" id="current_password" class="form-control"  placeholder="Enter Current Password">
                @error("current_password")
                <span class="text-danger">{{$message}}</span>    
                @enderror

            </div>

            <div class="form-group">
                <label for="exampleFormControlPassword3">New Password</label>
                <input type="password" name ="password" id="password" class="form-control"  placeholder="New Password">
                
                @error("password")
                <span class="text-danger">{{$message}}</span>    
                @enderror


            </div>

            <div class="form-group">
                <label for="exampleFormControlPassword3">Confirm Password</label>
                <input type="password" name ="password_confirmation" id="password_confirmation" class="form-control"  placeholder="Confirm Password">
                
                @error("password_confirmation")
                <span class="text-danger">{{$message}}</span>    
                @enderror

            </div>
            
            <button type="submit" class="btn btn-primary btn-primary" >Save Password</button>

        </form>
    </div>
</div>


@endsection