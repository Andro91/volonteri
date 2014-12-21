<?php
require_once"php/konfiguracija.php";
if(!$con = new mysqli(HOST,USER,PASSWORD,DATABASE))die("GRESKA!");
if(!$upit = $con->query("select * from volonter where id='".$_SESSION['userid']."'"))die("GRESKA!");
if(!$zapisi = $upit->fetch_object())die("GRESKA!");
?>
<div id="glavniSadrzaj" class="col-md-8">
<!--GLAVNI SADRZAJ POCETAK-->

<div class="col-sm-12" style="height:200px">
<!--OSNOVNI PODACI POCETAK-->
    <div class="col-sm-4" style="height:100%">
        <img src="slike/profilne/<?php echo $zapisi->fotografija?>" style="height:100%;width:90%"/>
    </div>
    <div class="col-sm-8">
    	<a href="?str=edit-profil" class="col-sm-3 btn btn-primary">Izmeni profil</a>
        <a href="#" onclick="prikazi('profilDetalji','block')" class="col-sm-3 btn btn-info" style="margin-left:2px">Detaljnije</a>
        <span class="col-sm-12"></span>
        
        <div><span class="col-sm-3 text-right">Prezime</span><span class="col-sm-9"><?php echo $zapisi->prezime ?></span></div>
        <div><span class="col-sm-3 text-right">Ime</span><span class="col-sm-9"><?php echo $zapisi->ime ?></span></div>
        <div><span class="col-sm-3 text-right">Email</span><span class="col-sm-9"><?php echo $zapisi->email ?></span></div>
        <div><span class="col-sm-3 text-right">Username</span><span class="col-sm-9"><?php echo $zapisi->username ?></span></div>
    </div>
<!--OSNOVNI PODACI KRAJ-->    
</div>

<div id="profilDetalji" class="col-sm-12">
<!--PROFIL DETALJI POCETAK-->
<div class="col-sm-4"></div>
<div class="col-sm-8">
    <div class="col-sm-12"><span class="col-sm-3 text-right">Password</span><span class="col-sm-9"><?php echo"*********"?></span></div>
    <?php
    if($zapisi->adresa)echo'<div class="col-sm-12"><span class="col-sm-3 text-right">Adresa</span><span class="col-sm-9">'.$zapisi->adresa.'</span></div>';
    if($zapisi->telefon)echo'<div class="col-sm-12"><span class="col-sm-3 text-right">Telefon</span><span class="col-sm-9">'.$zapisi->telefon.'</span></div>';
    if($zapisi->pol)echo'<div class="col-sm-12"><span class="col-sm-3 text-right">Pol</span><span class="col-sm-9">'.($zapisi->pol==1?"Muški":"Ženski").'</span></div>';
    if($zapisi->zanimanje)echo'<div class="col-sm-12"><span class="col-sm-3 text-right">Zanimanje</span><span class="col-sm-9">'.$zapisi->zanimanje.'</span></div>';
    if($zapisi->srednja_skola)echo'<div class="col-sm-12"><span class="col-sm-3 text-right">Srednja škola</span><span class="col-sm-9">'.$zapisi->srednja_skola.'</span></div>';
    if($zapisi->fakultet)echo'<div class="col-sm-12"><span class="col-sm-3 text-right">Fakultet</span><span class="col-sm-9">'.$zapisi->fakultet.'</span></div>';
    if($zapisi->volontersko_iskustvo)echo'<div class="col-sm-12"><span class="col-sm-3 text-right">Volontersko iskustvo</span><span class="col-sm-9">'.$zapisi->volontersko_iskustvo.'</span></div>';
    if($zapisi->radno_iskustvo)echo'<div class="col-sm-12"><span class="col-sm-3 text-right">Radno iskustvo</span><span class="col-sm-9">'.$zapisi->radno_iskustvo.'</span></div>';
    if($zapisi->nagrade)echo'<div class="col-sm-12"><span class="col-sm-3 text-right">Nagrade</span><span class="col-sm-9">'.$zapisi->nagrade.'</span></div>';
    if($zapisi->adresa)echo'<div class="col-sm-12"><span class="col-sm-3 text-right">Adresa</span><span class="col-sm-9">'.$zapisi->adresa.'</span></div>';
    if($zapisi->adresa)echo'<div class="col-sm-12"><span class="col-sm-3 text-right">Adresa</span><span class="col-sm-9">'.$zapisi->adresa.'</span></div>';
    if($zapisi->adresa)echo'<div class="col-sm-12"><span class="col-sm-3 text-right">Adresa</span><span class="col-sm-9">'.$zapisi->adresa.'</span></div>';
	?>
</div>
<!--PROFIL DETALJI KRAJ-->
</div>

<!--GLAVNI SADRZAJ KRAJ-->
</div>
<?php $con->close()?>