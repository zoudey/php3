<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;

class UserController extends Controller
{
    //
    
    public function index(){
        // $users = User::all();
        // dd($users);
        // $users = User::paginate(5); // phân quyền hiển thị mỗi trang chỉ 5 sản phẩm
        $users = User::select('id', 'name', 'date','usersname','status','email','avatar')
        ->where('id', '>',3)
        // ->where('id', '<=',7)
        ->paginate(5);
        // dd($users);
        return view('admin.user.list', ['user_list' => $users]);
    }
    public function delete($id)
    {
        User::find($id)->delete();
        return  back();
    }

    public function create(){
        $rooms = Room::select('id', 'name')->get();
        return view('admin.user.create', [
            'rooms' => $rooms
        ]);
    }
    public function store(Request $request){
        
        $users = new User();
        $users->fill($request->all());
        if($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $avatarName = $avatar->hashName();
            $avatarName = $request->username .'_'. $avatarName;

            $users->avatar = $avatar->storeAs('images/users', $avatarName);
            //storage
        }else{
            $users->avatar = '';
            
        }
        $users->save();
        return redirect()->route('users.list'); 
    }
    public function edit(User $id)
    {   
        $id->date = date('Y-m-d', strtotime($id->date)); // chuyển sang dạng y-m-d
        $rooms = Room::select('id', 'name')->get();
        return view('admin.user.edit', [
            // 'rooms'=> $room
            'user' => $id,
            'rooms' => $rooms

        ]);
    }
    public function update(Request $request)
    {
        $users = User::find($request->id);
        if ($request->hasFile('avatar_up')) {
            $avatar = $request->avatar_up;
            $avatarName = $avatar->hashName();
            $avatarName = $request->username . '_' . $avatarName;
            $avatar_up = $avatar->storeAs('images/users', $avatarName);
        } else {
            $avatar_up = $request->avatar;
        }

        $users->update([
            'name' => $request->name,
            'email'  => $request->email,
            'password' => $request->password,
            'username' => $request->usersname,
            'birthday' => $request->date,
            'phone' => $request->phone,
            'avatar' => $avatar_up,
            'role' => $request->role,
            'status' => $request->status,
            'room_id' => $request->room_id,
        ]);
        return redirect()->route('users.list');
    }
}
