	<?php
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }

    ?>
    <section class="content-header">
      <h1>
        Bafageh Our Product
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Product</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
										<th>Icon</th>
          					<th>Judul</th>
										<th>Konten</th>
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
          				<?php
                    $no=0;
                        foreach($data->result_array() as $a):
                            $no++;
                            $id=$a['id'];
														$icon=$a['icon'];
                            $title=$a['title'];
                            $content=$a['content'];
                    ?>
                <tr>
									<td><i class='<?php echo $icon;?>'</td>
                  <td><?php echo $title;?></td>
									<td><?php echo substr ($content, 0, 159); ?> ... </td>
                  <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalUpdate<?php echo $id;?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id;?>"><span class="fa fa-trash"></span></a>
                  </td>
                </tr>
				      <?php endforeach;?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

<!-- ============ MODAL ADD Product =============== -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Produk</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/product/simpan_product'?>" enctype="multipart/form-data">
        <div class="modal-body">

					<div class="form-group">
							<label class="control-label col-xs-2" >Icon</label>
							<div class="col-xs-8">
									<input name="icon" class="form-control" type="text" placeholder="Masukan Kode Icon ..." required>
							</div>
					</div>

            <div class="form-group">
                <label class="control-label col-xs-2" >Judul</label>
                <div class="col-xs-8">
                    <input name="title" class="form-control" type="text" placeholder="Judul ..." required>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-xs-2" >Kontent</label>
                <div class="col-xs-8">
                    <textarea class="ckeditor" name="content" rows="10" cols="10"></textarea>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn btn-flat" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-primary btn-flat">Simpan</button>
        </div>
    </form>
    </div>
    </div>
</div>

<?php
    $no=0;
    foreach($data->result_array() as $a):
      $no++;
      $id=$a['id'];
      $title=$a['title'];
      $content=$a['content'];
?>
<!-- ============ MODAL EDIT PRODUCT =============== -->
<div class="modal fade" id="ModalUpdate<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Update Produk</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/product/update_product'?>" enctype="multipart/form-data">
        <div class="modal-body">

					<div class="form-group">
							<label class="control-label col-xs-2" >Icon</label>
							<div class="col-xs-8">
									<input name="icon" value="<?php echo $icon;?>" class="form-control" type="text" placeholder="Masukan Kode Icon ..." required>
							</div>
					</div>

            <div class="form-group">
                <label class="control-label col-xs-2" >Judul</label>
                <div class="col-xs-8">
                    <input name="title" value="<?php echo $title;?>" class="form-control" type="text" placeholder="Judul..." required>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-xs-2" >Konten</label>
                <div class="col-xs-8">
                    <textarea class="ckeditor" name="content" rows="10" cols="10"><?php echo $content;?></textarea>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <input type="hidden" name="kode" value="<?php echo $id;?>">
            <button class="btn btn-flat" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-primary btn-flat">Update</button>
        </div>
    </form>
    </div>
    </div>
</div>

<?php endforeach;?>

	<?php
        $no=0;
        foreach($data->result_array() as $a):
            $no++;
						$id=$a['id'];
						$icon=$a['icon'];
			      $title=$a['title'];
			      $content=$a['content'];
  ?>
	<!--Modal Hapus Product-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Produk</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'backend/product/hapus_product'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							       <input type="hidden" name="kode" value="<?php echo $id;?>"/>
                          <p>Apakah Anda yakin mau menghapus data <b><?php echo $title;?></b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	<?php endforeach;?>

<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    CKEDITOR.replace('ckeditor');
  });
</script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
	
    <?php if($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Data Produk Berhasil disimpan ke database.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Data Produk berhasil di update",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Data Produk Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>
