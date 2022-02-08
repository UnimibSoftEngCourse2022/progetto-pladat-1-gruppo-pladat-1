<?php

$servername = "localhost";
$dbname = "mydb";
$username = "root";
$passworddb = "Polk55_5";

#campi vari rene
$emailStudent = "rene@prova.it";
$nome = "rene";
$cognome = "jorge";
$dataNascita = "2000-03-03";
$passwordStudent = "RR12345678";


try{
    $db = new PDO("mysql:=$servername;dbname=$dbname", $username, $passworddb);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e){
    print "Errore! ". $e->getMessage() ." <br/>";
    die();
}

#inserimento student nel db + check presenza mail

    $db.query("insert into student(email, name, surname, birth_date, presentation, password)
	values ('prova1@email.com', 'mario', 'giordano', '1966-10-21', 'sono un pagliaccio', 'z1234');");

/*
##set categorie per studente

    $db.query("insert into student_has_category (Student_email, Category_Name)
	values('', '');");

###set immagine profilo per student + controllo su photo email studente

    $db.query("");

#inserimento employer nel db + check presenza email

    $db.query("insert into mydb.employer(email, name, description, address, password)
    values ('', '', '', '', '');");

##set immagine profilo per employer + controllo su photo email employer

    $db.query("");

#inserimento placement nel db

    $db.query("insert into mydb.placement(title, description, duration, start_date, expiration_date, start_placement, salary, employer_email)
    values ('','','','','','','','');");  

##set categorie per placement

    $db.query("insert into placement_has_category(Placement_idPlacement, Category_Name)
	values ('id', '');");

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