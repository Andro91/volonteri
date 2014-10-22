<div id="glavniSadrzaj">
<form action="" method="get">
<table>
  <tr><td><h2>Naslov</h2></td></tr>
  <tr><td><input name="naslov" type="text" class="stotka"></td></tr>
  <tr><td><h2>Kratak opis</h2></td></tr>
  <tr><td><textarea name="kratakopis" class="stotka" onkeypress="ograniciUnos(event,'kratakopis','kratakOpisError','300')"></textarea></td>
  </tr>
  <tr><td><p id="kratakOpisError"></p></td></tr>
  <tr><td><h2>Opis</h2></td></tr>
  <tr><td>
  <textarea name="opis" id="opis"></textarea></td></tr>
  
  <tr><td><h2>Naslov - engleska verzija</h2></td></tr>
  <tr><td><input name="naslov_en" type="text"  class="stotka"></td></tr>
  <tr><td><h2>Kratak opis - engleska verzija</h2></td></tr>
  <tr><td><textarea name="kratakopis_en" id="kratakopis_en" class="stotka" onkeypress="ograniciUnos(event,'kratakopis_en','kratakOpisEnError','300')"></textarea></td>
  </tr>
  <tr><td><p id="kratakOpisEnError"></p></td></tr>
  <tr><td><h2>Opis - engleska verzija</h2></td></tr>
  <tr><td><textarea name="opis_en" id="opis"></textarea></td></tr>
  <script>
  CKEDITOR.replace( 'opis' );
  CKEDITOR.replace( 'opis_en' );
  </script>

  <tr><td><h2>Datum</h2></td></tr>
  <tr><td><input type="date" name="datum" class="stotka"/></td></tr>
  
  <tr><td><button type="button" onclick="submitujDodavanjeClanka()">Dodaj</button></td></tr>
  <tr><td></td></tr>
</table>

</form>
<br clear="all"/>
    </div>