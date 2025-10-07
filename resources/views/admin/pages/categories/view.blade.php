@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('View Category') }}
@endsection()

@section('content')
    <div>
        <livewire:categories.view-category :id="$id" />
    </div>
@endsection
