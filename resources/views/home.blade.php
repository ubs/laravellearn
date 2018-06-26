@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>


            <div class="card">
                <div class="card-header">Main Navigation (Temporarily)</div>
                <div class="card-body">@include('commons.mainnav')</div>
            </div>
        </div>
    </div>
</div>
@endsection
