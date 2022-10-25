@extends('layouts.app')

@push('js')
    <script>
        window.listData = {!! json_encode($list) !!};
    </script>
    @vite('resources/js/shoppingList.js')
@endpush

@section('content')
    <div id="list"></div>
@endsection