<div class="col-md-9">
  <?php
    if (!empty($_REQUEST['hal'])) {
      $hal = $_REQUEST['hal'];
      include_once $hal . '.php';
    } else {
      include_once 'home.php';
    }
  ?>
</div>