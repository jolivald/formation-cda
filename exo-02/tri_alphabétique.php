<?php
function isInAlphabeticOrder(string $a, string $b, string $c):  bool {
    return $a <= $b && $b <= $c;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Ordre alphabétique?</title>
  </head>
  <body>
    <h3>Ordre alphabétique?</h3>
    <hr/>

    <?php if (empty($_GET)): ?>

    <form method="GET" action="tri_alphabétique.php">
      <label for="name_1">
          Entrer le 1er nom: <input type="text" id="name_1" name="name_1" />
      </label>
      <br/>
      <label for="name_2">
          Entrer le 2nd nom: <input type="text" id="name_2" name="name_2" />
      </label>
      <br/>
      <label for="name_3">
          Entrer le 3ème nom: <input type="text" id="name_3" name="name_3" />
      </label>
      <br/>
      <button type="submit">Envoyer</button>
    </form>

    <?php else: ?>

      <p>Les noms sont entrés par ordre alphabétique:

          <?= isInAlphabeticOrder($_GET["name_1"], $_GET["name_2"], $_GET["name_3"]) ? "OUI" : "NON"; ?>
          
      </p>

    <?php endif; ?>

  </body>
</html>
