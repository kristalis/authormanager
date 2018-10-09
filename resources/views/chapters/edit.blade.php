@extends('dashboard.main')

@section('content')

 
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
           
            <div class="card bg-danger-gradient">
                      <div class="card-body">
                        <div style=" width: 100%;">
                    {!! Form::model($mychapter, ['method' => 'PATCH', 'action' => ['ChapterController@update',$mychapter->id]]) !!}
                      @include('chapters.form', ['submitButtonText' => 'UPDATE CHAPTER', 'bookId' => $mychapter->bookchapter->id])
                    {!! Form::close() !!}
                </div>
                      </div>
              <!-- /.card-body-->
                    </div>
           
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
             <div class="card bg-gray">
                      <div class="card-body">
              @include('partials.errors')
          @include('partials.success')
          <h2><a href="{{@url('mybooks').'/'.$mychapter->bookchapter->id .'/edit'}}"> {{$mychapter->bookchapter->title}} </a>
                            </h2>
      
        <!--main-section-start-->
        <div class="container">
            
            <table width="100%">
                <tr>
                    <td>Chapter</td>
                    <td>Title</td>
                    <td>Author</td>
                    <td></td>
                  
                </tr>
           @foreach($chapter as $chapters)
               <tr>
                    <td>{{ $chapters->chapterNr }}</td>
                    <td>{{ $chapters->title }} </td>
                    <td>{{ $chapters->chapterauthor->name }}</td>
                    <td><a href="{{ route('chapters.edit',$chapters->id) }}"><i class="fa fa-edit btn-small btn-warning"></i></a></td>
                    
                </tr>
              @endforeach   
          
                
            </table>
             </div>
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