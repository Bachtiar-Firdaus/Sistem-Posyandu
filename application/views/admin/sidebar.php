		<style type="text/css">
			.asdasd{
				border-bottom: 1px solid yellow;
			}
		</style>
		<!--  sidebar -->
        <aside class="main-sidebar" style="background-color: #55502d;">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<ul class="sidebar-menu" data-widget="tree">


<?php if($this->session->userdata('akses') == "ADMIN"){ 
?>

					<li class="asdasd"><a href="<?php echo site_url() ?>/admin_controller/kelola_petugas"><i class="fa fa-book"></i> <span> Kelola Petugas </span></a></li>



					<li class="asdasd"><a href="<?php echo site_url() ?>/admin_controller/laporan"><i class="fa fa-pencil-square-o"></i> <span>Laporan</span></a></li>


<?php }?>

<?php if($this->session->userdata('akses') == "KADER-PENDAFTARAN"){ 
?>
					<li class="asdasd"><a href="<?php echo site_url() ?>/admin_controller/kelola_pasien"><i class="fa fa-pencil-square-o"></i> <span>Kelola Data Pasien</span></a></li> 


<?php }?>

<?php if($this->session->userdata('akses') == "KMS"){ 
?>
					<li class="asdasd"><a href="<?php echo site_url() ?>/admin_controller/kelola_kms"><i class="fa fa-commenting"></i> <span>Kelola KMS</span></a></li>

<?php }?>

					<li class="asdasd"><a href="<?php echo site_url() ?>/Login/logout">Logout</a></li>
						





				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>
		<!-- akhir sidebar -->