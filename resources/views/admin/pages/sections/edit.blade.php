@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('Edit Section') }}
@endsection()

@section('content')
    <div>
        <livewire:admin.edit-section  :id="$id"/>
    </div>
@endsection