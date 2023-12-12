###Descrizione

**Partiamo da questo array di hotel. https://www.codepile.net/pile/OEWY7Q1G :**
- [x] Stampare tutti i nostri hotel con tutti i dati disponibili.


Iniziate in modo graduale.
- [X] Prima stampate in pagina i dati, senza preoccuparvi dello stile.

**Soluzione**:
 - tramite ciclo foreach iterare tutti i valori dell'array e stamparli su pagina; per parcheggio, usare operatore ternario;

- [X] Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.

Bonus:
- [X] 1- Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
**soluzione:**
  - impostare un form con metodo GET;
  - prima del forEach, assicurarsi che il filtro del GET sia stato impostato; SE è stato impostato APPLICARLO, ALTRIMENTI ritornare tutti gli htl senza variazioni ---> aggiunta: impostare <option selected value=""></option> ed aggiungere nella condizione SE il filtro è preso dal GET ; && il filtro è diverso da stringa vuota (true o false)---> Se le condizioni sono true, ritorna il filtro; se false, ritorna il valore 'all';
  - all'interno del foreach, applicare il filtro: SE filtroxparcheggio == 'tutti', tutti gli htl; SE filtroxparcheggio == 'con parcheggio' &&parcheggio == true; SE filtroxparcheggio == 'senza parcheggio' && parcheggio == false; eseguire il codice.

- [X] 2- Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
NOTA: deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore)
Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel.

**soluzione:**
 - aggiungere un secondo select (resta metodo get); come nel primo caso, controllare se il filtro è stato impostato, altrimenti return 'all'; 
 - all'interno del foreach, applicare il filtro con tutte le condizioni; eseguire il codice