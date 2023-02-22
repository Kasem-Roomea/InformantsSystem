@extends('layouts.master')
@section('css')
    @livewireStyles
@section('title')
    العينات
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    العينات
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body" >
                    <livewire:add-samples />
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @livewireScripts

@endsection
