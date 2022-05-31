<?php

session_start();
include "../koneksi.php";
include "auth_user.php";

?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>Maintenance Management System | Admin</title>
	<!-- Library CSS -->
	<?php
		include "bundle_css.php";
	?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php
        include 'content_header.php';
       ?>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <p></p>
            </div>
          </div><!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
              <li class="header"><h4><b><center>Menu Panel</center></b></h4></li>
              <li><a href="index.php"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
					<li><a href="kerusakan.php"><i class="fa fa-gear"></i><span>Kerusakan</span>
					<li class="active"><a href="kuantitatif.php"><i class="fa fa-gear"></i><span>Data Kuantitatif</span>
			        <li><a href="komponen.php"><i class="fa fa-columns"></i><span>Komponen</span></a></li>
			        <li><a href="parameter1.php"><i class="fa fa-columns"></i><span>Severity</span></a></li>
					<li><a href="parameter2.php"><i class="fa fa-columns"></i><span>Occurance</span></a></li>
					<li><a href="parameter3.php"><i class="fa fa-columns"></i><span>Detection</span></a></li>
					<li><a href="pegawai.php"><i class="fa fa-user"></i><span>Pegawai</span></a></li>
					<li><a href="user.php"><i class="fa fa-user-circle-o"></i><span>User</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Kuantitatif
          </h1>
          <ol class="breadcrumb">
            <li><i class="fa fa-calendar"></i>Data Kuantitatif</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">

                </div><!-- /.box-header -->
                <div class="box-body">
				<a href="#"><button class="btn btn-success" type="button" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus"></i> Add</button></a>
				<a href="#"><button class="btn btn-success" type="button" data-target="#ModalHitung" data-toggle="modal"><i class="fa fa-plus"></i> Calculate</button></a>
				<a href="webpage_weibull.php"><button class="btn btn-success" type="button" data-toggle="modal"><i class="fa fa-plus"></i> Visualization Tools</button></a>
                  <br></br>
				  <table id="data1" class="table table-bordered table-striped table-scalable">
						<?php
							include "dt_kuantitatif.php";
						?>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
		
		<!-- Modal Popup pegawai -->
		<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Data Kuantitatif</h4>
					</div>
					<div class="modal-body">
						<form action="kuantitatif_add.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>Komponen</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<select name="kode_kuantitatif" class="form-control">
										<?php
											
											$querykomponen = mysqli_query($konek, "SELECT * FROM komponen");
											if($querykomponen == false){
												die("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while($komponen = mysqli_fetch_array($querykomponen)){
												echo "<option value='$komponen[Kode_Komponen]'>$komponen[Nama_Komponen]</option>";
											}

													
											
										?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Shape</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<input id="shape" row='1' name="shape" type="float" class="form-control" placeholder="Parameter Shape"></input>
									</div>
							</div>
							<div class="form-group">
								<label>Scale</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<input id="scale" row='1' name="scale" type="float" class="form-control" placeholder="Parameter Scale"></input>
									</div>
							</div>
							<div class="form-group">
								<label>Time</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<input id="timew" row='1' name="timew" type="float" class="form-control" placeholder="Waktu dalam jam"></input>
									</div>
							</div>
							<div class="form-group">
								<label>Reliability</label>
								<div class="input-group">
									<i class="fa fa-book"></i>
								</div>
								<output id="reliability" row='1' name="realibilityw" type="float" class="form-control"></output>
								<?php
								if(isset($_POST['calculate'])){

           						 $shape=$_POST['shape'];
           						 $scale=$_POST['scale'];
								 $timew=$_POST['timew'];
								 {
									 echo exp((-1*pow($timew/$scale,$shape)));
								 }

								   } 
            					?>
							</div>
							
							<div class="modal-footer">
							
							<button type="submit" name="calculate" value="calculate">
								Calculate
							</button>
								<button class="btn btn-success" type="submit" name="add">
									Add
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Cancel
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal Hitung -->
		<!-- <div id="ModalHitung" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Tambah Data Kuantitatif</h4>
					</div>
					<div class="modal-body">
						<form action="kuantitatif_edit.php" name="modal_popup" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>Komponen</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user"></i>
										</div>
										<select name="kode_kuantitatif" class="form-control">
										<?php
											
											$querykomponen = mysqli_query($konek, "SELECT * FROM komponen");
											if($querykomponen == false){
												die("Terdapat Kesalahan : ". mysqli_error($konek));
											}
											while($komponen = mysqli_fetch_array($querykomponen)){
												echo "<option value='$komponen[Kode_Komponen]'>$komponen[Nama_Komponen]</option>";
											}
										?>
										</select>
									</div>
							</div>
							<div class="form-group">
								<label>Shape</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<input id="shape" row='1' name="shape" type="float" class="form-control" placeholder="Parameter Shape"></input>
									</div>
							</div>
							<div class="form-group">
								<label>Scale</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<input id="scale" row='1' name="scale" type="float" class="form-control" placeholder="Parameter Scale"></input>
									</div>
							</div>
							<div class="form-group">
								<label>Time</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<input id="timew" row='1' name="timew" type="float" class="form-control" placeholder="Waktu dalam jam"></input>
									</div>
							</div>
							<div class="form-group">
								<label>Reliability</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<?php
										
											$shape = floatval($_POST['shape']);
 											$scale = floatval($_POST['scale']);
											$timew  = floatval($_POST['timew']);
											{
              									 echo exp((-1*pow($timew/$scale,$shape)));
       											 }
										?> 
									</div>
							</div>
							
							<div class="form-group">
								<label>Failure Rate</label>
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-book"></i>
										</div>
										<textarea id="failureratew" row='1' name="failureratew" type="float" class="form-control" placeholder="Nilai Failure Rate"></textarea>
									</div>
							</div>
							
							<div class="modal-footer">
								
								<button class="btn btn-success" type="submit">
									Add
								</button>
								<button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
									Cancel
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div> -->
		<!-- Modal Popup pegawai Edit -->
		<div id="ModalEditKuantitati" class="modal fade" tabindex="-1" role="dialog"></div>
		
		<!-- Modal Popup untuk delete--> 
		<div class="modal fade" id="modal_delete">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top:100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
					</div>    
					<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
						<a href="#" class="btn btn-danger" id="delete_link">Delete</a>
						<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>
		
   
	<!-- Library Scripts -->
	<?php
		include "bundle_script.php";
	?>
  </body>
</html>