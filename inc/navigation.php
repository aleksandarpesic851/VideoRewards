<?php

    /*!
	 * VIDEO REWARDS v2.0
	 *
	 * http://www.droidoxy.com
	 * support@droidoxy.com
	 *
	 * Copyright 2018 DroidOXY ( http://www.droidoxy.com )
	 */



$configsMain = new functions($dbo);

?>

<!--Navigation-->
<nav id="navigation" class="navigation-sidebar bg-primary">
    <div class="navigation-header">
        <a href="admin.php"><span class="logo"><?php echo strtoupper($configsMain->getConfig('APP_NAME')); ?></span></a>
        <!--<img src="logo.png" alt="logo" class="brand" height="50">-->
    </div>

    <!--Navigation Profile area-->
    <div class="navigation-profile">
        <img class="profile-img rounded-circle" src="images/<?php echo $configsMain->getConfig('ADMIN_IMAGE'); ?>" alt="profile image" />
        <h4 class="name"><?php echo $helper->getAdminFullName(admin::getAdminID()); ?></h4>
        <span class="designation">ADMIN</span>
    </div>

    <!--Navigation Menu Links-->
    <div class="navigation-menu">

        <ul class="menu-items custom-scroll">
            <li>
                <a href="admin.php" <?php if($pagename == 'dashboard') { echo 'class="active"'; } ?>>
                    <span class="icon-thumbnail"><i class="dripicons-browser"></i></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            
            <li>
                <a href="users.php" <?php if($pagename == 'users') { echo 'class="active"'; } ?>>
                    <span class="icon-thumbnail"><i class="dripicons-user-group"></i></span>
                    <span class="title">All Users</span>
                </a>
            </li>
			
            <li>
                <a href="javascript:void(0);" <?php if($container == 'records') { echo 'class="have-submenu active"'; }else{ echo 'class="have-submenu"'; } ?>>
                    <span class="icon-thumbnail"><i class="dripicons-list"></i></span>
                    <span class="title">Records</span>
                </a>
                <!--Submenu-->
                <ul class="sub-menu">
                    <li>
                        <a href="requests.php" <?php if($pagename == 'requests') { echo 'class="active"'; } ?>>
                            <span class="icon-thumbnail"  style="margin-right: 5px;"><i class="ion-ios-bolt-outline"></i></span>
                            <span class="title">Requests</span>
                        </a>
                    </li>
                    <li>
                        <a href="completed.php" <?php if($pagename == 'completed') { echo 'class="active"'; } ?>>
                            <span class="icon-thumbnail"  style="margin-right: 5px;"><i class="ion-ios-bolt-outline"></i></span>
                            <span class="title">Completed</span>
                        </a>
                    </li>
                </ul>
            </li>
			
            <li>
                <a href="javascript:void(0);" <?php if($container == 'settings') { echo 'class="have-submenu active"'; }else{ echo 'class="have-submenu"'; } ?>>
                    <span class="icon-thumbnail"><i class="dripicons-gear"></i></span>
                    <span class="title">Settings</span>
                </a>
                <!--Submenu-->
                <ul class="sub-menu">
					<li>
						<a href="profile.php" <?php if($pagename == 'admin-profile') { echo 'class="active"'; } ?>>
							<span class="icon-thumbnail" style="margin-right: 5px;"><i class="ion-ios-person-outline"></i></span>
							<span class="title">Admin Profile</span>
						</a>
					</li>
					<li>
						<a href="settings.php" <?php if($pagename == 'configuration') { echo 'class="active"'; } ?>>
							<span class="icon-thumbnail" style="margin-right: 5px;"><i class="ion-ios-locked-outline"></i></span>
							<span class="title">Configuration</span>
						</a>
					</li>
					<li>
						<a href="offerwalls.php" <?php if($pagename == 'offerwalls') { echo 'class="active"'; } ?>>
							<span class="icon-thumbnail" style="margin-right: 5px;"><i class="ion-ios-bolt-outline"></i></span>
							<span class="title">OfferWalls</span>
						</a>
					</li>
					<li>
						<a href="payouts.php" <?php if($pagename == 'payouts') { echo 'class="active"'; } ?>>
							<span class="icon-thumbnail" style="margin-right: 5px;"><i class="ion-ios-bolt-outline"></i></span>
							<span class="title">Redeem Options</span>
						</a>
					</li>
                </ul>
            </li>
			
            <li>
                <a href="javascript:void(0);" <?php if($container == 'videos') { echo 'class="have-submenu active"'; }else{ echo 'class="have-submenu"'; } ?>>
                    <span class="icon-thumbnail"><i class="dripicons-list"></i></span>
                    <span class="title">Videos</span>
                </a>
                <!--Submenu-->
                <ul class="sub-menu">
                    <li>
                        <a href="videos.php" <?php if($pagename == 'allvideos') { echo 'class="active"'; } ?>>
                            <span class="icon-thumbnail"  style="margin-right: 5px;"><i class="ion-ios-bolt-outline"></i></span>
                            <span class="title">All Videos</span>
                        </a>
                    </li>
                    <li>
                        <a href="add-video.php" <?php if($pagename == 'addVideo') { echo 'class="active"'; } ?>>
                            <span class="icon-thumbnail"  style="margin-right: 5px;"><i class="ion-ios-bolt-outline"></i></span>
                            <span class="title">Add New Video</span>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li>
                <a href="push.php" <?php if($pagename == 'push-single') { echo 'class="active"'; } ?>>
                    <span class="icon-thumbnail"><i class="dripicons-broadcast"></i></span>
                    <span class="title">Send Push</span>
                </a>
            </li>
            
            <li>
                <a href="tracker.php" <?php if($pagename == 'tracker') { echo 'class="active"'; } ?>>
                    <span class="icon-thumbnail"><i class="dripicons-graph-line"></i></span>
                    <span class="title">Tracker</span>
                </a>
            </li>
			
            <li>
                <a href="logout.php/?access_token=<?php echo admin::getAccessToken(); ?>">
                    <span class="icon-thumbnail"><i class="dripicons-exit"></i></span>
                    <span class="title">Logout</span>
                </a>
            </li>
			
        </ul>
    </div>
</nav>
<!--Navigation-->