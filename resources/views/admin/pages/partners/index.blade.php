@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('Partners') }}
@endsection()

@section('content')
    <div>
        <livewire:admin.partners.partners />
    </div>
@endsection
