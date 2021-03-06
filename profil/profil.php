<?php 
    session_start();
   if(!empty($_SESSION["id"]) || !empty($_SESSION["type_client"] )){
      if(empty($_GET["id"]) || empty($_GET["client"])){
         $id = $_SESSION["id"];
         $type_client = $_SESSION["type_client"] ;

         header("location:?id=$id&client=$type_client");
         exit();
      }else{
         require_once("../bd/bd.php");
         if($_GET["client"] == "physique"){
            $sql = "SELECT * FROM sbrhtb004 WHERE id_client_physique =:id";
            $query = $bd->prepare($sql);
           $query->execute(
               array(
                  'id' =>$_SESSION["id"]
               )
            );
            $resultat = $query->fetch(); 
            echo "blelff";
            print_r($resultat);
         }else if($_GET["client"] == "morale"){
            $sql = "SELECT * FROM sbrhtb005 WHERE id =:id";
            $query = $bd->prepare($sql);
            $query->execute(
               array(
                  'id' =>$_SESSION["id"]
               )
            );
            $resultat = $query->fetch();
            
         }
         
      }

   }else{
      header("location:../index.php");
      exit();
   }
 ?>
<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Profil de <?php echo $resultat[3]." ".$resultat[4]; ?>| Banque Ivoire En Ligne</title>
<meta name="description" content="" Demandez="" un="" compte="" bancaire="" en="" ligne="" auprès="" de="" la="" banque="" Santander="" et="" profitez="" des="" options="" de="" compte="" en="" ligne="" pratiques="" de="" lune="" des="" meilleures="" banques="" personnelles."lang=" fr-FR" "="">
<meta name="keywords" content="online bank(s), personal banking, bank account(s), best personal banks, apply for bank account online,banque (s) en ligne, banque personnelle, compte (s) bancaire (s), meilleures banques personnelles, demande de compte bancaire en ligne " lang=" fr-FR">
<meta name="author" content="CCS - Computer Consulting Services">
<meta name="generator" content="CCS - Computer Consulting Services">
<link href="../logo.ico" rel="shortcut icon" type="image/x-icon">
<link href="../logo.png" rel="apple-touch-icon" sizes="500x380">
<link href="../css/font-awesome.min.css" rel="stylesheet">
<link href="../css/BIO_V1.css" rel="stylesheet">
<link href="../css/profil.css" rel="stylesheet">
<script src="../java-script/jquery-1.12.4.min.js"></script>
<script>   
   $(document).ready(function()
   {
      $("#Nav .navbar a").hover(function()
      {
         if ($(this).hasClass('active'))
            return;
         $(this).children("span").stop().fadeTo(500, 0);
      }, function()
      {
         $(this).children("span").stop().fadeTo(500, 1);
      })
   });
