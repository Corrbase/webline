@extends('layouts.app')

@section('content')
    <section class="vh-90" style="
    background-color: #ffdd00; height: 95vh;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #E100FF, #7F00FF);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #E100FF, #7F00FF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
        <div class="m-auto w-50  p-5 bg-white">
            <h1 class="text-center fs-1">Are you sure?</h1>
            <div class="d-flex w-40 justify-content-sm-between pt-3 m-auto" class="fs-3" style="">
                <form action="/r/posts/delete/{{$posts->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">
                        Yes
                    </button>
                </form>
                <a href="/profile" class="btn-outline-dark btn">
                    No, go back
                </a>
            </div>
        </div>
    </section>
@endsection
