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

                    <div class="card-header bg-white">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">post id</th>
                                <th scope="col">title</th>
                                <th scope="col">date</th>
                                <th scope="col">Edit</th>
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
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="">
                            {{$posts->links()}}
                        </div>

                        <div class="d-flex ">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
