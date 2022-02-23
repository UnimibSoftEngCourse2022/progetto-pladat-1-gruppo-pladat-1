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
         </div>
      </nav>
      <div class="container">
         <div class="row  flex-2-colonne">
            <div class="col-12 col-lg-6">
               <form id="login1">
                  <div class="button-modifica3">
                     <div><span>Non sei registrato?</span><a>Registrati</a></div>
                  </div>
                  <h3>Torna da noi!</h3>
                  <div class="gruppo">
                     <label class="input-modificato">Email</label>
                     <input type="email" name="email"/>
                  </div>
                  <div class="gruppo">
                     <label class="input-modificato">Password</label>
                     <input type="password" name="password"/>
                  </div>
                  <input type="button" id="invioDatiLogin" value="Accedi" class="bottone"/>
               </form>
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="/javascript/form.js"></script>
      <script src="/javascript/inputEffects"></script>
   </body>
</html>