@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('Sections') }}
@endsection()

@section('content')
    <div>
        <livewire:admin.sections />
    </div>
@endsection
