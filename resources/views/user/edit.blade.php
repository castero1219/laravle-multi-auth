@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">プロフィール編集</div>

                <div class="card-body">
                    @if(session("success"))
                    <div class="alert alert-success">{{session("success")}}</div>

                    @endif
                    <form action="{{route('user.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <ul>
                            <li>
                                <label for="">お名前</label>
                                <input type="text" value="{{$user->name}}" name="name">
                            </li>
                            <li>
                                <label for="">email</label>
                                <input type="email" value="{{$user->email}}"readonly name="email">
                            </li>
                            <li>
                                <label for="">プロフィール画像</label>
                                @if($user->profile_image)
                                    <img src="/storage/{{$user->profile_image}}" alt="">
                                @endif
                                <input type="file" value="" name="profile_image">
                            </li>
                        </ul>
                        <input type="submit" value="プロフィール編集を実行する" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
