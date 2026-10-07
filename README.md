# BookShare

BookShare – systém na zdieľanie a požičiavanie kníh medzi študentmi

Meno a priezvisko : Ondrej Kocun

Študijná skupina: 5ZYI34

## Stručný opis projektu

BookShare je webová aplikácia určená na zdieľanie a požičiavanie kníh medzi študentmi. Používatelia si budú môcť prezerať dostupné knihy, vyhľadávať ich podľa rôznych kritérií a vytvárať žiadosti o ich vypožičanie.

Aplikácia bude obsahovať používateľskú a administrátorskú časť. Registrovaný používateľ bude môcť pridávať svoje knihy, spravovať ich a požičiavať ich ostatným používateľom. Správca bude dohliadať na knihy, autorov a výpožičky. Súčasťou aplikácie bude aj nahrávanie obrázkov kníh, filtrovanie údajov pomocou AJAX a zabezpečený prístup podľa používateľských rolí.

## Role v projekte

- **Návštevník** – môže prezerať dostupné knihy, vyhľadávať a filtrovať ich a môže sa zaregistrovať alebo prihlásiť.
- **Registrovaný používateľ** – môže pridávať a spravovať svoje knihy, vytvárať žiadosti o vypožičanie a sledovať svoje výpožičky.
- **Správca** – spravuje knihy, autorov, používateľov a výpožičky a má prístup k administrátorskej časti aplikácie.

## Prípady použitia podľa rolí

### Návštevník

- zobrazí dostupné knihy,
- vyhľadá knihu,
- filtruje knihy,
- zaregistruje sa,
- prihlási sa.

### Registrovaný používateľ

- pridá svoju knihu,
- upraví alebo odstráni svoju knihu,
- zobrazí detail knihy,
- požiada o vypožičanie knihy,
- zobrazí svoje výpožičky,
- spravuje svoje knihy.

### Správca

- pridá, upraví alebo odstráni knihu,
- pridá, upraví alebo odstráni autora,
- spravuje používateľov,
- schvaľuje a spravuje výpožičky,
- spravuje nahrané obrázky kníh.

## Plánované entity

- **Používateľ** – uchováva údaje potrebné na prihlásenie a identifikáciu používateľa. Atribúty: ID, meno, e-mail, heslo a rola.
- **Kniha** – obsahuje údaje o zdieľanej knihe. Atribúty: ID, názov, ISBN, rok vydania, popis, obrázok a vlastník.
- **Autor** – obsahuje údaje o autoroch kníh. Atribúty: ID, meno a priezvisko.
- **Výpožička** – eviduje požiadanie a vypožičanie knihy. Atribúty: ID, používateľ, kniha, dátum vytvorenia, dátum vypožičania, dátum vrátenia a stav.
- **book_authors** – asociatívna tabuľka prepájajúca knihy a autorov pri vzťahu M:N.

## Vzťahy medzi entitami

- **Používateľ – Kniha:** 1:N, jeden používateľ môže vlastniť viacero kníh.
- **Používateľ – Výpožička:** 1:N, jeden používateľ môže mať viacero výpožičiek.
- **Kniha – Výpožička:** 1:N, jedna kniha môže byť evidovaná vo viacerých výpožičkách v priebehu času.
- **Kniha – Autor:** M:N, jedna kniha môže mať viacerých autorov a jeden autor môže byť priradený k viacerým knihám. Vzťah bude realizovaný pomocou tabuľky `book_authors`.

## Hlavné stránky aplikácie

- **Domovská stránka** – základné informácie a prehľad dostupných kníh.
- **Zoznam kníh** – zobrazenie, vyhľadávanie a filtrovanie kníh.
- **Detail knihy** – podrobné informácie o knihe, autoroch a jej dostupnosti.
- **Moje knihy** – správa kníh pridaných prihláseným používateľom.
- **Výpožičky** – prehľad žiadostí a výpožičiek používateľa.
- **Autori** – zoznam evidovaných autorov.
- **Prihlásenie a registrácia** – vytvorenie účtu a prístup k používateľskej časti.
- **Administrácia** – správa kníh, autorov, používateľov a výpožičiek pre správcu.

## Rozdelenie funkcionality

### Základné funkcie

Základom aplikácie bude registrácia a prihlasovanie používateľov spolu s rozdelením oprávnení podľa ich rolí. Registrovaní používatelia budú môcť pridávať svoje knihy, upravovať ich údaje a odstraňovať ich. Súčasťou správy kníh bude aj evidencia autorov a možnosť priradiť k jednej knihe viacero autorov.

Používatelia budú môcť knihy vyhľadávať a filtrovať podľa dostupných údajov. Pri filtrovaní kníh a výpožičiek sa údaje načítajú pomocou AJAX bez nutnosti opätovného načítania celej stránky. Používateľ bude môcť požiadať o vypožičanie dostupnej knihy a následne sledovať stav svojich výpožičiek. Správca bude môcť spravovať knihy, autorov, používateľov a výpožičky.

Ku knihám bude možné nahrať obrázok, ktorý bude možné pri úprave knihy zmeniť alebo odstrániť. Formuláre budú kontrolované na strane klienta aj servera a prihlasovacie údaje budú uložené bezpečným spôsobom. Aplikácia bude zároveň chránená pred neoprávneným prístupom a SQL injection.
