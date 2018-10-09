@extends('dashboard.main')

@section('content')

 
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
           
            <div class="card bg-danger-gradient">
                       <div class="card-header">Update {{ strtoupper($bffbooks->title) }}</div>
                      <div class="card-body">
                        <div style=" width: 100%;">
                    {!! Form::model($bffbooks, ['method' => 'PATCH', 'action' => ['BookController@update',$bffbooks->id]]) !!}
                      @include('books.form', ['submitButtonText' => 'UPDATE BOOK'])
                    {!! Form::close() !!}
                        </div>
                      </div>
              <!-- /.card-body-->
                    </div>
           
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5">
             <div class="card bg-gray">
                      <div class="card-body">
              @include('partials.errors')
              @include('partials.success')
            <table class="table table-striped">
                  <tr>
                    
                    <th>Title </th>
                    <th>Book Brief</th>
                    <th style="width: 40px"></th>
                  </tr>
                  @foreach($book as $books)
                  <tr>
                    <td>{{ $books->title }}</td>
                    <td>{{ $books->brief }}</td>
                    <td><a href="{{@url('mybooks').'/'.$books->id .'/edit'}}"><i class="fa fa-edit btn-small btn-warning"></i></a></td>
                  </tr>
                  @endforeach  
                </table>
     
        
           </div>
                </div>
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection