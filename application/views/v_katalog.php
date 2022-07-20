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
            <h1>Data Katalog</h1>
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
              <div class="card-body">
                 <button id="input" type="button" class="btn bg-gradient-success btn-lg float-right">Tambah Data </button></i></button>
                

              <div id="inputkatalog" style="display:none">
                 <form role="form" method="post" action="" id="form-create-katalog">
                     <div class="card-body ">
                        
                           <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                 <label >Judul Buku</label>
                                 <input name="add_judul" id="add_judul"  type="text" class="form-control" placeholder="Masukan Judul Buku" >
                                </div>
                                <div class="form-group">
                                 <label >Pengarang</label>
                                 <input name="add_pengarang" id="add_pengarang" type="text" class="form-control"  placeholder="Pengarang" >
                                </div> 
                                <div class="form-group">
                                 <label >Penerbit</label>
                                 <input name="add_penerbit" id="add_penerbit" type="text" class="form-control"  placeholder="Penerbit" >
                                </div>                                  
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                 <label >Tahun</label>
                                 <select name="add_tahun" id="add_tahun" class="form-control" >
                                  <option> </option>'
                                    <?php
                                      for($i=1990; $i<= date('Y'); $i+=1){
                                      echo'<option value='.$i.'> '.$i.' </option>';
                                      }
                                      ?>
                                  </select>
                                </div>
                              <div class="form-group">
                                 <label >Harga</label>
                                 <input name="add_harga" id="add_harga" type="text" class="form-control"  placeholder="Harga Buku" >
                                </div>   
                              <div class="form-group">
                                 <label >Bahasa</label>
                                 <select name="add_bahasa" id="add_bahasa" class="form-control" >
                                  <option> </option>'
                                  <option value='Indonesia'> Indonesia </option>
                                  <option value='Inggris'> Inggris </option>
                                  </select>
                                </div>                          
                              </div>
                               
                          </div> 
                      </div>

                     
                   
                <!-- /.card-body -->

                <div class="card-footer float-right">
                  <button type="button" id="batal" class="btn btn-danger">Batal</button>
                  <button type="button" id="btn-add-katalog" class="btn btn-primary">Tambah</button>
                </div>
              </form>
              </div>
                
            </div>
            </div>
            

            <div class="card" id="tables-katalog">      
              <!-- /.card-header -->
              <div class="card-body overlay-wrapper">
     
                  <div id="preloader" class="overlay" style="text-align: center;"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Loading...</div></div>

  
                <table style="text-align: justify;" id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr style="background:  #050354; color: white; text-align: center;">
                    <th style="width: 3%;">No</th>
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
                                 <button onclick="editSurat(<?php echo $row->id_buku; ?>);" class="btn btn-success btn-flat" type="button" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></button>
                                 <button onclick="deleteKatalog(<?php echo $row->id_buku; ?>);" class="btn btn-danger btn-flat" type="button" data-toggle="tooltip" title="Hapus">
                                <i class="fa fa-trash"></i></button>
                                
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

  $('#katalog').addClass("active");
  

  var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });



   $('#input').click(function(event) {
        $('#inputkatalog').css('display','block');
        $('#input').css('display','none');
    });
    $('#batal').click(function(event) {
        $('#inputkatalog').css('display','none');
        $('#input').css('display','block');
    });


  // validasi

  $(function () {
  
  $('#form-create-katalog').validate({
    rules: {
      add_harga: {
        required: true,
        digits: true
      },
      add_judul: {
        required: true,
      },
      add_pengarang: {
        required: true,
      },
      add_penerbit: {
        required: true,
      },
      add_tahun: {
        required: true,
      },
      add_bahasa: {
        required: true,
      },
    },
    messages: {
      add_harga: {
        required: "Form Masih Kosong!!",
      },
      add_judul: {
        required: "Form Masih Kosong!!",
      },
      add_pengarang: {
        required: "Form Masih Kosong!!",
      },
      add_penerbit: {
        required: "Form Masih Kosong!!",
      },
      add_tahun: {
        required: "Form Masih Kosong!!",
      },
      add_bahasa: {
        required: "Form Masih Kosong!!",
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});

 // get Delete Product
    
    function deleteKatalog(id) {
      $('#modalDelete').modal();
      $('#idHapus').val(id);
  
    }


    $('#btn-delete').click(function(event) {
      var id = $('#idHapus').val();
      
        $('#modalDelete').modal('hide');
        $('#preloader').css('display','block');
        //$('#list-table').html('');
        $.get("<?php echo base_url();?>"+"Buku/hapus_katalog/"+id, function(data) {
          
           $('#tables-katalog').html(data);
           $("#example1").DataTable({
                          "responsive": true, "lengthChange": false, "autoWidth": false,
                          "buttons": ["copy", "csv", "excel", "pdf"]
                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
           $('#preloader').css('display','none');
          Toast.fire({
              icon: 'success',
              title: '<b style="color:red">Sukses!! Data Pada Katalog Berhasil Dihapus!!<b>'
            })
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

   

</script>