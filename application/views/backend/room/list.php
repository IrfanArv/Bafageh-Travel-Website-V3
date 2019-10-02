<section class="content-header">
    <h1>
        List Hotel Room
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="fa fa-dashboard"></i>
                Home</a>
        </li>
        <li class="active">Hotel Room</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                <div class="box">
                    <div class="box-header">
                        <a
                            class="btn btn-success btn-flat"
                            href="<?php echo base_url().'backend/room/add_room'?>">
                            <span class="fa fa-plus"></span>
                            Add New</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table
                            id="example1"
                            class="table table-striped table-hover dt-responsive"
                            style="font-size:13px;">
                            <thead>
                                <tr>

                                    <th>Destinasi</th>
                                    <th>Hotel</th>
                                    <th>Tipe Ruangan</th>
                                    <th>Modal Weekday</th>
                                    <th>Modal Weekend</th>
                                    <th>Jual Weekday</th>
                                    <th>Jual Weekend</th>
                                    <th style="text-align:center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
          					$no=0;
          					foreach ($data->result_array() as $i) :
          					   $no++;
                       $id_room=$i['id_room'];
                       $destinasi=$i['destinasi'];
                       $title=$i['title'];
                       $hotel_id=$i['hotel_id'];
                       $judul=$i['judul'];
                       $stock=$i['stock'];
                       $hm_wd=$i['hm_wd'];
                       $hm_we=$i['hm_we'];
                       $hj_wd=$i['hj_wd'];
                       $hj_we=$i['hj_we'];
                       $status_fas=$i['status_fas_room'];
                      
                      
          					  ?>
                                <tr>
                                    <td><?php echo $destinasi;?></td>
                                    <td><?php echo $judul;?></td>
                                    <td><?php echo $title;?></td>
                                    <td>
                                        <span class="label label-success"><?php echo 'Rp '.number_format($hm_wd);?></span></td>
                                    <td>
                                        <span class="label label-warning">
                                            <?php echo 'Rp '.number_format($hm_we);?></span></td>
                                    <td>
                                        <span class="label label-danger"><?php echo 'Rp '.number_format($hj_wd);?></span></td>
                                    <td>
                                        <span class="label label-primary"><?php echo 'Rp '.number_format($hj_we);?></span></td>
                                    <td style="text-align:right;">

                                        <?php 
                    if($status_fas=='1'):?>
                                        <a
                                            class="btn"
                                            data-toggle="modal"
                                            data-target="#Modalgallery<?php echo $id_room;?>">
                                            <span class="fa fa-image"></span></a>
                                        <a class="btn" href="<?php echo base_url().'backend/room/edit/'.$id_room;?>">
                                            <span class="fa fa-pencil"></span></a>
                                        <a class="btn" href="<?php echo base_url().'backend/room/detail/'.$id_room;?>">
                                            <span class="fa fa-eye"></span></a>
                                        <a
                                            class="btn"
                                            data-toggle="modal"
                                            data-target="#ModalHapus<?php echo $id_room;?>">
                                            <span class="fa fa-trash"></span></a>
                                    <?php else:?>
                                        <a
                                            class="btn"
                                            data-toggle="modal"
                                            data-target="#Modalfasilitas<?php echo $id_room;?>">
                                            <span class="fa fa-wifi"></span></a>
                                        <a
                                            class="btn"
                                            data-toggle="modal"
                                            data-target="#Modalgallery<?php echo $id_room;?>">
                                            <span class="fa fa-image"></span></a>
                                        <a class="btn" href="<?php echo base_url().'backend/room/edit/'.$id_room;?>">
                                            <span class="fa fa-pencil"></span></a>
                                        <a class="btn" href="<?php echo base_url().'backend/room/detail/'.$id_room;?>">
                                            <span class="fa fa-eye"></span></a>
                                        <a
                                            class="btn"
                                            data-toggle="modal"
                                            data-target="#ModalHapus<?php echo $id_room;?>">
                                            <span class="fa fa-trash"></span></a>
                                        <?php endif;?>

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
    <?php
          					$no=0;
          					foreach ($data->result_array() as $i) :
          					   $no++; 
          					   $id_room=$i['id_room'];
                       $title=$i['title'];
                       $hotel_id=$i['hotel_id'];
                       $judul=$i['judul']; 
                                         
                       $stock=$i['stock'];
                      
          					  ?>
    <div
        class="modal fade"
        id="ModalHapus<?php echo $id_room;?>"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <span class="fa fa-close"></span></span></button>
                    <h4 class="modal-title" id="myModalLabel">Hapus Data Ruangan</h4>
                </div>
                <form
                    class="form-horizontal"
                    action="<?php echo base_url().'backend/room/hapus_room'?>"
                    method="post"
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="kode" value="<?php echo $id_room;?>"/>

                        <p>Yakin Mau Hapus Seluruh Data Ruangan
                            <b><?php echo $title;?></b>
                            Dari Hotel
                            <b><?php echo $judul;?></b>
                            ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div
        class="modal fade"
        id="Modalgallery<?php echo $id_room;?>"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <span class="fa fa-close"></span></span></button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Foto Untuk Ruangan
                        <b><?php echo $title;?></b>
                        Dari Hotel
                        <b><?php echo $judul;?></b>
                    </h4>
                </div>
                <form
                    class="form-horizontal"
                    action="<?php echo base_url().'backend/room/upload_galeri'?>"
                    method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-xs-3">Gambar</label>
                        <div class="col-xs-8">
                            <input type="hidden" name="id_room" id="id_room" value="<?php echo $id_room;?>">
                            <input
                                type="hidden"
                                name="hotel_id"
                                id="hotel_id"
                                value="<?php echo $hotel_id;?>">
                            <input type="file" name="userfile[]" multiple="multiple" class="form-control"/>
                        </div>
                    </div>

                    <div class="modal-footer">

                        <button type="submit" class="btn btn-primary btn-flat" id="save">Simpan</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <div
        class="modal fade"
        id="Modalfasilitas<?php echo $id_room;?>"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <span class="fa fa-close"></span></span></button>
                    <h4 class="modal-title" id="myModalLabel">Manage Fasilitas Hotel</h4>
                </div>
                <form
                    class="form-horizontal"
                    action="<?php echo base_url().'backend/room/add_fasilitas'?>"
                    method="post"
                    enctype="multipart/form-data">
                    <input type="hidden" name="id_room" id="id_room" value="<?php echo $id_room;?>">
                    <input
                        type="hidden"
                        name="hotel_id"
                        id="hotel_id"
                        value="<?php echo $hotel_id;?>">
                    <div class="modal-body">

                        <?php
					$no=0;
					foreach ($fas->result_array() as $q) :
					   $no++;
                       $id_fasilitas=$q['id_fasilitas'];
                       $nama=$q['nama'];
                       $gambar=$q['gambar'];
                      
                                       
                       
                    ?>
                        <b><?php echo $nama;?></b>
                        &nbsp;
                        <input
                            type="checkbox"
                            class="flat-red"
                            name="fasilitas[<?php echo $id_fasilitas;?>]"
                            value="<?php echo $id_fasilitas;?>"/>
                        &nbsp;&nbsp;
                        <?php endforeach;?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach;?>

    <script
        src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/plugins/iCheck/icheck.min.js'?>"></script>
    <script
        src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
    <script
        src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
    <script
        type="text/javascript"
        src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>

    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "responsive": true,
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });

        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck(
            {checkboxClass: 'icheckbox_minimal-blue', radioClass: 'iradio_minimal-blue'}
        );
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck(
            {checkboxClass: 'icheckbox_minimal-red', radioClass: 'iradio_minimal-red'}
        );
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck(
            {checkboxClass: 'icheckbox_flat-green', radioClass: 'iradio_flat-green'}
        );
    </script>
    <?php if($this->session->flashdata('msg')=='error'):?>

<?php elseif($this->session->flashdata('msg')=='success'):?>
    <script type="text/javascript">
        $.toast({
            heading: 'Success',
            text: "Data Berhasil di Simpan Ke Server Database",
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
            text: "Data Berhasil di Update. ",
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
            text: "Data Berhasil dihapus",
            showHideTransition: 'slide',
            icon: 'success',
            hideAfter: false,
            position: 'bottom-right',
            bgColor: '#7EC857'
        });
    </script>
<?php else:?>

    <?php endif;?>