@extends('layouts.main')

@section('content')
    @if($success)
        <div class="alert alert-success">
            {{{ $success }}}
        </div>
    @else
        <div class="alert alert-danger">
            {{{ $error }}}
        </div>
    @endif
@stop