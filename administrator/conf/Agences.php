<?php 
   require_once("../../bd/bd.php");

   if(!empty($_POST["btnAjouter"]) || $_POST["btnAjouter"] =="Ajouter" ){
      if(!empty($_POST["nom"]) && !empty($_POST["date"]) &&
         !empty($_POST["adress"]) && !empty($_POST["email"]) && !empty($_POST["numero"])
      ){

         $nom = htmlspecialchars(trim($_POST["nom"]));
         $date = htmlspecialchars(trim($_POST["date"]));
         $adress = htmlspecialchars(trim($_POST["adress"]));
         $email = htmlspecialchars(trim($_POST["email"]));
         $numero = htmlspecialchars(trim($_POST["numero"]));
         
         $sql = "INSERT INTO sbrhtb013(libelleagence,date_creation,adresse,numero,email) VALUES(:lib,:dat,:add,:num,:em)";
               $query = $bd->prepare($sql);
               $query->execute(
                  array(
                     'lib' =>$nom , 
                     'dat' =>$date ,
                     'add' =>$adress ,
                     'num' =>$numero ,
                     'em'  => $email
                  )
               );

      }else{
         $erreur = "Veuille remplir tous les champs";
      }

   } else{
   }

?>
<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Agences</title>
<meta name="description" content="" Demandez="" un="" compte="" bancaire="" en="" ligne="" auprès="" de="" la="" banque="" Santander="" et="" profitez="" des="" options="" de="" compte="" en="" ligne="" pratiques="" de="" lune="" des="" meilleures="" banques="" personnelles."lang=" fr-FR" "Demandez="" un="" compte="" bancaire="" en="" ligne="" auprès="" de="" la="" banque="" Santander="" et="" profitez="" des="" options="" de="" compte="" en="" ligne="" pratiques="" de="" lune="" des="" meilleures="" banques="" personnelles."lang=" fr-FR" "="">
<meta name="keywords" content="online bank(s), personal banking, bank account(s), best personal banks, apply for bank account online,banque (s) en ligne, banque personnelle, compte (s) bancaire (s), meilleures banques personnelles, demande de compte bancaire en ligne " lang=" fr-FRonline bank(s), personal banking, bank account(s), best personal banks, apply for bank account online,banque (s) en ligne, banque personnelle, compte (s) bancaire (s), meilleures banques personnelles, demande de compte bancaire en ligne " lang=" fr-FR">
<meta name="author" content="CCS - Computer Consulting Services">
<meta name="generator" content="CCS - Computer Consulting Services">
<link href="../../logo.ico" rel="shortcut icon" type="image/x-icon">
<link href="../../logo.png" rel="apple-touch-icon" sizes="500x380">
<link href="../../css/font-awesome.min.css" rel="stylesheet">
<link href="../../css/BIO_V1.css" rel="stylesheet">
<link href="../../css/Agences.css" rel="stylesheet">
<script src="../../java-script/jquery-2.2.4.min.js"></script>
<script>   
   $(document).ready(function()
   {
      $("#NavigationBar1 .navbar a").hover(function()
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
      <div id="foot">
         <div id="foot_Container">
         </div>
      </div>
      <div id="zone">
         <form name="Layer1" method="post" action=""  id="Layer1">
            <input type="text" id="edtlogin" name="nom" value="" tabindex="1" placeholder="Nom agence">
            <label for="" id="Label2">Base de données - Agences</label>
            <input type="submit" id="btnconnexion" name="btnAjouter" value="Ajouter">nom
            <div id="Layer3">
               <table id="Table1">
                  <tr>
                     <td class="cell0"><span id="wb_uid0">Nom agence </span></td>
                     <td class="cell1"><span id="wb_uid1">Date de creation </span></td>
                     <td class="cell0"><span id="wb_uid2">Adresse </span></td>
                     <td class="cell0"><span id="wb_uid3">Numero </span></td>
                     <td class="cell2"><span id="wb_uid4">Email </span></td>
                     <td class="cell0"><span id="wb_uid3">Mod </span></td>
                     <td class="cell2"><span id="wb_uid4">Sup</span></td>
                  </tr>
                  <?php 
                     $sql2 = "SELECT * FROM sbrhtb013 ";
                     $query2 = $bd->query($sql2);
                     $i=0;
                     while($row = $query2->fetch()){
                        $color = $i%2==0 ? "#1E90FF": "#D2691E";
                        $i = $i+1;
                        echo "<tr style='background-color:$color'>";
                        echo "<td class='cell0'><span style='color:white' id='wb_uid4'>".$row['libelleagence']." </span></td>";
                        echo "<td class='cell1'><span style='color:white' id='wb_uid4'>".$row['date_creation']." </span></td>";
                        echo "<td class='cell2'><span style='color:white' id='wb_uid4'>".$row['adresse']." </span></td>";
                        echo "<td class='cell2'><span style='color:white' id='wb_uid4'>".$row['numero']." </span></td>";
                        echo "<td class='cell2'><span style='color:white' id='wb_uid4'>".$row['email']." </span></td>";
                        echo "<td class='cell2'><span  style='color:white' id='wb_uid4'><a style='text-decoration:none;color:white'  href='modAg.php?id={$row['id_agence']}'>&nbsp;&nbsp;<i class='fa fa-edit'></i></a></span></td>";
                        echo "<td class='cell2'><span style='color:white' id='wb_uid4'><a style='text-decoration:none;color:white' href='supAg.php?id={$row['id_agence']}'>&nbsp;&nbsp;<i class='fa fa-trash'></i></a></span></td>";
                        echo "</tr>";
                     }
                   ?>
                 
               </table>
            </div>
            <div id="txt_pk">
               <hr id="Line2e">
               <div id="wb_Headi">
                  <h1 id="Headi">Liste des Agences existantes</h1></div>
               <hr id="Line1a">
            </div>
            <input type="submit" id="Button1" name="btnmodif" value="Modifier">
            <input type="submit" id="Button2" name="btnsuppr" value="Supprimer">
            <input type="date" id="Editbox1" name="date" value="" tabindex="1" placeholder="Date cr&#233;ation">
            <input type="text" id="Editbox2" name="adress" value="" tabindex="1" placeholder="Adresse">
            <input type="number" id="Editbox3" min="1"  max="100" name="numero" value="" tabindex="1" placeholder="Numero">
            <input type="email" id="Editbox4" name="email" value="" tabindex="1" placeholder="Email">
         </form>
         <div id="wb_Breadcrumb2">
            <ul id="Breadcrumb2">
               <li><a href="./../../index.php" title="xx"><i class="fa fa-home">&nbsp;</i>Acceuil</a></li>
               <li><a href="./../admin.php" title="Administration"><i class="fa fa-database">&nbsp;</i>Administration</a></li>
               <li><a href="./../admin.php" title="Config"><i class="fa fa-sticky-note">&nbsp;</i>Config</a></li>
               <li class="active"><i class="fa fa-renren">&nbsp;</i>Agences</li>
            </ul>
         </div>
         <div id="Layer2">
            <div id="wb_Shape2">
               <img src="../../images/img0034.png" id="Shape2" alt=""></div>
            <label for="" id="Label3">Administration</label>
         </div>
      </div>
      <div id="divhead">
         <div id="head">
            <div id="wb_band">
               <img src="../../images/img0001.png" id="band" alt="Banque Ivoire Online" title="Banque Ivoire Online"></div>
            <input type="text" id="edit_reche" name="search" value="" placeholder="Recherche...">
            <div id="wb_icosear">
               <a href="./../../index1.php"><div id="icosear"><i class="fa fa-search">&nbsp;</i></div></a></div>
            <div id="wb_local">
               <div id="wb_uid50"><span id="wb_uid51"><a href="./../../index1.php">Banque prêt de chez vous&nbsp;!</a></span></div>
            </div>
            <div id="wb_icolocal">
               <div id="icolocal"><i class="fa fa-map-marker">&nbsp;</i></div></div>
            <div id="wb_txtacc">
               <div id="wb_uid52"><span id="wb_uid53"><em>La banque en ligne faite pour vous&nbsp;!</em></span></div>
            </div>
            <div id="wb_logo">
               <a href="./../../index.php"><img src="../../images/logo.png" id="logo" alt=""></a></div>
         </div>
         <div id="NavigationBar1">
            <ul class="navbar">
               <li><a href="./../../index.php"><img alt="Acceuil" title="Acceuil" src="../../images/img0003_over.png"><span><img alt="Acceuil" title="Acceuil" src="../../images/img0003.png"></span></a></li>
               <li><a href="./../../comptes/"><img alt="Comptes" title="Comptes" src="../../images/img0027_over.png"><span><img alt="Comptes" title="Comptes" src="../../images/img0027.png"></span></a></li>
               <li><a href="./../../prets/"><img alt="Pr&#234;ts" title="Pr&#234;ts" src="../../images/img0044_over.png"><span><img alt="Pr&#234;ts" title="Pr&#234;ts" src="../../images/img0044.png"></span></a></li>
               <li><a href="./../../agences/"><img alt="Agences" title="Agences" src="../../images/img0045_over.png"><span><img alt="Agences" title="Agences" src="../../images/img0045.png"></span></a></li>
               <li><a href="./../../contact/contact.php"><img alt="Contacts" title="Contacts" src="../../images/img0046_over.png"><span><img alt="Contacts" title="Contacts" src="../../images/img0046.png"></span></a></li>
               <li><a href="./../../a_propos/"><img alt="A propos" title="A propos" src="../../images/img0047_over.png"><span><img alt="A propos" title="A propos" src="../../images/img0047.png"></span></a></li>
            </ul>
         </div>
      </div>
   </div>
</body>
</html>