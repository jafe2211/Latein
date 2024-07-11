<div class="card">
  <!-- <img src="http://placekitten.com/286/180" alt="Vorschau"> -->
  <div class="card-body">
    <div class="card-Title"><?= $row['Title'] ?></div>
    <hr>
    <div class="card-des"><?= $row['description'] ?></div>
    <hr>
    <div class="card-data"><?= $row['Date'] ?></div>
  </div>
  <div class="card-footer">
    <!-- <a href="" class="btn btn-primary btn">Details</a> -->
    <a href="Blätter/<?= $row['FileName'] ?>" Download class="btn btn-success btn">Download</a>
  </div>
</div>