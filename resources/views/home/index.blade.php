@extends('layouts.app')

@section('title')
    Login form
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class=" ">
                    <form action="/" >
                        <div class="relative border-2 border-gray-100 m-3 rounded-lg">
                            <div class="absolute top-4 left-3">
                                <i
                                    class="fa fa-search text-gray-400 z-20 hover:text-gray-500"
                                ></i>
                            </div>
                            <input
                                type="text"
                                name="search"
                                class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                                placeholder="Search posts"
                            />
                            <div class="absolute top-2 right-2">
                                <button
                                    type="submit"
                                    class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600"
                                >
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>


                    <div class="card-body p-2">
                        <div class="mt-6 pb-2 p-3">
                            {{$posts->links()}}
                        </div>
                        <div class="pt-2">
                            @unless(count($posts) == 0)
                        @foreach($posts as $post)

                            <div class="d-flex">
                                <div class="col-3 pb-4 d-flex">
                                    <a href="">
                                        <img src="https://static.vecteezy.com/packs/media/vectors/term-bg-1-666de2d9.jpg" class="w-100">
                                    </a>
                                </div>
                                <div class="p-2">
                                    <div>
                                        <h2 class="fs-2 fw-bold">{{ $post->title }}</h2>
                                        <p class="text-muted mt-2">{{ $post->short }}</p>
                                    </div>
                                    <div class="mt-2">
                                        <a href="/posts/{{ $post->id }}" class="btn btn-outline-danger" type="button">Go to post</a>
                                    </div>
                                </div>
                            </div>

                    @endforeach
                            @else
                                <h1 class="p-2 m-auto fw-bold fs-1 text-center">no post found</h1>
                            @endunless
                    </div>
                    <div class="mt-6 pb-2 p-3">
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
