@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('Create Partner') }}
@endsection()

@section('content')
    <div>
        <livewire:admin.partners.create-partner />
    </div>
@endsection
