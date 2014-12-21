<?php
require_once"php/konfiguracija.php";
$con = new mysqli(HOST,USER,PASSWORD,DATABASE);
$upit = $con->query("select * from volonter where id='".$_SESSION['userid']."'");
$zapisi = $upit->fetch_object();
?>
<div id="glavniSadrzaj" class="col-md-8">
<form action="php/registrator.php" method="post" id="regforma" name="regforma">
<table>
  <tr>
    <td>Prezime</td>
    <td><input class="inputKontrole" name="prezime" onKeyPress="samoSlova(event, 'prezime', '40')" placeholder="prezime" type="text" value="<?php echo $zapisi->prezime ?>"></td>
  </tr>
  <tr>
    <td>Ime</td>
    <td><input class="inputKontrole" name="ime" onKeyPress="samoSlova(event, 'ime', '40')" placeholder="ime" type="text" value="<?php echo $zapisi->ime ?>"></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input class="inputKontrole" name="email" placeholder="email" type="email" value="<?php echo $zapisi->email ?>"></td>
  </tr>
  <tr>
    <td>Username</td>
    <td><input class="inputKontrole" name="username" placeholder="username" type="text" value="<?php echo $zapisi->username ?>"></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input class="inputKontrole" name="password" placeholder="password" type="password" value="<?php echo $zapisi->password ?>"></td>
  </tr>
  <tr>
    <td>Ponovite password</td>
    <td><input class="inputKontrole" name="password1" placeholder="password" type="password" value="<?php echo $zapisi->password ?>"></td>
  </tr>
  <tr>
    <td>Adresa</td>
    <td><input class="inputKontrole" name="adresa" placeholder="adresa" type="text" value="<?php echo $zapisi->adresa ?>"></td>
  </tr>
  <tr>
    <td>Telefon</td>
    <td><input class="inputKontrole" name="telefon" onKeyPress="samoBrojevi(event, 'telefon', 13)" placeholder="telefon" type="text" value="<?php echo $zapisi->telefon ?>"></td>
  </tr>
  <tr>
    <td>Pol</td>
    <td><select class="inputKontrole" name="pol">
    		<option value="1" <?php if($zapisi->pol==1)echo" checked='checked' "?>>Muški</option>
    		<option value="2" <?php if($zapisi->pol==2)echo" checked='checked' "?>>Ženski</option>
       	</select></td>
  </tr>
  <tr>
    <td>Zanimanje</td>
    <td><input class="inputKontrole" name="zanimanje" placeholder="zanimanje" type="text" value="<?php echo $zapisi->zanimanje ?>"></td>
  </tr>
  <tr>
    <td>Srednja škola</td>
    <td><input class="inputKontrole" name="srednja_skola" placeholder="srednja skola" type="text" value="<?php echo $zapisi->srednja_skola ?>"></td>
</tr>
  <tr>
    <td>Fakultet</td>
    <td><input class="inputKontrole" name="fakultet" placeholder="fakultet" type="text" value="<?php echo $zapisi->fakultet ?>"></td>
  </tr>
  <tr>
    <td>Volontersko iskustvo</td>
    <td><textarea class="inputKontrole" name="volontersko_iskustvo" placeholder="volontersko iskustvo" type="text" ><?php echo $zapisi->volontersko_iskustvo ?></textarea></td>
  </tr>
  <tr>
    <td>Radno iskustvo</td>
    <td><textarea class="inputKontrole" name="radno_iskustvo" placeholder="radno iskustvo" type="text"><?php echo $zapisi->radno_iskustvo ?></textarea></td>
  </tr>
  <tr>
    <td>Nagrade</td>
    <td><textarea class="inputKontrole" name="nagrade" placeholder="nagrade" type="text"><?php echo $zapisi->nagrade ?></textarea></td>
  </tr>
  <tr><td>Govorni jezici:</td><td></td></tr>
  <tr><td></td><td><span id="govorniJezik"></span><br clear="all"/><div class='inputKontrole inputKontroleDgme' onclick="dodajJezik()">dodaj jezik</div></td></tr>
  <tr><td></td><td><div class="inputKontrole inputKontroleDgme" onclick="submitForm('regforma')">Registruj se</div></td></tr>
</table>
</form>
<br clear="all"/>
</div>
<?php $con->close()?>