@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('Categories') }}
@endsection()

@section('content')
    <div>
        <livewire:admin.categories.categories />
    </div>
@endsection
