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
            <h1>Buku yang dipilih User</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            

            <div class="card" id="tables-katalog">      
              <!-- /.card-header -->
                <div class="card-body">  
                  <div class="row">   
                       <div class="col-sm-6">    
                        <h5>Total Anggaran           : <?php echo $anggaran;  ?></h5>
                        <h5>Total Harga Buku Terpilih: <?php echo $total_terpilih;  ?></h5>
                       </div>
                       <div class="col-sm-6">
                        <?php if ($tahapan=='0') { ?>
                            <button id="proses" type="button" class="btn bg-gradient-danger btn float-right">Lakukan Seleksi Duplikasi </button> 
                        <?php } else  {?>
                            <button type="button" class="btn bg-gradient-danger btn float-right disabled" title="Proses Cek Duplikasi Sudah Dilakukan">Lakukan Seleksi Duplikasi </button> 
                        <?php }  ?>
                       </div>
                   </div>
                </div>

              <div class="card-body overlay-wrapper">
     
                  <div id="preloader" class="overlay" style="text-align: center;"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Loading...</div></div>

  
                <table style="text-align: justify; font-size: 14;" id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="background:  #050354; color: white; text-align: center;">
                    <th style="width: 3%;">No</th>
                    <th style="width: 40%;">Judul</th>
                    <th>Pengarang</th>
                    <th>Bahasa</th>
                    <th>tahun</th>
                    <th>jumlah</th>
                    <th>Pemilih</th>
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
                       <td><?php echo $row->unit; ?></td>
                   
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  
                </table>
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

  


  <!-- modal konfirmasi hapus -->
      <div id="modalProses" class="modal overlay-wrapper" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div id="preloader2" class="overlay" style="text-align: center;"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Data Sedang Diproses....</div></div>
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               
               <div class="modal-body">
                   <b>Perhatian!!</b> <br>
                    Setelah Anda Klik proses, user tidak akan bisa melakukan input permintaan buku.
               </div> 
                
               <div class="modal-footer">
                  <div class="btn-group">
                     <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
                     <button id="btn-proses" type="button" class="btn btn-success btn-flat">Proses</button>
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

  $('#terpilih_user').addClass("active");
  $('#dropdown').css('display','block');
  

  var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });



   $('#proses').click(function(event) {
        $('#modalProses').modal('show');
    });
    // $('#batal').click(function(event) {
    //     $('#inputkatalog').css('display','none');
    //     $('#input').css('display','block');
    // });
    // $('#batal2').click(function(event) {
    //     $('#editkatalog').css('display','none');
    //     $('#input').css('display','block');
    // });




    $('#btn-proses').click(function(event) {
            
        
        $('#preloader2').css('display','block');
        $.get("<?php echo base_url();?>"+"Buku/proses_cek_dupliat/", function(data) {
          //  $('#tables-katalog').html(data);
          //  $("#example1").DataTable({
          //                 "responsive": true, "lengthChange": false, "autoWidth": false,
          //                 "buttons": ["copy", "csv", "excel", "pdf"]
          //               }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          //  
          // // Toast.fire({
          // //     icon: 'success',
          // //     title: '<b style="color:red">Sukses!! Data Pada Katalog Berhasil Dihapus!!<b>'
          // //   })
          $('#preloader').css('display','none');
          toastr.success('Data Berhasil Diproses!!')
          window.location.href = "<?php echo site_url('Buku/pilihan_user'); ?>";
        });
      });


  


   

</script>