@extends('layouts.app')

@section('content')
    <section class="vh-90" style="
    background-color: #ffdd00; height: 95vh;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #E100FF, #7F00FF);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #E100FF, #7F00FF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10 w-50">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form action="/r/login" method="POST">
                                    @csrf

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0">Login</span>

                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Login your profile</h5>

                                    <div class="form-outline mb-4">
                                        <input value="{{old('email')}}" name="email" type="email" id="formEmail" class="form-control form-control-lg" />
                                        <label class="form-label" for="formEmail">Email address</label>

                                        @error('email')
                                        <p class="text-xs mt-1" style="color: red">
                                            {{$message}}
                                        </p>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input value="{{old('password')}}" name="password" type="password" id="forPassword" class="form-control form-control-lg" />
                                        <label class="form-label" for="forPassword">Password</label>

                                        @error('password')
                                        <p class="text-xs mt-1" style="color: red">
                                            {{$message}}
                                        </p>
                                        @enderror
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-outline-danger type="submit">login</button>

                                    </div>

                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="/register" style="color: red;">Register here</a></p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
