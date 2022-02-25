<!DOCTYPE html> 
<html lang="it">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="/style/style.css">
      <link rel="icon" href="/image/logo.png" />
      <title>PlaDat</title>
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-light">
         <a href="/" class="nome-sito"><img src="/image/logo.png" alt="logo" class="navbar-brand">PlaDat</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul id="naviga" class="navbar-nav">
               <li class="nav-item">
                  <a href="/profile" class="nav-link login-button">Privato</a>
               </li>
            </ul>
         </div>
      </nav>
      <div class="container">
         <div class="row  flex-2-colonne flex-ricerca">
            <div class="col-12">
               <div class="gruppo">
                  <label id="scrittaRicerconaAuto"></label>
                  <input type="text" name="text" id="ricercona"/>
                  <ul id="elencoRicerca"></ul>
               </div>
               <div class="elencoOfferte">
                  <hr>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="informazioni" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="informazioni" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Ecco le informazioni sul tirocinio.</h5>
                  <button type="button" class="chiusurax" data-bs-dismiss="modal" aria-label="Close">&#10006;</button>
               </div>
               <div class="modal-body tirocinio">
               <p>Il tirocinio è fornito da <span class="mCompagnia">Oracle</span> 
                     email: <span  class="mEmail">oracle@gmail.com</span>. Il tirocinio <span class="mTitolo">Titolo</span>
                     cerca una figura con uno stipendio di <span class="mStipendio">non definito</span> euro
                     e una durata di <span class="mDurata">6 mesi</span>.
                Data di apertura: <span class="mInizio">12/01/2000</span>, data di chiusura: <span class="mFine">12/01/2020</span>.
                     </p>
                  <p>Descrizione azienda</p>
                  <p class="mDescription">............. bla bla bla ..............</p>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="applica" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="applica" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Applica! E in bocca al lupo!</h5>
                  <button type="button" class="chiusurax" data-bs-dismiss="modal" aria-label="Close">&#10006;</button>
               </div>
               <div class="modal-body applicazione">
                  <p>Presentati</p>
                  <textarea></textarea>
                  <p>Allega il CV</p>
                  <input type="file" accept=".doc,.docx,.pdf">
               </div>
               <div class="modal-footer">
                  <button type="button" class="bottone-invio" id="inviaMiPresento"  data-bs-dismiss="modal">Mi presento</button>
               </div>
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://unpkg.com/typeit@8.2.0/dist/index.umd.js" integrity="sha256-bcE+LN5U5L84IeNXERKYfDjK95A40Xyhbm+qXNKH/Rc=" crossorigin="anonymous"></script>
      <script src="/javascript/ricerca.js"></script>
   </body>
</html>