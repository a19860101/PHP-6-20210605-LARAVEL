@extends('template.master')
@section('site-title')
登出
@endsection
@section('main')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h3>您已登出</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection