<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php $this->config->item('name') ?></title>
		<link rel="shortcut icon" href="<?=base_url();?>user_upload/images/<?=$this->config->item('favicon');?>">
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<meta name = "keywords" content = "Admin Panel-JourneyForTech" />
		<meta name = "description" content = "Admin Panel Developed By JourneyForTech" />
		<meta name = "author" content = "@JourneyForTech" />
		<!-- Bootstrap 3.3.6 -->
		<link rel="stylesheet" href="<?= base_url() ?>admin_css/bootstrap/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="<?= base_url() ?>admin_css/dist/css/AdminLTE.min.css">
		<!-- Datatable style -->
		<link rel="stylesheet" href="<?= base_url() ?>admin_css/plugins/datatables/dataTables.bootstrap.css">
		<link rel="stylesheet" href="<?= base_url() ?>admin_css/plugins/iCheck/all.css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="<?= base_url() ?>admin_css/dist/css/style.css">
		<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="<?= base_url() ?>admin_css/dist/css/skins/skin-blue.min.css">
		<!-- <script src="<?= base_url() ?>admin_css/plugins/ckeditor/ckeditor.js"></script> -->
		<script src="//cdn.ckeditor.com/4.11.1/full/ckeditor.js"></script>
		<!-- jQuery 2.2.3 -->
		<script src="<?= base_url() ?>admin_css/plugins/jQuery/jquery-2.2.3.min.js"></script>
			    <!-- DataTables -->
<script src="<?php echo base_url(); ?>admin_css/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>admin_css/plugins/datatables/dataTables.bootstrap.min.js"></script>
		
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper" style="height: auto;">
			<?php if($this->session->flashdata('msg') != ''): ?>
			<div class="alert alert-warning flash-msg alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4> Success!</h4>
				<?= $this->session->flashdata('msg'); ?>
			</div>
			<?php endif; ?>
			<section id="container">
				<!--header start-->
				<header class="header white-bg">
					<?php include('include/navbar.php'); ?>
				</header>
				<!--header end-->
				<!--sidebar start-->
				<aside>
					
					<?php include('include/admin_sidebar.php'); ?>
					
				</aside>
				<!--sidebar end-->
				<!--main content start-->
				<section id="main-content">
					<div class="content-wrapper" style="min-height: 1160px; padding:15px;">
						<!-- page start-->
						<?php $this->load->view($view);?>
						<!-- page end-->
					</div>
				</section>
				<!--main content end-->
				<!--footer start-->
				<footer class="main-footer">
					<div class="pull-right hidden-xs">
						<strong style="font-weight: 600;">Copyright ©  <a href="https://www,journeyfortech.com"> JourneyForTech </a> Pvt.Ltd. Any issue contact us.&nbsp;</strong>
					</div>
					<b>Version</b> 1.0
				</footer>
				<!--footer end-->
			</section>
			<!-- /.control-sidebar -->
			<?php include('include/control_sidebar.php'); ?>
		</div>
		
		
		<!-- jQuery UI 1.11.4 -->
		<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
		$.widget.bridge('uibutton', $.ui.button);
		</script>
		<!-- Bootstrap 3.3.6 -->
		<script src="<?= base_url() ?>admin_css/bootstrap/js/bootstrap.min.js"></script>
		
		<!-- AdminLTE App -->
		<script src="<?= base_url() ?>admin_css/dist/js/app.min.js"></script>
		<!-- Date Picker -->
		<script src="<?= base_url() ?>admin_css/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?= base_url() ?>admin_css/plugins/iCheck/icheck.min.js"></script>



		<script type="text/javascript">
				$('.hr_datepicker').datepicker({ dateFormat: 'YY-mm-dd'});
		</script>
		<!-- page script -->
		<script type="text/javascript">
		$(".flash-msg").fadeTo(2000, 500).slideUp(500, function(){
		$(".flash-msg").slideUp(500);
		});
		</script>
		<!-- Custom JS-->
		<?php $this->load->view("admin/include/js_footer.php"); ?>
	</body>
</html>