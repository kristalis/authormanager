@extends('dashboard.main')

@section('content')

 
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 ">
           
            <div class="card bg-danger-gradient">
                       <div class="card-header">{{ strtoupper($bk->title) }}</div>
                      <div class="card-body">
                        <p class="card-text">{{ $bk->brief }}</p>
                        <div style=" width: 100%;">
                          <form method="POST" action="{{action('AuthorinviteController@update', $bffauthor->id)}}">
                        {{csrf_field()}}
                        {{ method_field('PUT') }}
                          @include('coauthors.form')
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
                    
                    <th>My BFF(s) </th>
                    <th>My Books BFF is coauthor</th>
                    <th style="width: 40px">Status</th>
                  </tr>
                  @foreach($bff as $bffs)
                  <tr>
                    <td>{{ $bffs->name }}</td>
                    <td>{{ $bffs->title }}</td>
                    
                    <td><span class="badge bg-success">yes</span></td>
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