
@extends('layout.mater')
@section('title', 'Thêm mới người dùng')
@section('content-title', 'Thêm mới người dùng')

@section('content')
    <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name"  aria-describedby="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email"  aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">username</label>
            <input type="username" class="form-control"  name="usersname"  aria-describedby="username">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">avatar</label>
            <input type="file"  name="avatar"  aria-describedby="username">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">birthday</label>
            <input type="date" class="form-control" name="date"  aria-describedby="birthday">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Phone</label>
            <input type="number" class="form-control" name="phone"  aria-describedby="Phone">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">role</label><br>
            <input type="radio"  name="role" value="0">GD
            <input type="radio"  name="role" value="1">NV
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">status</label><br>
            <input type="radio"  name="status" value="1">Khoa
            <input type="radio"  name="status" value="1">Mo
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">room_id</label>
            <select name="room_id" id="">
                @foreach ($rooms as $item)
                <option class="form-control" value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        
        <div>
        <button type="submit" class="btn btn-primary">Tạo mới</button>
        <button type="reset" class="btn btn-warning">Nhập lại</button>
        </div>
    </form>
    
@endsection