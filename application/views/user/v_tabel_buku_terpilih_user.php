<!-- /.card-header -->
            <div class="card-body">     
            <h5>Total Anggaran           : <?php echo $anggaran;  ?></h5>
            <h5>Total Harga Buku Terpilih: <?php echo $total_terpilih;  ?></h5>
           </div> 
              <div class="card-body overlay-wrapper">
     
                  <div id="preloader" class="overlay" style="text-align: center;"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Loading...</div></div>

  
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
                                 <button onclick="deleteBuku(<?php echo $row->id_pilih; ?>);" class="btn btn-danger btn-flat" type="button" data-toggle="tooltip" title="Hapus">
                                <i class="fa fa-trash"></i></button>
                                
                            </div>
                        </td>
                   
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  
                </table>
              </div>