<!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">

<?php
require('v_header.php');
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Katalog Pengadaan</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                  <?php if ($tahapan==0) {
                         echo $pesan;
                        } else{
                         echo 'Pengisian Data Sudah Ditutup';
                        } ?>
                   
                </div>

        <div class="row">
          <div class="col-12">

            

            <div class="card" id="tables-katalog"> 
            <div class="card-body">     
            <h5>Total Anggaran           : <?php echo $anggaran;  ?></h5>
            <h5>Total Harga Buku Terpilih: <?php echo $total_terpilih;  ?></h5>
           </div>     
              <!-- /.card-header -->
              <div class="card-body overlay-wrapper">
     
                  <div id="preloader" class="overlay" style="text-align: center;"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Loading...</div></div>

                <?php if ($tahapan==0) { ?>
                <table style="text-align: justify; font-size: 14;" id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="background:  #050354; color: white; text-align: center;">
                    <th style="width: 3%;">No</th>
                    <th style="width: 45%;">Judul</th>
                    <th>Pengarang</th>
                    <th>Bahasa</th>
                    <th>tahun</th>
                    <th>jumlah</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i=1; ?>
                 <?php foreach ($buku->result() as $row): ?>
                    <tr>
                       <td style="text-align: center;"><?php echo $i; $i++; ?></td>
                       <td><?php echo $row->judul; ?></td>
                       <td><?php echo $row->pengarang; ?></td>
                       <td><?php echo $row->bahasa; ?></td>
                       <td><?php echo $row->tahun; ?></td>
                       <td><?php echo $row->jumlah_terpilih; ?></td>
                       <td style=" width: 100px;text-align: center;">
                            <div class="btn-group">  
                                 <button onclick="detail(<?php echo $row->id_buku; ?>);" class="btn btn-primary btn-flat" type="button" data-toggle="tooltip" title="Detail"><i class="fa fa-search"></i></button>
                                  
                                    <button onclick="deleteBuku(<?php echo $row->id_pilih; ?>);" class="btn btn-danger btn-flat" type="button" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i></button>
                                
                            </div>
                        </td>
                   
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  
                </table>
                 <?php }  ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

      
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  

  <!-- Modal Warning Product-->
      <div class="modal fade" id="modalWarning-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="eror" class="modal-body">
            </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>   
          </div>
            </div>
        </div>
      </div>

  <!-- modal konfirmasi hapus -->
      <div id="modalDelete" class="modal " tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               
               <div class="modal-body">
                   Apakah anda ingin menghapus Data ini?
               </div> 
                <input id="idHapus"  type="text" hidden >
                
               <div class="modal-footer">
                  <div class="btn-group">
                     <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tidak</button>
                     <button id="btn-delete" type="button" class="btn btn-danger btn-flat">Ya</button>
                  </div>
               </div>
            </div>
         </div>
      </div>

  <!-- modal detail -->
<div id="modalDetail" class="modal " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" data-keyboard="false">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
        

         <div class="modal-body">
             <div class="form-group">
                <form role="form" method="post" action="" >
                 <div class="card-body ">
                        
                           <div class="row">
                              <div class="col-sm-12">
                                <div class="form-group">
                                 <label >Judul Buku</label>
                                 <textarea id="detail_judul"  type="" class="form-control" rows="3"  readonly></textarea>                                 
                               </div>
                              </div>
                              <div class="col-sm-6">
                                
                                <div class="form-group">
                                 <label >Pengarang</label>
                                 <input id="detail_pengarang" type="text" class="form-control"  readonly >
                                </div> 
                                <div class="form-group">
                                 <label >Penerbit</label>
                                 <input  id="detail_penerbit" type="text" class="form-control"  readonly>
                                </div>
                                <div class="form-group">
                                 <label >Tanggal Input</label>
                                 <input id="detail_tgl" type="text" class="form-control"  readonly>
                                </div>  

                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                 <label >Tahun</label>
                                 <input id="detail_tahun" type="text" class="form-control"  readonly>
                                </div>
                              <div class="form-group">
                                 <label >Harga</label>
                                 <input id="detail_harga" type="text" class="form-control"  readonly>
                                </div>
                              <div class="form-group">
                                 <label >Bahasa</label>
                                 <input id="detail_bahasa" type="text" class="form-control"  readonly>
                                </div>                          
                              </div>
                               
                          </div> 
                      </div>


                </form>
              </div>
         </div>
         <div class="modal-footer">
            <div class="btn-group">
               <button type="button" id="btn-cancel" class="btn btn-default btn-flat" data-dismiss="modal">Tutup</button>
              
            </div>
         </div>
         
   </div>
</div>
</div>


   

  <?php
require('v_footer.php');
?>
<script src="<?php echo base_url('assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE//plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/jszip/jszip.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/pdfmake/pdfmake.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/pdfmake/vfs_fonts.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js') ?>"></script>

