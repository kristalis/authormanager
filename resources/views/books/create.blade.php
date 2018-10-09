@extends('dashboard.main')

@section('content')

 
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7">
              
 <!-- Custom tabs -->
            <div class="card">
              
              <div class="card-body">
               
                  <div class="tab-content p-0">
                           
                      <div class="card bg-danger-gradient">
                        <div class="card-body">
                          <div style=" width: 100%;">
                    {!! Form::open(['action' => 'BookController@store']) !!}
      @include('books.form', ['submitButtonText' => 'ADD NEW BOOK'])
    {!! Form::close() !!}</div>
                        </div>
                        <!-- /.card-body-->
                      </div>
                     
                  
                    
                  </div>
                  <!-- /.card-body -->
                </div>
            <!-- /.card -->
           
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          @include ('dashboard.sidebarwidget')
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection