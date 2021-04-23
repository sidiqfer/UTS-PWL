<?php
require_once 'models/Pegawai.php';
$agamaList = ['islam', 'katolik', 'protestan', 'bunda', 'hindu'];
$obj = new Pegawai();
$rs = $obj->dataDivisi();
//tangkap request id di url
$id = $_REQUEST['id'];
$data_edit = $obj->getPegawai($id);
?>

<h3>Form Produk</h3>
<form method="POST" action="controllers/pegawaiController.php">
  <div class="form-group row">
    <label for="nip" class="col-4 col-form-label">NIP</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card"></i>
          </div>
        </div> 
        <input id="nip" maxlength="5" name="nip" value="<?= $data_edit['nip'] ?>" type="text" class="form-control" required="required">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama</label> 
    <div class="col-8">
      <input id="nama" name="nama" value="<?= $data_edit['nama'] ?>" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-4">Email</label>
    <div class="col-8">
      <input id="email" name="email" value="<?= $data_edit['email'] ?>" type="email" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="agama" class="col-4 col-form-label">Agama</label>
    <div class="col-8">
      <?php foreach ($agamaList as $agama) { ?>
        <div class="form-check">
          <input <?= $data_edit['agama'] == $agama ? "checked" : ""; ?> class="form-check-input" type="radio" name="agama" id="<?= $agama ?>" value="<?= $agama ?>">
          <label class="form-check-label" for="<?= $agama ?>">
            <?= $agama ?>
          </label>
        </div>
      <?php } ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="stok" class="col-4 col-form-label">Divisi</label>
    <div class="col-8">
    
    <select id="divisi" name="divisi" class="custom-select" required="required">
        <option value="">-- Pilih Divisi --</option>
        <?php
        foreach ($rs as $j) {
        ?>
          <option <?= $data_edit['divisi'] == $j['nama'] ? "selected" : ""; ?> value="<?= $j['id'] ?>"> <?= $j['nama'] ?> </option>
        <?php } ?>
      </select>
      
    </div>
  </div>
  <div class="form-group row">
    <label for="foto" class="col-4 col-form-label">Foto</label>
    <div class="col-8">
      <input id="foto" name="foto" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="proses" type="submit" value="ubah" class="btn btn-primary">Ubah</button>
      <input type="hidden" name="idx" value="<?= $id ?>" />
    </div>
  </div>
</form>