<!-- jquery-validation -->
<script src="<?php echo base_url('assets/AdminLTE/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/jquery-validation/additional-methods.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/toastr/toastr.min.js') ?>"></script>
 <script>

  $('#terpilih').addClass("active");
  

  var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });



   $('#input').click(function(event) {
        $('#inputkatalog').show('slow');
        $('#input').css('display','none');
    });
    $('#batal').click(function(event) {
        $('#inputkatalog').css('display','none');
        $('#input').css('display','block');
    });
    $('#batal2').click(function(event) {
        $('#editkatalog').css('display','none');
        $('#input').css('display','block');
    });



 // get Delete Product
    
    function deleteBuku(id) {
      $('#modalDelete').modal();
      $('#idHapus').val(id);
  
    }


    $('#btn-delete').click(function(event) {
      var id = $('#idHapus').val();
      
        $('#modalDelete').modal('hide');
        $('#preloader').css('display','block');
        //$('#list-table').html('');
        $.get("<?php echo base_url();?>"+"User/hapus_pilihan/"+id, function(data) {
          
           $('#tables-katalog').html(data);
           $("#example1").DataTable({
                          "responsive": true, "lengthChange": false, "autoWidth": false,
                          "buttons": ["copy", "csv", "excel", "pdf"]
                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
           $('#preloader').css('display','none');
          // Toast.fire({
          //     icon: 'success',
          //     title: '<b style="color:red">Sukses!! Data Pada Katalog Berhasil Dihapus!!<b>'
          //   })
          toastr.error('Data Pada Katalog Berhasil Dihapus!!')
        });
      });


   $('#btn-add-katalog').click(function(event) {
           
            
           
            var judul = $('#inputkatalog').find('#add_judul').val();
            var pengarang = $('#inputkatalog').find('#add_pengarang ').val();
            var penerbit = $('#inputkatalog').find('#add_penerbit').val();
            var tahun = $('#inputkatalog').find('#add_tahun').val();
            var harga = $('#inputkatalog').find('#add_harga').val();
            var bahasa = $('#inputkatalog').find('#add_bahasa').val();
           
            if (judul==''|| pengarang==''|| penerbit==''|| tahun==''|| harga==''|| bahasa=='') {
                $("#eror").html('Data belum lengkap !!!');
                $('#modalWarning-user').modal();
            } 

            else {
                  $('#inputkatalog').css('display','none');
                  $('#preloader').css('display','block');
                   // $('#tabel-katalog').css('display', 'none');
                   $.post( "<?php echo base_url();?>"+"Buku/tambah_katalog/", {judul: judul, pengarang:pengarang, penerbit: penerbit, tahun: tahun,harga:harga, bahasa:bahasa }, function(data) {
                        $('#form-create-katalog').trigger("reset");
                        $('#input').css('display','block');
                        
                        $('#tables-katalog').html(data);
                        
                        $("#example1").DataTable({
                          "responsive": true, "lengthChange": false, "autoWidth": false,
                          "buttons": ["copy", "csv", "excel", "pdf"]
                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                        $('#preloader').css('display','none');

                        // Toast.fire({
                        //     icon: 'success',
                        //     title: 'Data Berhasil Disimpan!!'
                        //   })
                        toastr.success('Data Katalog Baru Berhasil Disimpan!!')
                    }); 

            }

             

        });

  function detail(id) {
      

            $('#modalDetail').modal();
            $.get("<?php echo base_url();?>"+"User/detail_buku/"+id, function(detail) {
            var detail=jQuery.parseJSON(detail+"");
              $('#detail_judul').val(detail.judul);
              $('#detail_pengarang').val(detail.pengarang);
              $('#detail_penerbit').val(detail.penerbit);
              $('#detail_tgl').val(detail.tgl_input);
              $('#detail_tahun').val(detail.tahun);
              $('#detail_harga').val(detail.harga);
              $('#detail_bahasa').val(detail.bahasa);
              
            
              //console.log(lokasi.nama);
            });


    }

  function editBuku(id){
    $("#editkatalog").show('slow');
    $('#input').css('display','none');
    $('#inputkatalog').css('display','none');

     $.get("<?php echo base_url();?>"+"Buku/detail_buku/"+id, function(detail) {
            var detail=jQuery.parseJSON(detail+"");
              $('#edit_judul').val(detail.judul);
              $('#edit_pengarang').val(detail.pengarang);
              $('#edit_penerbit').val(detail.penerbit);
              $('#edit_tahun').val(detail.tahun);
              $('#edit_harga').val(detail.harga);
              $('#edit_bahasa').val(detail.bahasa);
              

            $('#btn-edit-katalog').click(function(event) {

                  var judul = $('#editkatalog').find('#edit_judul').val();
                  var pengarang = $('#editkatalog').find('#edit_pengarang ').val();
                  var penerbit = $('#editkatalog').find('#edit_penerbit').val();
                  var tahun = $('#editkatalog').find('#edit_tahun').val();
                  var harga = $('#editkatalog').find('#edit_harga').val();
                  var bahasa = $('#editkatalog').find('#edit_bahasa').val();
            
            
             if (judul==''|| pengarang==''|| penerbit==''|| tahun==''|| harga==''|| bahasa=='') {
                $("#eror").html('Data belum lengkap !!!');
                $('#modalWarning-user').modal();
                } 

             else {
                    $('#preloader').css('display','block');
                    $('#editkatalog').css('display', 'none');


                        
                       $.post("<?php echo base_url();?>"+"Buku/update_buku/", {id:id,judul: judul, pengarang:pengarang, penerbit: penerbit, tahun: tahun,harga:harga, bahasa:bahasa }, function(data, textStatus, xhr) {

                             Toast.fire({
                                icon: 'success',
                                title: 'Data Katalog Berhasil Dirubah!!'
                              })
                            
                            $('#input').css('display','block');
                        
                            $('#tables-katalog').html(data);
                            
                            $("#example1").DataTable({
                              "responsive": true, "lengthChange": false, "autoWidth": false,
                              "buttons": ["copy", "csv", "excel", "pdf"]
                            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                            $('#preloader').css('display','none');

                           
                            
                        }); 


                   }
            
            
            }); 
        });
        }
    

   

</script>