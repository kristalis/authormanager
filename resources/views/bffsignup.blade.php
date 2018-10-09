@extends('layouts.app')
@section('content')
  <!-- start section header -->
  <div id="header" class="home">

    <div class="container">
      <div class="header-content">
        <h1>I'm <span class="typed"></span></h1>
        <p class="text-danger"><strong>This is BFF WRITE Pad</strong></p>
        <p><a href="#about" class=" btn-theme btn-medium">START WRITING</a></p>
 

      </div>

    </div>
  </div>
  <!-- End section header -->


  <!-- start section about us -->
  <div id="about" class="paddsection">
    <div class="container">
      <div class="row justify-content-between">

        <div class="col-lg-6 ">
            
          <div class="div-img-bg">
             
          <div class="embed-responsive">
           <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('schoolname') ? ' has-error' : '' }} row">
                            <label for="schoolname" class="col-md-4 col-form-label text-md-right">School</label>

                            <div class="col-md-6">
                                <input id="schoolname" type="text" class="form-control" name="schoolname" value="{{ old('schoolname') }}" required autofocus>

                                @if ($errors->has('schoolname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('schoolname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                   

                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-1">
                                <button type="submit" class="btn-block btn-theme btn-medium">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn-block btn-primary btn-medium" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
            </div>
          </div>
         
        </div>

        <div class="col-lg-5">
          <div class="about-descr">

            <p class="p-heading">Welcome to GABSPAD </p>
            <p class="separator">The place where BFF get together to write and publish a book from anywhere in the world from the comfort of their homes and bed.</p>
            <p class="separator">It all started because my dad saw my interest in reading and writing. So he started pushing me and my sisters to turn our stories into books</p>
            <p class="separator">As I showed interest, he decided to work on the GABSPAD project where every school kid like me can join in for FREE and with their BFFs get together in the cloud to transform their stories into a book.</p>


          </div>
   
           <p> <a href="{{ route('register') }}" class="btn-block btn-primary btn-medium">Register</a></p>

        </div>
       
      </div>
     

    </div>
  </div>
  <!-- end section about us --> 

  <!-- start section journal -->
  <div id="journal" class="text-left paddsection">

    <div class="container">
      <div class="section-title text-center">
        <h2>Published Books</h2>
      </div>
    </div>

    <div class="container">
      <div class="journal-block">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="journal-info">

              <a href="blog-single.html"><img src="images/blog-post-1.jpg" class="img-responsive" alt="img"></a>

              <div class="journal-txt">

                <h4><a href="blog-single.html">The Lost Vase</a></h4>
                <small class="text-muted">by BFF </small>

                <p class="separator">To an English person, it will seem like simplified English
                </p>

              </div>

            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="journal-info">

              <a href="blog-single.html"><img src="images/blog-post-2.jpg" class="img-responsive" alt="img"></a>

              <div class="journal-txt">

                <h4><a href="#blog-single.html">The Broken Vase</a></h4>
                <small class="text-muted">by BFF </small>

                <p class="separator">To an English person, it will seem like simplified English
                </p>

              </div>

            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="journal-info">

              <a href="blog-single.html"><img src="images/blog-post-3.jpg" class="img-responsive" alt="img"></a>

              <div class="journal-txt">

                <h4><a href="blog-single.html">The 9 Best Kids in the World</a></h4>
                <small class="text-muted">by BFF </small>
                <p class="separator">To an English person, it will seem like simplified English
                </p>

              </div>

            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
  <!-- End section journal -->
@endsection