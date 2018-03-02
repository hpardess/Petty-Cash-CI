<!doctype html>
	<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
	<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
	<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
	<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
	<head>
		<?php $this->load->view('includes/meta'); ?>
	</head>
	<body>
		<!-- Left Panel -->
		<?php $this->load->view('includes/left_panel_view'); ?>
		<!-- Left Panel -->

		<!-- Right Panel -->
		<div id="right-panel" class="right-panel">

			<!-- Header-->
			<?php $this->load->view('includes/header_view'); ?>
			<!-- Header-->

			<?php echo $breadcrumbs; ?>

			<div class="content mt-3">
				<?php echo $content; ?>
			</div> <!-- .content -->
		</div><!-- /#right-panel -->
		<!-- Right Panel -->

		<?php $this->load->view('includes/footer_view'); ?>
	</body>
</html>