<?php
	session_start();
	if (!isset($_SESSION['login']))
		header('Location: index.php');
	include('configdb.php');
?>

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title><?php echo $_SESSION['judul']." - ".$_SESSION['welcome']." - oleh ".$_SESSION['by'];?></title>
	
    <!-- Bootstrap core CSS -->
    <link href="ui/css/bootstrap.css" rel="stylesheet">
	<link href="ui/css/cerulean.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--script src="./index_files/ie-emulation-modes-warning.js"></script-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>
	<div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo $_SESSION['judul'];?></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="kriteria.php">Data Kriteria</a></li>
			  <li><a href="subkriteria.php">Data Sub Kriteria</a></li>
              <li><a href="alternatif.php">Data Alternatif</a></li>
			  <li><a href="analisa.php">Analisa</a></li>
              <li><a href="perhitungan.php">Perhitungan</a></li>
			  <li><a href="profile.php">Profile</a></li>
			  <li><a href="logout.php">Logout</a></li>
			</ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
		<ol class="breadcrumb">
		  <li><a href="index.php">Home</a></li>
		  <li><a href="subkriteria.php">Data Sub Kriteria</a></li>
		  <li class="active">Edit Data Sub Kriteria</li>
		</ol>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="panel panel-primary">
		  <!-- Default panel contents -->
		  <div class="panel-heading">Edit Data Sub Kriteria</div>
		  <div class="panel-body">
							<form role="form" method="post" action="edit-sk.php?id=<?php echo $_GET['id'];?>">
                                    <div class="box-body">
										<?php
														$kriteria = $mysqli->query("select * from kriteria");
														if(!$kriteria){
															echo $mysqli->connect_errno." - ".$mysqli->connect_error;
															exit();
														}
														$subkriteria = $mysqli->query("select * from sub_kriteria where id_sub_kriteria = ".$_GET['id']."");
														if(!$kriteria){
															echo $mysqli->connect_errno." - ".$mysqli->connect_error;
															exit();
														}
														$i=0;
										?>
                                        <div class="form-group">
											<?php 
												while ($row = $subkriteria->fetch_assoc()) {
											?>
											<label for="kriteria">Kriteria</label>
                                            <select class="form-control" name="kriteria" id="kriteria">
											<?php 
												while ($row2 = $kriteria->fetch_assoc()) {
											?>
												<option value='<?php echo $row2["id_kriteria"];?>' <?php if($row["id_kriteria"]==$row2["id_kriteria"]) echo "selected";?>><?php echo $row2["kriteria"];?></option>
										    <?php
												}
											?>
											</select>
                                        </div>
                                        <div class="form-group">
                                            <label for="subkriteria">Sub Kriteria</label>
                                            <input type="text" class="form-control" name="subkriteria" id="subkriteria" placeholder="Nama Sub Kriteria" value="<?php echo $row["sub_kriteria"];?>" required >
                                        </div>
										<div class="form-group">
                                            <label for="skor">Skor</label>
                                            <input type="text" class="form-control" name="skor" id="skor" placeholder="Skor Sub Kriteria" value="<?php echo $row["skor"];?>" required >
                                        </div>
											<?php
												}
											?>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
										<button type="reset" class="btn btn-info">Reset</button>
										<a href="subkriteria.php" type="cancel" class="btn btn-warning">Batal</a>
                                        <button type="submit" class="btn btn-primary">Proses Edit</button>
                                    </div>
                            </form>
		  </div>
		  <div class="panel-footer"><?php echo $_SESSION['by'];?><div class="pull-right"></div></div>
		</div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="ui/js/jquery-1.10.2.min.js"></script>
	<script src="ui/js/bootstrap.min.js"></script>
	<script src="ui/js/bootswatch.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ui/js/ie10-viewport-bug-workaround.js"></script>

</body></html>