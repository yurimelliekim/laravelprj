@extends('layouts/master')

@section('style')
{{--    <style>--}}
{{--        body{--}}
{{--            background-color: #718096;--}}
{{--        }--}}
{{--    </style>--}}
@endsection

@section('content')
    <p>content section</p>




    @include('partials.footer')
@endsection

@section('script')
    <script>

        alert('aaa');
    </script>

@endsection
