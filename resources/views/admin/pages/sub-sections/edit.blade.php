@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('Edit Sub Section') }}
@endsection()

@section('content')
    <div>
        <livewire:admin.edit-sub-section :id="$id" />
    </div>
@endsection
