
<?php
require('v_header.php');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $database; ?></h3>

                <p>Buku Tercatat di Database</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
              <a href="<?php echo base_url('Buku') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $katalog; ?></h3>

                <p>Data Katalog</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url('Buku/katalog') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $pengguna; ?></h3>

                <p>Pengguna</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $buku_terpilih; ?></h3>

                <p>Permintaan Buku</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo base_url('Buku/pilihan_user') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        </div>
          <!-- ./col -->
        <!-- /.row -->
        <div class="row">
          <div class="col-12" id="data-dashboard">
                          <?php
                require('v_dashboard_data.php');
                ?>
           </div>
              <!-- /.card-body -->
                  <div class="card-body ">
                    <div class="row">
                      <div class="col-sm-12">
                      <button type="button" id="btn-edit" class="btn btn-primary float-right">Edit Data</button>
                    </div>
                   </div>
               </div>   
         
        </div>
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<div id="modalEdit" class="modal " tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               
               <div class="modal-body">
                    <form role="form" method="post" action="">
                     <div class="card-body ">
                     <?php foreach ($curr->result() as $row): ?>   
                           <div class="row">
                            <div class="col-sm-12">
                             
                              <div class="form-group">
                                 <label >Total Anggaran<i style=" font-size: 13px; color: red;"> tanpa tanda titik ( contoh jika 200rb maka ditulis 200000 )</i></label>
                                 <input  id="edit-anggaran"  type="text" class="form-control" > 
                              </div>
                              <div class="form-group">
                                 <label >Status Input Permintaan Buku</label>
                                 <select id="edit-tahap" class="form-control"  >
                                  
                                   <option value='0'> Aktif </option>
                                   <option value='1'> Non-Aktif </option>
                                  </select>
                      
                              </div>
                               <div class="form-group">
                                 <label >Tanggal Selesai Input</label>
                                 <input  id="edit-tanggal" type="date" class="form-control"   >
                                </div>  
                             
                          </div>
                        </div>
                      </div>
                      
                  <?php endforeach; ?>
              </form>
               </div> 
               <div class="modal-footer">
                  <div class="btn-group">
                     <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Tidak</button>
                     <button id="btn-simpan" type="button" class="btn btn-danger btn-flat">Simpan</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
    

<script src="<?php echo base_url('assets/AdminLTE/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE/plugins/toastr/toastr.min.js') ?>"></script>

<?php
require('v_footer.php');
?>
<script type="text/javascript">
  $('#dashboard').addClass("active");


  var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

 $('#btn-edit').click(function(event) {
      $('#modalEdit').modal();

      var anggaran = $('#anggaran').val();
     var tahapan = $('#tahap').val();
     if (tahapan=='Aktif') {
        tahap= 0;
       }
     else{
        tahap= 1;
       }
     var tanggal = $('#tanggal').val();

      $('#edit-anggaran').val(anggaran);
      $('#edit-tahap').val(tahap);
      $('#edit-tanggal').val(tanggal);
      
  
    }); 

  $('#btn-simpan').click(function(event) {

     var anggaran = $('#edit-anggaran').val();
     var tahap = $('#edit-tahap').val();
     var tanggal = $('#edit-tanggal').val();
            
            
             if (anggaran==''||anggaran<=0||tahap==''||tanggal=='') {
                Toast.fire({
                                icon: 'error',
                                title: 'Form tidak boleh kosong!!'
                              })
                } 

             else {   
                       $.post("<?php echo base_url();?>"+"Dashboard/update/", {anggaran:anggaran, tahap:tahap, tanggal:tanggal }, function(data) {
                            $('#data-dashboard').html(data);    
                            $('#modalEdit').modal('hide');
                             Toast.fire({
                                icon: 'success',
                                title: 'Data Katalog Berhasil Dirubah!!'
                              })        
                                                
                        }); 
                   }
            
            
            }); 
</script>
 