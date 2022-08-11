          
                     <div class="card-body ">
                     <?php foreach ($curr->result() as $row): ?>   
                           <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                 <label >Total Anggaran<i style=" font-size: 13px; color: red;"> tanpa tanda titik ( contoh jika 200rb maka ditulis 200000 )</i></label>
                                 <input  id="anggaran" type="text" class="form-control" value="<?php echo $row->anggaran; ?>" disabled>
                                </div>       
                              </div>
                             
                              <div class="col-sm-6">
                                <div class="form-group">
                                 <label >Status Input Permintaan Buku</label>
                                 <input id="tahap" type="text" class="form-control"  value="<?php if ($row->tahapan==0){ echo 'Aktif';} else { echo 'Non-Aktif';} ?>" disabled >
                                </div>       
                              </div>
                          </div>
                      </div>
                      <div class="card-body ">
                          <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                 <label >Tanggal Selesai Input</label>
                                 <input id="tanggal" type="date" class="form-control"  value="<?php echo $row->tgl_selesai_input; ?>" disabled >
                                </div>       
                              </div>
                          </div>
                     <?php endforeach; ?>
                      </div> 
           
                
                
                
            

