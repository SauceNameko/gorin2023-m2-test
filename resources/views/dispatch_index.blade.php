@extends('app');

@section('title')
    派遣情報
@endsection

@section('content')
    <a href="{{ route('dispatch_create') }}" class="btn btn-outline-primary">派遣情報新規登録</a>
    <a href="{{ route('dashboard') }}" class="btn btn-danger">戻る</a>
    <table class="table table-bordered">
        <th>event-name</th>
        <th>worker</th>
        <th></th>
        <th></th>
        @foreach ($dispatches as $dispatch)
            <tr>
                <td>{{ $dispatch->event->name }}</td>
                <td>{{ $dispatch->worker->name }}</td>
                <td>{{ $dispatch->memo }}</td>
                <td><a href="" class="btn btn-outline-success">編集</a></td>
                <td><a href="{{ route('dispatch_destroy', $dispatch->id) }}" class="btn btn-outline-danger"
                        onclick="return confirm('本当に削除しますか')">削除</a></td>
            </tr>
        @endforeach
    </table>
@endsection
