-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Stř 16. kvě 2018, 10:01
-- Verze serveru: 10.1.29-MariaDB
-- Verze PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `pokedex`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `pokemoni`
--

CREATE TABLE `pokemoni` (
  `id` int(200) UNSIGNED NOT NULL,
  `nazev` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `verze` tinyint(2) NOT NULL,
  `popis` text COLLATE utf8_czech_ci NOT NULL,
  `obrazek` text COLLATE utf8_czech_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `pokemoni`
--

INSERT INTO `pokemoni` (`id`, `nazev`, `verze`, `popis`, `obrazek`) VALUES
(1, 'Bulbasaur', 1, 'Cibulka na zádech tohoto travního pokémona naznačuje, že má blíže k rostlině než by se\r\nmohlo na první pohled zdát. Je plna semínek, a roste spolu s Bulbasaurem.\r\nSlouží mu též jako zásobárna energie, a úkryt pro dvě vystřelovací zelené liány, oblíbený to Bulbasaurův nástroj.', 'bulbasaur.png'),
(2, 'Charmander', 1, 'Obtížně ovladatelný pokémon, doporučený k použití zkušenějším trenérům. Plamínek na jeho\r\nocase hoří od narození, a z jeho velikosti lze usuzovat na aktuální Charmanderovu sílu. Dává přednost teplu a nesnáší déšť.', 'charmander.png'),
(3, 'Squirtle', 1, 'Squirtlův krunýř neslouží jen pro ochranu. Kulatý tvar a drážky na krunýřy pomáhají snížit odpor vody a umožňují pokémonovi\r\nplavat velmi velkou rychlostí.', 'squirtle.png'),
(4, 'Rattata', 2, 'Hojně se vyskytující pokémon, žijící všude kde je co sežrat. Když vidíš jednoho, je jisté že kolem bude několik tuctů dalších.\r\nMalý a velmi rychlý, ale přece jen příliš slabý a pro boj tak vhodný opravdu jen proti málo soupeřům.', 'rattata.png'),
(5, 'Pikachu', 1, 'Elektrickou žlutou myš Pikachu jistě není třeba blíže představovat. Jeho hlavním rysem je úžasná roztomilost, pro kterou bývá často chován jako domácí mazlíček.\r\nVětšinou ovšem osamocený - přítomnost více Pikachu na jednom místě totiž vyvolává náhodné elektrické výboje v jejich okolí. Je velmi inteligentní.\r\nPatří mezi Pokémony kteří neevolvují v závislosti na dosažené úrovni - k přeměně v Raichu potřebuje Hromový kámen (Thunder Stone).', 'pikachu.png'),
(6, 'Jigglypuff', 2, 'Vzácný pokémon. Ačkoliv vypadá neškodně, jeho proslulá píseň dokáže uspat i toho nejsilnějšího nepřítele. K uspání používá krom zpěvu i svých velkých, kulatých očí.', 'jigglypuff.png'),
(7, 'Diglett', 1, 'Těžko polapitelný Pokémon, žijící cca metr pod zemí. To je ideální hloubka pro nalezení jeho oblíbené potravy - kořínků rostlin.\r\nPokud se vynoří na povrch, dává přednost temným místům, zejména jeskyním. Nesnáší přímé světlo a vodu.', 'diglett.png'),
(8, 'Ponyta', 2, 'Přestože je to ohnivý pokémon, jeho nejnebezpečnější zbraně jsou kopyta. Jejich tvrdost několikrát převyšuje i diamant.\r\nOtisky kopyt v tvrdé skále prozradí přítomnost Ponytů v okolí - rádi skákají do velkých výšek, a kopyta tlumí jejich tvrdá přistání.', 'ponyta.png'),
(9, 'Eevee', 2, 'Roztomile vypadající pokémon malých schopností, ale velkých možností. Jako jediný pokémon vůbec se totiž může vyvinout do několika\r\nzcela odlišných forem, v závislosti na tom, jaký druh kouzelného kamene mu jeho trenér poskytne. Eevee se tak může změnit\r\nve vodního Vaporeona, elektrického Jolteona, ohnivého Flareona, temného Umbreona, ledového Glaceona, travního Leafeona nebo psychického Espeona.', 'eevee.png'),
(10, 'Abra', 1, 'Abra nemá příliš fyzických dispozicí k boji. Plně je však nahrazují její telekinetické schopnosti. Dokáže předvídat útok, a včas se\r\nteleportovat do bezpečné vzdálenosti. Spí až 18 hodin denně, nicméně i ve spánku se instinnktivě teleportuje v případě hrozícího nebezpečí.', 'abra.png'),
(11, 'Geodude', 1, 'Pokud leží nepohnutě, snadno si ho spletete s větším kamenem. Pokud na něj ale šlápnete, může se rozzuřit. V té chvíli ukáže svoje ruce,\r\na roztočí je děsivou rychlostí do smrtícího mlýna. V klidném stavu rukou používá pro šplhání na skály', 'geodude.png'),
(12, 'Gastly', 1, 'Pokud sám nechce být viděn, jen těžko se vám ho podaří spatřit. Svým plyným tělem dokáže obklopit protivníka a uspat ho dříve, než si\r\nvšimne že se něco děje. Často přebývá ve starých, opuštěných budovách. Na volné prostranství se příliš neodvažuje - hrozí mu totiž, že bude odnesen náhlým závanem větru.', 'gastly.png'),
(13, 'Bellsprout', 2, 'Pokémon připomínající masožravou květinu. Stejně jako ona umí přijímat potravu jak kořínky, tak v podobě různého hmyzu který naláká do svého kalichu.\r\nNení ale vázán jen na jedno místo - dokáže vykořenit, a docela rychle se přesunout jinam. Miluje vlhko a teplo.', 'bellsprout.png'),
(14, 'Snorlax', 1, 'Není na světě ospalejšího tvora. Snorlax miluje spánek nade vše. Pokud nespí, tak docela určitě jí, což je jeho druhá vášeň. Tento sympatický tvor\r\ndokáže sníst naprosto cokoliv - jakkoliv je to nechutné či dokonce jedovaté. Není divu že při svém způsobu života stále pěkně tloustne.\r\nAle pozor, nepodceňovat - i ve spánku se dokáže účinně bránit převalováním...', 'snorlax.png'),
(15, 'Mewtwo', 2, 'Mewtwo je uměle vytvořený pokémon, výsledek mnoha let genetických experimentů vědců z Rumělkového města. Cílem bylo vytvořit pokémona naprosto dokonale\r\npřizpůsobeného pro boj s libovolným protivníkem - a to se také nakonec podařilo. Možná až příliš dobře. Mewtwo je agresivní a nepřátelský ke všemu živému.', 'mewtwo.png'),
(52, 'Pichu', 0, 'Pichu je malý zemní hlodavec převážně barvy žluté v celé jeho postavě. Jeho kožešina je krátká, bledě žlutě zbarvená. Části jeho učí jsou černé, taktéž má dodatečné označení na svém krku a ocasu. Jeho ocas je ještě malý a krátký, podobný tak trochu jako Pikachu ocas, ale ještě ne tak vyvinutý. Má dva vaky jako líce, které jsou především růžové barvy, sloužící k účelu uskladnění elektřiny. Jeho nos je extrémně velmi malý, téměř viditelný jako bod. ', 'pichu.png'),
(64, 'champion', 0, 'champa', 'photo.jpg');

-- --------------------------------------------------------

--
-- Struktura tabulky `pokemon_typ`
--

CREATE TABLE `pokemon_typ` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pokemona` int(11) NOT NULL,
  `id_typu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `pokemon_typ`
--

INSERT INTO `pokemon_typ` (`id`, `id_pokemona`, `id_typu`) VALUES
(1, 1, 5),
(2, 1, 8),
(3, 2, 2),
(4, 3, 3),
(5, 4, 1),
(6, 5, 4),
(7, 6, 1),
(8, 7, 9),
(9, 8, 2),
(10, 9, 1),
(11, 10, 11),
(12, 11, 9),
(13, 11, 13),
(15, 12, 8),
(14, 12, 14),
(16, 13, 5),
(17, 13, 8),
(18, 14, 1),
(19, 15, 11),
(55, 52, 4),
(82, 64, 1),
(83, 64, 2),
(84, 64, 3);

-- --------------------------------------------------------

--
-- Struktura tabulky `sbirka`
--

CREATE TABLE `sbirka` (
  `id` int(10) UNSIGNED NOT NULL,
  `pokemon_id` int(11) NOT NULL,
  `uzivatel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `sbirka`
--

INSERT INTO `sbirka` (`id`, `pokemon_id`, `uzivatel_id`) VALUES
(1, 2, 1),
(2, 2, 1),
(3, 3, 1),
(4, 3, 1),
(5, 1, 1),
(6, 5, 1),
(7, 4, 1),
(8, 2, 1),
(9, 52, 1),
(10, 1, 1),
(13, 5, 4);

-- --------------------------------------------------------

--
-- Struktura tabulky `slabiny`
--

CREATE TABLE `slabiny` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_pokemona` int(11) NOT NULL,
  `id_slabiny` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `slabiny`
--

INSERT INTO `slabiny` (`id`, `id_pokemona`, `id_slabiny`) VALUES
(2, 1, 2),
(1, 1, 10),
(3, 2, 3),
(4, 2, 9),
(7, 3, 4),
(6, 3, 5),
(8, 4, 7),
(10, 5, 3),
(9, 5, 10),
(11, 6, 8),
(12, 6, 17),
(13, 7, 3),
(14, 7, 6),
(16, 8, 3),
(15, 8, 13),
(17, 9, 7),
(18, 9, 12),
(20, 10, 10),
(19, 10, 14),
(22, 11, 5),
(21, 11, 17),
(23, 12, 11),
(24, 12, 16),
(26, 13, 2),
(25, 13, 11),
(27, 14, 7),
(28, 15, 12),
(29, 15, 14),
(63, 52, 9),
(78, 64, 2),
(79, 64, 3);

-- --------------------------------------------------------

--
-- Struktura tabulky `typy`
--

CREATE TABLE `typy` (
  `id` int(11) NOT NULL,
  `typ` varchar(30) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `typy`
--

INSERT INTO `typy` (`id`, `typ`) VALUES
(1, 'Normální'),
(2, 'Ohnivý'),
(3, 'Vodní'),
(4, 'Elektrický'),
(5, 'Travní'),
(6, 'Ledový'),
(7, 'Bojový'),
(8, 'Jedovatý'),
(9, 'Zemní'),
(10, 'Létájící'),
(11, 'Psychický'),
(12, 'Hmyzí'),
(13, 'Kamenný'),
(14, 'Duch'),
(15, 'Dračí'),
(16, 'Temný'),
(17, 'Ocelový'),
(18, 'Vílí');

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatele`
--

CREATE TABLE `uzivatele` (
  `id` int(10) UNSIGNED NOT NULL,
  `jmeno` varchar(30) COLLATE utf8_czech_ci NOT NULL,
  `heslo` char(32) COLLATE utf8_czech_ci NOT NULL,
  `admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `uzivatele`
--

INSERT INTO `uzivatele` (`id`, `jmeno`, `heslo`, `admin`) VALUES
(1, 'zbyndos', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(2, 'vita', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(3, 'johny', '5f4dcc3b5aa765d61d8327deb882cf99', 0),
(4, 'GrayWolf', '5f4dcc3b5aa765d61d8327deb882cf99', 0),
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `pokemoni`
--
ALTER TABLE `pokemoni`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `pokemon_typ`
--
ALTER TABLE `pokemon_typ`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pokemona_2` (`id_pokemona`,`id_typu`),
  ADD KEY `id_pokemona` (`id_pokemona`),
  ADD KEY `id_typu` (`id_typu`);

--
-- Klíče pro tabulku `sbirka`
--
ALTER TABLE `sbirka`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `slabiny`
--
ALTER TABLE `slabiny`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pokemona_2` (`id_pokemona`,`id_slabiny`),
  ADD KEY `id_pokemona` (`id_pokemona`,`id_slabiny`);

--
-- Klíče pro tabulku `typy`
--
ALTER TABLE `typy`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `pokemoni`
--
ALTER TABLE `pokemoni`
  MODIFY `id` int(200) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pro tabulku `pokemon_typ`
--
ALTER TABLE `pokemon_typ`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT pro tabulku `sbirka`
--
ALTER TABLE `sbirka`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pro tabulku `slabiny`
--
ALTER TABLE `slabiny`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT pro tabulku `typy`
--
ALTER TABLE `typy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pro tabulku `uzivatele`
--
ALTER TABLE `uzivatele`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
