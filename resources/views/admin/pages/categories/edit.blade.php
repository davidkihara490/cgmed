@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('Edit Category') }}
@endsection()

@section('content')
    <div>
        <livewire:admin.categories.edit-category :id="$id"/>
    </div>
@endsection