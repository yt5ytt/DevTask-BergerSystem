<div id="form">
  <div class="naslov">
    <h1>Forma za upisivanje ekipa</h1>
  </div>
  <div class="forma">

    <form action="index.php" method="post">

      <div class="title">
        <h2>Unesi novu ekipu</h2>
      </div>

      <div class="input">
        <input type="text" name="team" placeholder="Upisi ekipu" required />
      </div>

      <div class="button">
        <button type="submit" name="upisiEkipu">Unesi ekipu</button>
      </div>

    </form>

  </div>

  <div class="lista">

    <div class="title">
      <h2>Lista ekipa</h2>
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
    <button><a href="index.php?page=startLeague">Start league</a></button>
  </div>

</div><!-- kraj diva #form -->
