@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('View User') }}
@endsection()

@section('content')
    <div>
        <livewire:users.view-user :id="$id" />
    </div>
@endsection
