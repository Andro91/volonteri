<?php
require_once"php/konfiguracija.php";
if(!$con = new mysqli(HOST,USER,PASSWORD,DATABASE))die("GRESKA!");
if(!$upit = $con->query("select * from volonter where id='".$_SESSION['userid']."'"))die("GRESKA!");
if(!$zapisi = $upit->fetch_object())die("GRESKA!");
?>
<div id="glavniSadrzaj">
<!--GLAVNI SADRZAJ POCETAK-->

<div class="col-sm-12" style="height:200px">
<!--OSNOVNI PODACI POCETAK-->
    <div class="col-sm-4" style="height:100%">
        <img src="slike/profilne/<?php echo $zapisi->slika?>" style="height:100%;width:90%"/>
    </div>
    <div class="col-sm-8">
    	<a href="?str=edit-profil" class="col-sm-3 btn btn-primary">Izmeni profil</a>
        <a href="#profilDetalji" onclick="prikazi('profilDetalji','block')" class="col-sm-3 btn btn-info" style="margin-left:2px">Detaljnije</a>
        <span class="col-sm-12"></span>
        
        <div><span class="col-sm-3 text-right">Prezime</span><span class="col-sm-9"><?php echo $zapisi->prezime ?></span></div>
        <div><span class="col-sm-3 text-right">Ime</span><span class="col-sm-9"><?php echo $zapisi->ime ?></span></div>
        <div><span class="col-sm-3 text-right">Email</span><span class="col-sm-9"><?php echo $zapisi->email ?></span></div>
        <div><span class="col-sm-3 text-right">Username</span><span class="col-sm-9"><?php echo $zapisi->username ?></span></div>
    </div>
<!--OSNOVNI PODACI KRAJ-->    
</div><br clear="all" />

<div id="profilDetalji" class="col-sm-12">
<!--PROFIL DETALJI POCETAK-->
    <div><span class="col-sm-3 text-right">Password</span><span class="col-sm-9"><?php $p="";str_pad($p,strlen($zapisi->password),"*");echo $p?></span></div>
    <?php
    if($zapisi->adresa)echo'<div><span class="col-sm-3 text-right">Adresa</span><span class="col-sm-9">'.$zapisi->adresa.'</span></div>';
    if($zapisi->telefon)echo'<div><span class="col-sm-3 text-right">Telefon</span><span class="col-sm-9">'.$zapisi->telefon.'</span></div>';
    if($zapisi->pol)echo'<div><span class="col-sm-3 text-right">Pol</span><span class="col-sm-9">'.($zapisi->pol==1?"Muški":"Ženski").'</span></div>';
    if($zapisi->zanimanje)echo'<div><span class="col-sm-3 text-right">Zanimanje</span><span class="col-sm-9">'.$zapisi->zanimanje.'</span></div>';
    if($zapisi->srednja_skola)echo'<div><span class="col-sm-3 text-right">Srednja škola</span><span class="col-sm-9">'.$zapisi->srednja_skola.'</span></div>';
    if($zapisi->fakultet)echo'<div><span class="col-sm-3 text-right">Fakultet</span><span class="col-sm-9">'.$zapisi->fakultet.'</span></div>';
    if($zapisi->volontersko_iskustvo)echo'<div><span class="col-sm-3 text-right">Volontersko iskustvo</span><span class="col-sm-9">'.$zapisi->volontersko_iskustvo.'</span></div>';
    if($zapisi->radno_iskustvo)echo'<div><span class="col-sm-3 text-right">Radno iskustvo</span><span class="col-sm-9">'.$zapisi->radno_iskustvo.'</span></div>';
    if($zapisi->nagrade)echo'<div><span class="col-sm-3 text-right">Nagrade</span><span class="col-sm-9">'.$zapisi->nagrade.'</span></div>';
    if($zapisi->adresa)echo'<div><span class="col-sm-3 text-right">Adresa</span><span class="col-sm-9">'.$zapisi->adresa.'</span></div>';
    if($zapisi->adresa)echo'<div><span class="col-sm-3 text-right">Adresa</span><span class="col-sm-9">'.$zapisi->adresa.'</span></div>';
    if($zapisi->adresa)echo'<div><span class="col-sm-3 text-right">Adresa</span><span class="col-sm-9">'.$zapisi->adresa.'</span></div>';
	?>
<!--PROFIL DETALJI KRAJ-->
</div>

<!--GLAVNI SADRZAJ KRAJ-->
</div>
<?php $con->close()?>