</script>
</head>
<body>
   <div id="container">
      <div id="wb_jcrum">
         <ul id="jcrum">
            <li><a href="./../index.php" title="xx"><i class="fa fa-home">&nbsp;</i>Acceuil</a></li>
            <li class="active"><i class="fa fa-university">&nbsp;</i>Profil</li>
         </ul>
      </div>
      <form name="Layer1" method="post" action="" enctype="text/plain" id="divprinc">
         <label for="" id="bienvenu_">Bienvenue dans le menu de gestion de votre compte</label>
         <a id="btndeconn" style="text-decoration:none;color:#fff;" name="btndeconn" href="../logout/logout.php">Deconnexion</a>
         <div id="btn_act">
            <div id="wb_pret">
               <a href="./operations/prets.php"><div id="pret"><div id="pret_text"><span id="wb_uid0"><strong>Prêts</strong></span></div></div></a></div>
            <div id="wb_viremen">
               <a href="./operations/monnaies.php"><div id="viremen"><div id="viremen_text"><span id="wb_uid1"><strong>Monnaies</strong></span></div></div></a></div>
            <div id="wb_Shape3">
               <a href="./operations/Cartes.php"><div id="Shape3"><div id="Shape3_text"><span id="wb_uid2"><strong>Mes cartes</strong></span></div></div></a></div>
            <div id="wb_Shape2">
               <a href="./operations/virements.php"><div id="Shape2"><div id="Shape2_text"><span id="wb_uid3"><strong>Virements</strong></span></div></div></a></div>
            <div id="wb_Shape1">
               <a href="./operations/mouvements.php"><div id="Shape1"><div id="Shape1_text"><span id="wb_uid4"><strong>Mouvements</strong></span></div></div></a></div>
            <div id="wb_btn_connexionp">
               <a href="./operations/Comptes.php"><div id="btn_connexionp"><div id="btn_connexionp_text"><span id="wb_uid5"><strong>Mes comptes</strong></span></div></div></a></div>
         </div>
         <div id="info">
            <div id="wb_numero_compt">
               <span id="wb_uid6">Prénom:</span></div>
            <div id="wb_numcompt">
               <span id="wb_uid7">N° de compte:</span></div>
            <div id="wb_prenom">
               <span id="wb_uid8">Gestionnaire:</span></div>
            <div id="wb_type_de_compte">
               <span id="wb_uid9">Type de compte:</span></div>
            <div id="wb_sold">
               <span id="wb_uid10">Sold: </span></div>
            <div id="wb_cfaa">
               <span id="wb_uid11">Fcfa</span></div>
            <div id="wb_photoprofil">
               <img src="../images/Me new.jpg" id="photoprofil" alt=""></div>
            <div id="wb_swift">
               <span id="wb_uid12">SWITF:</span></div>
            <div id="wb_contactgest">
               <span id="wb_uid13">Contact gestionnaire:</span></div>
            <div id="wb_agebce">
               <span id="wb_uid14">Agence:</span></div>
            <div id="wb_iban">
               <span id="wb_uid15">IBAN:</span></div>
            <div id="wb_bdnumrocompt">
               <span id="wb_uid16">CIAB-BIO-276363 <?php echo $resultat[3]; ?></span></div>
            <div id="wb_bdiban">
               <span id="wb_uid17">SCICIABIO <?php echo $resultat[3]; ?></span></div>
            <div id="wb_bdswift">
               <span id="wb_uid18">CIAB-BIO-276363 <?php echo $resultat[3]; ?></span></div>
            <div id="wb_bdvillz">
               <span id="wb_uid19">Abidjan <?php echo $resultat[3]; ?></span></div>
            <div id="wb_bdgestionnaire">
               <span id="wb_uid20">KOLODJOLOMAN <?php echo $resultat[3]; ?></span></div>
            <div id="wb_bdcontac">
               <span id="wb_uid21">43261992 <?php echo $resultat[3]; ?></span></div>
            <div id="wb_derniereseesion">
               <span id="wb_uid22">Dernière connxion:</span></div>
            <div id="wb_datesession">
               <span id="wb_uid23">27/061984 <?php echo $resultat[3]; ?></span></div>
            <div id="wb_bdnom">
               <span id="wb_uid24">Ouattara <?php echo $resultat[3]; ?></span></div>
            <div id="wb_bdprenom">
               <span id="wb_uid25">Zié <?php echo $resultat[4]; ?></span></div>
         </div>
         <div id="table">
            <table id="tablaff">
               <tr>
                  <td class="cell0"><span id="wb_uid26"> Opérations</span></td>
                  <td class="cell1"><span id="wb_uid27"> Dates</span></td>
               </tr>
               <tr>
                  <td class="cell2"><span id="wb_uid28"> </span></td>
                  <td class="cell3"><span id="wb_uid29"> </span></td>
               </tr>
               <tr>
                  <td class="cell2"><span id="wb_uid30"> </span></td>
                  <td class="cell3"><span id="wb_uid31"> </span></td>
               </tr>
               <tr>
                  <td class="cell2"><span id="wb_uid32"> </span></td>
                  <td class="cell3"><span id="wb_uid33"> </span></td>
               </tr>
               <tr>
                  <td class="cell2"><span id="wb_uid34"> </span></td>
                  <td class="cell3"><span id="wb_uid35"> </span></td>
               </tr>
               <tr>
                  <td class="cell2"><span id="wb_uid36"> </span></td>
                  <td class="cell3"><span id="wb_uid37"> </span></td>
               </tr>
               <tr>
                  <td class="cell2"><span id="wb_uid38"> </span></td>
                  <td class="cell3"><span id="wb_uid39"> </span></td>
               </tr>
               <tr>
                  <td class="cell4">&nbsp;</td>
                  <td class="cell5">&nbsp;</td>
               </tr>
               <tr>
                  <td class="cell4">&nbsp;</td>
                  <td class="cell5">&nbsp;</td>
               </tr>
               <tr>
                  <td class="cell4"><span id="wb_uid40"> </span></td>
                  <td class="cell5"><span id="wb_uid41"> </span></td>
               </tr>
            </table>
         </div>
         <div id="wb_JavaScript2">
            <div id="basicdate"></div>
            <script>            
               var now = new Date();
               var days = new Array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
               var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
               var date = ((now.getDate() < 10) ? "0" : "") + now.getDate();
               var year = (now.getYear() < 1000) ? now.getYear() + 1900 : now.getYear();
               today = days[now.getDay()] + ", " + months[now.getMonth()] + " " + date + ", " + year;
               var basicdate = document.getElementById('basicdate');
               basicdate.innerHTML = today;
            </script>

         </div>
      </form>
      <div id="ban">
         <div id="wb_oran">
            <img src="../images/img0095.png" id="oran" alt=""></div>
         <label for="" id="txtprofil">Profil</label>
      </div>
      <div id="Divhead">
         <div id="head">
            <div id="wb_band">
               <img src="../images/img0113.png" id="band" alt="Banque Ivoire Online" title="Banque Ivoire Online"></div>
            <input type="text" id="edit_reche" name="search" value="" placeholder="Recherche...">
            <div id="wb_icosear">
               <a href="./../administrator/conf/Categorie_de_poste.php"><div id="icosear"><i class="fa fa-search">&nbsp;</i></div></a></div>
            <div id="wb_local">
               <div id="wb_uid42"><span id="wb_uid43"><a href="./../administrator/conf/Categorie_de_poste.php">Banque prêt de chez vous&nbsp;!</a></span></div>
            </div>
            <div id="wb_icolocal">
               <div id="icolocal"><i class="fa fa-map-marker">&nbsp;</i></div></div>
            <div id="wb_txtacc">
               <div id="wb_uid44"><span id="wb_uid45"><em>La banque en ligne faite pour vous&nbsp;!</em></span></div>
            </div>
            <div id="wb_logo">
               <a href="./../index.php"><img src="../images/logo.png" id="logo" alt=""></a></div>
         </div>
         <div id="Nav">
            <ul class="navbar">
               <li><a href="./../index.php"><img alt="Acceuil" title="Acceuil" src="../images/img0114_over.png"><span><img alt="Acceuil" title="Acceuil" src="../images/img0114.png"></span></a></li>
               <li><a href="./../comptes/"><img alt="Comptes" title="Comptes" src="../images/img0115_over.png"><span><img alt="Comptes" title="Comptes" src="../images/img0115.png"></span></a></li>
               <li><a href="./../prets/"><img alt="Pr&#234;ts" title="Pr&#234;ts" src="../images/img0116_over.png"><span><img alt="Pr&#234;ts" title="Pr&#234;ts" src="../images/img0116.png"></span></a></li>
               <li><a href="./../agences/"><img alt="Agences" title="Agences" src="../images/img0117_over.png"><span><img alt="Agences" title="Agences" src="../images/img0117.png"></span></a></li>
               <li><a href="./../contact/contact.php"><img alt="Contacts" title="Contacts" src="../images/img0118_over.png"><span><img alt="Contacts" title="Contacts" src="../images/img0118.png"></span></a></li>
               <li><a href="./../a_propos/"><img alt="A propos" title="A propos" src="../images/img0119_over.png"><span><img alt="A propos" title="A propos" src="../images/img0119.png"></span></a></li>
            </ul>
         </div>
      </div>
      <div id="foot">
         <div id="foot_Container">
            <div id="wb_JavaScript1">
               <div id="copyrightnotice"></div>
               <script>               
                  var now = new Date();
                  var startYear = "2017";
                  var text =  "Copyright &copy; ";
                  if (startYear != '')
                  {
                     text = text + startYear + "-";
                  }
                  text = text + now.getFullYear() + ", Miage 2018. Tous droits réservés.";
                  var copyrightnotice = document.getElementById('copyrightnotice');
                  copyrightnotice.innerHTML = text;
               </script>

            </div>
         </div>
      </div>
      <div id="His">
         <div id="wb_d_">
            <h1 id="d_">Mon historique</h1></div>
         <hr id="lik">
         <hr id="Lie2">
      </div>
      <div id="wb_montantsold">
         <span id="wb_uid46">9.456.832</span>
      </div>
      <div id="wb_nom">
         <span id="wb_uid47">Nom: </span>
      </div>
      <div id="wb_bdtypcompt">
         <span id="wb_uid48">Courant<?php echo $resultat[20]; ?></span>
      </div>
   </div>
</body>
</html>