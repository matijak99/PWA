-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2026 at 05:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lexpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `kategorija_id` int(11) NOT NULL,
  `naziv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`kategorija_id`, `naziv`) VALUES
(3, 'Crna kronika'),
(2, 'Gospodarstvo'),
(1, 'Svijet');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `komentar_id` int(11) NOT NULL,
  `sadrzaj` text NOT NULL,
  `datum_objave` timestamp NOT NULL DEFAULT current_timestamp(),
  `korisnik_id` int(11) NOT NULL,
  `vijest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`komentar_id`, `sadrzaj`, `datum_objave`, `korisnik_id`, `vijest_id`) VALUES
(3, 'Jako lijep doktor na slici sviđa mi se jako ova građevina :)', '2026-06-21 09:35:47', 8, 1782028515),
(5, 'Ja se slazem s admionom ovaj je dobar', '2026-06-21 09:54:06', 1, 1782028515),
(6, 'ZALJUBIO SAM SE U OVOG ČOVJEKA', '2026-06-21 10:00:10', 9, 1782028515),
(7, 'Joj pa ovo nikako nije uredu ZAHTJEVAM da se rat prekine u ovo TRENUTKU 😡😡😡', '2026-06-21 15:02:23', 9, 1782037703);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnik_id` int(11) NOT NULL,
  `korisnicko_ime` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `uloga` tinyint(4) NOT NULL DEFAULT 0,
  `datum_registracije` timestamp NOT NULL DEFAULT current_timestamp(),
  `ime` varchar(50) DEFAULT NULL,
  `prezime` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnik_id`, `korisnicko_ime`, `email`, `lozinka`, `uloga`, `datum_registracije`, `ime`, `prezime`) VALUES
(1, 'ime', 'a@gmail.com', '$2y$10$K2UrKb2Xn1s4ABYflT4Mwerp6v.Q8nkEzcOqUgwkHZ8s1020PlEJq', 0, '2026-06-20 09:19:23', NULL, NULL),
(8, 'admin', 'admin@gmail.com', '$2y$10$i/phN3W1jHb5ju0OMCW9TeAVeO8mWdoMIyDYSgbt4uUIEwurBAQEW', 2, '2026-06-20 11:00:57', NULL, NULL),
(9, 'Paolo', 'paolo@gmail.com', '$2y$10$VZh7MuctK1dyiRxsh6DksuAqvaHBDTm3yMbIlaJbcd1tWEyYqHX9m', 0, '2026-06-21 09:59:46', NULL, NULL),
(14, 'noviKorisnik', 'novi@gmail.com', '$2y$10$Lb5nRL.XuGxh3y8grlnhNeEFLvNnM7OYzQPLPBB4lsEbc1pt6ZK/S', 0, '2026-06-21 15:22:41', 'Novo', 'Ime');

-- --------------------------------------------------------

--
-- Table structure for table `vijest`
--

