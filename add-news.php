<?php

    /*!
	 * VIDEO REWARDS v2.0
	 *
	 * http://www.droidoxy.com
	 * support@droidoxy.com
	 *
	 * Copyright 2018 DroidOXY ( http://www.droidoxy.com )
	 */

	$pagename = 'addNews';
	$container = 'news';
	
	include_once("core/init.inc.php");

    if (!admin::isSession()) {

        header("Location: index.php");
    }
    
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
                            <h4>Add New News</h4>
                        </div>
                    </div>
					<?php if(APP_DEMO) { include_once 'inc/demo-notice.php'; } ?>
					
					<!-- START MAIN CONTENT HERE -->
					
                    <div class="col-12 col-sm-6 col-md-6 col-lg-8 mb-4 mb-lg-0">
                        
                        <div class="block form-block mb-4">
                            <div class="block-heading">
                                <h5>New News Details</h5>
                            </div>

                            <form action="process/add-news.php" method="post" enctype="multipart/form-data" class="horizontal-form" id="main_form">
							
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">News Title</label>
                                        <div class="col-md-9">
                                            <input class="form-control" onchange="changeName(this);" name="news_title" id="news_title" placeholder="Title Here" value="" type="text" autocomplete="off" required=""/>
                                        </div>
                                    </div>
                                </div>
							
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">News Content</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="news_content" onchange="changeName(this);" placeholder="Watch News to Get 5 Points" id="news_content" cols="40" rows="5" required=""></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">Reward Points</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="news_points" onchange="changeName(this);"  name="news_points" placeholder="5" min="0" value="" type="number" autocomplete="off" required=""/>
                                        </div>
                                    </div>
                                </div>
							
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">Premium Reward Points</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="news_points_premium"  onchange="changeName(this);"  name="news_points_premium" placeholder="10" min="0" value="" type="number" autocomplete="off" required=""/>
                                        </div>
                                    </div>
                                </div>
							
							    <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">News Image</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="news_image" name="news_image" onchange="changeName(this);" value="" type="file" autocomplete="off" required="" accept="image/*"/>
                                        </div>
                                    </div>
                                </div>

                                <div class='progress' id="upload_progress_div">
                                    <div class='bar' id='upload_bar'></div>
                                    <div class='percent' id='upload_percent'>0%</div>
                                </div>

                                <hr />
                                <button type="submit"  class="btn btn-primary mr-0 pull-right">Add News</button>
                                <br><br>

                            </form>

                        </div>
                    </div>
                        
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="block task-block">
							<div class="section-title">
								<h5>New News Preview</h5>
							</div>

							<ul id="inprogress">
							    
								<!-- New News -->
								<li>
									<div class="task align-items-center" style="cursor: auto;">
										<div class="members single">
											<div class="member rounded-circle float-left" style=" border-radius: 0%; width: 60px; height: 60px;">
												<img id="newImage" class="img-fluid" src="assets/images/person-placeholder.png" />
											</div>
										</div>
										<div class="task-desc">
											<p id="newtitle" class="task-title text-truncate"> ------- </p>
											<span class="end-time text-truncate"><p id="newcontent"> ---- ---- </p></span>
										</div>
										<div class="members single">
											<div class="float-right"  style="padding: 1px">
											    <span id="newAmount" class="badge badge-pill bg-primary"></span>
                                            </div>
                                            <div class="float-right" style="padding: 1px">
                                                <span id="newAmountPremium" class="badge badge-pill bg-gold"></span>
                                            </div>
										</div>
									</div>
								</li>
							    
							</ul>

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
<!-- <script type="text/javascript" src="./assets/plugins/morphin-search/morphin-search.js"></script> -->
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
<!-- File Ajax Upload JS -->
<script type="text/javascript" src="./assets/js/jquery.form.min.js"></script>

<!--- Main JS -->
<script src="./assets/js/main.js"></script>
<script type="text/javascript">

function changeName(input) {
    
    const title = document.getElementById('news_title');
    const content = document.getElementById('news_content');
    const amount = document.getElementById('news_points');
    const amount_premium = document.getElementById('news_points_premium');
    const news_image = document.getElementById('news_image');
    
    const newtitle = document.getElementById('newtitle');
    const newcontent = document.getElementById('newcontent');
    const newAmount = document.getElementById('newAmount');
    const newAmountPremium = document.getElementById('newAmountPremium');
    const newImage = document.getElementById('newImage');
    
    if (title.value) {
        newtitle.textContent = title.value.substring(0, 20);
    } else {
        newtitle.textContent = '-------'
    }
    
    if (content.value) {
        newcontent.textContent = content.value.substring(0, 20);
    } else {
        newsub.textContent = '---- ----';
    }
    newAmount.textContent = amount.value;
    newAmountPremium.textContent = amount_premium.value;
    
    if (news_image.value && input === news_image ) {
        const file = input.files[0];
        newImage.src = createObjectURL(file);
        newImage.onload = function() {
            window.URL.revokeObjectURL(this.src);
        }
    }
}

function createObjectURL(object) {
    return (window.URL) ? window.URL.createObjectURL(object) : window.webkitURL.createObjectURL(object);
}

function revokeObjectURL(url) {
    return (window.URL) ? window.URL.revokeObjectURL(url) : window.webkitURL.revokeObjectURL(url);
}

$(function() {
    
    const uploadBar = $('#upload_bar');
    const uploadPercent = $('#upload_percent');
    


    //upload news file
    $('#main_form').ajaxForm({
        beforeSubmit: function() {
            document.getElementById("upload_progress_div").style.display="block";
            const percentVal = '0%';
            uploadBar.width(percentVal)
            uploadPercent.html(percentVal);
        },

        uploadProgress: function(event, position, total, percentComplete) {
            const percentVal = percentComplete + '%';
            uploadBar.width(percentVal)
            uploadPercent.html(percentVal);
        },

        success: function() {
            const percentVal = '100%';
            uploadBar.width(percentVal)
            uploadPercent.html(percentVal);
        },

        complete: function(res) {
            if (res.responseText == 'ok') {
                document.location.href = 'news.php';
            } else {
                alert ('Adding new news failed');
            }
        }
    }); 
});

</script>

</body>
</html>