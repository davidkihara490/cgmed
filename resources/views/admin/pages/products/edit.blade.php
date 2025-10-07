@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('Edit Product') }}
@endsection()

@section('content')
    <div>
        <livewire:admin.products.edit-product :id="$id"/>
    </div>
@endsection