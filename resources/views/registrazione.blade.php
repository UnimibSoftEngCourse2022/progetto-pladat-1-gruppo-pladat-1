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
         <a href="/" class="nome-sito"><img src="/image/logo.png" alt="logo" class="navbar-brand">PlaDat</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul id="naviga" class="navbar-nav">
               <li class="nav-item">
                  <a href="/login" class="nav-link login-button">Login</a>
               </li>
            </ul>
         </div>
      </nav>
      <div class="container">
         <div class="row  flex-2-colonne">
            <div class="col-0 col-lg-6 scritte">
               <div>
                  <h1><span>PlaDat:</span> il tirocinio 2.0</h1>
                  <h3 class="invito"></h3>
               </div>
            </div>
            <div class="col-12 col-lg-6">
               <form id="iscrizione" action="*******" method="******">
                  <h3>Registrati ora!</h3>
                  <div class="gruppo">
                     <div class="radio">
                        <label>Sono</label>
                        <div>
                           <input type="radio" id="studente" name="chi" value="studente" checked >
                           <label for="studente">Studente</label>
                        </div>
                        <div>
                           <input type="radio" id="azienda" name="chi" value="azienda">
                           <label for="azienda">Azienda</label>
                        </div>
                     </div>
                  </div>
                  <div class="gruppo gutente">
                     <label class="input-modificato">Email</label>
                     <input type="email" name="email"   />
                  </div>
                  <div class="gruppo gutente">
                     <label class="input-modificato">Password</label>
                     <input type="password" name="password"  />
                  </div>
                  <div class="gruppo gutente">
                     <label class="input-modificato">Nome</label>
                     <input type="text" name="nome"  />
                  </div>
                  <div class="gruppo gutente">
                     <label class="input-modificato">Cognome</label>
                     <input type="text" name="cognome"  />
                  </div>
                  <div class="gruppo gutente">
                     <label class="input-modificato">Data di nascita</label>
                     <input type="date" name="data"  />
                  </div>
                  <div class="gruppo gutente">
                     <select name="categoria" id="categoria" size="3" multiple>
                      </select>
                  </div>
                  <div class="gruppo gazienda">
                     <label class="input-modificato">Email</label>
                     <input type="email" name="email1"   />
                  </div>
                  <div class="gruppo gazienda">
                     <label class="input-modificato">Password</label>
                     <input type="password" name="password1"  />
                  </div>
                  <div class="gruppo gazienda">
                     <label class="input-modificato">Nome compagnia</label>
                     <input type="text" name="nomeCompagnia"  />
                  </div>
                  <div class="gruppo gazienda">
                     <label class="input-modificato">Via</label>
                     <div id='searchBoxContainer'>
                        <input id="searchBox" name="via" type="text"  />
                     </div>
                  </div>
                  <div class="gruppo gazienda">
                     <label class="input-modificato">Descrizione</label>
                     <textarea name="descrizione1" rows="1"  ></textarea>
                  </div>
                  <div id="h-captcha" class="h-captcha" data-sitekey="8f68a3f1-adf6-4004-a827-33a037bbeacc"></div>
                  <input id="invioDatiRegistrazione" type="button" value="Iscriviti" class="bottone"/>
               </form>
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/jquery.typeit/4.3.0/typeit.min.js" integrity="sha256-B0L/z8mwLcAC9YFNM53IcPK2u9PnPHCbvQFCohdCoH8=" crossorigin="anonymous"></script>
      <script src='https://www.bing.com/api/maps/mapcontrol?key=AoT-Xgbyi-r8h5HmJWJZhXdEkbL2UYOluU7LDUsdwu8zKUyj51W7oO4p5hJxqWuG&callback=loadMapScenario' async defer></script>
      <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
      <script src="/javascript/registrazione.js"></script>
      <script src="/javascript/bingMaps.js"></script>
      <script src="/javascript/form.js"></script>
      <script src="/javascript/inputEffects"></script>
   </body>
</html>