CREATE TABLE `vijest` (
  `vijest_id` int(11) NOT NULL,
  `naslov` varchar(255) NOT NULL,
  `sadrzaj` text NOT NULL,
  `datum_objave` timestamp NOT NULL DEFAULT current_timestamp(),
  `kategorija_id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vijest`
--

INSERT INTO `vijest` (`vijest_id`, `naslov`, `sadrzaj`, `datum_objave`, `kategorija_id`, `autor_id`) VALUES
(1782028515, 'test1', 'AAAAAAAsgudofidgrgnfduihvhhhhhhhhhhhhhh', '2026-06-21 07:55:15', 2, 8),
(1782028565, 'Simple minecraft house', 'This is a simple minecraft house', '2026-06-21 07:56:05', 2, 8),
(1782037703, 'Napetosti na Bliskom istoku rastu nakon novih diplomatskih pregovora bez konkretnog napretka', 'Diplomatski razgovori između ključnih regionalnih i međunarodnih aktera ponovno su završili bez konkretnog dogovora o smirivanju dugotrajnih napetosti. Sudionici pregovora iznijeli su suprotstavljene stavove o sigurnosnim jamstvima, vojnoj prisutnosti i kontroli spornih teritorija, što je onemogućilo postizanje kompromisa. Iako su sve strane izrazile spremnost za nastavak dijaloga, na terenu se istovremeno bilježe pojačane sigurnosne aktivnosti i retorika koja dodatno podiže tenzije.\r\n\r\nMeđunarodni promatrači upozoravaju da bi izostanak konkretnih dogovora mogao dovesti do daljnje destabilizacije regije. Humanitarne organizacije također izražavaju zabrinutost zbog mogućeg utjecaja na civilno stanovništvo, osobito u već pogođenim područjima. Sljedeći krug pregovora očekuje se u narednim tjednima, no optimizam ostaje ograničen.', '2026-06-21 10:28:23', 1, 8),
(1782037783, 'Europska unija najavljuje nove mjere za kontrolu migracija i jačanje vanjskih granica', 'Europska komisija predstavila je opsežan paket mjera usmjerenih na poboljšanje upravljanja migracijskim tokovima te jačanje sigurnosti vanjskih granica Europske unije. Plan uključuje povećanje budžeta za agencije koje nadziru granice, bržu obradu zahtjeva za azil te jaču suradnju s državama izvan EU-a kako bi se smanjio pritisak na pojedine članice.\r\n\r\nDok dio članica podržava ove mjere kao nužne za očuvanje sigurnosti i stabilnosti, organizacije za ljudska prava upozoravaju da bi ubrzani postupci mogli dovesti do smanjenja zaštite prava tražitelja azila. Rasprava o ravnoteži između sigurnosti i humanitarnog pristupa i dalje je jedno od ključnih političkih pitanja unutar Unije. Očekuje se da će prijedlog ući u zakonodavnu proceduru u idućim mjesecima.', '2026-06-21 10:29:43', 1, 8),
(1782037828, 'Sjedinjene Američke Države i Kina započinju nove trgovinske razgovore u Ženevi', 'Predstavnici Sjedinjenih Američkih Država i Kine sastali su se u Ženevi kako bi obnovili pregovore o trgovinskim odnosima, carinama i tehnološkoj suradnji. Fokus razgovora je na smanjenju postojećih trgovinskih barijera, stabilizaciji globalnih lanaca opskrbe te smanjenju ekonomskih napetosti koje su posljednjih godina opterećivale bilateralne odnose.\r\n\r\nIako su obje strane pristupile pregovorima s opreznim optimizmom, stručnjaci ističu da ostaju duboke razlike u pitanjima industrijskih subvencija, pristupa tržištu i tehnoloških ograničenja. Ishod razgovora mogao bi imati značajan utjecaj na globalnu ekonomiju, osobito na tehnološki i proizvodni sektor, koji su snažno povezani s obje zemlje.', '2026-06-21 10:30:28', 1, 8),
(1782037874, 'Globalne klimatske promjene uzrokuju rekordne temperature diljem južne hemisfere', 'Znanstvenici diljem svijeta bilježe rekordne temperature u više regija južne hemisfere, što dodatno potvrđuje dugoročni trend globalnog zatopljenja. Ekstremni toplinski valovi posebno pogađaju Australiju, južnu Afriku i dijelove Južne Amerike, gdje se bilježe povijesno visoke temperature za ovo doba godine.\r\n\r\nPosljedice su vidljive u poljoprivredi, gdje su prinosi smanjeni zbog suša, kao i u zdravstvenim sustavima koji se suočavaju s povećanim brojem slučajeva toplinskih udara. Stručnjaci upozoravaju da bi bez hitnog smanjenja emisija stakleničkih plinova ovakvi ekstremni vremenski uvjeti mogli postati nova normalnost, s ozbiljnim dugoročnim ekonomskim i društvenim posljedicama.', '2026-06-21 10:31:14', 1, 8),
(1782037975, 'Europska središnja banka razmatra dodatno povećanje kamatnih stopa zbog inflacijskih pritisaka', 'Europska središnja banka (ESB) razmatra mogućnost dodatnog povećanja kamatnih stopa kako bi se inflacija u eurozoni vratila u ciljane okvire. Unatoč ranijim mjerama monetarnog zaoštravanja, inflacijski pritisci i dalje su prisutni, osobito u segmentu usluga i hrane.\r\n\r\nEkonomisti su podijeljeni oko potencijalnih posljedica takve odluke. Dok jedni smatraju da je daljnje povećanje nužno za stabilizaciju cijena, drugi upozoravaju da bi to moglo dodatno usporiti gospodarski rast i povećati teret otplate kredita za građane i poduzeća. Tržišta već reagiraju povećanom nesigurnošću i očekuju jasnije signale ESB-a u narednim tjednima.', '2026-06-21 10:32:55', 2, 8),
(1782038050, 'Cijene nafte ponovno rastu nakon smanjenja proizvodnje zemalja OPEC-a', 'Na globalnim energetskim tržištima zabilježen je novi rast cijena nafte nakon odluke zemalja članica OPEC-a o smanjenju razine proizvodnje. Cilj ove odluke je stabilizacija tržišta i održavanje prihvatljivih razina prihoda za proizvođače, no ona istovremeno izaziva zabrinutost kod velikih uvoznika.\r\n\r\nRast cijena energije ima izravan utjecaj na troškove prijevoza, industrijske proizvodnje i potrošačke cijene, što bi moglo dodatno pojačati inflacijske pritiske u brojnim gospodarstvima. Analitičari upozoravaju da bi tržište nafte u idućim mjesecima moglo ostati izrazito volatilno, ovisno o globalnoj potražnji i geopolitičkim kretanjima.', '2026-06-21 10:34:10', 2, 8),
(1782038102, 'Tehnološke kompanije bilježe snažan rast profita unatoč usporavanju globalne ekonomije', 'Najveće svjetske tehnološke kompanije objavile su poslovne rezultate koji pokazuju značajan rast dobiti, unatoč usporavanju globalnog gospodarskog rasta. Glavni pokretači ovog trenda su povećana potražnja za digitalnim uslugama, razvoj umjetne inteligencije te širenje cloud infrastrukture.\r\n\r\nDok tradicionalni sektori bilježe stagnaciju ili pad, tehnološki sektor nastavlja privlačiti investicije i ostvarivati visoke marže. Stručnjaci ističu da se tržište sve više polarizira, pri čemu tehnološke kompanije postaju ključni nositelji rasta globalne ekonomije, ali i potencijalni izvor tržišnih rizika zbog svoje dominantne pozicije.', '2026-06-21 10:35:02', 2, 8),
(1782038147, 'Hrvatski izvoznici suočavaju se s izazovima zbog slabije potražnje na europskom tržištu', 'Hrvatske izvozne tvrtke suočavaju se s padom narudžbi uslijed usporavanja gospodarske aktivnosti u ključnim državama Europske unije. Najveći pritisak osjeća industrijski sektor, osobito proizvodnja dijelova za automobilsku industriju, kao i prehrambena industrija koja ovisi o stabilnoj inozemnoj potražnji.\r\n\r\nPoduzetnici upozoravaju da bi nastavak ovakvog trenda mogao utjecati na zapošljavanje i investicijske planove. Kao odgovor na situaciju, dio tvrtki razmatra širenje na nova tržišta izvan EU-a te jačanje digitalnih prodajnih kanala kako bi smanjili ovisnost o tradicionalnim izvoznim partnerima.', '2026-06-21 10:35:47', 2, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`kategorija_id`),
  ADD UNIQUE KEY `naziv` (`naziv`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`komentar_id`),
  ADD KEY `korisnik_id` (`korisnik_id`),
  ADD KEY `vijest_id` (`vijest_id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnik_id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vijest`
--
ALTER TABLE `vijest`
  ADD PRIMARY KEY (`vijest_id`),
  ADD KEY `kategorija_id` (`kategorija_id`),
  ADD KEY `autor_id` (`autor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `kategorija_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `komentar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`),
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`vijest_id`) REFERENCES `vijest` (`vijest_id`);

--
-- Constraints for table `vijest`
--
ALTER TABLE `vijest`
  ADD CONSTRAINT `vijest_ibfk_1` FOREIGN KEY (`kategorija_id`) REFERENCES `kategorija` (`kategorija_id`),
  ADD CONSTRAINT `vijest_ibfk_2` FOREIGN KEY (`autor_id`) REFERENCES `korisnik` (`korisnik_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
