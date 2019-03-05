<?php
  session_start();
  mysqli_report(MYSQLI_REPORT_STRICT);

  if(!isset($_GET['wyb_przydzial'])) {
    header('Location: wybierz_przydzial.php');
    exit();
  }

  $_SESSION['wyb_przydzial'] = $_GET['wyb_przydzial'];
  $wyb_przydzial = $_SESSION['wyb_przydzial'];

  require_once "../../polacz.php";
  require_once "../../wg_pdo_mysql.php";

  $pdo = new WG_PDO_Mysql($bd_uzytk, $bd_haslo, $bd_nazwa, $host);

  //pobieranie uczniów do wyświetlenia w selecie przy dodawaniu ocen
  $sql = "SELECT osoba.imie, osoba.nazwisko, osoba.id FROM osoba, uczen, przydzial
                  WHERE osoba.uprawnienia='u' AND uczen.id_osoba=osoba.id
                  AND przydzial.id_klasa=uczen.id_klasa AND przydzial.id='$wyb_przydzial'";

  $rezultat = $pdo->sql_table($sql);

  $_SESSION['ilosc_uczniow'] = count($rezultat);

  for ($i = 0; $i < $_SESSION['ilosc_uczniow']; $i++)
    $_SESSION['uczen'.$i] = $rezultat[$i];

  //pobieranie ocen do wyświetlania w tabelce
  $sql = "SELECT ocena.*, osoba.imie, osoba.nazwisko FROM ocena, uczen, osoba
          WHERE ocena.id_uczen=uczen.id_osoba AND uczen.id_osoba=osoba.id AND ocena.id_przydzial='$wyb_przydzial'";

  $rezultat = $pdo->sql_table($sql);

  $_SESSION['ilosc_ocen'] = count($rezultat);

  for ($i = 0; $i < $_SESSION['ilosc_ocen']; $i++)
    $_SESSION['ocena'.$i] = $rezultat[$i];
?>

<!doctype html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

  <title>BDG DZIENNIK - Zobacz, Dodaj, Usuń, Edytuj Oceny</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="Szymon Polaczy">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js" type="text/javascript"></script>
  <script src="../../../js/script.js"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="../../../css/style.css">
</head>
<body>
  <!--HEADER INCLUDE-->
  <?php include("../../../html-templates/after-login-header.php"); ?>

  <main>
    <section>
      <div class="container p-0">
        <p>
          <button class="dodawanie-collapse-btn btn btn-dark" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Dodaj ocenę
          </button>
        </p>
        <div class="collapse" id="collapseExample">
          <form method="post" action="zadania/dodawanie_ocen.php">
            <?php
              if ($_SESSION['ilosc_uczniow'] == 0) {
                echo 'Nie ma żadnych uczniów, którym mógłbyś dodać ocenę';
              } else {
                echo '<div class="form-group">';
                  echo '<select name="wyb_uczen" class="form-control">';

                    for ($i = 0; $i < $_SESSION['ilosc_uczniow']; $i++)
                      echo '<option value="'.$_SESSION['uczen'.$i]['id'].'">'.$_SESSION['uczen'.$i]['imie'].' '.$_SESSION['uczen'.$i]['nazwisko'].'</option>';

                  echo '</select>';
                echo '</div>';

                echo '<div class="form-group">';
                  $oceny = ['6', '6-', '5+', '5', '5-', '4+', '4', '4-', '3+', '3', '3-', '2+', '2', '2-', '1+', '1', '0'];

                  echo '<select name="wyb_wartosc" class="form-control">';

                    for ($i = 0; $i < count($oceny); $i++)
                      echo '<option value="'.$oceny[$i].'">'.$oceny[$i].'</option>';

                  echo '</select>';
                echo '</div>';

                echo '<div class="form-grou form-inf">';
                  echo '<button type="submit" class="btn btn-dark">Dodaj ocenę</button>';
                  echo '<input type="hidden" name="wyb_przydzial" value="'.$_SESSION['wyb_przydzial'].'">';

                  if (isset($_SESSION['dodawanie_ocen'])) {
                    echo '<p style="color: red">'.$_SESSION['dodawanie_ocen'].'</p>';
                    unset($_SESSION['dodawanie_ocen']);
                  }
                echo '</div>';
              }
            ?>
          </form>
        </div>
      </div>
    </section>
    <section>
      <h2>ZOBACZ OCENY</h2>
      <?php
        if (isset($_SESSION['edytowanie_ocen'])) {
          echo '<p style="color: red">'.$_SESSION['edytowanie_ocen'].'</p>';
          unset($_SESSION['edytowanie_ocen']);
        }

        if (isset($_SESSION['usuwanie_ocen'])) {
          echo '<p style="color: red">'.$_SESSION['usuwanie_ocen'].'</p>';
          unset($_SESSION['usuwanie_ocen']);
        }

        if ($_SESSION['ilosc_ocen'] == 0) {
          echo '<p>Nie ma żadnych ocen do wyświetlania</p>';
        } else {
          echo '<table class="table">';
          echo '<thead class="thead-dark">';
            echo '<tr>';
              echo '<th class="tabela-liczby">#</th>';
              echo '<th class="tabela-tekst">IMIE UCZNIA</th>';
              echo '<th class="tabela-tekst">NAZWISKO UCZNIA</th>';
              echo '<th class="tabela-liczby">DATA I GODZINA</th>';
              echo '<th class="tabela-liczby">WARTOŚĆ</th>';
              echo '<th class="tabela-zadania">EDYTOWANIE</th>';
              echo '<th class="tabela-zadania">USUWANIE</th>';
            echo '</tr>';
          echo '</thead>';

          echo '<tbody>';

          for ($i = 0; $i < $_SESSION['ilosc_ocen']; $i++){
            echo '<tr>';
              echo '<td class="tabela-liczby">'.$i.'</td>';
              echo '<td class="tabela-tekst">'.$_SESSION['ocena'.$i]['imie'].'</td>';
              echo '<td class="tabela-tekst">'.$_SESSION['ocena'.$i]['nazwisko'].'</td>';
              echo '<td class="tabela-liczby">'.$_SESSION['ocena'.$i]['data'].'</td>';
              echo '<td class="tabela-liczby">'.$_SESSION['ocena'.$i]['wartosc'].'</td>';
              echo '<td class="tabela-zadania"><a href="edytowanie_ocen.php?wyb_ocena='.$_SESSION['ocena'.$i]['id'].'&wyb_przydzial='.$_SESSION['wyb_przydzial'].'">Edytuj</a></td>';
              echo '<td class="td-task"><a onclick="javascript:(confirm(\'Czy jesteś tego pewny?\')? window.location=\'zadania/usuwanie_ocen.php?wyb_ocena='.$_SESSION['ocena'.$i]['id'].'&wyb_przydzial='.$_SESSION['wyb_przydzial'].'\':\'\')" href="#">Usuń</a></td>';
            echo '</tr>';
          }

          echo '</tbody>';
          echo '</table>';
        }
      ?>
    </section>

    <a href="../wszyscy/dziennik.php"><button class="btn btn-dark">Powrót do strony głównej</button></a>
  </main>

  <footer class="fixed-bottom bg-dark glowna-stopka">
    <h6>Autor: Szymon Polaczy</h6>
  </footer>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
