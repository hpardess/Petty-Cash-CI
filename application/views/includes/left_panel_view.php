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
                
                <h3 class="menu-title">System Tools</h3><!-- /.menu-title -->
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-wrench"></i>Administration</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-user"></i><a href="<?php echo base_url(); ?>user">User Management</a></li>
                        <li><i class="menu-icon fa fa-users"></i><a href="<?php echo base_url(); ?>role">Role Management</a></li>
                        <li><i class="menu-icon fa fa-users"></i><a href="<?php echo base_url(); ?>language">Language Management</a></li>
                        <li><i class="menu-icon fa fa-users"></i><a href="<?php echo base_url(); ?>label">Label Management</a></li>
                    </ul>
                </li>

                <li class="active">
                    <a href="<?php echo base_url(); ?>login/logout"> <i class="menu-icon fa fa-sign-out"></i>Logout </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->