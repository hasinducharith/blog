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

            <form method="POST" action="{{ route('user.store')}}">
               @csrf
               <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" id="name" name="name" value="">
                  @error('name')
                     <div class="alert alert-danger" role="alert">
                        {{ $message }}
                     </div>
                  @enderror
               </div>

               <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" name="email" value="">
                  @error('email')
                     <div class="alert alert-danger" role="alert">
                        {{ $message }}
                     </div>
                  @enderror
               </div>

               <div class="form-group">
                  <label for="role">Role:</label>
                  <select name="role" id="role" class="form-control">
                     <option value="1">User</option>
                     <option value="2">Admin</option>
                  </select>
                  @error('role')
                     <div class="alert alert-danger" role="alert">
                        {{ $message }}
                     </div>
                  @enderror
               </div>


               <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" id="password" name="password">
                  @error('password')
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
