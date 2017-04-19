<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>CRUD Data</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/datatables.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container-fluid">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<nav class="navbar navbar-default" role="navigation">
							<div class="container-fluid">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
									<a class="navbar-brand" href="#">Hello World</a>
								</div>
						
								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse navbar-ex1-collapse">
									<ul class="nav navbar-nav">
										<li class=""><a href="<?php echo site_url('jenis') ?>">Home</a></li>
										<li class=""><a href="<?php echo site_url('hero/create/'.$this->uri->segment(3)); ?>">Tambah Hero</a></li>
									</ul>
								</div><!-- /.navbar-collapse -->
						</div>
						</nav>

					</div>	
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h1>Daftar Hero</h1>	
						<div class="table-responsive">
							<table class="table table-hover" id="example">
								<thead>
									<tr>
										<th>Nama Jenis Hero</th>
										<th>Nama Hero</th>
										<th>Tanggal Lahir</th>
										<th>Foto</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php foreach ($hero_list as $key) { ?>
									<tr>
										<td><?php echo $key->namaJenis ?></td>
										<td><?php echo $key->nama ?></td>
										<td><?php echo $key->tanggalLahir ?></td>
										<td><img src="<?=base_url()?>assets/uploads/<?=$key->foto ?>" witdh="50" height="50"></td>
										<td>
											<a href="<?php echo site_url('hero/update/').$key->id ?>" type="button" class="btn btn-info"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a>
											<a href="<?php echo site_url('hero/delete/').$key->id ?>" type="button" class="btn btn-info" onClick="return doconfirm();"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a>
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>

		<script>
		function doconfirm()
		{
    		job=confirm("Are you sure to delete this data permanently?");
    		if(job!=true)
    		{
        		return false;
    		}
		}
		</script>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="<?php echo base_url('') ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url('') ?>assets/datatables.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
 		<script src="Hello World"></script>
 		<script type="text/javascript">
		$(document).ready(function()
		{
			$('#example').DataTable();
		} );
		</script>
	</body>
</html>