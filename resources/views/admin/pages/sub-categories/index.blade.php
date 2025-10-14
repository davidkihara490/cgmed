@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('Sub Categories') }}
@endsection()

@section('content')
    <div>
        <livewire:admin.sub-categories.sub-categories />
    </div>
@endsection
