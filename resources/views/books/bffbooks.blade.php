@extends('dashboard.main')

@section('content')

 
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
           
            <!-- Custom tabs -->
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
               
                      <div class="card-columns"> 
                        
                        @foreach($coauthor as $coauthors) 
                        <div class="card bg-light mb-2">
                          <img class="card-img-top" src="{{ asset('images') .'/'. $coauthors->coauthorbook->coverimage }}">
                          <div class="card-header">{{$coauthors->coauthorbook->title}}<br>
                          <small class="text-muted">by {{$coauthors->coauthorbook->author->name}}</small></div>

                          <div class="card-body">
                            <p class="card-text">{{$coauthors->coauthorbook->brief}}</p>
                          </div>
                          <div class="card-footer">
                            @if($coauthors->status == "1")
                            <small class="text-muted"><a href="{{@url('chapters').'/'.$coauthors->coauthorbook->slug}}"><i class="fa fa-plus btn btn-primary"></i></a></small>
                            @else
                              @include('coauthors.form') 
                            @endif
                          </div>
                        </div>
                        @endforeach
                      </div>
                
                  <!-- /.card-body -->
                </div>
            <!-- /.card -->
           
          </section>
          <!-- /.Left col -->
         
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection