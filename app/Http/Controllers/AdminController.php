<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\User\UserRepositoryInterface;
use App\Http\Requests\Web\User\CreateUserRequest;
use App\Http\Requests\Web\User\UpdateUserRequest;
use App\Http\Requests\Web\User\UpdateUserPasswordRequest;

class AdminController extends Controller{

    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository){
        $this->userRepository  = $userRepository;
    }

    public function index(){
        $users = $this->userRepository->getAll();
        return view('admin.user.index', get_defined_vars());
    }

    public function userCreate(){
        return view('admin.user.create');
    }

    public function userStore(CreateUserRequest $request){
        $data = $request->validated();
        $this->userRepository->create($data);
        return redirect()->route('admin.index')->with('success', 'User created successfully');
    }

    public function userEdit($id){
        $user = $this->userRepository->getById($id);
        return view('admin.user.edit', get_defined_vars());
    }

    public function userChangePassword($id){
        $user = $this->userRepository->getById($id);
        return view('admin.user.change_password', get_defined_vars());
    }

    public function userUpdatePassword(UpdateUserPasswordRequest $request, $id){
        $data = $request->validated();
        $this->userRepository->updatePassword($data, $id);
        return redirect()->route('admin.index')->with('success', 'User password updated successfully');
    }

    public function userUpdate(UpdateUserRequest $request, $id){
        $data = $request->validated();
        $this->userRepository->update($data, $id);
        return redirect()->route('admin.index')->with('success', 'User updated successfully');
    }

    public function userDestroy($id){
        $this->userRepository->delete($id);
        return response()->json(['type' => 'success', 'message' => 'User has been deleted'], 200);
    }
}
