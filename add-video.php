<?php

    /*!
	 * VIDEO REWARDS v2.0
	 *
	 * http://www.droidoxy.com
	 * support@droidoxy.com
	 *
	 * Copyright 2018 DroidOXY ( http://www.droidoxy.com )
	 */

	$pagename = 'addVideo';
	$container = 'videos';
	
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
                            <h4>Add New Video</h4>
                        </div>
                    </div>
					<?php if(APP_DEMO) { include_once 'inc/demo-notice.php'; } ?>
					
					<!-- START MAIN CONTENT HERE -->
					
                    <div class="col-12 col-sm-6 col-md-6 col-lg-8 mb-4 mb-lg-0">
                        
                        <div class="block form-block mb-4">
                            <div class="block-heading">
                                <h5>New Video Details</h5>
                            </div>

                            <form action="process/add-video.php" method="post" enctype="multipart/form-data" class="horizontal-form" id="main_form">
							
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">Video Title</label>
                                        <div class="col-md-9">
                                            <input class="form-control" onchange="changeName(this);" name="video_title" id="video_title" placeholder="Title Here" value="" type="text" autocomplete="off" required=""/>
                                        </div>
                                    </div>
                                </div>
							
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">Video Subtitle</label>
                                        <div class="col-md-9">
                                            <input class="form-control" onchange="changeName(this);" id="video_sub" name="video_sub" placeholder="Watch video to Get 5 Points" value="" type="text" autocomplete="off" required=""/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">Reward Points</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="video_amount" onchange="changeName(this);"  name="video_amount" placeholder="5" min="0" value="" type="number" autocomplete="off" required=""/>
                                        </div>
                                    </div>
                                </div>
							
                                <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">Video Duration</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="video_dur" name="video_dur" placeholder="10 Sec" value="" type="number" min="0" autocomplete="off" required=""/>
                                        </div>
                                    </div>
                                </div>

							    <div class="form-group">
                                    <div class="form-row">
                                        <label class="col-md-3">Video Thumb</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="video_thumb" name="video_file[]" onchange="changeName(this);" value="" type="file" autocomplete="off" required="" accept="image/*"/>
                                        </div>
                                    </div>
                                </div>

							    <div class="form-group">
                                        <div class="form-row">
                                            <label class="col-md-3">Video File</label>
                                            <div class="col-md-9">
                                                <input class="form-control" id="video_file"  name="video_file[]" value="" type="file" required="" accept="video/*"/>
                                            </div>
                                        </div>
                                </div>
                                <div class='progress' id="upload_progress_div">
                                    <div class='bar' id='upload_bar'></div>
                                    <div class='percent' id='upload_percent'>0%</div>
                                </div>

                                <hr />
                                <button type="submit"  class="btn btn-primary mr-0 pull-right">Add Video</button>
                                <br><br>

                            </form>

                        </div>
                    </div>
                        
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="block task-block">
							<div class="section-title">
								<h5>New Video Preview</h5>
							</div>

							<ul id="inprogress">
							    
								<!-- New Video -->
								<li>
									<div class="task align-items-center" style="cursor: auto;">
										<div class="members single">
											<div class="member rounded-circle float-left" style=" border-radius: 0%; width: 60px; height: 60px;">
												<img id="newImage" class="img-fluid" src="assets/images/person-placeholder.png" />
											</div>
										</div>
										<div class="task-desc">
											<p id="newtitle" class="task-title text-truncate"> ------- </p>
											<span class="end-time text-truncate"><p id="newsub"> ---- ---- </p></span>
										</div>
										<div class="members single">
											<div class="float-right">
											    <span id="newAmount" class="badge badge-pill bg-primary"></span>
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
    
    const title = document.getElementById('video_title');
    const sub = document.getElementById('video_sub');
    const amount = document.getElementById('video_amount');
    const video_thumb = document.getElementById('video_thumb');
    
    const newtitle = document.getElementById('newtitle');
    const newsub = document.getElementById('newsub');
    const newAmount = document.getElementById('newAmount');
    const newImage = document.getElementById('newImage');
    
    if (title.value) {
        newtitle.textContent = title.value;
    } else {
        newtitle.textContent = '-------'
    }
    
    if (sub.value) {
        newsub.textContent = sub.value;
    } else {
        newsub.textContent = '---- ----';
    }
    newAmount.textContent = amount.value;
    
    if (video_thumb.value && input === video_thumb ) {
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
    


    //upload video file
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
                document.location.href = 'videos.php';
            } else {
                alert ('Adding new video failed');
            }
        }
    }); 
});

</script>

</body>
</html>