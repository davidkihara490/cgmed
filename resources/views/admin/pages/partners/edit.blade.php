@extends('admin.components.layouts.master')
@section('page-title')
    {{ __('Edit Partner') }}
@endsection()

@section('content')
    <div>
        <livewire:admin.partners.edit-partner :id="$id"/>
    </div>
@endsection