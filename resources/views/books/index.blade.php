@extends('dashboard.main')

@section('content')

 
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
           
 <!-- Custom tabs -->
            <div class="card">
           
              <div class="card-body">
               
                  <div class="tab-content p-0">
                    
                    <div class="tab-pane active bg-info-gradient" id="my-books"
                       style="position: relative;"> 
                       @include('partials.errors')
              @include('partials.success')
                      <div class="card-columns">      
                        @foreach($book as $books) 
                        <div class="card bg-light mb-2">
                           
                          <img class="card-img-top" src="{{ asset('images') .'/'. $books->coverimage }}" >
                          <div class="card-header">
                              
                            <a href="{{ route('mybooks.edit',$books->id) }}"> {{$books->title}} </a>
                                 
                          </div>
                          <div class="card-body">
                            <p class="card-text">{{$books->brief}}</p>
                          </div>
                          <div class="card-footer">
                            <small class="text-muted"><a href="{{@url('coauthors').'/'.$books->slug}}"><i class="fa fa-user btn btn-danger"></i></a></small>
                            <small class="text-muted"><a href="{{@url('chapters').'/'.$books->slug}}"><i class="fa fa-edit btn btn-primary"></i></a></small>
                          </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  
                  </div>
                  <!-- /.card-body -->
                </div>
            <!-- /.card -->
           
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->

          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection