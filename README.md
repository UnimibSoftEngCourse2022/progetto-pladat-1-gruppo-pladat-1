# PlaDat: il tirocinio 2.0

## Cosa è Pladat
PlaDat è una **piattaforma online** nata come luogo di incontro tra studenti ed aziende. Il **tirocinio** è un'esperienza formativa importante nella crescita professionale di uno **studente** e PlaDat fornisce gli strumenti essenziali per trovare uno stage adatto alle sue esigenze. Per le **aziende**, invece, ci impegniamo ad offrire tutte le funzionalità per un recruiting semplice ed efficace!

## Installazione (Windows)
Per un'installazione semplice e veloce seguire i seguenti passaggi.

### Scaricare progetto
1) Cliccare sul tasto verde "Code" in alto a destra nella pagina gitHub del progetto (https://github.com/UnimibSoftEngCourse2022/progetto-pladat-1-gruppo-pladat-1) e cliccare su "Download ZIP";
2) estrarre lo ZIP in una cartella da te scelta;

### Installazione MySQL Developer
1) Scaricare [MySQL](https://dev.mysql.com/get/Downloads/MySQLInstaller/mysql-installer-community-8.0.28.0.msi);
2) Installare l'eseguibile appena scaricato (punto 1);
3) Selezionare "Developer Default" e cliccare su "Next";
4) Cliccare su "Execute" e lasciar installare i componenti aggiuntivi necessari per SQL.
5) Cliccare su "Next" fino a la pagina indicata nel passo successivo (punto 6);
6) Una volta giunti nella sezione "Authenication Method" lasciare le impostazioni raccomandate, cliccare su Next e scegliere una Password (attento che ti servirà successivamente);
7) Cliccare su "Next" fino all'ultima schermata e poi click su "Execute" e successivamente su "Finish".
8) Click su "Next" n-volte fino alla pagina "Connect To Server", in cui verrà richiesto l'inserimento di una password: inserire la password scelta (punto 6);
9) Verificare e, successivamente, effettuar click su "Execute";
10) Continuare ad effettuare click su "Next" e "Finish" fino alla fine dell'installazione;

### Installazione PHP e composer + configurazione Laravel
1) Scaricare [PHP](https://dw.uptodown.com/dwn/lr6MdfDpgQOJwLIiAihdAT0QcDAq6vG21T1GsTCeAjD1juqBUnsEe1IzQjiBTH404RvVOCoEEiPMVuOuurHx3_ifFSS_jufPAtMyrPolh4JUhjDsIotuXhQnsuR7JhBm/6bf1icuXVkw5vrHP9p_4kEhGNtIbZ5ykHSznddVtFXrV-Y5kXOvm8bRzPAL-o1j84WT2VmAhmVh7iYU_qVVG7u_f7Nvh1npJfc7QyUCKSfT2457_wLoXZVSbYQTh3o_L/EK892T7oJZGCRQqSdpRDIBBZsxn7CU-XCg1bbD4eld6G09CpjqjFXTXFR1zh1qC3/);
2) Estrarre la cartella e spostarla in C://;
3) Accedere alle varibili d'ambiente (E' possibile farlo cercando "modifica le variabili d'ambiente relative al sistema");
4) Recarsi su "Path" ed incollare il nostro percorso (C:\php-8-1-3);
5) Salvare (in caso di problemi seguire le istruzioni in questo video [Video](https://www.youtube.com/watch?v=QMWb_Wn2g5k));
6) Cercare il file "php.ini-development" e rimuovere "-development" lasciando solo "php.ini";
7) Entrare nel file "php.ini" appena modificato e decommentare ;extension=pdo_mysql e ;extension=fileinfo (rimuovendo ;)
8) Scaricare [Composer](https://getcomposer.org/Composer-Setup.exe);
9) Installare Composer non selezionando la modalità di developer e verificando che il percorso di installazione sia quello della cartella PHP appena creata;
10) Aprire la linea di comando nella cartella di progetto (o spostandosi con il comando "cd cartella-di-progetto") e digitare il seguente comando (questo comando, in caso di problemi di compatibilità, li risolve);
```sh
composer install
```
11) Aprire la linea di comando nella cartella di progetto (o spostandosi con il comando "cd cartella-di-progetto") e digitare il seguente comando
```sh
php artisan migrate
```

## Esecuzione (Windows)

### Eseguire il server MySQL
1) Eseguire MySQL Workbeanch;
2) Creare una nuova connessione cliccando su "+" di fianco a MySQL Connections;
3) Dare un nome alla connessione, lasciare tutto invariato e profeguire fino alla fine della creazione;
4) File -> New Model;
5) Verificare che il nome del database sia "mydb";
5) Database -> Syncronize Model;
6) Scegliere in nome la connessione creata (punto 3);
7) Proseguire fino alla fine senza modificare altro e inserendo la password creata al punto 6 di "Installazione MySQL Developer".

### Esegure il server HTTP 
- Esegurire il server HTTP tramite CMD dalla cartella di progetto
```sh
php artisan serve
```
Nel caso si volesse terminare l'esecuzione basta premere Ctrl-C.

## Utilizzo
Per utilizzare la piattaforma digitare http://localhost:8000

## Problemi
In caso di problemi contattare m.piazzalunga2@campus.unimib.it

## Contributo
Il contributo per la realizzazione di questo progetto è stato dato da:
- Mattia Piazzaluga;
- Matteo Severgnini;
- Gabriele Lecchi;
- Lorenzo Titta.

## Licenza
PlaDat è fornito in licenza GPL-3.0 (tutte le informazioni nel file LICENSE)
