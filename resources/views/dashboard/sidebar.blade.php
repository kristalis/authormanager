
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('dist/img/gabspadlogo.png') }}" alt="Gabs BFF Pad" class="elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="/mybooks" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Home
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('mybooks.index')}}" class="nav-link">
                  <i class="nav-icon fa fa-book"></i>
                  <p>My Books</p>
                </a>
              </li>
              <li class="nav-item">
                 <a href="{{ route('mybooks.create') }}" class="nav-link text-danger" >
                  <i class="nav-icon fa fa-plus"></i>
                  <p>Create a New Book</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('mybooks.bbfbooks')}}" class="nav-link">
                  <i class="nav-icon fa fa-book text-warning"></i>
                  <p>My BFF Books</p>
                </a>
              </li>
              <li class="nav-item">
                 <a class="nav-link" href="#" data-toggle="tab">
                  <i class="nav-icon fa fa-file"></i>
                  <p>My Todo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle-o  text-info nav-icon"></i>
                  <p>My Research</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle-o text-warning nav-icon"></i>
                  <p>My Vocabs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle-o  text-danger nav-icon"></i>
                  <p>BFF Bookstore</p>
                </a>
              </li>
           
            </ul>
          </li>
         
          <li class="nav-item">
            <a href="./index3.html" class="nav-link">
              <i class="nav-icon fa fa-comment"></i>
              <p>Contact</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="./index3.html" class="nav-link">
              <i class="nav-icon fa fa-cog text-info"></i>              
              <p>How IT Works</p>
            </a>
          </li>
             
          <li class="nav-item">
            
              <a href="{{ route('logout') }}" class="nav-link"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                      <i class="fa fa-circle-o nav-icon"></i> Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
            </a>
          </li>
          
          
         
          
         
           
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

