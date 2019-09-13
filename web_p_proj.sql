-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 13, 2019 at 12:45 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_p_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `email`, `password`, `salt`, `created_at`) VALUES
(1, 'sabry@yahoo.com', 'sabry@yahoo.com', 'a2afb308a72a7c4553720d75fb1edd3b8acce1d5c3a8cc76cbdba1d7bfa33cc9', 'a614a8662e0b7fd3d379d0cca79e145f964492bb0aa9c49ea771f2cfc438bbf1', '2019-07-06 14:59:29');

-- --------------------------------------------------------

--
-- Table structure for table `all_country`
--

CREATE TABLE `all_country` (
  `ID` int(11) NOT NULL,
  `NAME_EN` varchar(200) DEFAULT NULL,
  `ISO` char(2) DEFAULT NULL,
  `ISO3` char(3) DEFAULT NULL,
  `NUMCODE` smallint(6) DEFAULT NULL,
  `PHONECODE` int(5) DEFAULT NULL,
  `NICENAME` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `all_country`
--

INSERT INTO `all_country` (`ID`, `NAME_EN`, `ISO`, `ISO3`, `NUMCODE`, `PHONECODE`, `NICENAME`) VALUES
(1, 'AFGHANISTAN', 'AF', 'AFG', 4, 93, 'Afghanistan'),
(2, 'ALBANIA', 'AL', 'ALB', 8, 355, 'Albania'),
(3, 'ALGERIA', 'DZ', 'DZA', 12, 213, 'Algeria'),
(4, 'AMERICAN SAMOA', 'AS', 'ASM', 16, 1684, 'American Samoa'),
(5, 'ANDORRA', 'AD', 'AND', 20, 376, 'Andorra'),
(6, 'ANGOLA', 'AO', 'AGO', 24, 244, 'Angola'),
(7, 'ANGUILLA', 'AI', 'AIA', 660, 1264, 'Anguilla'),
(8, 'ANTARCTICA', 'AQ', NULL, NULL, 0, 'Antarctica'),
(9, 'ANTIGUA AND BARBUDA', 'AG', 'ATG', 28, 1268, 'Antigua and Barbuda'),
(10, 'ARGENTINA', 'AR', 'ARG', 32, 54, 'Argentina'),
(11, 'ARMENIA', 'AM', 'ARM', 51, 374, 'Armenia'),
(12, 'ARUBA', 'AW', 'ABW', 533, 297, 'Aruba'),
(13, 'AUSTRALIA', 'AU', 'AUS', 36, 61, 'Australia'),
(14, 'AUSTRIA', 'AT', 'AUT', 40, 43, 'Austria'),
(15, 'AZERBAIJAN', 'AZ', 'AZE', 31, 994, 'Azerbaijan'),
(16, 'BAHAMAS', 'BS', 'BHS', 44, 1242, 'Bahamas'),
(17, 'BAHRAIN', 'BH', 'BHR', 48, 973, 'Bahrain'),
(18, 'BANGLADESH', 'BD', 'BGD', 50, 880, 'Bangladesh'),
(19, 'BARBADOS', 'BB', 'BRB', 52, 1246, 'Barbados'),
(20, 'BELARUS', 'BY', 'BLR', 112, 375, 'Belarus'),
(21, 'BELGIUM', 'BE', 'BEL', 56, 32, 'Belgium'),
(22, 'BELIZE', 'BZ', 'BLZ', 84, 501, 'Belize'),
(23, 'BENIN', 'BJ', 'BEN', 204, 229, 'Benin'),
(24, 'BERMUDA', 'BM', 'BMU', 60, 1441, 'Bermuda'),
(25, 'BHUTAN', 'BT', 'BTN', 64, 975, 'Bhutan'),
(26, 'BOLIVIA', 'BO', 'BOL', 68, 591, 'Bolivia'),
(27, 'BOSNIA AND HERZEGOVINA', 'BA', 'BIH', 70, 387, 'Bosnia and Herzegovina'),
(28, 'BOTSWANA', 'BW', 'BWA', 72, 267, 'Botswana'),
(29, 'BOUVET ISLAND', 'BV', NULL, NULL, 0, 'Bouvet Island'),
(30, 'BRAZIL', 'BR', 'BRA', 76, 55, 'Brazil'),
(31, 'BRITISH INDIAN OCEAN TERRITORY', 'IO', NULL, NULL, 246, 'British Indian Ocean Territory'),
(32, 'BRUNEI DARUSSALAM', 'BN', 'BRN', 96, 673, 'Brunei Darussalam'),
(33, 'BULGARIA', 'BG', 'BGR', 100, 359, 'Bulgaria'),
(34, 'BURKINA FASO', 'BF', 'BFA', 854, 226, 'Burkina Faso'),
(35, 'BURUNDI', 'BI', 'BDI', 108, 257, 'Burundi'),
(36, 'CAMBODIA', 'KH', 'KHM', 116, 855, 'Cambodia'),
(37, 'CAMEROON', 'CM', 'CMR', 120, 237, 'Cameroon'),
(38, 'CANADA', 'CA', 'CAN', 124, 1, 'Canada'),
(39, 'CAPE VERDE', 'CV', 'CPV', 132, 238, 'Cape Verde'),
(40, 'CAYMAN ISLANDS', 'KY', 'CYM', 136, 1345, 'Cayman Islands'),
(41, 'CENTRAL AFRICAN REPUBLIC', 'CF', 'CAF', 140, 236, 'Central African Republic'),
(42, 'CHAD', 'TD', 'TCD', 148, 235, 'Chad'),
(43, 'CHILE', 'CL', 'CHL', 152, 56, 'Chile'),
(44, 'CHINA', 'CN', 'CHN', 156, 86, 'China'),
(45, 'CHRISTMAS ISLAND', 'CX', NULL, NULL, 61, 'Christmas Island'),
(46, 'COCOS (KEELING) ISLANDS', 'CC', NULL, NULL, 672, 'Cocos (Keeling) Islands'),
(47, 'COLOMBIA', 'CO', 'COL', 170, 57, 'Colombia'),
(48, 'COMOROS', 'KM', 'COM', 174, 269, 'Comoros'),
(49, 'CONGO', 'CG', 'COG', 178, 242, 'Congo'),
(50, 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'CD', 'COD', 180, 242, 'Congo, the Democratic Republic of the'),
(51, 'COOK ISLANDS', 'CK', 'COK', 184, 682, 'Cook Islands'),
(52, 'COSTA RICA', 'CR', 'CRI', 188, 506, 'Costa Rica'),
(53, 'COTE D\'IVOIRE', 'CI', 'CIV', 384, 225, 'Cote D\'Ivoire'),
(54, 'CROATIA', 'HR', 'HRV', 191, 385, 'Croatia'),
(55, 'CUBA', 'CU', 'CUB', 192, 53, 'Cuba'),
(56, 'CYPRUS', 'CY', 'CYP', 196, 357, 'Cyprus'),
(57, 'CZECH REPUBLIC', 'CZ', 'CZE', 203, 420, 'Czech Republic'),
(58, 'DENMARK', 'DK', 'DNK', 208, 45, 'Denmark'),
(59, 'DJIBOUTI', 'DJ', 'DJI', 262, 253, 'Djibouti'),
(60, 'DOMINICA', 'DM', 'DMA', 212, 1767, 'Dominica'),
(61, 'DOMINICAN REPUBLIC', 'DO', 'DOM', 214, 1809, 'Dominican Republic'),
(62, 'ECUADOR', 'EC', 'ECU', 218, 593, 'Ecuador'),
(63, 'EGYPT', 'EG', 'EGY', 818, 20, 'Egypt'),
(64, 'EL SALVADOR', 'SV', 'SLV', 222, 503, 'El Salvador'),
(65, 'EQUATORIAL GUINEA', 'GQ', 'GNQ', 226, 240, 'Equatorial Guinea'),
(66, 'ERITREA', 'ER', 'ERI', 232, 291, 'Eritrea'),
(67, 'ESTONIA', 'EE', 'EST', 233, 372, 'Estonia'),
(68, 'ETHIOPIA', 'ET', 'ETH', 231, 251, 'Ethiopia'),
(69, 'FALKLAND ISLANDS (MALVINAS)', 'FK', 'FLK', 238, 500, 'Falkland Islands (Malvinas)'),
(70, 'FAROE ISLANDS', 'FO', 'FRO', 234, 298, 'Faroe Islands'),
(71, 'FIJI', 'FJ', 'FJI', 242, 679, 'Fiji'),
(72, 'FINLAND', 'FI', 'FIN', 246, 358, 'Finland'),
(73, 'FRANCE', 'FR', 'FRA', 250, 33, 'France'),
(74, 'FRENCH GUIANA', 'GF', 'GUF', 254, 594, 'French Guiana'),
(75, 'FRENCH POLYNESIA', 'PF', 'PYF', 258, 689, 'French Polynesia'),
(76, 'FRENCH SOUTHERN TERRITORIES', 'TF', NULL, NULL, 0, 'French Southern Territories'),
(77, 'GABON', 'GA', 'GAB', 266, 241, 'Gabon'),
(78, 'GAMBIA', 'GM', 'GMB', 270, 220, 'Gambia'),
(79, 'GEORGIA', 'GE', 'GEO', 268, 995, 'Georgia'),
(80, 'GERMANY', 'DE', 'DEU', 276, 49, 'Germany'),
(81, 'GHANA', 'GH', 'GHA', 288, 233, 'Ghana'),
(82, 'GIBRALTAR', 'GI', 'GIB', 292, 350, 'Gibraltar'),
(83, 'GREECE', 'GR', 'GRC', 300, 30, 'Greece'),
(84, 'GREENLAND', 'GL', 'GRL', 304, 299, 'Greenland'),
(85, 'GRENADA', 'GD', 'GRD', 308, 1473, 'Grenada'),
(86, 'GUADELOUPE', 'GP', 'GLP', 312, 590, 'Guadeloupe'),
(87, 'GUAM', 'GU', 'GUM', 316, 1671, 'Guam'),
(88, 'GUATEMALA', 'GT', 'GTM', 320, 502, 'Guatemala'),
(89, 'GUINEA', 'GN', 'GIN', 324, 224, 'Guinea'),
(90, 'GUINEA-BISSAU', 'GW', 'GNB', 624, 245, 'Guinea-Bissau'),
(91, 'GUYANA', 'GY', 'GUY', 328, 592, 'Guyana'),
(92, 'HAITI', 'HT', 'HTI', 332, 509, 'Haiti'),
(93, 'HEARD ISLAND AND MCDONALD ISLANDS', 'HM', NULL, NULL, 0, 'Heard Island and Mcdonald Islands'),
(94, 'HOLY SEE (VATICAN CITY STATE)', 'VA', 'VAT', 336, 39, 'Holy See (Vatican City State)'),
(95, 'HONDURAS', 'HN', 'HND', 340, 504, 'Honduras'),
(96, 'HONG KONG', 'HK', 'HKG', 344, 852, 'Hong Kong'),
(97, 'HUNGARY', 'HU', 'HUN', 348, 36, 'Hungary'),
(98, 'ICELAND', 'IS', 'ISL', 352, 354, 'Iceland'),
(99, 'INDIA', 'IN', 'IND', 356, 91, 'India'),
(100, 'INDONESIA', 'ID', 'IDN', 360, 62, 'Indonesia'),
(101, 'IRAN, ISLAMIC REPUBLIC OF', 'IR', 'IRN', 364, 98, 'Iran, Islamic Republic of'),
(102, 'IRAQ', 'IQ', 'IRQ', 368, 964, 'Iraq'),
(103, 'IRELAND', 'IE', 'IRL', 372, 353, 'Ireland'),
(104, 'ISRAEL', 'IL', 'ISR', 376, 972, 'Israel'),
(105, 'ITALY', 'IT', 'ITA', 380, 39, 'Italy'),
(106, 'JAMAICA', 'JM', 'JAM', 388, 1876, 'Jamaica'),
(107, 'JAPAN', 'JP', 'JPN', 392, 81, 'Japan'),
(108, 'JORDAN', 'JO', 'JOR', 400, 962, 'Jordan'),
(109, 'KAZAKHSTAN', 'KZ', 'KAZ', 398, 7, 'Kazakhstan'),
(110, 'KENYA', 'KE', 'KEN', 404, 254, 'Kenya'),
(111, 'KIRIBATI', 'KI', 'KIR', 296, 686, 'Kiribati'),
(112, 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'KP', 'PRK', 408, 850, 'Korea, Democratic People\'s Republic of'),
(113, 'KOREA, REPUBLIC OF', 'KR', 'KOR', 410, 82, 'Korea, Republic of'),
(114, 'KUWAIT', 'KW', 'KWT', 414, 965, 'Kuwait'),
(115, 'KYRGYZSTAN', 'KG', 'KGZ', 417, 996, 'Kyrgyzstan'),
(116, 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'LA', 'LAO', 418, 856, 'Lao People\'s Democratic Republic'),
(117, 'LATVIA', 'LV', 'LVA', 428, 371, 'Latvia'),
(118, 'LEBANON', 'LB', 'LBN', 422, 961, 'Lebanon'),
(119, 'LESOTHO', 'LS', 'LSO', 426, 266, 'Lesotho'),
(120, 'LIBERIA', 'LR', 'LBR', 430, 231, 'Liberia'),
(121, 'LIBYAN ARAB JAMAHIRIYA', 'LY', 'LBY', 434, 218, 'Libyan Arab Jamahiriya'),
(122, 'LIECHTENSTEIN', 'LI', 'LIE', 438, 423, 'Liechtenstein'),
(123, 'LITHUANIA', 'LT', 'LTU', 440, 370, 'Lithuania'),
(124, 'LUXEMBOURG', 'LU', 'LUX', 442, 352, 'Luxembourg'),
(125, 'MACAO', 'MO', 'MAC', 446, 853, 'Macao'),
(126, 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'MK', 'MKD', 807, 389, 'Macedonia, the Former Yugoslav Republic of'),
(127, 'MADAGASCAR', 'MG', 'MDG', 450, 261, 'Madagascar'),
(128, 'MALAWI', 'MW', 'MWI', 454, 265, 'Malawi'),
(129, 'MALAYSIA', 'MY', 'MYS', 458, 60, 'Malaysia'),
(130, 'MALDIVES', 'MV', 'MDV', 462, 960, 'Maldives'),
(131, 'MALI', 'ML', 'MLI', 466, 223, 'Mali'),
(132, 'MALTA', 'MT', 'MLT', 470, 356, 'Malta'),
(133, 'MARSHALL ISLANDS', 'MH', 'MHL', 584, 692, 'Marshall Islands'),
(134, 'MARTINIQUE', 'MQ', 'MTQ', 474, 596, 'Martinique'),
(135, 'MAURITANIA', 'MR', 'MRT', 478, 222, 'Mauritania'),
(136, 'MAURITIUS', 'MU', 'MUS', 480, 230, 'Mauritius'),
(137, 'MAYOTTE', 'YT', NULL, NULL, 269, 'Mayotte'),
(138, 'MEXICO', 'MX', 'MEX', 484, 52, 'Mexico'),
(139, 'MICRONESIA, FEDERATED STATES OF', 'FM', 'FSM', 583, 691, 'Micronesia, Federated States of'),
(140, 'MOLDOVA, REPUBLIC OF', 'MD', 'MDA', 498, 373, 'Moldova, Republic of'),
(141, 'MONACO', 'MC', 'MCO', 492, 377, 'Monaco'),
(142, 'MONGOLIA', 'MN', 'MNG', 496, 976, 'Mongolia'),
(143, 'MONTSERRAT', 'MS', 'MSR', 500, 1664, 'Montserrat'),
(144, 'MOROCCO', 'MA', 'MAR', 504, 212, 'Morocco'),
(145, 'MOZAMBIQUE', 'MZ', 'MOZ', 508, 258, 'Mozambique'),
(146, 'MYANMAR', 'MM', 'MMR', 104, 95, 'Myanmar'),
(147, 'NAMIBIA', 'NA', 'NAM', 516, 264, 'Namibia'),
(148, 'NAURU', 'NR', 'NRU', 520, 674, 'Nauru'),
(149, 'NEPAL', 'NP', 'NPL', 524, 977, 'Nepal'),
(150, 'NETHERLANDS', 'NL', 'NLD', 528, 31, 'Netherlands'),
(151, 'NETHERLANDS ANTILLES', 'AN', 'ANT', 530, 599, 'Netherlands Antilles'),
(152, 'NEW CALEDONIA', 'NC', 'NCL', 540, 687, 'New Caledonia'),
(153, 'NEW ZEALAND', 'NZ', 'NZL', 554, 64, 'New Zealand'),
(154, 'NICARAGUA', 'NI', 'NIC', 558, 505, 'Nicaragua'),
(155, 'NIGER', 'NE', 'NER', 562, 227, 'Niger'),
(156, 'NIGERIA', 'NG', 'NGA', 566, 234, 'Nigeria'),
(157, 'NIUE', 'NU', 'NIU', 570, 683, 'Niue'),
(158, 'NORFOLK ISLAND', 'NF', 'NFK', 574, 672, 'Norfolk Island'),
(159, 'NORTHERN MARIANA ISLANDS', 'MP', 'MNP', 580, 1670, 'Northern Mariana Islands'),
(160, 'NORWAY', 'NO', 'NOR', 578, 47, 'Norway'),
(161, 'OMAN', 'OM', 'OMN', 512, 968, 'Oman'),
(162, 'PAKISTAN', 'PK', 'PAK', 586, 92, 'Pakistan'),
(163, 'PALAU', 'PW', 'PLW', 585, 680, 'Palau'),
(164, 'PALESTINIAN TERRITORY, OCCUPIED', 'PS', NULL, NULL, 970, 'Palestinian Territory, Occupied'),
(165, 'PANAMA', 'PA', 'PAN', 591, 507, 'Panama'),
(166, 'PAPUA NEW GUINEA', 'PG', 'PNG', 598, 675, 'Papua New Guinea'),
(167, 'PARAGUAY', 'PY', 'PRY', 600, 595, 'Paraguay'),
(168, 'PERU', 'PE', 'PER', 604, 51, 'Peru'),
(169, 'PHILIPPINES', 'PH', 'PHL', 608, 63, 'Philippines'),
(170, 'PITCAIRN', 'PN', 'PCN', 612, 0, 'Pitcairn'),
(171, 'POLAND', 'PL', 'POL', 616, 48, 'Poland'),
(172, 'PORTUGAL', 'PT', 'PRT', 620, 351, 'Portugal'),
(173, 'PUERTO RICO', 'PR', 'PRI', 630, 1787, 'Puerto Rico'),
(174, 'QATAR', 'QA', 'QAT', 634, 974, 'Qatar'),
(175, 'REUNION', 'RE', 'REU', 638, 262, 'Reunion'),
(176, 'ROMANIA', 'RO', 'ROM', 642, 40, 'Romania'),
(177, 'RUSSIAN FEDERATION', 'RU', 'RUS', 643, 70, 'Russian Federation'),
(178, 'RWANDA', 'RW', 'RWA', 646, 250, 'Rwanda'),
(179, 'SAINT HELENA', 'SH', 'SHN', 654, 290, 'Saint Helena'),
(180, 'SAINT KITTS AND NEVIS', 'KN', 'KNA', 659, 1869, 'Saint Kitts and Nevis'),
(181, 'SAINT LUCIA', 'LC', 'LCA', 662, 1758, 'Saint Lucia'),
(182, 'SAINT PIERRE AND MIQUELON', 'PM', 'SPM', 666, 508, 'Saint Pierre and Miquelon'),
(183, 'SAINT VINCENT AND THE GRENADINES', 'VC', 'VCT', 670, 1784, 'Saint Vincent and the Grenadines'),
(184, 'SAMOA', 'WS', 'WSM', 882, 684, 'Samoa'),
(185, 'SAN MARINO', 'SM', 'SMR', 674, 378, 'San Marino'),
(186, 'SAO TOME AND PRINCIPE', 'ST', 'STP', 678, 239, 'Sao Tome and Principe'),
(187, 'SAUDI ARABIA', 'SA', 'SAU', 682, 966, 'Saudi Arabia'),
(188, 'SENEGAL', 'SN', 'SEN', 686, 221, 'Senegal'),
(189, 'SERBIA AND MONTENEGRO', 'CS', NULL, NULL, 381, 'Serbia and Montenegro'),
(190, 'SEYCHELLES', 'SC', 'SYC', 690, 248, 'Seychelles'),
(191, 'SIERRA LEONE', 'SL', 'SLE', 694, 232, 'Sierra Leone'),
(192, 'SINGAPORE', 'SG', 'SGP', 702, 65, 'Singapore'),
(193, 'SLOVAKIA', 'SK', 'SVK', 703, 421, 'Slovakia'),
(194, 'SLOVENIA', 'SI', 'SVN', 705, 386, 'Slovenia'),
(195, 'SOLOMON ISLANDS', 'SB', 'SLB', 90, 677, 'Solomon Islands'),
(196, 'SOMALIA', 'SO', 'SOM', 706, 252, 'Somalia'),
(197, 'SOUTH AFRICA', 'ZA', 'ZAF', 710, 27, 'South Africa'),
(198, 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'GS', NULL, NULL, 0, 'South Georgia and the South Sandwich Islands'),
(199, 'SPAIN', 'ES', 'ESP', 724, 34, 'Spain'),
(200, 'SRI LANKA', 'LK', 'LKA', 144, 94, 'Sri Lanka'),
(201, 'SUDAN', 'SD', 'SDN', 736, 249, 'Sudan'),
(202, 'SURINAME', 'SR', 'SUR', 740, 597, 'Suriname'),
(203, 'SVALBARD AND JAN MAYEN', 'SJ', 'SJM', 744, 47, 'Svalbard and Jan Mayen'),
(204, 'SWAZILAND', 'SZ', 'SWZ', 748, 268, 'Swaziland'),
(205, 'SWEDEN', 'SE', 'SWE', 752, 46, 'Sweden'),
(206, 'SWITZERLAND', 'CH', 'CHE', 756, 41, 'Switzerland'),
(207, 'SYRIAN ARAB REPUBLIC', 'SY', 'SYR', 760, 963, 'Syrian Arab Republic'),
(208, 'TAIWAN, PROVINCE OF CHINA', 'TW', 'TWN', 158, 886, 'Taiwan, Province of China'),
(209, 'TAJIKISTAN', 'TJ', 'TJK', 762, 992, 'Tajikistan'),
(210, 'TANZANIA, UNITED REPUBLIC OF', 'TZ', 'TZA', 834, 255, 'Tanzania, United Republic of'),
(211, 'THAILAND', 'TH', 'THA', 764, 66, 'Thailand'),
(212, 'TIMOR-LESTE', 'TL', NULL, NULL, 670, 'Timor-Leste'),
(213, 'TOGO', 'TG', 'TGO', 768, 228, 'Togo'),
(214, 'TOKELAU', 'TK', 'TKL', 772, 690, 'Tokelau'),
(215, 'TONGA', 'TO', 'TON', 776, 676, 'Tonga'),
(216, 'TRINIDAD AND TOBAGO', 'TT', 'TTO', 780, 1868, 'Trinidad and Tobago'),
(217, 'TUNISIA', 'TN', 'TUN', 788, 216, 'Tunisia'),
(218, 'TURKEY', 'TR', 'TUR', 792, 90, 'Turkey'),
(219, 'TURKMENISTAN', 'TM', 'TKM', 795, 7370, 'Turkmenistan'),
(220, 'TURKS AND CAICOS ISLANDS', 'TC', 'TCA', 796, 1649, 'Turks and Caicos Islands'),
(221, 'TUVALU', 'TV', 'TUV', 798, 688, 'Tuvalu'),
(222, 'UGANDA', 'UG', 'UGA', 800, 256, 'Uganda'),
(223, 'UKRAINE', 'UA', 'UKR', 804, 380, 'Ukraine'),
(224, 'UNITED ARAB EMIRATES', 'AE', 'ARE', 784, 971, 'United Arab Emirates'),
(225, 'UNITED KINGDOM', 'GB', 'GBR', 826, 44, 'United Kingdom'),
(226, 'UNITED STATES', 'US', 'USA', 840, 1, 'United States'),
(227, 'UNITED STATES MINOR OUTLYING ISLANDS', 'UM', NULL, NULL, 1, 'United States Minor Outlying Islands'),
(228, 'URUGUAY', 'UY', 'URY', 858, 598, 'Uruguay'),
(229, 'UZBEKISTAN', 'UZ', 'UZB', 860, 998, 'Uzbekistan'),
(230, 'VANUATU', 'VU', 'VUT', 548, 678, 'Vanuatu'),
(231, 'VENEZUELA', 'VE', 'VEN', 862, 58, 'Venezuela'),
(232, 'VIET NAM', 'VN', 'VNM', 704, 84, 'Viet Nam'),
(233, 'VIRGIN ISLANDS, BRITISH', 'VG', 'VGB', 92, 1284, 'Virgin Islands, British'),
(234, 'VIRGIN ISLANDS, U.S.', 'VI', 'VIR', 850, 1340, 'Virgin Islands, U.s.'),
(235, 'WALLIS AND FUTUNA', 'WF', 'WLF', 876, 681, 'Wallis and Futuna'),
(236, 'WESTERN SAHARA', 'EH', 'ESH', 732, 212, 'Western Sahara'),
(237, 'YEMEN', 'YE', 'YEM', 887, 967, 'Yemen'),
(238, 'ZAMBIA', 'ZM', 'ZMB', 894, 260, 'Zambia'),
(239, 'ZIMBABWE', 'ZW', 'ZWE', 716, 263, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `author_desc` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `author_name`, `author_desc`, `created_at`) VALUES
(1, 'test', 'test', '2019-08-23 11:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `book_desc` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `author_id`, `cat_id`, `price`, `qty`, `image`, `book_desc`, `created_at`) VALUES
(2, 'sabry', 1, 1, 11.00, 22, '1566691598.png', NULL, '2019-08-25 00:06:39'),
(3, 'Book', 1, 1, 11.00, 22, '1566691598.png', NULL, '2019-08-29 11:03:48'),
(4, 'Book', 1, 1, 11.00, 22, '1566691598.png', NULL, '2019-08-29 11:03:53'),
(5, 'Book', 1, 1, 11.00, 22, '1566691598.png', NULL, '2019-08-29 11:03:53'),
(7, 'Book', 1, 1, 11.00, 22, '1566691598.png', NULL, '2019-08-29 11:03:57'),
(8, 'Book', 1, 1, 11.00, 22, '1566691598.png', NULL, '2019-08-29 11:03:57'),
(9, 'Book', 1, 1, 11.00, 22, '1566691598.png', NULL, '2019-08-29 11:03:57'),
(10, 'Book', 1, 1, 11.00, 22, '1566691598.png', NULL, '2019-08-29 11:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `cat_desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `cat_desc`) VALUES
(1, 'asdasdasd', NULL),
(3, 'asdadads1', 'asdadasdasd1');

-- --------------------------------------------------------

--
-- Table structure for table `login_hist`
--

CREATE TABLE `login_hist` (
  `USER_ID` int(11) DEFAULT NULL,
  `histroy_id` int(11) NOT NULL,
  `SESSIONID` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `TIMESTAMP` datetime NOT NULL,
  `IP_ADDRESS` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `BROWSER` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `OS` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ACTIVE` smallint(1) DEFAULT NULL,
  `LOGOUT_TIMESTAMP` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_hist`
--

INSERT INTO `login_hist` (`USER_ID`, `histroy_id`, `SESSIONID`, `TIMESTAMP`, `IP_ADDRESS`, `BROWSER`, `OS`, `ACTIVE`, `LOGOUT_TIMESTAMP`) VALUES
(1, 7, 'cb16e487005c1e4354628f56c6ee3125', '2019-08-29 14:25:34', '::1', 'Chrome', 'Mac OS X', 1, NULL),
(1, 8, 'cb16e487005c1e4354628f56c6ee3125', '2019-08-29 19:56:52', '::1', 'Chrome', 'Mac OS X', 1, NULL),
(1, 9, 'c4ad5d8db4df5728df1afbb2f1d5b199', '2019-09-11 12:53:41', '::1', 'Chrome', 'Mac OS X', 1, NULL),
(1, 10, '75a293a47b97770b86ad35edae7c49b9', '2019-09-12 06:48:23', '::1', 'Chrome', 'Mac OS X', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `book_price` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `user_id`, `book_id`, `book_price`, `created_at`) VALUES
(1, 15, 3, 7, 11.00, NULL),
(2, 18, 3, 7, 11.00, NULL),
(3, 18, 3, 8, 11.00, NULL),
(4, 19, 3, 5, 11.00, '2019-09-11 10:43:55'),
(5, 19, 3, 9, 11.00, '2019-09-11 10:43:55'),
(6, 19, 3, 10, 11.00, '2019-09-11 10:43:55'),
(7, 20, 3, 2, 11.00, '2019-09-11 10:44:20'),
(8, 20, 3, 3, 11.00, '2019-09-11 10:44:20'),
(9, 20, 3, 4, 11.00, '2019-09-11 10:44:20'),
(10, 21, 3, 5, 11.00, '2019-09-11 10:45:06'),
(11, 21, 3, 2, 11.00, '2019-09-11 10:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `addreess` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `email_verf` smallint(6) NOT NULL DEFAULT 0,
  `ver_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `mobile`, `country_id`, `addreess`, `password`, `salt`, `created_at`, `email_verf`, `ver_Date`) VALUES
(3, 'Mohamed Sabry', 'mohamed.sabry@mail.com', '01223018335', NULL, 'asdadasdasdasds', '409a4a4d56f94678030228a299e10f118b1b6ae255a7a42da3615cfd49b9bc2a', '3ea2f06d16cb56ad8e0c185df552676a479f93707e19b6fb6be49d7dc49ccb61', '2019-09-11 09:04:26', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` double(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 0,
  `reject_reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`id`, `user_id`, `total_price`, `created_at`, `status`, `reject_reason`) VALUES
(1, 3, 22.00, '2019-09-11 10:11:06', 1, NULL),
(2, 3, 33.00, '2019-09-11 10:26:46', 1, NULL),
(3, 3, 22.00, '2019-09-11 10:27:35', 1, NULL),
(4, 3, 22.00, '2019-09-11 10:28:34', 1, NULL),
(5, 3, 22.00, '2019-09-11 10:30:00', 1, NULL),
(6, 3, 22.00, '2019-09-11 10:30:30', 2, 'asdasdasdasd'),
(7, 3, 22.00, '2019-09-11 10:31:14', 0, NULL),
(8, 3, 22.00, '2019-09-11 10:33:13', 1, NULL),
(9, 3, 22.00, '2019-09-11 10:33:31', 1, NULL),
(10, 3, 22.00, '2019-09-11 10:34:20', 1, NULL),
(11, 3, 22.00, '2019-09-11 10:35:22', 1, NULL),
(12, 3, 22.00, '2019-09-11 10:36:17', 1, NULL),
(13, 3, 22.00, '2019-09-11 10:37:02', 1, NULL),
(14, 3, 22.00, '2019-09-11 10:38:35', 1, NULL),
(15, 3, 22.00, '2019-09-11 10:39:03', 1, NULL),
(16, 3, 22.00, '2019-09-11 10:40:02', 1, NULL),
(17, 3, 22.00, '2019-09-11 10:40:33', 1, NULL),
(18, 3, 22.00, '2019-09-11 10:43:10', 1, NULL),
(19, 3, 33.00, '2019-09-11 10:43:55', 1, NULL),
(20, 3, 33.00, '2019-09-11 10:44:20', 0, NULL),
(21, 3, 22.00, '2019-09-11 10:45:06', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_country`
--
ALTER TABLE `all_country`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_cat_id_fk` (`cat_id`),
  ADD KEY `books_authors_id_fk` (`author_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_books_id_fk` (`book_id`),
  ADD KEY `cart_users_id_fk` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_hist`
--
ALTER TABLE `login_hist`
  ADD PRIMARY KEY (`histroy_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_books_id_fk` (`book_id`),
  ADD KEY `order_details_user_orders_id_fk` (`order_id`),
  ADD KEY `order_details_users_id_fk` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_all_country_ID_fk` (`country_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_orders_users_id_fk` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `all_country`
--
ALTER TABLE `all_country`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_hist`
--
ALTER TABLE `login_hist`
  MODIFY `histroy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_authors_id_fk` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_cat_id_fk` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_books_id_fk` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_books_id_fk` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_user_orders_id_fk` FOREIGN KEY (`order_id`) REFERENCES `user_orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_all_country_ID_fk` FOREIGN KEY (`country_id`) REFERENCES `all_country` (`ID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD CONSTRAINT `user_orders_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
