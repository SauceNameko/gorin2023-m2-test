@extends('app')

@section('title')
    派遣情報新規登録
@endsection

@section('content')
    <a href="{{ route('dispatch_index') }}" class="btn btn-danger">戻る</a>
    <form action="{{ route('dispatch_store') }}" method="post">
        @csrf
        {{-- name: <input type="text" name="name" id="">
        email: <input type="email" name="email" id="">
        password: <input type="text" name="password" id="">
        memo: <input type="text" name="memo" id="">
        <input type="submit" value="登録" class="btn btn-primary"> --}}
        イベント選択:<select name="event_info" id="">
            @foreach ($events as $event)
                <option value="{{ $event->name }}">{{ $event->name }}</option>
            @endforeach
        </select>

        人材選択:<select name="worker_info" id="" multiple>
            @foreach ($workers as $worker)
                <option value="{{ $worker->name }}">{{ $worker->name }}</option>
            @endforeach
        </select>
        メモ: <input type="text" name="memo" id="">

        <input type="submit" value="登録" class="btn btn-primary">
        @if (session('message'))
            <div class="alert alert-primary">{{ session('message') }}</div>
        @endif
        @if ($errors->first())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
    </form>
@endsection
