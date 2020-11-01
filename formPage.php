<div id="form">
  <div class="naslov">
    <h1>Team inserting form</h1>
  </div>
  <div class="forma">

    <form action="index.php" method="post">

      <div class="title">
        <h2>Input new participant</h2>
      </div>

      <div class="input">
        <input type="text" name="team" placeholder="Upisi ekipu" required />
      </div>

      <div class="button">
        <button type="submit" name="upisiEkipu">Input participant</button>
      </div>

    </form>

  </div>

  <div class="lista">

    <div class="title">
      <h2>List of participants</h2>
    </div>

    <?php
      foreach ($get->getAllParticipans() as $participant):
    ?>
    <div class="ucesnik">
      <?php echo $participant->participant; ?>
    </div>
    <?php
      endforeach;
     ?>
  </div>

  <div class="next">
    <button onclick="startLeague()">Start league</button>
  </div>

</div><!-- kraj diva #form -->
