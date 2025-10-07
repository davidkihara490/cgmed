@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('Products') }}
@endsection()

@section('content')
    <div>
        <livewire:admin.products.products />
    </div>
@endsection
