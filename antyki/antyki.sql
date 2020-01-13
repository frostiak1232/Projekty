-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Sty 2020, 17:13
-- Wersja serwera: 10.4.8-MariaDB
-- Wersja PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `antyki`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(255) NOT NULL,
  `kategoria` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id`, `kategoria`) VALUES
(9, 'Porcelana'),
(8, 'Srebra');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `podkategorie`
--

CREATE TABLE `podkategorie` (
  `id` int(255) NOT NULL,
  `podkategoria` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `kategoria` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `podkategorie`
--

INSERT INTO `podkategorie` (`id`, `podkategoria`, `kategoria`) VALUES
(5, 'Galanteria stołowa', 'Srebra'),
(6, 'Filiżanki', 'Porcelana'),
(7, 'Wazony', 'Porcelana'),
(8, 'Figurki', 'Porcelana');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `opis` text COLLATE utf8_polish_ci NOT NULL,
  `cena` int(255) NOT NULL,
  `kategoria` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `podkategoria` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `zdjecie` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `zdjecie2` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `zdjecie3` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `zdjecie4` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `zdjecie5` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id`, `nazwa`, `opis`, `cena`, `kategoria`, `podkategoria`, `zdjecie`, `zdjecie2`, `zdjecie3`, `zdjecie4`, `zdjecie5`) VALUES
(58, 'Srebrna zastawa próba 920', 'Zestaw srebrnych sztućców na 6 os./30 szt. wzór RAPSODIA , Srebro, pr. 3, stalowe ostrza; 30 sztuk (zestaw po 6 noży, widelców, łyżek, łyżeczek do herbaty i kawy); waga netto ok. 1120 g, z ostrzami 1360 g. Znakowanie: w owalu W, główka kobiety i 3, oraz FH (Hefra)- 800 i ostrza HEFRA stainless Poland. W pudełku kartonowym, Sztućce, Polska, Warszawa, Hefra, po 1963r.\r\n\r\nW skład kompletu wchodzi:6 łyżek ob.; długość 20,4 cm;6 widelców dł. 20,5 cm; 6 noży dł. 22 cm. 6 łyżeczek do herbaty; dł. 14,4 cm.6 łyżeczek do kawy dł. 11cm. waga 30 elementów 1,360 kg. Waga bez noży: 970 gr.', 960, 'Srebra', 'Galanteria', 'zstw.jpg', 'zstw2.jpg', 'zsrw3.jpg', '', ''),
(60, 'Wazon ceramiczny z kolekcji BOHO, cieniowany', 'Kolekcję ceramiki dekoracyjnej BOHO zaprojektowano w duchu modnej stylistyki, inspirowanej trendami etnicznymi i ludowymi, w modnej granatowo-niebieskiej konwencji kolorystycznej. Wazon dekoracyjny z serii BOHO wyróżnia modne i efektowne cieniowanie w stylu ombre oraz szkliwiona powierzchnia. U dołu ciemna, granatowa i gładka faktura zmienia się w jasnoniebieskie cienie w górnej części wazonu, z nierównomiernym cieniowaniem, co sprawia, że wazon prezentuje się jeszcze okazalej. Polecamy zestawić obie wielkości wazonów ze sobą lub połączyć je z  misą, paterą czy figurką  - stanowić będą zgrany komplet i kunsztowną dekorację na Twoim stole lub komodzie. A może odważysz się zestawić ją we wnętrzu z bogato zdobionymi zasłonami lub poszewkami? Taka zabawa fakturą i kolorem świetnie wpisuje się w trend boho.\r\n\r\n\r\nDane techniczne: \r\n\r\nśrednica: 17 cm \r\nwysokość: 23 cm \r\nskład: glinka ceramiczna', 103, 'Porcelana', 'Wazony', '5900811857174_1.jpg', '5900811857174_3.jpg', '5900811857174_4.jpg', '', ''),
(61, '1946rok luksusowy wazon SKALARY Rosenthal wydział sztuki', 'Rzadko spotykany autorski wazon z wydziału sztuk pięknych słynnej wytwórni Rosenthal.\r\n\r\nWyjątkowy, porcelanowy wazon na kwiaty i dekoracyjne bukiety z suszków.\r\nWyrób cenionej marki Rosenthal z poszukiwanego oddziału sztuk pięknych:\r\nRosenthal Kunstabteilung Selb\r\n\r\nWazon sygnowany znakiem wytwórni używanym w 1946 roku.\r\nPosiada oryginalną sygnaturę podszkliwną z przeszlifem na szkliwie.\r\n\r\nRęcznie rzeźbiona w biskwicie galanteria porcelanowa, to jedna z najbardziej luksusowych i poszukiwanych serii z artystycznego oddziału / manufaktury grupy Rosenthal.\r\n\r\nNiniejszy wazon dekorowany jest motywem wypukłych - reliefowych skalarów.\r\nWykonany ręcznie z największą precyzją.\r\n\r\nWazon mierzy 13,5 cm wysokości,\r\njego szerokość wynosi 10 cm , a długość 17cm.\r\nZachowany jest w stanie bardzo dobrym i polecany jest przez nas koneserom sztuki i miłośnikom wysokogatunkowej porcelany. Nie posiada uszkodzeń ani pęknięć, widoczne minimalne ślady wieku oraz drobne niedoskonałości fabryczne.', 750, 'Porcelana', 'Wazony', 'luksusowy-wazon-skalary-na-porcelanie-rosenthal.jpg', 'luksusowy-wazon-skalary-na-porcelanie-rosenthal1.jpg', 'luksusowy-wazon-skalary-na-porcelanie-rosenthal4.jpg', 'luksusowy-wazon-skalary-na-porcelanie-rosenthal6.jpg', 'luksusowy-wazon-skalary-na-porcelanie-rosenthal7.jpg'),
(62, 'vcxvcxvcx', 'fdsfdsdss', 3423, 'Porcelana', 'Figurki', 'akt-z-koniem-figura-rosenthal-antyk_1.jpg', 'akt-z-koniem-figura-rosenthal-antyk1_1.jpg', 'akt-z-koniem-figura-rosenthal-antyk6_1.jpg', 'akt-z-koniem-figura-rosenthal-antyk9a_1.jpg', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(255) NOT NULL,
  `login` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`) VALUES
(1, 'admin', '$argon2id$v=19$m=1024,t=2,p=2$VXY0NkZiWDI0WExoeklHbA$lKLzs7LFCGE+RKL3WETJACEdNaPmrFt7+DT275gRMS4');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategoria` (`kategoria`);

--
-- Indeksy dla tabeli `podkategorie`
--
ALTER TABLE `podkategorie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `podkategorie`
--
ALTER TABLE `podkategorie`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
