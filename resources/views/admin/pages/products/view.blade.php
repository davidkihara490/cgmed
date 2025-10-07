@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('View Product') }}
@endsection()

@section('content')
    <div>
        <livewire:admin.products.view-product :id="$id" />
    </div>
@endsection
