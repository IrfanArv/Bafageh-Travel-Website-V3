<section class="content-header">
    <h1>
        List Hotel
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="fa fa-dashboard"></i>
                Home</a>
        </li>
        <li class="active">Hotel</li>
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
                            href="<?php echo base_url().'backend/hotel/add_hotel'?>">
                            <span class="fa fa-plus"></span>
                            Add New</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-striped" style="font-size:13px;">
                            <thead>
                                <tr>
                                    <th>Cover</th>
                                    <th>Nama Hotel</th>
                                    <th>Lokasi</th>
                                    <th>Rate Hotel</ht>
                                    <th>Email</th>
                                    <th>No. Telp</th>
                                    <th style="text-align:right;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
          					$no=0;
          					foreach ($data->result_array() as $i) :
          					   $no++;
                                 $id_hotel=$i['id_hotel'];
                                 $slug=$i['hotel_slug'];
                               $judul=$i['judul'];
                               $rate=$i['rate'];
          					   $destinasi_id=$i['destinasi_id'];
          					   $destinasi=$i['destinasi'];
                               $email=$i['hotel_email'];
                               $phone=$i['hotel_phone'];
                               $gambar=$i['cover_hotel'];
                               $status_fas=$i['status_fas'];
          					  ?>
                                <tr>
                                    <td><img
                                        class="img-thumbnail"
                                        width="90"
                                        height="80"
                                        src="<?php echo base_url().'assets/images/hotel/thumb/'.$gambar; ?>"></td>
                                    <td><?php echo $judul;?></td>
                                    <td><?php echo $destinasi;?></td>
                                    <td><?php echo $rate;?></td>
                                    <td>
                                        <a href="mailto:<?php echo $email;?>" target="_top"><?php echo $email;?></a>
                                    </td>
                                    <td><?php echo $phone;?></td>
                                    <td style="text-align:right;">

                                        <?php 
                    if($status_fas=='1'):?>

                                        <a
                                            class="btn"
                                            data-toggle="modal"
                                            data-target="#Modalgallery<?php echo $id_hotel;?>">
                                            <span class="fa fa-image"></span></a>
                                        <a
                                            class="btn"
                                            href="<?php echo base_url().'backend/hotel/get_detail/'.$id_hotel;?>">
                                            <span class="fa fa-eye"></span></a>
                                        <a
                                            class="btn"
                                            href="<?php echo base_url().'backend/hotel/get_edit/'.$id_hotel;?>">
                                            <span class="fa fa-pencil"></span></a>
                                        <a
                                            class="btn"
                                            data-toggle="modal"
                                            data-target="#ModalHapus<?php echo $id_hotel;?>">
                                            <span class="fa fa-trash"></span></a>
                                    <?php else:?>

                                        <a
                                            class="btn"
                                            data-toggle="modal"
                                            data-target="#Modalfasilitas<?php echo $id_hotel;?>">
                                            <span class="fa fa-wifi"></span></a>
                                        <a
                                            class="btn"
                                            data-toggle="modal"
                                            data-target="#Modalgallery<?php echo $id_hotel;?>">
                                            <span class="fa fa-image"></span></a>
                                        <a
                                            class="btn"
                                            href="<?php echo base_url().'backend/hotel/get_detail/'.$id_hotel;?>">
                                            <span class="fa fa-eye"></span></a>
                                        <a
                                            class="btn"
                                            href="<?php echo base_url().'backend/hotel/get_edit/'.$id_hotel;?>">
                                            <span class="fa fa-pencil"></span></a>
                                        <a
                                            class="btn"
                                            data-toggle="modal"
                                            data-target="#ModalHapus<?php echo $id_hotel;?>">
                                            <span class="fa fa-trash"></span></a>
                                        <?php endif ?>
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
                                  $id_hotel=$i['id_hotel'];
                                  $slug=$i['hotel_slug'];
                                $judul=$i['judul'];
                                $rate=$i['rate'];
                                $destinasi_id=$i['destinasi_id'];
                                $destinasi=$i['destinasi'];
                                $email=$i['hotel_email'];
                                $phone=$i['hotel_phone'];
                                $gambar=$i['cover_hotel'];
          					  ?>
    <!--Modal Hapus Pengguna-->
    <div
        class="modal fade"
        id="ModalHapus<?php echo $id_hotel;?>"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <span class="fa fa-close"></span></span></button>
                    <h4 class="modal-title" id="myModalLabel">Hapus Data Hotel</h4>
                </div>
                <form
                    class="form-horizontal"
                    action="<?php echo base_url().'backend/hotel/hapus_hotel'?>"
                    method="post"
                    enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="kode" value="<?php echo $id_hotel;?>"/>
                        <input type="hidden" value="<?php echo $i['cover_hotel'];?>" name="gambar">

                        <p>Yakin Mau Hapus Seluruh Data Hotel
                            <b><?php echo $judul;?></b>
                            Yang Berlokasi di
                            <b><?php echo $destinasi;?></b>
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
        id="Modalfasilitas<?php echo $id_hotel;?>"
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
                    action="<?php echo base_url().'backend/hotel/add_fasilitas'?>"
                    method="post"
                    enctype="multipart/form-data">
                    <input
                        type="hidden"
                        name="hotel_id"
                        id="hotel_id"
                        value="<?php echo $id_hotel;?>">
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

    <!--Modal GALLERI-->
    <div
        class="modal fade"
        id="Modalgallery<?php echo $id_hotel;?>"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            <span class="fa fa-close"></span></span></button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Foto Untuk Hotel
                        <b><?php echo $judul;?></h4>
                    </div>
                    <form
                        class="form-horizontal"
                        action="<?php echo base_url().'backend/hotel/upload_galeri'?>"
                        method="post"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-xs-3">Gambar</label>
                            <div class="col-xs-8">
                                <input
                                    type="hidden"
                                    name="id_hotel"
                                    id="hotel_id"
                                    value="<?php echo $id_hotel;?>">
                                <input type="hidden" name="slug" id="slug" value="<?php echo $slug;?>">
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
        <script type="text/javascript">
            $.toast({
                heading: 'Error',
                text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
                showHideTransition: 'slide',
                icon: 'error',
                hideAfter: false,
                position: 'bottom-right',
                bgColor: '#FF4859'
            });
        </script>

    <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
            $.toast({
                heading: 'Success',
                text: "Data Hotel Berhasil disimpan ke database.",
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
                text: "Data Hotel berhasil di update",
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
                text: "Data Hotel Berhasil dihapus.",
                showHideTransition: 'slide',
                icon: 'success',
                hideAfter: false,
                position: 'bottom-right',
                bgColor: '#7EC857'
            });
        </script>
    <?php else:?>

        <?php endif;?>

        <script></script>