@extends('app')

@section('title')
    ログイン画面
@endsection

@section('content')
    <form action="{{ route('check') }}" method="post">
        @csrf
        <input type="email" name="email" id="">
        <input type="text" name="password" id="">
        <input type="submit" value="ログイン" class="btn btn-outline-primary">
        @if (session('message'))
            <div class="alert alert-danger">{{ session('message') }}</div>
        @endif
    </form>
@endsection
