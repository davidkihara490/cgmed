@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('Create Product') }}
@endsection()

@section('content')
    <div>
        <livewire:admin.categories.create-category />
    </div>
@endsection
