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
                      <a href="{{route('user.create')}}" class="btn btn-primary">Create</a>
                   </div>
                 </div>
               </div>
            </div>
           <table class="table mt-5" id="usersTable">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Created</th>
                    <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                     $i = 1;
                    ?>
                   @foreach($users as $user)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if ($user->role == App\Enums\User\UserRoles::admin)
                                Admin
                            @endif

                            @if ($user->role == App\Enums\User\UserRoles::user)
                                User
                            @endif
                        </td>
                        <td>{{$user->formated_date()}}</td>
                        <td>
                           <div class="btn-group" role="group" aria-label="users-btn-group">
                                <a href="{{route('user.change.password', $user->id)}}" class="btn btn-secondary">Change Password</a>
                                <a href="{{route('user.edit', $user->id)}}" class="btn btn-waring">Edit</a>
                                <button type="button"  data-url="{{ route('user.delete', $user->id) }}" id="deleteUser" class="btn btn-danger">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
         </div>
    </div>
</div>
@endsection
