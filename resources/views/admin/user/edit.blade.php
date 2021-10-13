@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-2">
        <div class="col-md-12">
           <div class="card">
               <div class="card-body">
                <div class="clearfix">
                   <div class="float-left"> Users </div>
                   <div class="float-right"> 
                      <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                   </div>
                 </div>
               </div>
            </div>

            <form method="POST" action="{{ route('user.update', $user->id )}}">
               @csrf
               <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                  @error('name')
                     <div class="alert alert-danger" role="alert">
                        {{ $message }}
                     </div>
                  @enderror
               </div>
               

               <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                  @error('email')
                     <div class="alert alert-danger" role="alert">
                        {{ $message }}
                     </div>
                  @enderror
               </div>

               
               <div class="form-group">
                  <label for="role">Role:</label>
                  <select name="role" id="role" class="form-control">
                     <option {{ ($user->role == App\Enums\User\UserRoles::user) ? "selected" : " " }} value="1">User</option>
                     <option {{ ($user->role == App\Enums\User\UserRoles::admin) ? "selected" : " " }} value="2">Admin</option>
                  </select>
                  @error('role')
                     <div class="alert alert-danger" role="alert">
                        {{ $message }}
                     </div>
                  @enderror
               </div>

               <button type="submit" class="btn btn-primary">Save</button>
            </form>

         </div>
    </div>
</div>
@endsection
