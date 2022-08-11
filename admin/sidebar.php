<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light"><?php echo $_SESSION['username']; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-header">Library</li>
                <?php
                    if($profile['type']==1){
                        ?>
                        <li class="nav-item">
                            <a href="browse" class="nav-link" id="sideBrowse">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Browse
                                </p>
                            </a>
                        </li>
                        <?php
                    }
                ?>
                <li class="nav-item">
                    <a href="dashboard" class="nav-link" id="sideDashboard">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            <?php
                                if($profile['type']==1){
                                    ?>
                                    My Purchases
                                    <span class="badge badge-info right"><?php echo getActivePurchaseCount($profile['userid']); ?></span>
                                    <?php
                                }else{
                                    ?>
                                    My Content
                                    <span class="badge badge-info right"><?php echo getActivePublishedCount($profile['userid']); ?></span>
                                    <?php
                                }
                            ?>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>