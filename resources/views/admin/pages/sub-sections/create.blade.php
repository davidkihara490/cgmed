@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('Create Sub-Section') }}
@endsection()

@section('content')
    <div>
        <livewire:admin.create-sub-section />
    </div>
@endsection