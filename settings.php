<?php

    /*!
	 * VIDEO REWARDS v2.0
	 *
	 * http://www.droidoxy.com
	 * support@droidoxy.com
	 *
	 * Copyright 2018 DroidOXY ( http://www.droidoxy.com )
	 */

	$pagename = 'configuration';
	$container = 'settings';
	
	include_once("core/init.inc.php");

    if (!admin::isSession()) {

        header("Location: index.php");
    }
	
	$configs = new functions($dbo);
	$configs->updateConfigs(time(),'LAST_ADMIN_ACCESS');
    $url  = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
    $url .= $_SERVER['SERVER_NAME'].= $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta content="ie=edge" http-equiv="x-ua-compatible" />
	<?php include_once 'inc/title.php'; ?>

    <!--Preloader-CSS-->
    <link rel="stylesheet" href="./assets/plugins/preloader/preloader.css" />

    <!--bootstrap-4-->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />

    <!--Custom Scroll-->
    <link rel="stylesheet" href="./assets/plugins/customScroll/jquery.mCustomScrollbar.min.css" />
    <!--Font Icons-->
    <link rel="stylesheet" href="./assets/icons/simple-line/css/simple-line-icons.css" />
    <link rel="stylesheet" href="./assets/icons/dripicons/dripicons.css" />
    <link rel="stylesheet" href="./assets/icons/ionicons/css/ionicons.min.css" />
    <link rel="stylesheet" href="./assets/icons/eightyshades/eightyshades.css" />
    <link rel="stylesheet" href="./assets/icons/fontawesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="./assets/icons/foundation/foundation-icons.css" />
    <link rel="stylesheet" href="./assets/icons/metrize/metrize.css" />
    <link rel="stylesheet" href="./assets/icons/typicons/typicons.min.css" />
    <link rel="stylesheet" href="./assets/icons/weathericons/css/weather-icons.min.css" />

    <!--Date-range-->
    <link rel="stylesheet" href="./assets/plugins/date-range/daterangepicker.css" />
    <!--Drop-Zone-->
    <link rel="stylesheet" href="./assets/plugins/dropzone/dropzone.css" />
    <!--Full Calendar-->
    <link rel="stylesheet" href="./assets/plugins/full-calendar/fullcalendar.min.css" />
    <!--Normalize Css-->
    <link rel="stylesheet" href="./assets/css/normalize.css" />
    <!--Main Css-->
    <link rel="stylesheet" href="./assets/css/main.css" />
    <!--Custom Css-->
    <link rel="stylesheet" href="./assets/css/custom.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<?php include_once 'inc/preloader.php'; ?>

<?php include_once 'inc/navigation.php'; ?>

