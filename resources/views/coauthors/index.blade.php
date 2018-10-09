@extends('dashboard.main')

@section('content')

 
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
           
            <div class="card bg-danger-gradient">
                       <div class="card-header">Invite BFF to help with {{ strtoupper($bk->title) }}</div>
                      <div class="card-body">
                        <div style=" width: 100%;">
                    <form method="POST" action="{{route('coauthors.store').'/'.$bk->id}}">
                        @csrf
                          @include('auth.coauthorregister')
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
                    @if($bffs->status == "1")
                    <td><span class="badge bg-success">accepted</span></td>
                    @else
                    <td><span class="badge bg-danger">not yet</span></td>
                    @endif
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