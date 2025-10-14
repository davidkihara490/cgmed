@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('Create Section') }}
@endsection()

@section('content')
    <div>
        <livewire:admin.create-section />
    </div>
@endsection