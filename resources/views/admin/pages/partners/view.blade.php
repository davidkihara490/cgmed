@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('View Partner') }}
@endsection()

@section('content')
    <div>
        <livewire:admin.partners.view-partner :id="$id" />
    </div>
@endsection
