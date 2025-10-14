@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('Edit Sub Category') }}
@endsection()

@section('content')
    <div>
        <livewire:admin.sub-categories.edit-sub-category :id="$id" />
    </div>
@endsection