<!--Page Container-->
<section class="page-container">
    <div class="page-content-wrapper">
        <!--Header Fixed-->
		<?php include_once 'inc/header-fixed.php'; ?>

        <!--Main Content-->
        <div class="content sm-gutter">
            <div class="container-fluid padding-25 sm-padding-10">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4>Configuration Settings</h4>
                        </div>
                    </div>
					<?php if(APP_DEMO) { include_once 'inc/demo-notice.php'; } ?>
					
					<!-- START MAIN CONTENT HERE -->
					
                    <div class="col-md-8">
                        <div class="block form-block mb-4">
                            <div class="block-heading">
                                <h5>App Details</h5>
                            </div>

                            <form action="process/settings.php" method="post" class="horizontal-form" />
								
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">App Name</label>
                                        <div class="col-md-9">
                                            <input name="appname" class="form-control" placeholder="App Name" value="<?php echo $configs->getConfig('APP_NAME'); ?>" type="text" autocomplete="off" required="" />
                                        </div>
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">App TagLine</label>
                                        <div class="col-md-9">
                                            <input name="tagline" class="form-control" placeholder="App TagLine" value="<?php echo $configs->getConfig('APP_DESC'); ?>" type="text" autocomplete="off" required=""/>
                                        </div>
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">App Package Name</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="package" placeholder="Package Name" value="<?php echo $configs->getConfig('PACKAGE_NAME'); ?>" type="text" autocomplete="off" required=""/>
                                        </div>
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">Support Email</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="support_email" placeholder="Email Address" value="<?php echo $configs->getConfig('SUPPORT_EMAIL'); ?>" type="text" autocomplete="off" required=""/>
                                        </div>
                                    </div>
                                </div>
							
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">WebPanel URL</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="webpanel_url" placeholder="WebPanel URL" value="<?php echo dirname($url)."/"; ?>" type="text" autocomplete="off" required="" style="background: #e9ecef; " hidden/>
                                            <input class="form-control" name="webpanel_url" placeholder="WebPanel URL" value="<?php echo dirname($url)."/"; ?>" type="text" autocomplete="off" required="" style="background: #e9ecef; " disabled/>
                                        </div>
                                    </div>
                                </div>
							
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">APP POLICY URL</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="policy_url" placeholder="Policy URL" value="<?php echo $configs->getConfig('APP_POLICY_URL'); ?>" type="text" autocomplete="off" required=""/>
                                        </div>
                                    </div>
                                </div>
							
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">APP CONTACT URL</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="contact_url" placeholder="ContactUs URL" value="<?php echo $configs->getConfig('APP_CONTACT_US_URL'); ?>" type="text" autocomplete="off" required=""/>
                                        </div>
                                    </div>
                                </div>
								
                                <h5 class="block-bw-heading">Company Details</h5>
								
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">Company Name</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="company_name" placeholder="Company Name" value="<?php echo $configs->getConfig('COMPANY_NAME'); ?>" type="text" autocomplete="off" required=""/>
                                        </div>
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">Company Website</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="company_site" placeholder="Company Website URL" value="<?php echo $configs->getConfig('COMPANY_SITE'); ?>" type="text" autocomplete="off" required=""/>
                                        </div>
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">Phone No.</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="company_phone" placeholder="Phone No." value="<?php echo $configs->getConfig('SUPPORT_PHONE'); ?>" type="text" autocomplete="off" required=""/>
                                        </div>
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">Company Email</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="company_email" placeholder="Email Address" value="<?php echo $configs->getConfig('COMPANY_EMAIL'); ?>" type="text" autocomplete="off" required=""/>
                                        </div>
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">Country</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="country" placeholder="Country" value="<?php echo $configs->getConfig('COMPANY_COUNTRY'); ?>" type="text" autocomplete="off" required=""/>
                                        </div>
                                    </div>
                                </div>
								
                                <h5 class="block-bw-heading"><span data-original-title="All Calculations are Approximate only, original Income may vary" data-placement="top" data-toggle="tooltip">Profit Configuration</span></h5>
								
                                <div class="form-group">
									<div class="form-row">
                                        <label class="col-md-3" data-original-title="Show Income Overview on Dashboard" data-placement="top" data-toggle="tooltip">Income Overview</label>
                                        <div class="col-md-2">
                                            <div class="custom-controls">
                                                <label class="custom-control custom-radio success">
                                                    <input name="income_activate" id="activation" value="1" class="custom-control-input" type="radio" <?php if($configs->getConfig('INCOME_OVERVIEW') == '1') { echo "checked='checked'"; } ?>>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Enable
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="custom-controls">
                                                <label class="custom-control custom-radio danger">
                                                    <input name="income_activate" id="deactivation" value="0" class="custom-control-input" type="radio" <?php if($configs->getConfig('INCOME_OVERVIEW') == '0') { echo "checked='checked'"; } ?>>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Disable
                                                </label>
                                            </div>
                                        </div>
                                    </div>
								</div>
								
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">Admin Ratio</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon text-dark" data-original-title="$1 USD = <?php echo $configs->getConfig('ADMIN_RATIO'); ?> Points for Admin" data-placement="top" data-toggle="tooltip">$1 USD = </span>
                                                <input class="form-control" type="text" name="admin_ratio" value="<?php echo $configs->getConfig('ADMIN_RATIO'); ?>" placeholder="1000 Points" autocomplete="off" required=""/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">User Ratio</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon text-dark" name="user_ratio" data-original-title="$1 USD = <?php echo $configs->getConfig('USER_RATIO'); ?> Points for Users" data-placement="top" data-toggle="tooltip">$1 USD = </span>
                                                <input class="form-control" type="text" value="<?php echo $configs->getConfig('USER_RATIO'); ?>" placeholder="1000 Points" autocomplete="off" required="" style="background: #e9ecef; "disabled/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
                                <h5 class="block-bw-heading">APP UI/UX Configuration</span></h5>
                                
                                <div class="form-group">
									<div class="form-row">
                                        <label class="col-md-3">Navigation Bar</label>
                                        <div class="col-md-2">
                                            <div class="custom-controls">
                                                <label class="custom-control custom-radio success">
                                                    <input name="navbar_enable" id="activation" value="1" class="custom-control-input" type="radio" <?php if($configs->getConfig('APP_NAVBAR_ENABLE') == '1') { echo "checked='checked'"; } ?>>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Enable
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="custom-controls">
                                                <label class="custom-control custom-radio danger">
                                                    <input name="navbar_enable" id="deactivation" value="0" class="custom-control-input" type="radio" <?php if($configs->getConfig('APP_NAVBAR_ENABLE') == '0') { echo "checked='checked'"; } ?>>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Disable
                                                </label>
                                            </div>
                                        </div>
                                    </div>
								</div>
                                
                                <div class="form-group">
									<div class="form-row">
                                        <label class="col-md-3">APP Tabs UI</label>
                                        <div class="col-md-2">
                                            <div class="custom-controls">
                                                <label class="custom-control custom-radio success">
                                                    <input name="tabs_enable" id="activation" value="1" class="custom-control-input" type="radio" <?php if($configs->getConfig('APP_TABS_ENABLE') == '1') { echo "checked='checked'"; } ?>>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Enable
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="custom-controls">
                                                <label class="custom-control custom-radio danger">
                                                    <input name="tabs_enable" id="deactivation" value="0" class="custom-control-input" type="radio" <?php if($configs->getConfig('APP_TABS_ENABLE') == '0') { echo "checked='checked'"; } ?>>
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Disable
                                                </label>
                                            </div>
                                        </div>
                                    </div>
								</div>
								
								
                                <h5 class="block-bw-heading">Transactions Id's Configuration</span></h5>
								
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">Transactions Prefix</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon text-dark"><i class="ion-ios-list-outline"></i></span>
                                                <input class="form-control" type="text" name="tn_prefix" value="<?php echo $configs->getConfig('TRANSACTION_PREFIX'); ?>" placeholder="PCKT" autocomplete="off" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">Credit Prefix</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon text-dark"><i class="ion-ios-plus-outline"></i></span>
                                                <input class="form-control" type="text" name="credit_prefix" value="<?php echo $configs->getConfig('TRANSACTION_CREDIT_PREFIX'); ?>" placeholder="CR010" autocomplete="off" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">Debit Prefix</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon text-dark"><i class="ion-ios-minus-outline"></i></span>
                                                <input class="form-control" type="text" name="debit_prefix" value="<?php echo $configs->getConfig('TRANSACTION_DEBIT_PREFIX'); ?>" placeholder="DB010" autocomplete="off" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
                                <h5 class="block-bw-heading">Push Notification Configuration</span></h5>
								
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">Firebase API Key</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon text-dark"><i class="ion-ios-bell-outline"></i></span>
                                                <input class="form-control" type="text" name="firebase_key" value="<?php echo $configs->getConfig('FIREBASE_API_KEY'); ?>" placeholder="AIzaSyAv23NYMxosFEZdEF7kkWxs2Dv_FwdOGqo" autocomplete="off" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
                                <hr />

                                <button class="btn btn-primary mr-3 pull-right" type="submit">Save Settings</button>
								<br><br>
                            </form>
                        </div>
                    </div>
					
					
					<div class="col-md-4">
                        <div class="block mb-4" style="box-shadow: 0 2px 10px var(--primary-alpha-Dot25); transition: all 0.3s;">
							<div class="panel">
								<div class="panel-body" style="line-height: 2;">
									<div class="block-heading">
									<h5>Stats</h5>
									</div>
									<?php 
									echo "WebPanel Version: <b>".$configs->getConfig('VERSION')."</b><br>";
									$result = $dbo->query('select version()')->fetchColumn();
									echo "MySQL Version : <b>".$result."</b><br>";
									echo "PHP Version : <b>".phpversion()."</b><br>";
									?>
									Changelog : <a href="redirect/?url=www.codyhub.com/item/video-rewards-android-app/#change-log" target="_blank">Changelog</a>
								</div>
							</div>
						</div>
					</div>
	
					
					<!-- END MAIN CONTENT HERE -->
					<?php include_once 'inc/support.php'; ?>
					
                </div>
            </div>
        </div>
    </div>
	
	<?php include_once 'inc/footer-fixed.php'; ?>

