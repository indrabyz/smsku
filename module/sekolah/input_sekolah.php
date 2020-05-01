<?php
if($_GET['act']=="input"){
	?>
<div class="row">
    <div class="col-lg-12">
		<h3 class="page-header"><strong>Input Data Bimbel</strong></h3>
    </div>
</div>
<div class="row">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            Input Data Bimbel
        </div>
        <div class="panel-body">
            <div class="row">
                <form method="post" role="form" action="././module/simpan.php?act=input_sekolah">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Kode Bimbel</label>
                        <input class="form-control" placeholder="Kode" name="kode">
                        </div>
                        <div class="form-group">
                            <label>Nama Bimbel</label>
                            <input class="form-control" placeholder="Nama Bimbel" name="nama">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" placeholder="Alamat" name="alamat" rows="3"></textarea>
                        </div>                                        
                        <button type="submit" class="btn btn-default">Submit Button</button>
                </div>
         </form>
            </div>
        </div>
    </div>
</div>
</div>
           <?php } ?>          
           <?php
if($_GET['act']=="edit_sekolah"){
	?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Data Bimbel</h1>
        </div>
    </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Data Bimbel
                    </div>
                    <div class="panel-body">
                        <div class="row">
<?php                            
$sql=mysql_query("select * from sekolah where id='$_GET[id]'");
$rs=mysql_fetch_array($sql);

?>
<form method="post" role="form" action="././module/simpan.php?act=edit_sekolah">
<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
<div class="col-lg-6">
<div class="form-group">
    <label>Kode Bimbel</label>
    <input class="form-control" placeholder="Kode" name="kode" value="<?php echo "$rs[kode]"; ?>">
</div>
        <div class="form-group">

            <label>Nama Bimbel</label>
            <input class="form-control" placeholder="Nama Bimbel" name="nama" value="<?php echo "$rs[nama]"; ?>">

        </div>
                                        
        <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" placeholder="Alamat" name="alamat" rows="3"><?php echo "$rs[alamat]"; ?></textarea>
        </div>

        <button type="submit" class="btn btn-default">Submit Button</button>
</div>
    </form>
 </div>
</div>
</div>
</div>
</div>
<?php } ?>
             