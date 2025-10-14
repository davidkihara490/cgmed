@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('Create Sub-Category') }}
@endsection()

@section('content')
    <div>
        <livewire:admin.sub-categories.create-sub-category />
    </div>
@endsection