</section>

<!--Jquery-->
<script type="text/javascript" src="./assets/js/jquery-3.2.1.min.js"></script>
<!--Bootstrap Js-->
<script type="text/javascript" src="./assets/js/popper.min.js"></script>
<script type="text/javascript" src="./assets/js/bootstrap.min.js"></script>
<!--Modernizr Js-->
<script type="text/javascript" src="./assets/js/modernizr.custom.js"></script>

<!--Morphin Search JS-->
<script type="text/javascript" src="./assets/plugins/morphin-search/classie.js"></script>
<script type="text/javascript" src="./assets/plugins/morphin-search/morphin-search.js"></script>
<!--Morphin Search JS-->
<script type="text/javascript" src="./assets/plugins/preloader/pathLoader.js"></script>
<script type="text/javascript" src="./assets/plugins/preloader/preloader-main.js"></script>

<!--Chart js-->
<script type="text/javascript" src="./assets/plugins/charts/Chart.min.js"></script>

<!--Sparkline Chart Js-->
<script type="text/javascript" src="./assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="./assets/plugins/sparkline/jquery.charts-sparkline.js"></script>

<!--Custom Scroll-->
<script type="text/javascript" src="./assets/plugins/customScroll/jquery.mCustomScrollbar.min.js"></script>
<!--Sortable Js-->
<script type="text/javascript" src="./assets/plugins/sortable2/sortable.min.js"></script>
<!--DropZone Js-->
<script type="text/javascript" src="./assets/plugins/dropzone/dropzone.js"></script>
<!--Date Range JS-->
<script type="text/javascript" src="./assets/plugins/date-range/moment.min.js"></script>
<script type="text/javascript" src="./assets/plugins/date-range/daterangepicker.js"></script>
<!--CK Editor JS-->
<script type="text/javascript" src="./assets/plugins/ckEditor/ckeditor.js"></script>
<!--Data-Table JS-->
<script type="text/javascript" src="./assets/plugins/data-tables/datatables.min.js"></script>
<!--Editable JS-->
<script type="text/javascript" src="./assets/plugins/editable/editable.js"></script>
<!--Full Calendar JS-->
<script type="text/javascript" src="./assets/plugins/full-calendar/fullcalendar.min.js"></script>

<!--- Main JS -->
<script src="./assets/js/main.js"></script>

</body>
</html>