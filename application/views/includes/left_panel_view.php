<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo2.png" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="<?php echo base_url(); ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>

                <h3 class="menu-title">Request</h3><!-- /.menu-title -->
                <li class="active">
                    <a href="<?php echo base_url(); ?>request/new"> <i class="menu-icon fa fa-pencil-square-o"></i>New Request </a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-wrench"></i>Requests</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-user"></i><a href="<?php echo base_url(); ?>request/list/unsubmitted">Drafted (Unsubmitted) Requests </a></li>
                        <li><i class="menu-icon fa fa-user"></i><a href="<?php echo base_url(); ?>request/list/my_requests">My Requests </a></li>
                        <li><i class="menu-icon fa fa-thumbs-o-up"></i><a href="<?php echo base_url(); ?>request/list/submitted">Submitted Requests </a></li>
                        <li><i class="menu-icon fa fa-sun-o"></i><a href="<?php echo base_url(); ?>request/list/pendding">Approved </a></li>
                        <li><i class="menu-icon fa fa-thumbs-o-down"></i><a href="<?php echo base_url(); ?>request/list/rejected">Rejected </a></li>
                    </ul>
                </li>
                
                <h3 class="menu-title">System Tools</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-wrench"></i>Administration</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-user"></i><a href="<?php echo base_url(); ?>user">User Management</a></li>
                        <li><i class="menu-icon fa fa-users"></i><a href="<?php echo base_url(); ?>role">Role Management</a></li>
                        <li><i class="menu-icon fa fa-sitemap"></i><a href="<?php echo base_url(); ?>label">Lang Label Management</a></li>
                    </ul>
                </li>

                <li class="active">
                    <a href="<?php echo base_url(); ?>login/logout"> <i class="menu-icon fa fa-sign-out"></i>Logout </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->