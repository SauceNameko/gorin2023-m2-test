@extends('app')

@section('title')
    dashboard
@endsection

@section('content')
    <a href="{{ route('logout') }}" class="btn btn-outline-danger">ログアウト</a>
    <a href="{{ route('event_index') }}" class="btn btn-primary">イベント情報</a>
    <a href="{{ route('worker_index') }}" class="btn btn-success">人材情報</a>
    <a href="{{ route('dispatch_index') }}" class="btn btn-danger">派遣情報</a>
@endsection
