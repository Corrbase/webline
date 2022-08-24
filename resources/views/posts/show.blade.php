@extends('layouts.app')

@section('title')
    Login form
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class=" ">
                    <div class="card-body p-2">
                        <div class="pt-2">
                                    <div class="pb-3">
                                        <a href="/" class=" text-danger fs-5 ">
                                            <i class="fa-solid fa-arrow-left"></i>
                                            Back
                                        </a>
                                    </div>
                                    <div class="d-flex">
                                        <div class="col-6 pb-4 d-flex">
                                            <a href="">
                                                <img src="https://static.vecteezy.com/packs/media/vectors/term-bg-1-666de2d9.jpg" class="w-100">
                                            </a>
                                        </div>
                                        <div class="p-2">
                                            <div>
                                                <h2 class="fs-2 pt-5 fw-bold">{{ $posts->title }}</h2>
                                                <p class="text-muted mt-2">{{ $posts->short }}</p>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="fs-5">
                                        <p>{{ $posts->description }}</p>
                                    </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
