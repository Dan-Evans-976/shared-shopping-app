@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Items Completed</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lists as $list)
                <tr>
                    <td>{{ $list->name }}</td>
                    <td>{{ $list->description }}</td>
                    <td>
                        <div class="progress-bar">
                            <span class="progress-readout">{{$list->PercentCompleted()}}% - ({{ $list->ItemsCompleted() }}/{{ $list->ItemCount() }})</span>
                            <div class="progress-slider" style="width: {{$list->PercentCompleted()}}%;"></div>
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('list.show', $list->id) }}" class="btn btn-primary btn-sm me-1">View</a>
                        <form method="POST" class="d-inline" action="{{ route('list.delete', $list->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
            
                            <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection