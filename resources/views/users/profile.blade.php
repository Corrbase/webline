@extends('layouts.app')

@section('title')
    Login form
@endsection

@section('content')
    <section style="
    background-color: #ffdd00; height: 95vh;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #E100FF, #7F00FF);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #E100FF, #7F00FF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">

<div class="container pt-5" >

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

                    <div class="card-header bg-white">
                        <h2 class="fs-2">Posts</h2>
                        @unless(count($posts) == 0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">post id</th>
                                <th scope="col">title</th>
                                <th scope="col">date</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>

                            @foreach($posts as $post)
                                <tr>
                                    <td scope="row" class="text-muted   ">{{ $post->id }}</td>
                                    <td colspan="1" class="text-muted">{{ $post->title }}</td>
                                    <td colspan="1" class="text-muted">{{ $post->created_at }}</td>
                                    <td>
                                        <a href="/posts/edit/{{$post->id}}" class="link-danger">edit</a>
                                    </td>
                                    <td>
                                        <a href="/posts/delete/{{ $post->id }}" class="link-danger">delete</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        @else
                            <h1 class="p-2 m-auto fw-bold fs-2 text-center">no post found</h1>
                        @endunless
                        <div class="">
                            {{$posts->links()}}
                        </div>

                        <div class="d-flex ">

                        </div>
                    </div>
                    <div class="card-header bg-white">
                        <h2 class="fs-3 pb-2">Edit profile</h2>
                        <form action="/r/edit" method="POST">
                            @csrf
                            @method('put')


                            <div class="form-outline mb-4">
                                <label class="form-label" for="name">name</label>
                                <input value="{{ auth()->user()->name }}" name="name" type="name" id="name" class="form-control form-control-lg" />

                                @error('name')
                                <p class="text-xs mt-1" style="color: red">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>



                            <div class="form-outline mb-4">
                                <label class="form-label" for="forPassword">Old password *</label>
                                <input name="oldPassword" type="password" id="forPassword" class="form-control form-control-lg" />

                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="forConPass">New password</label>
                                <input  name="password" type="password" id="forConPass" class="form-control form-control-lg" />

                                @error('password')
                                <p class="text-xs mt-1" style="color: red">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>



                            <div class="pt-1 mb-4">
                                <button class="btn btn-outline-danger" type="submit">update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </section>
@endsection
