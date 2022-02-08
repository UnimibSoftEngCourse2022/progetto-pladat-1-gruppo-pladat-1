<?php

$servername = "localhost";
$dbname = "mydb";
$username = "root";
$passworddb = "dbpass";

#campi vari rene
$emailStudent = "rene@prova.it";
$nome = "rene";
$cognome = "jorge";
$dataNascita = "2000-03-03";
$passwordStudent = "RR12345678";
$idPlacement = 4;


try{
    $db = new PDO("mysql:=$servername;dbname=$dbname", $username, $passworddb);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e){
    print "Errore! ". $e->getMessage() ." <br/>";
    die();
}

$studentemail = 'prova2@email.com';
$employeremail = 'microsoft@gmial.com';
$category = 'Java';
$idPhoto = 1;
#inserimento student nel db + check presenza mail
if(($db->query("SELECT email FROM student WHERE email = '$studentemail';")->fetch()['email'] == null)
    && ($db->query("SELECT email FROM employer WHERE email = '$employeremail';")->fetch()['email'] == null)){
    $db->query("insert into student(email, name, surname, birth_date, presentation, password)
	values ('$studentemail', 'mario', 'giordano', '1966-10-21', 'sono un pagliaccio', 'z1234');");
}
#inserimento employer nel db + check presenza email
if(($db->query("SELECT email FROM employer WHERE email = '$employeremail';")->fetch()['email'] == null)
    && ($db->query("SELECT email FROM student WHERE email = '$studentemail';")->fetch()['email'] == null)){
    $db->query("insert into mydb.employer(email, name, description, address, password)
        values ('$employeremail', 'microsoft', 'microsoft descreiption', 'microsoft addr', 'onedrive1');");
}

##set categorie per studente
if(($db->query("SELECT email FROM student WHERE email = '$studentemail';")->fetch()['email'] != null)
    && ($db->query("SELECT Student_email FROM student_has_category WHERE Student_email = '$studentemail' AND Category_Name = '$category';")->fetch()['Student_email'] == null)){
    $db->query("insert into student_has_category (Student_email, Category_Name)
	values('$studentemail', '$category');");
}

###creazione photo student
if(($db->query("SELECT email FROM student WHERE email = '$studentemail';")->fetch()['email'] != null)){
    $db->query("insert into photo (description, Path, student_email)
	values('description photo', 'path', '$studentemail');");
}
$pathphoto = '';
###get path immagine profilo di student + controllo su photo email studente
if(($db->query("SELECT email FROM student WHERE email = '$studentemail';")->fetch()['email'] != null)
    && ($db->query("SELECT idPhoto FROM photo WHERE idPhoto = '$idPhoto';")->fetch()['idPhoto'] != null)){
    $pathphoto = $db->query("select Path from photo where student_email = '$studentemail'")->fetch()['Path'];
}
###creazione photo employer
if(($db->query("SELECT email FROM employer WHERE email = '$employeremail';")->fetch()['email'] != null)){
    $db->query("insert into photo (description, Path, employer_email)
	values('description photo empl', 'path empl', '$employeremail');");
}
$pathphoto = '';
###get path immagine profilo di employer + controllo su photo email employer
if(($db->query("SELECT email FROM employer WHERE email = '$employeremail';")->fetch()['email'] != null)
    && ($db->query("SELECT idPhoto FROM photo WHERE idPhoto = '$idPhoto';")->fetch()['idPhoto'] != null)){
    $pathphoto = $db->query("select Path from photo where employer_email = '$employeremail'")->fetch()['Path'];
}

#inserimento placement nel db
if($db->query("SELECT email FROM employer WHERE email = '$employeremail';")->fetch()['email'] != null){
    $db->query("insert into mydb.placement(title, description, duration, start_date, expiration_date, start_placement, salary, employer_email)
    values ('titolonew','desc new','10','2000-12-12','2001-12-12','2002-12-12','0','$employeremail');");
}

##set categorie per placement
if($db->query("SELECT idPlacement FROM placement WHERE idPlacement = '$idPlacement';")->fetch()['idPlacement'] != null) {
    $db->query("insert into placement_has_category(Placement_idPlacement, Category_Name)
	values ('$idPlacement', '$category');");
}

/*
###set immagine profilo per placement

    $db.query("insert into mydb.placement_has_photo (Placement_idPlacement, Photo_idPhoto)
    VALUES ('id','id');");

#creazione richiesta con invio curriculum

    $db.query("");

#selezione placement da categorie studente

    $db.query("");

#visualizzazione richieste per placement con curriculum associato al profilo studente

    $db.query("");

#visualizzazione placement tramite filtro ricerca aggiuntivo

    $db.query("");
*/
?>