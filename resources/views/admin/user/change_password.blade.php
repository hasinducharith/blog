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

            <form method="POST" action="{{ route('user.update.password', $user->id )}}">
               @csrf
               <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" id="password" name="password">
                  @error('password')
                     <div class="alert alert-danger" role="alert">
                        {{ $message }}
                     </div>
                  @enderror
               </div>

               <div class="form-group">
                  <label for="password_confirmation">Confirm password:</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                  @error('password_confirmation')
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
