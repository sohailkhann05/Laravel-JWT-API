<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
    
        <div id="sidebar-menu">
            <ul>

                <li class="text-muted menu-title">Navigation</li>

                <li>
                    <a href="{{ route('home') }}" class="waves-effect">
                        <i class="ti-home"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="ti-shield"></i>
                        <span>Books</span> 
                        <span class="menu-arrow"></span> 
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('books.index') }}">
                                All Books
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('books.create') }}">
                                Add New Book                            
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="waves-effect text-danger">
                        <i class="ti-power-off"></i> <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
