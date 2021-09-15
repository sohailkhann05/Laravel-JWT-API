<div class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="">
            <div class="pull-left">
                <button class="button-menu-mobile open-left waves-effect waves-light">
                    <i class="md md-menu"></i>
                </button>
                <span class="clearfix"></span>
            </div>

            <form role="search" class="navbar-left app-search pull-left hidden-xs" style="display: none;">
                <input type="text" placeholder="Search..." class="form-control">
                <a href=""><i class="fa fa-search"></i></a>
            </form>

            <ul class="nav navbar-nav navbar-right pull-right">
                <li class="hidden-xs">
                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light">
                        <i class="icon-size-fullscreen"></i>
                    </a>
                </li>
                <li class="dropdown top-menu-item-xs">
                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown"
                        aria-expanded="true">
                        <img src="{{ asset('uploads/default.png') }}" alt="user-img" class="img-circle">
                        <div class="ctext-wrap" style="display: inline; margin-left: 10px;">
                            <b>{{ Auth::user()->name }}</b>
                            <p style="margin-left: 35%; margin-top: -18px;">
                                {{ Auth::user()->job_title }}
                            </p>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ti-power-off m-r-10 text-danger"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
