<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: http://localhost:8000/index.php?page=loginForm");
  exit();
}
$services = $db->query("SELECT * FROM service")->fetchAll();
$jadwals = $db->query("SELECT * FROM jadwal")->fetchAll();
?>

<form action="" method="post">
  <fieldset>
    <legend>Pilih Layanan</legend>
    <?php foreach ($services as $service) : ?>
      <div>
        <input
          type="checkbox"
          name="services[]"
          id="service_<?= $service['id'] ?>"
          value="<?= $service['id'] ?>">
        <label for="service_<?= $service['id'] ?>"><?= htmlspecialchars($service['nama']) ?></label>
      </div>
    <?php endforeach; ?>
  </fieldset>

  <fieldset>
    <legend>Pilih Tanggal</legend>
    <input type="date" name="tanggal" id="tanggal" required>
  </fieldset>

  <fieldset>
    <legend>Pilih Waktu</legend>
    <?php foreach ($jadwals as $jadwal) : ?>
      <div>
        <input
          type="radio"
          name="waktu"
          id="jadwal_<?= $jadwal['id'] ?>"
          value="<?= $jadwal['id'] ?>"
          required>
        <label for="jadwal_<?= $jadwal['id'] ?>"><?= htmlspecialchars($jadwal['mulai']) ?></label>
      </div>
    <?php endforeach; ?>
  </fieldset>

  <fieldset>
    <legend>Catatan</legend>
    <textarea name="catatan" id="catatan" cols="30" rows="4"></textarea>
  </fieldset>

  <button type="submit">Submit</button>
</form>