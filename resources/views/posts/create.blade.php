@extends('layouts.app')

@section('title')
    Login form
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class=" ">
                    <form method="post" action="/r/post" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex align-items-center mb-3 pb-1">
                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                            <span class="h1 fw-bold mb-0"></span>
                        </div>


                        <div class="form-outline mb-4">
                            <label class="form-label" for="title"><span class="text-muted">(min symbols: 3, max: 50)</span></label>
                            <input value="{{old('title')}}" name="title" type="text" id="title" class="form-control form-control-lg" />

                            @error('title')
                            <p class="text-xs mt-1" style="color: red">
                                {{$message}}
                            </p>
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="title">Preview information <span class="text-muted">(min symbols: 20)</span></label>
                            <input value="{{old('short')}}" name="short" type="text" id="short" class="form-control form-control-lg" />

                            @error('short')
                            <p class="text-xs mt-1" style="color: red">
                                {{$message}}
                            </p>
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="description">Description <span class="text-muted">(min symbols: 20)</span></label>
                            <textarea  name="description" style="min-height: 250px"  id="description" class="form-control form-control-lg ">{{old('description')}}</textarea>

                            @error('description')
                            <p class="text-xs mt-1" style="color: red">
                                {{$message}}
                            </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="form-label" for="description">Image</label>

                            <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" />

                            @error('image')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <button class="rounded py-2 px-4 btn btn-outline-danger">
                                Create post
                            </button>

                            <a href="/profile" class="text-black ml-4"> Back </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
