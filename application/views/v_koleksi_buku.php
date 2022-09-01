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
            <h1>Database Koleksi Buku</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <!-- /.card-header -->
               <div class="card-body overlay-wrapper">
     
                  <div id="preloader" class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Loading...</div></div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="background:  #551E1E; color: white; text-align: center;">
                    <th style="width: 4%;">No</th>
                    <th style="width: 45%;">Judul</th>
                    <th>Pengarang</th>
                    <th>tahun</th>
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
                       <td><?php echo $row->tahun; ?></td>
                       <td style=" width: 100px;text-align: center;">
                            <div class="btn-group">
                                <button onclick="detail(<?php echo $row->id_buku; ?>);" class="btn btn-primary btn-flat" type="button" data-toggle="tooltip" title="Detail"><i class="fa fa-search"></i></button>  
                                
                            </div>
                        </td>
                   
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
 
 <script>

  $('#buku').addClass("active");

  function detail(id) {
      

            $('#modalDetail').modal();
            $.get("<?php echo base_url();?>"+"Buku/detail_buku/"+id, function(detail) {
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
  

</script>