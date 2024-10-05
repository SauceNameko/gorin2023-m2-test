@extends('app');

@section('title')
    人材情報
@endsection

@section('content')
    <a href="{{ route('worker_create') }}" class="btn btn-outline-primary">人材情報新規登録</a>
    <a href="{{ route('dashboard') }}" class="btn btn-danger">戻る</a>
    <table class="table table-bordered">
        <th>name</th>
        <th>email</th>
        <th>memo</th>
        <th></th>
        <th></th>
        @foreach ($workers as $worker)
            <tr>
                <td>{{ $worker->name }}</td>
                <td>{{ $worker->email }}</td>
                <td>{{ $worker->memo }}</td>
                <td><a href="" class="btn btn-outline-success">編集</a></td>
                <td><a href="{{ route('worker_destroy', $worker->id) }}" class="btn btn-outline-danger"
                        onclick="return confirm('本当に削除しますか')">削除</a></td>
            </tr>
        @endforeach
    </table>
@endsection
