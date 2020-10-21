<?php
    $title = 'Výchozí stránka s úkolem';
    require_once 'inc/head.php';
?>

<h1>Doplňte formulář</h1>

<ul>
    <li>
        Vytvořte jednoduchý formulář (v bootstrap), který bude obsahovat 2 textová pole, jedno zaškrtávací pole a odesílací tlačítko.
    </li>
    <li>
        Pole libovolně pojmenujte, účel formuláře je libovolný. Po odeslání formuláře na straně serveru pouze zachyťte tato data a uložte je pomocí Tracy do souborového logo s názvem data.post
    </li>
</ul>


<?php
// Instrukce k úkolu
// Formulář vytvoříte klasicky z HTML
// Jeho odeslání metodou POST zachytíte jako údaje v objektu REQUEST
// Data získaná z tohoto objektu zatím stačí pouze zalogovat pomoví Debbugeru
