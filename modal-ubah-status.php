<div class="modal fade" id="ubahstatus"-<?php echo $dataPeserta['id']?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apa Anda Ingin Mengubah <?php echo $dataPeserta['name']?>?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="#" method="post">
                    <input type="hidden" name="id" value="<?php echo $dataPeserta['id'];?>"  >
                <div class="modal-body" >
                    <div class="mb-3">
                        <label for="">Ubah Status</label>
                        <select name="status" id="" class="form-control">
                            <option value="">Pilih Status</option>
                            <option value="1">Lolos Sortir</option>
                            <option value="2">Lolos Wawancara</option>
                            <option value="3">Lolos Seleksi</option>
                            <option value="0">Tidak Lolos</option>
                        </select>
                    </div>
                </div>
                
                
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" href="logout.php" name="ubah_status" type="submit">Ubah Status</button>
                </div>
                </form>
            </div>
        </div>
    </div>