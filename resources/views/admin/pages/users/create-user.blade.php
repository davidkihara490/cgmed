@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('Create User') }}
@endsection()

@section('content')
    <div>
        <livewire:users.create-user />
    </div>
@endsection