@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('General Settings') }}
@endsection()

@section('content')
    <div>
        <livewire:admin.settings.edit-general-settings />
    </div>
@endsection
