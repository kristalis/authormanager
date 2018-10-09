@extends('layouts.app')
@section('content')
  <!-- start section header -->
  <div id="header" class="home">

    <div class="container">
      <div class="header-content">
        @include('partials.errors')
        @include('partials.success')
        <h1>I'm <span class="typed"></span></h1>
        <p class="text-danger"><strong>This is BFF WRITE Pad</strong></p>
        <p><a href="#about" class=" btn-theme btn-medium">START WRITING</a></p>
        <p> <a href="{{ route('register') }}" class="btn-primary btn-medium">Register</a></p>

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
          <form method="POST" action="{{ route('login') }}">
                        @csrf
                         <div class="form-group row">
                            <div class="col-md-10 offset-md-1">
          <div class="about-descr">
            <p class="p-heading">SIGN IN & START WRITING</p> 
          </div>
        </div>
                         </div>
                        <div class="form-group row">

                            <div class="col-md-10 offset-md-1">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-10 offset-md-1">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-10 offset-md-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-1">
                                <button type="submit" class="btn-block btn-theme btn-medium">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn-block btn-info btn-medium" href="{{ route('password.request') }}">
                                     Forgot Your Password? 
                                </a>
                            </div>
                        </div>
                    </form>
            </div>
          </div>
         
        </div>

        <div class="col-lg-6">
           <div class="div-img-bg">
            <div class="embed-responsive">
                
                            <div class="col-md-10 offset-md-1">
          <div class="about-descr">
            <p class="p-heading">WELCOME TO GABSPAD</p> 
          </div>
                                 
              Hello there, welcome to GabsPad
              My name is Gabby, co-founder of GabsPad
              What is GabsPad? GabsPad is a project started
              by my dad when he saw my interest in writing.
              It is a place where me and my BFFS can get together in
              the cloud and collaborate to transform our imaginations
              into books.
              It is so easy to use and I will show you how to
              start using GabsPad with your BFFs in 5 easy steps.
              <ol>
              <li> Register </li> 
              <li> Activate your account and login</li> 
              <li> create your new book</li> 
              <li> invite your BFF you want to help you write</li> 
              <li>start writing chapters</li> 
              </ol>
            Now Go create some books with your BFFs.
            This is just the Beta stage, watch out for more
            functionalities.

            </div>
          </div>          
</div>
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