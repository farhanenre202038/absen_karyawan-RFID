<?php if (isset($_GET['simpan'])) {
  echo '<div class="alert alert-success" role="alert">
  <b>BERHASIL !!</b> DATA BERHASIL DI INPUT
  <button type="button" class="close close-input" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

</div>';
} ?>
<?php if (isset($_GET['gagal'])) {
  echo '<div class="alert alert-danger" role="alert">
  <b>GAGAL !!</b> Ada Kesalahan Saat Data Di input
  <button type="button" class="close close-input" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

</div>';
} ?>
<?php if (isset($_GET['masuk'])) {
  echo '<div class="alert alert-success" role="alert">
  Login Berhasil
   <button type="button" class="close close-input" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
} ?>
<?php if (isset($_GET['gagal_masuk'])) {
  echo '<div class="alert alert-danger" role="alert">
  Username Dan Password Anda Salah
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
} ?>
<script>
  setTimeout(function() {
    $(".close-input").click();
  }, 3000);
</script>