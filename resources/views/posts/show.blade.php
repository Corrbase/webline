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
                                                <img src="/storage/{{$posts->image}}" style="width: 720px; height: 400px; object-fit: cover"  class="w-100">
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

                                        <p class="pt-2 text-muted">author - {{$posts->author}}</p>
                                    </div>

                                    <div>
                                        <h2 class="fs-3 pt-5">
                                            comments
                                        </h2>
                                        <form class="form mb-5" method="post" action="/r/comment/{{$posts->id}}">
                                            @csrf
                                            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                                <div class="d-flex flex-start w-100">

                                                    <div class="form-outline w-100">
                                                        <label for="comment">
                                                            Add comment
                                                        </label>
                <textarea class="form-control" id="comment" name="comment" rows="4"
                          style="background: #fff;"></textarea>
                                                        @error('comment')
                                                        <p class="text-xs mt-1" style="color: red">
                                                            {{$message}}
                                                        </p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="float-end mt-2 pt-1">
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">Post comment</button>
                                                </div>
                                            </div>
                                        </form>

                                        @foreach($comments as $comment)
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <p>{{ $comment->comment }}</p>

                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex flex-row align-items-center pt-2 text-muted w-100 justify-content-between">
                                                            <p class="small mb-0 ms-2">author - {{ $comment->author }}</p>
                                                            <p class="small mb-0 ms-2">{{ $comment->created_at }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="">
                                            {{$comments->links()}}
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
