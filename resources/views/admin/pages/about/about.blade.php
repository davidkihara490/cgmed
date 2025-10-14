@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('About Section') }}
@endsection()

@section('content')
    <div>
        <livewire:admin.about.edit-about />
    </div>
@endsection
