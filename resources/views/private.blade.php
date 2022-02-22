<!DOCTYPE html>
<html lang="it">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="../style/style.css">
      <link rel="icon" href="/image/logo.png" />
      <title>PlaDat</title>
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-light">
         <a href="index.html" class="nome-sito"><img src="/image/logo.png" alt="logo" class="navbar-brand">PlaDat</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul id="naviga" class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" href="page1">Primapagina</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="page2">SecondaPagina</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="page3">Terzapagina</a>
               </li>
               <li class="nav-item">
                  <button class="nav-link login-button">Andreinetto</button>
               </li>
            </ul>
         </div>
      </nav>
      <div class="container ">
         <div class="row flex-2-colonne">
            <div class="col-12 col-lg-6">
               <form id="modifica" action="*******" method="******">
                  <div class="button-modifica">
                     <div>Elimina</div>
                     <div id="modificaPrivato">Modifica</div>
                  </div>
                  <img data-bs-toggle="modal" data-bs-target="#cambiaImmagine" src="image/profilo.png" alt="foto-profilo"/>
                  <div class="gruppo gutente">
                     <label class="input-modificato">Email</label>
                     <input type="email" name="email" disabled/>
                  </div>
                  <div class="gruppo gutente">
                     <label class="input-modificato">Password</label>
                     <input type="password" name="password"  disabled/>
                  </div>
                  <div class="gruppo gutente">
                     <label class="input-modificato">Nome</label>
                     <input type="text" name="nome"  disabled/>
                  </div>
                  <div class="gruppo gutente">
                     <label class="input-modificato">Cognome</label>
                     <input type="text" name="cognome"  disabled/>
                  </div>
                  <div class="gruppo gutente">
                     <label class="input-modificato">Data di nascita</label>
                     <input type="date" name="data"  disabled/>
                  </div>
                  <div class="gruppo gutente">
                     <select name="categoria" id="categoria" size="3" multiple disabled>
                     </select>
                  </div>
                  <div class="gruppo gazienda">
                     <label class="input-modificato">Email</label>
                     <input type="email" name="email1"   disabled/>
                  </div>
                  <div class="gruppo gazienda">
                     <label class="input-modificato">Password</label>
                     <input type="password" name="password1"  disabled/>
                  </div>
                  <div class="gruppo gazienda">
                     <label class="input-modificato">Nome compagnia</label>
                     <input type="text" name="nomeCompagnia"  disabled/>
                  </div>
                  <div class="gruppo gazienda">
                     <label class="input-modificato">Via</label>
                     <div id='searchBoxContainer'>
                        <input id="searchBox" name="via" type="text"  disabled/>
                     </div>
                  </div>
                  <div class="gruppo gazienda">
                     <label class="input-modificato">Descrizione</label>
                     <textarea name="descrizione1" rows="1" disabled></textarea>
                  </div>
                  <input type="button" id="invioDatiPrivato" value="Modifica" class="bottone"/>
               </form>
            </div>
            <div class="col-12 col-lg-6">
               <div class="elenco-privato">
                  <div>
                     <h3>Elenco placement</h3>
                     <h3 data-bs-toggle="modal" data-bs-target="#aggiungiOfferta" >&#43;</h3>
                  </div>
                  <div>
                     <div class="privato-richiesta">
                        <p>Per utente</p>
                        <p>Front-end 22</p>
                        <p class="rifiuto">&#10006;</p>
                     </div>
                     <div class="privato-placement">
                        <p>Per azienda</p>
                        <p>Front-end ww</p>
                        <p class="accetto">&#10004;</p>
                     </div>
                     <div class="privato-placement">
                        <p>Google com</p>
                        <p>Front-end eee</p>
                        <p class="attendo">&#10140;</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal fade" id="cambiaImmagine" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Aggiorna la foto profilo!</h5>
                     <button type="button" class="chiusurax" data-bs-dismiss="modal" aria-label="Close">&#10006;</button>
                  </div>
                  <div class="modal-body">
                     <input type="file" id="input" multiple>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="bottone-invio"  data-bs-dismiss="modal">Salva</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal fade" id="informazioni" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Qualche informazione sulla tua offerta</h5>
                     <button type="button" class="chiusurax" data-bs-dismiss="modal" aria-label="Close">&#10006;</button>
                  </div>
                  <div class="modal-body offerta">
                     <p>Il tirocinio da te proposto è un tirocinio <span class="mTitolo">Titolo</span>
                        cerca una figura come <span class="mCategoria">Developer</span> con uno stipendio di <span class="mStipendio">non definito</span>
                        e una durata di <span class="mDurata">6 mesi</span>. Aperta il <span class="mInizio">12/01/2000</span>, termina il <span class="mFine">12/01/2020</span>.
                     </p>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="bottone-chiusura"  data-bs-dismiss="modal">Chiudi offerta</button>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal fade modalApplicanti" id="applicanti" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Vediamo chi è interessto!</h5>
                     <button type="button" class="chiusurax" data-bs-dismiss="modal" aria-label="Close">&#10006;</button>
                  </div>
                  <div class="modal-body elencoApplicanti">
                     <div class="bloccoelencoapplicanti">
                        <div>
                           <p>Google com</p>
                           <p>Front-end developer</p>
                           <a href="***" download><img alt="dowload" src="image/download.png"></a>
                           <p class="attendo sceltaAccettazione">&#10140;</p>
                        </div>
                        <div class="nascondi">
                           <p>Il tirocinio proposto bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal fade" id="aggiungiOfferta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Apri una nuova posizione!</h5>
                     <button type="button" class="chiusurax" data-bs-dismiss="modal" aria-label="Close">&#10006;</button>
                  </div>
                  <div class="modal-body">
                     <form id="offerta" action="*******" method="******">
                        <div class="gruppo">
                           <label class="input-modificato">Titolo</label>
                           <input type="text" name="titolo"  />
                        </div>
                        <div class="gruppo">
                           <label class="input-modificato">Durata tirocinio</label>
                           <input type="text" name="durata" />
                        </div>
                        <div class="gruppo">
                           <label class="input-modificato">Data inizio prenotazioni</label>
                           <input type="date"  name="dataInizio"/>
                        </div>
                        <div class="gruppo">
                           <label class="input-modificato">Data fine prenotazioni</label>
                           <input type="date" name="dataFine" />
                        </div>
                        <div class="gruppo">
                           <label class="input-modificato">Descrizione</label>
                           <textarea rows="1" name="descrizione2"></textarea>
                        </div>
                        <div class="gruppo">
                           <label class="input-modificato">Salario</label>
                           <input type="text" name="salario"/>
                        </div>
                        <div class="gruppo">
                           <select name="categoria1" id="categoria1" size="3" multiple>
                           </select>
                        </div>
                        <input id="invioDatiOfferta" type="button" value="Lancia" class="bottone"/>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src='https://www.bing.com/api/maps/mapcontrol?key=AoT-Xgbyi-r8h5HmJWJZhXdEkbL2UYOluU7LDUsdwu8zKUyj51W7oO4p5hJxqWuG&callback=loadMapScenario' async defer></script>
      <script src="/javascript/private.js"></script>
      <script src="/javascript/bingMaps.js"></script>
      <script src="/javascript/form.js"></script>
      <script src="/javascript/inputEffects"></script>
   </body>
</html>