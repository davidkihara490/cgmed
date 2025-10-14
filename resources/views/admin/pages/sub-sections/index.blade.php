@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('Sub Sections') }}
@endsection()

@section('content')
    <div>
        <livewire:admin.sub-sections />
    </div>
@endsection
