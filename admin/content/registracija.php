<div id="glavniSadrzaj">
<form action="registrator.php" method="post" id="regforma">
<table>
  <tr>
    <td>Prezime</td>
    <td><input class="inputKontrole" name="prezime" onKeyPress="samoSlova(event, 'prezime', '40')" placeholder="prezime" type="text"></td>
  </tr>
  <tr>
    <td>Ime</td>
    <td><input class="inputKontrole" name="ime" onKeyPress="samoSlova(event, 'ime', '40')" placeholder="ime" type="text"></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input class="inputKontrole" name="email" placeholder="email" type="email"></td>
  </tr>
  <tr>
    <td>Username</td>
    <td><input class="inputKontrole" name="username" placeholder="username" type="text"></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input class="inputKontrole" name="password" placeholder="password" type="password"></td>
  </tr>
  <tr>
    <td>Ponovite password</td>
    <td><input class="inputKontrole" name="password1" placeholder="password" type="password"></td>
  </tr>
  <tr>
    <td>Adresa</td>
    <td><input class="inputKontrole" name="adresa" placeholder="adresa" type="text"></td>
  </tr>
  <tr>
    <td>Telefon</td>
    <td><input class="inputKontrole" name="telefon" onKeyPress="samoBrojevi(event, 'telefon', 13)" placeholder="telefon" type="text"></td>
  </tr>
  <tr>
    <td>Pol</td>
    <td><select class="inputKontrole" name="pol">
    		<option value="1">Muški</option>
    		<option value="2">Ženski</option>
       	</select></td>
  </tr>
  <tr>
    <td>Zanimanje</td>
    <td><input class="inputKontrole" name="zanimanje" placeholder="zanimanje" type="text"></td>
  </tr>
  <tr>
    <td>Srednja škola</td>
    <td><input class="inputKontrole" name="srednja_skola" placeholder="srednja skola" type="text"></td>
</tr>
  <tr>
    <td>Fakultet</td>
    <td><input class="inputKontrole" name="fakultet" placeholder="fakultet" type="text"></td>
  </tr>
  <tr>
    <td>Volontersko iskustvo</td>
    <td><textarea class="inputKontrole" name="volontersko_iskustvo" placeholder="volontersko iskustvo" type="text"></textarea></td>
  </tr>
  <tr>
    <td>Radno iskustvo</td>
    <td><textarea class="inputKontrole" name="radno_iskustvo" placeholder="radno iskustvo" type="text"></textarea></td>
  </tr>
  <tr>
    <td>Nagrade</td>
    <td><textarea class="inputKontrole" name="nagrade" placeholder="nagrade" type="text"></textarea></td>
  </tr>
  <tr><td>Govorni jezici:</td><td></td></tr>
  <tr><td></td><td><span id="govorniJezik"></span><br clear="all"/><div class='inputKontrole' onclick="dodajJezik()">dodaj jezik</div></td></tr>
  <tr><td></td><td><input type="submit" class="inputKontrole" value="Registruj se"></td></tr>
</table>
</form>
<br clear="all"/>
    </div>