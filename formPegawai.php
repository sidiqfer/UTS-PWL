<?php
require_once 'models/Pegawai.php';
$agamaList = ['islam', 'katolik', 'protestan', 'bunda', 'hindu'];
$obj = new Pegawai();
$rs = $obj->dataDivisi();
?>

<h3>Form Pegawai</h3>
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
        <input maxlength="5" id="nip" name="nip" type="text" class="form-control" required="required">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama</label>
    <div class="col-8">
      <input id="nama" name="nama" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-4">Email</label>
    <div class="col-8">
      <input id="email" name="email" type="email" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="agama" class="col-4 col-form-label">Agama</label>
    <div class="col-8">
      <?php foreach ($agamaList as $agama) { ?>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="agama" id="<?= $agama ?>" value="<?= $agama ?>">
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
          <option value="<?= $j['id'] ?>"> <?= $j['nama'] ?> </option>
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
      <button name="proses" type="submit" value="simpan" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>