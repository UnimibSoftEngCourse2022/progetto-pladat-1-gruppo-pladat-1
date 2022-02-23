# PlaDat: il tirocinio 2.0

## Cosa è Pladat
PlaDat è una **piattaforma online** nata come luogo di incontro tra studenti ed aziende. Il **tirocinio** è un'esperienza formativa importante nella crescita professionale di uno **studente** e PlaDat fornisce gli strumenti essenziali per trovare uno stage adatto alle sue esigenze. Per le **aziende**, invece, ci impegniamo ad offrire tutte le funzionalità per un recruiting semplice ed efficace!

## Installazione
Per un'installazione semplice e veloce seguire i seguenti passaggi (per Windows).

### Installazione MySQL Developer
1) Scaricare [MySQL](https://dev.mysql.com/get/Downloads/MySQLInstaller/mysql-installer-community-8.0.28.0.msi);
2) Installare MySQL appena scaricato;
3) Selezionare "Developer Default" e next;
4) Cliccare su next/execute fino a la pagina indicata nel passo 5;
5) Una volta giunti su "Authenication Method" lasciare le impostazioni raccomandate, cliccare su Next e scegliere una password;
6) Cliccare su next fino all'ultima schermata e poi "finish".
7) Click su next (n-volte) e dove richiesta la password reinserire la scelta;
8) Verificare e cliccare successivamente su execute;
9) Continuare a effettuare click su "next" fino alla fine;
10) Cambiare utilizzando la **password scelta** in .env DB_PASSWORD;

### Installazione PHP
1) Scaricare [PHP](https://dw.uptodown.com/dwn/lr6MdfDpgQOJwLIiAihdAT0QcDAq6vG21T1GsTCeAjD1juqBUnsEe1IzQjiBTH404RvVOCoEEiPMVuOuurHx3_ifFSS_jufPAtMyrPolh4JUhjDsIotuXhQnsuR7JhBm/6bf1icuXVkw5vrHP9p_4kEhGNtIbZ5ykHSznddVtFXrV-Y5kXOvm8bRzPAL-o1j84WT2VmAhmVh7iYU_qVVG7u_f7Nvh1npJfc7QyUCKSfT2457_wLoXZVSbYQTh3o_L/EK892T7oJZGCRQqSdpRDIBBZsxn7CU-XCg1bbD4eld6G09CpjqjFXTXFR1zh1qC3/);
2) Estrarre la cartella e spostarla in C://;
3) Accedere alle varibili d'ambiente (E' possibile farlo cercando "modifica le variabili d'ambiente relative al sistema");
4) Recarsi su path ed incollare il nostro percorso (C:\php-8-1-3);
5) Salvare (in caso di problemi seguire le istruzioni in questo video [Video](https://www.youtube.com/watch?v=QMWb_Wn2g5k));
6) Cercare il file php.ini e decommentare ;extension=pdo_mysql (rimuovere ;)
7) Scaricare [Composer](https://getcomposer.org/Composer-Setup.exe);
8) Installare Composer non selezionando la modalità di developer e verificando che il percorso di installazione sia quello della cartella PHP appena creata (sarà necessario confermare con una spunta);
9) Eseguire la linea di comando nella cartella di progetto e digitare (questo comando, in caso di problemi di compatibilità, li risolve)
```sh
composer install
```

### Esegure il server HTTP e il server MySQL
- Esegurire il server HTTP tramite CMD
```sh
php artisan serve
```
## Utilizzo
Per utilizzare la piattaforma digitare http://localhost:8000

## Contributo
Il contributo per la realizzazione di questo progetto è stato dato da:
- Mattia Piazzaluga;
- Matteo Severgnini;
- Gabriele Lecchi;
- Lorenzo Titta.

## Licenza
PlaDat è fornito in licenza GPL-3.0 (tutte le informazioni nel file LICENSE)
