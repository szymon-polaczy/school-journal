<?php
  session_start();
  mysqli_report(MYSQLI_REPORT_STRICT);

  if(!isset($_SESSION['zalogowany']) || !($_SESSION['uprawnienia'] == 'u')) {
    header('Location: ../wszyscy/dziennik.php');
    exit();
  }

  require_once "../../polacz.php";
  require_once "../../wg_pdo_mysql.php";
  require_once "../../adm.php";

  $pdo = new WG_PDO_Mysql($bd_uzytk, $bd_haslo, $bd_nazwa, $host);
  $adm = new Adm($pdo);

  //wyciąganie przydziałów do wyświetlania - powtórzenie jest nie widać tego na stronie ale na phpmyadmin
  $moje_id = $_SESSION['id'];
  $sql = "SELECT przydzial.id, przedmiot.nazwa AS przedmiot_nazwa, osoba.imie, osoba.nazwisko, klasa.nazwa AS klasa_nazwa, sala.nazwa AS sala_nazwa
          FROM osoba, nauczyciel, przydzial, przedmiot, klasa, uczen, sala
          WHERE przydzial.id_nauczyciel=nauczyciel.id_osoba
          AND nauczyciel.id_osoba=osoba.id
          AND nauczyciel.id_sala=sala.id
          AND przydzial.id_przedmiot=przedmiot.id
          AND przydzial.id_klasa=klasa.id
          AND uczen.id_klasa=klasa.id
          AND uczen.id_osoba='$moje_id'";

  $rezultat = $pdo->sql_table($sql);

  $_SESSION['przydzialy'] = $rezultat;
?>
<!doctype html>
<html lang="pl">
<head>
  <!--INSIDE OF HEAD INCLUDE-->
  <?php $title = "Przydziały"; include("../../../html-templates/inside-head.php"); ?>
</head>
<body class="index-body">  
  <!--HEADER INCLUDE-->
  <?php include("../../../html-templates/after-login-header.php"); ?>

  <main>
    <section>
      <h2>ZOBACZ PRZYDZIAŁY</h2>
      <?php
        if (count($_SESSION['przydzialy']) > 0)
          $adm->showDataTable($_SESSION['przydzialy']);
        else
          echo '<p>Nie ma żadnych przydziałów</p>';
      ?>
    </section>

    <a href="../wszyscy/dziennik.php"><button class="btn btn-dark">Powrót do strony głównej</button></a>
  </main>

  <!--FOOTER INCLUDE-->
  <?php include("../../../html-templates/footer.php"); ?>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
