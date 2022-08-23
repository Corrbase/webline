@extends('layouts.app')

@section('title')
    Login form
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <p>
                        welcome
                        {{ auth()->user()->name }},
                        it is your profile panel
                    </p>
                </div>

                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
