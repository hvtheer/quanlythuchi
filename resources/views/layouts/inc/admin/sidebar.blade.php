<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                <span class="menu-title">Person</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/person/create') }}">Add person</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/person') }}">View person</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-plus-circle menu-icon"></i>
                <span class="menu-title">Household</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/household/create') }}">Add household</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/household') }}">View household</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-plus-circle menu-icon"></i>
                <span class="menu-title">Temporary</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/temporary/create') }}">Add temporary</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/temporary') }}">View temporary</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                <span class="menu-title">Fee</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/fee/create') }}">Add fee</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/fee') }}">View fee</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                <span class="menu-title">Receipt</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/receipt/create') }}">Add receipt</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/receipt') }}">View receipt</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
