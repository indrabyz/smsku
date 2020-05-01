<?php
session_start();
if(!empty($_SESSION['nama'])){
$uidi=$_SESSION['idu'];	
$usre=$_SESSION['nama'];
$level=$_SESSION['level'];
$klss=$_SESSION['idk'];
$ortu=$_SESSION['ortu'];
$idd=$_SESSION['id'];

include "config/conn.php";
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEM ABSENSI</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                 <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
            </button>
             <a class="navbar-brand" href="media.php?module=home">SISTEM ABSENSI BIMBEL</a>
         </div>

    <ul class="nav navbar-top-links navbar-right">
             <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
<?php 
echo "User : $usre"; 
?> 

                </a>
            </li>
    <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
<?php 
if($level=="admin_guru"){
	$sqla=mysql_query("select * from sekolah where id='$idd'");
	$rsa=mysql_fetch_array($sqla);
echo "Institusi : $rsa[nama]" ;
}else{
	$sql=mysql_query("select * from kelas where idk='$klss'");
	$rs=mysql_fetch_array($sql);
	$sqla=mysql_query("select * from sekolah where id='$rs[id]'");
	$rsa=mysql_fetch_array($sqla);
echo "Institusi : $rsa[nama] | $rs[nama]" ;
}
?> 
                   </a>
                </li>

<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="" href="logout.php">
<?php echo "Logout"; ?> 
                   </a>
                </li>                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
<?php echo "Tanggal : ".date("d-m-Y"); ?> 
                   </a>
                </li>
            </ul>

    <div class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                             <i class="fa fa-search"></i>
                        </button>
                    </span>
                            </div>
                </li>
<?php if($level=='admin' or $level=='admin_guru'){ ?>

    <li>
        <a href="#"><i class="fa fa-group fa-fw"></i> Data Siswa<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="media.php?module=input_siswa&act=input">Input Data</a>
            </li>
            <li>
                <a href="media.php?module=tampil">View Data</a>
            </li>
        </ul>
    </li>
                        
    <li>
        <a href="#"><i class="fa fa-user fa-fw"></i> Data Wali Kelas<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">

            <li>
                <a href="media.php?module=input_guru&act=input">Input Data</a>
            </li>
            <li>
                <a href="media.php?module=tampil_guru">View Data</a>
            </li>
        </ul>
    </li>
<?php } ?>

<?php if($level=='admin' or $level=='admin_guru'){ ?>

    <li>
        <a href="#"><i class="fa fa-book fa-fw"></i> Data Kelas<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="media.php?module=input_kelas&act=input">Input Data</a>
            </li>
            <li>
                <a href="media.php?module=kelas">View Data</a>
            </li>
        </ul>
    </li>
<?php } ?>

<?php if($level=='admin'){ ?>

    <li>
    <a href="#"><i class="fa fa-building-o fa-fw"></i> Data Bimbel<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="media.php?module=input_sekolah&act=input">Input Data</a>
        </li>
        <li>
            <a href="media.php?module=sekolah">View Data</a>
        </li>
    </ul>
    </li>

<?php } ?>

<?php if($level=='guru'){ ?>

    <li>
        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Data Absensi<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="media.php?module=pilih">Input Data</a>
            </li>
        </ul>
    </li>
<?php } ?>


<?php if($level=='user'){ ?>
    <li>
        <a href="media.php?module=pilih_laporan"><i class="fa fa-bar-chart-o fa-fw"></i> Laporan</a>
    </li>
<?php } ?>
<?php if($level=='guru'){ ?>
    <li>
        <a href="media.php?module=guru_det"><i class="fa fa-user fa-fw"></i> Data Wali Kelas</a>
    </li>

<?php } ?>
<?php if($level=='user'){ ?>
                <li>
                    <a href="media.php?module=siswa_det"><i class="fa fa-group fa-fw"></i> Data Siswa</a>
                </li>
<?php } ?>
      
            </ul>
        </div>
    </div>
</nav>

    <div id="page-wrapper">
<?php include "content.php";  ?>
    </div>
    </div>
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="js/sb-admin.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>
</body>
</html>
<?php } ?>