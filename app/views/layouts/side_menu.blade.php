<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a class="{{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a class="{{ Request::is('sms') ? 'active' : '' }}" href="/sms"><i class="fa fa-mobile fa-fw"></i> SMS Recipients</span></a>
            </li>
            <li>
                <a class="{{ Request::is('email') ? 'active' : '' }}" href="/email"><i class="fa fa-envelope fa-fw"></i> Email Recipients</a>
            </li>
            <li>
                <a class="{{ Request::is('social-networks') ? 'active' : '' }}" href="/social-networks"><i class="fa fa-share-alt fa-fw"></i> Social Networks</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
