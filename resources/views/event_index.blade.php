@extends('app');

@section('title')
    イベント情報
@endsection

@section('content')
    <a href="{{ route('event_create') }}" class="btn btn-outline-primary">イベント情報新規登録</a>
    <a href="{{route('dashboard')}}" class="btn btn-danger">戻る</a>
    <table class="table table-bordered">
        <th>name</th>
        <th>place</th>
        <th>event-date</th>
        <th></th>
        <th></th>
        @foreach ($events as $event)
            <tr>
                <td>{{ $event->name }}</td>
                <td>{{ $event->place }}</td>
                <td>{{ $event->{"event-date"} }}</td>
                <td><a href="{{ route('event_edit', $event->id) }}" class="btn btn-outline-success">編集</a></td>
                <td><a href="{{ route('event_destroy', $event->id) }}" class="btn btn-outline-danger" onclick="return confirm('本当に削除しますか')" >削除</a></td>
            </tr>
        @endforeach
    </table>
@endsection
