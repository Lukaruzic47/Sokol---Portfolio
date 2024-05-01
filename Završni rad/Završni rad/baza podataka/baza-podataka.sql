-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 06, 2023 at 05:11 PM
-- Server version: 8.0.19
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zavrsni_ruzic`
--

-- --------------------------------------------------------

--
-- Table structure for table `appearance`
--

CREATE TABLE `appearance` (
  `appearance_id` int NOT NULL,
  `appearance_cathegory_id` int NOT NULL,
  `appearance_picture` varchar(400) NOT NULL,
  `appearance_cathegory` varchar(30) NOT NULL,
  `DLC_id1` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appearance`
--

INSERT INTO `appearance` (`appearance_id`, `appearance_cathegory_id`, `appearance_picture`, `appearance_cathegory`, `DLC_id1`) VALUES
(52, 4, 'HumanoidHumanoid-1', 'Biological', 11),
(53, 4, 'HumanoidHumanoid-2', 'Biological', 11),
(54, 4, 'HumanoidHumanoid-3', 'Biological', 11),
(55, 4, 'HumanoidHumanoid-4', 'Biological', 11),
(56, 4, 'HumanoidHumanoid-5', 'Biological', 11),
(57, 4, 'HumanoidHumanoid-6', 'Biological', 11),
(58, 4, 'HumanoidHumanoid-7', 'Biological', 11),
(59, 4, 'HumanoidHumanoid-8', 'Biological', 11),
(60, 4, 'HumanoidHumanoid-9', 'Biological', 11),
(61, 4, 'HumanoidHumanoid-10', 'Biological', 11),
(62, 4, 'HumanoidHumanoid-11', 'Biological', 11),
(63, 4, 'HumanoidHumanoid-12', 'Biological', 11),
(64, 4, 'HumanoidHumanoid-13', 'Biological', 11),
(65, 4, 'HumanoidHumanoid-14', 'Biological', 11),
(66, 4, 'HumanoidHumanoid-15', 'Biological', 11),
(67, 5, 'MachineMachine-1', 'Synthetic', 7),
(68, 5, 'MachineMachine-2', 'Synthetic', 7),
(69, 5, 'MachineMachine-3', 'Synthetic', 7),
(70, 5, 'MachineMachine-4', 'Synthetic', 7),
(71, 5, 'MachineMachine-5', 'Synthetic', 7),
(72, 5, 'MachineMachine-6', 'Synthetic', 7),
(73, 5, 'MachineMachine-7', 'Synthetic', 7),
(74, 5, 'MachineMachine-8', 'Synthetic', 7),
(75, 5, 'MachineMachine-9', 'Synthetic', 7),
(76, 5, 'MachineMachine-10', 'Synthetic', 7),
(77, 5, 'MachineMachine-11', 'Synthetic', 7),
(112, 8, 'NecroidNecroid-1', 'Necroid', 13),
(113, 8, 'NecroidNecroid-2', 'Necroid', 13),
(114, 8, 'NecroidNecroid-3', 'Necroid', 13),
(115, 8, 'NecroidNecroid-4', 'Necroid', 13),
(116, 8, 'NecroidNecroid-5', 'Necroid', 13),
(117, 8, 'NecroidNecroid-6', 'Necroid', 13),
(118, 8, 'NecroidNecroid-7', 'Necroid', 13),
(119, 8, 'NecroidNecroid-8', 'Necroid', 13),
(120, 8, 'NecroidNecroid-9', 'Necroid', 13),
(121, 8, 'NecroidNecroid-10', 'Necroid', 13),
(122, 8, 'NecroidNecroid-11', 'Necroid', 13),
(123, 8, 'NecroidNecroid-12', 'Necroid', 13),
(124, 8, 'NecroidNecroid-13', 'Necroid', 13),
(125, 8, 'NecroidNecroid-14', 'Necroid', 13),
(126, 8, 'NecroidNecroid-15', 'Necroid', 13),
(127, 8, 'NecroidNecroid-15', 'Necroid', 13),
(128, 8, 'NecroidNecroid-15', 'Necroid', 13),
(129, 8, 'NecroidNecroid-15', 'Necroid', 13),
(130, 9, 'PlantoidPlantoid-1', 'Plantoid', 10),
(131, 9, 'PlantoidPlantoid-2', 'Plantoid', 10),
(132, 9, 'PlantoidPlantoid-3', 'Plantoid', 10),
(133, 9, 'PlantoidPlantoid-4', 'Plantoid', 10),
(134, 9, 'PlantoidPlantoid-5', 'Plantoid', 10),
(135, 9, 'PlantoidPlantoid-6', 'Plantoid', 10),
(136, 9, 'PlantoidPlantoid-7', 'Plantoid', 10),
(137, 9, 'PlantoidPlantoid-8', 'Plantoid', 10),
(138, 9, 'PlantoidPlantoid-9', 'Plantoid', 10),
(139, 9, 'PlantoidPlantoid-10', 'Plantoid', 10),
(140, 9, 'PlantoidPlantoid-11', 'Plantoid', 10),
(141, 9, 'PlantoidPlantoid-12', 'Plantoid', 10),
(142, 9, 'PlantoidPlantoid-13', 'Plantoid', 10),
(143, 9, 'PlantoidPlantoid-14', 'Plantoid', 10),
(144, 9, 'PlantoidPlantoid-15', 'Plantoid', 10),
(145, 9, 'PlantoidPlantoid-16', 'Plantoid', 10);

-- --------------------------------------------------------

--
-- Table structure for table `authority`
--

CREATE TABLE `authority` (
  `authority_id` int NOT NULL,
  `authority_name` varchar(50) NOT NULL,
  `authority_effect` varchar(200) NOT NULL,
  `authority_desc` varchar(1000) NOT NULL,
  `authority_election` varchar(300) NOT NULL,
  `authority_icon` varchar(400) NOT NULL,
  `DLC_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `authority`
--

INSERT INTO `authority` (`authority_id`, `authority_name`, `authority_effect`, `authority_desc`, `authority_election`, `authority_icon`, `DLC_id`) VALUES
(2, 'Oligarchic', 'Rulers have agendas, Emergency elections (at 250 Influence), +15% Faction Influence Gain', 'Oligarchic governments are ruled by a small group of individuals that hold all political power.', '20 years', '50px-Egalitarian.png', 1),
(3, 'Dictatorial', 'Rulers have agendas, −10% Empire sprawl penalty', 'Dictatorial governments are ruled by a single individual for life that wields absolute control over the state.', 'Life', 'Auth_dictatorial.png', 1),
(4, 'Imperial', 'Rulers have agendas, +1 Edict capacity', 'Imperial governments are similar to dictatorial ones, except that the throne is always inherited by a designated successor upon the ruler s death.', 'Life', 'Auth_imperial.png', 1),
(5, 'Hive Mind', '+25% Pop growth speed, −25% Empire sprawl penalty, Pops have the Hive-Minded trait', 'Hive Minds operate as a single organism more than as a state. The population has no free will, and act as an extension of the Hive Mind itself - much like the limbs of a body. When cut off from the Mind, these drones become comatose and eventually wither and die. Any free individuals on planets owned by the Mind are driven away, killed, or simply treated as prey to feed the collective.', 'Permanent', 'Auth_hive_mind.png', 2),
(6, 'Machine Intelligence', '+1 Extra pops when establishing colony, +1 Monthly Mechanical Pop Assembly, +10% Mining Station Output, +100% Empire sprawl penalty, 50% Pop Growth Reduction, Pops have the Machine trait', 'Hive Minds operate as a single organism more than as a state. The population has no free will, and act as an extension of the Hive Mind itself - much like the limbs of a body. When cut off from the Mind, these drones become comatose and eventually wither and die. Any free individuals on planets owned by the Mind are driven away, killed, or simply treated as prey to feed the collective.', 'Permanent', 'Auth_machine_intelligence.png', 7),
(7, 'Corporates', 'Rulers have agendas, Emergency elections (at 250 Influence), +20 Administrative Capacity, +50% Empire sprawl penalty, Can use the Mercantile Diplomatic Stance, Can build Branch Offices', 'Corporate governments are organized as a massive commercial enterprise that has completely supplanted the role of the state.', '20 years', 'Auth_corporate.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `cityappearance`
--

CREATE TABLE `cityappearance` (
  `city_id` int NOT NULL,
  `city_name` varchar(30) DEFAULT NULL,
  `city_picture` varchar(400) DEFAULT NULL,
  `DLC_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cityappearance`
--

INSERT INTO `cityappearance` (`city_id`, `city_name`, `city_picture`, `DLC_id`) VALUES
(4, 'Humanoid City', 'Humanoid_City', 11),
(7, 'Necroid City', 'Necroid_City', 13),
(8, 'Plantiod City', 'Plantiod_City', 10);

-- --------------------------------------------------------

--
-- Table structure for table `civics`
--

CREATE TABLE `civics` (
  `civic_id` int NOT NULL,
  `civic_name` varchar(100) NOT NULL,
  `civic_desc` varchar(1000) NOT NULL,
  `civic_requirements` varchar(1000) NOT NULL,
  `civic_effect` varchar(1000) NOT NULL,
  `civic_icon` varchar(400) NOT NULL,
  `DLC_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `civics`
--

INSERT INTO `civics` (`civic_id`, `civic_name`, `civic_desc`, `civic_requirements`, `civic_effect`, `civic_icon`, `DLC_id`) VALUES
(2, 'Anglers', 'Adept at utilizing nature\'s bounty, this society provides for itself a stable influx of sustenance and economic value.', 'Does NOT have Agrarian Idyll civic, does NOT have Post-Apocalyptic origin, does NOT have Shattered Ring origin, does NOT have Void Dwellers origin', 'Cannot be added or removed after game start, Main species gains the Aquatic trait, No Agriculture District limit on Ocean Worlds, Replaces Farmer jobs with an Angler job on wet climates, Agriculture Districts create Pearl Diver jobs on wet climates, −50 Agriculture District Minerals Cost on wet climates', 'Anglers.png', 14),
(6, 'Byzantine Bureaucracy', 'This society is largely governed by a complex and, to the outsider, almost labyrinthine system of bureaucracy. An army of officials and functionaries work tirelessly to keep the government running smoothly and ensure no citizens are allocated resources they cannot demonstrate a properly filed and triple-stamped need for.', 'Is NOT some degree of Spiritualist', '+1 Unity from Bureaucrats, +1 Stability from Bureaucrats', 'Byzantine_Bureaucracy.png', 4),
(7, 'Catalytic Processing', 'By focusing their industrial efforts into catalytic chemistry, this civilization has unlocked the key to using organic materials in the construction of spacebound structures.', 'Does NOT have Calamitous Birth origin', 'Replaces Metallurgist jobs with Catalytic Technician jobs', 'Catalytic_Processing.png', 15),
(9, 'Corporate Dominion', 'This society is dominated by a megacorporation that has completely supplanted the role of the state.', 'Has Oligarchic authority, has MegaCorp DLC, is NOT some degree of Xenophobe', '+1 Energy per Starbase Trading Hub module, Can build private colony ships, Starts with the Offworld Trade Companies technology, Can use the Mercantile Diplomatic Stance (unless also Inward Perfection)', 'Corporate_Dominion.png', 4),
(12, 'Death Cult', 'This society\'s religion is built around periodic, ritual sacrifices. Willing initiates devote themselves to a decade of study before meeting an end whose effects ripple throughtout their culture.', 'Is some degree of Spiritualist, does NOT have Inward Perfection civic, does NOT have Fanatic Purifiers civic, does NOT have Necrophage origin', '  Can construct Sacrifice buildings, Can use Sacrifice edicts', 'Death_Cult.png', 13),
(13, 'Diplomatic Corps', 'This society has a long tradition of rhetoric and debate and celebrate those who are able to get their way using only words.', 'Does NOT have Inward Perfection civic, does NOT have Fanatic Purifiers civic', '  +2 Available envoys, +10% Diplomatic Weight', 'Diplomatic_Corps.png', 5),
(23, 'Idyllic Bloom', 'This society has always spent much time on improving and caring for their environment, in pursuit of building a true paradise for its inhabitants.', 'Has Plantoid or Fungoid main species, does NOT have Shattered Ring origin, does NOT have Void Dwellers origin, does NOT have Life-Seeded origin', 'Cannot be added or removed after game start, Can construct and upgrade Gaia Seeder buildings', 'Idyllic_Bloom.png', 15),
(26, 'Masterful Crafters', 'A penchant for meticulous crafting lies at the heart of this society. Deft appendages and keen sensory organs aid them in creating truly wondrous treasures even in the most basic of trades.', 'None', 'Replaces Artisan jobs with Artificer jobs, +1 Building Slot per 3 Industrial Districts (except on Habitats)', 'Masterful_Crafters.png', 11),
(27, 'Memorialists', 'This empire pays tribute to memories and sapients of the past, deriving greater stability and insight from the continuous cycles of death, rebirth and legacy.', 'Does NOT have Fanatic Purifiesrs civic', 'Can construct Sanctuary of Repose buildings ', 'Memorialists.png', 13),
(28, 'Merchant Guilds', 'A number of powerful and very influential merchant guilds have risen to prominent positions in this society. They hold significant sway with the government.', 'Does NOT have Exalted Priesthood civic, does NOT have Aristocratic Elite civic, does NOT have Technocracy civic', 'Capital Buildings replace some Politician jobs with Merchant jobs, Can use the Mercantile Diplomatic Stance (unless also have Inward Perfection)', 'Merchant_Guilds.png', 4),
(34, 'Pleasure Seekers', 'This society rejoices in its own perfection. Those who are elevated by their privileged social structure have surrendered to a culture which glorifies pleasure and entertainment, regardless of a cost typically borne by others.', 'Does NOT have Slaver Guilds civic, does NOT have Warrior Culture civic, does NOT have Shared Burdens civic', 'Can use the Decadent Lifestyle living standard, +1% Pop Growth Speed from Entertainers, +5 Amenities from Servants', 'Pleasure_Seekers.png', 11),
(36, 'Pompous Purists', 'To quash any traces of dissent, the population in this repressive society is carefully monitored and controlled by a large internal police force.', 'Is not any degree of Xenophobe, does NOT have Inward Perfection civic, does NOT have Fanatic Purifiers civic, does NOT have Scion origin', '+30% Trust Growth, +2 Available envoys, Can send but cannot receive diplomatic propositions', 'Pompous_Purists.png', 11),
(37, 'Reanimators', 'Within this society, death is no bar to the call of arms. Masters of the art of necromancy reanimate deceased corpses to raise a dread host that strikes fear into the hearts of lesser mortals.', 'Is not any degree of Pacifist, does NOT have Citizen Service civic', 'Military Academy buildings are replaced by Dread Encampment buildings, 33% chance to gain an Undead Army per killed army, Defeated organic guardians can be resurrected', 'Reanimators.png', 13),
(39, 'Shared Burdens', 'This society believes in an equitable distribution of resources, making little to no distinction between the needs of ruler and ruled. All work together for the benefit of the whole', 'Has Fanatic Egalitarian ethic, is NOT any degree of Xenophobe, does NOT have Technocracy civic, does NOT have Pleasure Seekers civic', 'Can use the Shared Burden living standard, Cannot use other Living Standards except Utopian Abundance and Chemical Bliss, +5 Stability, −45% Pop Demotion Time, Can build Communal Housing and Utopian Communal Housing buildings', 'Shared_Burdens.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `dlc`
--

CREATE TABLE `dlc` (
  `DLC_id` int NOT NULL,
  `DLC_name` varchar(100) NOT NULL,
  `DLC_icon` varchar(400) NOT NULL,
  `DLC_release_date` date NOT NULL,
  `DLC_type_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dlc`
--

INSERT INTO `dlc` (`DLC_id`, `DLC_name`, `DLC_icon`, `DLC_release_date`, `DLC_type_id`) VALUES
(1, 'Stellaris', 'Stellaris.png', '2016-05-09', 1),
(2, 'Utopia', 'Utopia.png', '2017-04-06', 2),
(4, 'MegaCorp', 'MegaCorp.png', '2018-12-06', 2),
(5, 'Federations', 'Federations.png', '2020-03-17', 2),
(6, 'Nemesis', 'Nemesis.png', '2021-04-15', 2),
(7, 'Synthetic Dawn', 'Synthetic_Dawn.png', '2017-09-21', 3),
(10, 'Leviathans', 'Leviathans.png ', '2016-10-20', 3),
(11, 'Humanoids Species Pack', 'DLC_humanoids_species_pack.png', '2017-12-07', 4),
(12, 'Lithoids Species Pack', 'Lithoids.png', '2019-10-24', 4),
(13, 'Necroids Species Pack', 'Necroids.png', '2020-10-29', 4),
(14, 'Aquatics Species Pack', 'Aquatics.png', '2021-11-22', 4),
(15, 'Plantoids Species Pack', 'DLC_plantoids_species_pack.png', '2016-08-04', 4),
(24, 'Distant Stars', 'Distant_Stars.png', '2018-04-24', 3),
(29, 'Overlord', 'overlord.png', '2022-05-12', 2),
(33, 'Apocalypse', 'Apocalypse.png', '2018-02-22', 2),
(34, 'Ancient Relics', 'Ancient_Relics.png', '2019-06-04', 3);

-- --------------------------------------------------------

--
-- Table structure for table `dlc_type`
--

CREATE TABLE `dlc_type` (
  `DLC_type_id` int NOT NULL,
  `DLC_type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dlc_type`
--

INSERT INTO `dlc_type` (`DLC_type_id`, `DLC_type_name`) VALUES
(1, 'Base Game'),
(2, 'Expansion'),
(3, 'Story Pack'),
(4, 'Species Pack');

-- --------------------------------------------------------

--
-- Table structure for table `ethics`
--

CREATE TABLE `ethics` (
  `ethic_id` int NOT NULL,
  `ethic_name` varchar(100) NOT NULL,
  `ethic_opposite` varchar(100) NOT NULL,
  `ethic_desc` varchar(1000) NOT NULL,
  `ethic_icon` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ethic_effect` varchar(200) NOT NULL,
  `ethic_cost` int NOT NULL,
  `DLC_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ethics`
--

INSERT INTO `ethics` (`ethic_id`, `ethic_name`, `ethic_opposite`, `ethic_desc`, `ethic_icon`, `ethic_effect`, `ethic_cost`, `DLC_id`) VALUES
(1, 'Spiritualist', 'Materialist', 'There are those think it behooves us to remember how tiny we are, how pointless our lives in this vast uncaring universe... What nonsense! The only truth we can ever know is that of our own existence. The universe - in all its apparent glory - is but a dream we all happen to share.', '50px-Spiritualist.png', '+10% Monthly unity, 5% Edict cost', 1, 1),
(2, 'Fanatic Spiritualist', 'Fanatic Materialist', 'Our science has proved that Consciousness begets reality. We regard with patience the childlike efforts of those who delude themselves it is the other way around, as they play with their blocks of hard matter.', '50px-Fanatic_Spiritualist.png', '+20% Monthly unity, 10% Edict cost', 2, 1),
(3, 'Militarist', 'Pacifist', 'The only true virtues are courage and discipline, and channeled properly they can overcome any obstacle. Therein lies true strength; force withheld, a promise made.', '50px-Militarist.png', '−10% Claim influence cost, +10% Ship fire rate', 1, 1),
(4, 'Fanatic Militarist', 'Fanatic Pacifist', 'The ability to project force is of paramount importance. The only way to preserve our way of life is to make sure everyone shares it; willingly or not.', '50px-Fanatic_Militarist.png', '20% Claim influence cost, +20% Ship fire rate', 2, 1),
(5, 'Xenophopes', 'Xenophile', 'The stakes could not be higher as we reach into the vast uncharted expanses of the galaxy, for we are gambling with the very survival of our species! Never trust the alien; its false smile hides an unknowable mind.', '50px-Xenophobe.png', '−20% Starbase influence cost, +10% Pop growth speed, Can use the Fear Campaign edicts', 1, 1),
(6, 'Fanatic Xenophope', 'Fanatic Xenophile', 'Any alien influence must be ruthlessly quashed. Only by staying pure, and true to ourselves and the planet that gave us life can we guard against insidious Xeno plots. Even mastery over the Alien might not be enough to guarantee our own safety.', '50px-Fanatic_Xenophobe.png', '−40% Starbase influence cost, +20% Pop growth speed, Can use the Fear Campaign edict', 2, 1),
(7, 'Authoritarian', 'Egalitarian', 'A strong, guiding hand is essential to the success of any civilization - the alternative would be anarchy and chaos. It is the duty of the state to steer its citizens towards the paths that are the most productive.', '50px-Authoritarian.png', '+0.5 Monthly influence, +5% Worker output, Can use the Information Quarantine edict', 1, 1),
(8, 'Fanatic Authoritarian', 'Fanatic Egalitarian', 'A single voice, a single throne, a single state. It is the solemn duty of the masses to obey those enlightened few who have been charged with the great responsibility of leadership.', '50px-Fanatic_Authoritarian.png', '+1 Monthly influence, +10% Worker output, Can use the Information Quarantine edict', 2, 1),
(9, 'Egalitarian', 'Authoritarian', 'Any society that does not embrace equality between its members - where an individual can rise to any position with enough hard work - is not only deeply unfair, but ultimately counterproductive.', '50px-Egalitarian.png', '+25% Faction influence gain, +5% Specialist output, Can use the Encourage Political Thought edict', 1, 1),
(10, 'Fanatic Egalitarian', 'Fanatic Authoritarian', 'Beware always those who would be despots, under the false presumption that their desires and agendas are somehow more imperative than those of their fellows. A society that does not see to the needs and rights of all of its members is not a society - it is a crime.', '50px-Fanatic_Egalitarian.png', '+50% Faction influence gain, +10% Specialist output, Can use the Encourage Political Thought edict', 2, 1),
(11, 'Xenophile', 'Xenophope', 'There exists, in all of us, a deep-seated fascination for the unknown. An adventurous spirit that rejects the familiar and glories in the unfamiliar, whatever - or whomever - it may be.', '50px-Xenophile.png', '+10% Trade value, +1 Available envoys, Can use the Land of Opportunity edict', 1, 1),
(12, 'Fanatic Xenophile', 'Fanatic Xenophope', 'If there ever was such a thing as an absolute moral imperative, it would be to explore the cosmos and embrace all within it. We were never meant to journey alone.', '50px-Fanatic_Xenophile.png', '+20% Trade value, +2 Available envoys, Can use the Land of Opportunity edict', 2, 1),
(13, 'Pacifist', 'Militarist', 'Conflict as a means to an end is a ridiculous concept. It is by nature destructive, destroying what was to be obtained or giving room to grow that which was to be destroyed.', '50px-Pacifist.png', '−15% Empire sprawl from pops, +5 Stability, Can use the Peace Festivals edict', 1, 1),
(14, 'Fanatic Pacifist', 'Fanatic Militarist', 'As civilized beings, the end of all armed conflict should be our primary concern. War is an evolutionary dead end, as futile as it is wasteful.', '50px-Fanatic_Pacifist.png', '30% Empire sprawl from pops, +10 Stability, Can use the Peace Festivals edict', 2, 1),
(15, 'Materialist', 'Spiritualist', 'As we reach for the stars, we must put away childish things; gods, spirits and other phantasms of the brain. Reality is cruel and unforgiving, yet we must steel ourselves and secure the survival of our race through the unflinching pursuit of science and technology.', '50px-Materialist.png', '−10% Robot upkeep, +5% Research speed', 1, 1),
(16, 'Fanatic Materialist', 'Fanatic Spiritualist', 'Although it hurts, we must grow up and put aside our outdated notions of morality. There is no divine spark granting special value to a living mind. No object has any intrinsic value apart from what we choose to grant it. Let us embrace the freedom of certitude, and achieve maximum efficiency in all things.', '50px-Fanatic_Materialist.png', '−20% Robot upkeep, +10% Research speed', 2, 1),
(17, 'Gestalt Consciousness', 'None', 'We reach into the void. The vast expanse becomes us.', '50px-Gestalt_consciousness.png', '−20% War exhaustion gain, +1 Monthly influence, +2 Encryption, Cannot change ethics', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `komentar_id` int NOT NULL,
  `datum_unosa_komentara` datetime NOT NULL,
  `tekst_komentar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `korisnik_id` int NOT NULL,
  `header` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`komentar_id`, `datum_unosa_komentara`, `tekst_komentar`, `korisnik_id`, `header`) VALUES
(1, '2022-03-09 22:24:21', 'Prvi komentar na ovoj stranici', 1, 'Prvi komentar'),
(66, '2022-05-01 13:50:22', 'fpsfsnvornvksn 34235623445 ', 1, 'komentar naslov'),
(70, '2022-05-12 21:58:34', '123', 1, '123'),
(72, '2022-05-12 23:10:09', 'Glad to have the chance to test such amazing site.', 1, 'Tester'),
(73, '2022-05-14 09:35:40', '123', 1, 'Moj komentar'),
(74, '2022-05-14 09:38:18', '123', 1, '123'),
(75, '2022-05-15 20:32:32', 'mogla bi biti i bolja', 2, 'Super Stranica'),
(76, '2022-05-15 21:55:04', 'HElp i dont know where to find out how to play the game', 7, 'Im new'),
(77, '2022-05-17 08:41:23', 'kako kul baš foriška ', 1, 'woa'),
(78, '2022-05-17 08:44:10', '123', 1, '123'),
(79, '2022-05-17 08:44:15', '123', 1, '123'),
(80, '2022-05-17 08:44:20', '123', 1, '123'),
(81, '2022-05-17 08:48:25', ':33333333', 11, 'Bokic'),
(82, '2022-05-17 08:48:37', '\'', 11, '123'),
(84, '2022-05-21 22:07:59', 'pitbull najjaci', 12, '305'),
(85, '2022-05-21 22:08:45', 'Mr. Worldwide', 1, 'Nije pitbull nego'),
(86, '2022-05-21 22:09:34', 'gospodin Armando Christian Pérez', 12, 'dale'),
(87, '2022-05-24 09:42:02', 'Radi kako treba!', 8, 'Kontrola pristupa'),
(89, '2022-05-28 23:44:30', 'Sou stranica', 13, 'Sou'),
(91, '2022-05-31 15:02:45', 'Ovo je komentar', 17, 'Komentar'),
(92, '2022-09-04 09:42:29', 'Ajmo ljudi', 18, 'Dođite u novi prostor Znanja u Lumini!!!'),
(93, '2022-11-09 12:47:48', 'rESIII', 2, 'I dalje je objavljeno na serveru'),
(94, '2023-06-13 20:15:02', 'youre goddamn right', 1, 'Balenciaga bitch'),
(95, '2023-07-12 01:56:43', 'opet radim', 2, 'pozdrav');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnik_id` int NOT NULL,
  `korisnicko_ime` varchar(100) NOT NULL,
  `lozinka` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tip_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnik_id`, `korisnicko_ime`, `lozinka`, `email`, `tip_id`) VALUES
(1, 'Luka Ružić', 'zavrsnirad2022', 'l.ruzic47@gmail.com', 1),
(2, 'Marko Hlapčić', 'hlapicgamer69', 'marko.hlapcic@skole.hr', 1),
(7, 'Niko Ružić', 'ruzic42', 'nikoruzic42@gmail.com', 2),
(8, 'test 1', '123', 'test@gmail.com', 2),
(11, 'Marta Habijanec', 'Koh173pf', 'habijanec.marta@gmail.com', 2),
(12, 'roki bombina', 'Mnogokul12', 'barbaricklara@gmail.com', 2),
(13, 'Jurica Jurica', '12345', '123@gmail.com', 2),
(17, 'Luka Lukić', '12345', 'luka@gmail.com', 2),
(18, 'Opet Ja', 'naposlusam', 'opet.ja@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `origins`
--

CREATE TABLE `origins` (
  `origin_id` int NOT NULL,
  `origin_icon` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `origin_name` varchar(50) NOT NULL,
  `origin_effect` varchar(1000) NOT NULL,
  `origin_requirements` varchar(1000) NOT NULL,
  `DLC_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `origins`
--

INSERT INTO `origins` (`origin_id`, `origin_icon`, `origin_name`, `origin_effect`, `origin_requirements`, `DLC_id`) VALUES
(7, 'Shattered_ring.png', 'Shattered Ring', 'Start with a Shattered Ring World as your homeworld. The Shattered Ring World can be repaired, unlocking special Ring World Segment Districts.', 'Does NOT have Agrarian Idyll Civic', 5),
(8, 'Void_dwellers.png', 'Void Dwellers', 'Start with three Orbital Habitats and the technology to build more.', 'Does NOT have Gestallt Consciousness Ethic', 5),
(9, 'Scion.png', 'Scion', 'Start as a vassal of a Fallen Empire.', 'Does NOT have Gestallt Consciousness Ethic', 5),
(12, 'On_the_shoulders_of_giants.png', 'On the Shoulders of Giants', 'This civilisation has hidden boons in their solar system, placed there in a distant past by a mysterious benefactor.', 'Does NOT have Gestalt Consciousness Ethic', 5),
(13, 'Resource_consolidation.png', 'Resource Consolidation', 'This Machine Intelligence has long-since consolidated all resources in their home system into their Capital world, covering it entirely with Machinery.', 'Does NOT have Gestalt Consciousness', 5),
(14, 'Common_ground.png', 'Common Ground', 'Starts as the leader of a Galactic Union federation with two additional members.', 'Does NOT have Gestalt Consciousness Ethic', 5),
(15, 'Hegemon.png', 'Hegemon', 'Starts as the leader of a Galactic Union federation with two additional members.', 'Does NOT have Gestalt Consciousness Ethic', 5),
(16, 'Doomsday.png', 'Doomsday', 'Your homeworld will explode within 35 to 45 years after the game starts.', 'None', 5),
(17, 'Lost_colony.png', 'Lost Colony', 'An advanced Empire of this species is spawned somewhere in the galaxy.', 'Does NOT have Gestalt Consciousness Ethic', 5),
(18, 'Necrophage.png', 'Necrophage', 'Can convert Pops of other species to the primary species.', 'Does NOT have Xenophile Ethic', 5),
(27, 'Here_be_dragons.png', 'Here Be Dragons', 'Start with an allied Sky Dragon leviathan, A system 2 hyperlanes away will contain a Living Metal deposit', 'Does not have Fanatic Purifiers, Devouring Swarm or Determined Exterminator civic', 14);

-- --------------------------------------------------------

--
-- Table structure for table `speciestraits`
--

CREATE TABLE `speciestraits` (
  `species_trait_id` int NOT NULL,
  `species_trait_name` varchar(40) NOT NULL,
  `species_trait_icon` varchar(400) NOT NULL,
  `species_trait_desc` varchar(1000) NOT NULL,
  `species_trait_effect` varchar(250) NOT NULL,
  `species_trait_points` int NOT NULL,
  `DLC_id1` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `techcategories`
--

CREATE TABLE `techcategories` (
  `tech_sub_category_id` int NOT NULL,
  `tech_category_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tech_category_icon` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tech_category_desc` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tech_category_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `techcategories`
--

INSERT INTO `techcategories` (`tech_sub_category_id`, `tech_category_name`, `tech_category_icon`, `tech_category_desc`, `tech_category_id`) VALUES
(1, 'Engineering', 'Engineering.png', 'The area provides access to several key points, including: new ship classes and starbase upgrades, strategic resources reveal, kinetic & explosive weapons, buildable pops, machine modification capabilities, improved mineral production & storage, and more.', NULL),
(2, 'Physics', 'Physics.png', 'Physics research area comprises the fields: Computing, Field Manipulation and Particles. The area provides access to several key points, including: additional research capabilities, strategic resources reveal, point-defense & energy weapons, improved FTL capabilities, improved energy production & storage, and more.', NULL),
(3, 'Society', 'Society.png', 'Society research area is composed mainly of the fields: Biology, Military Theory, New Worlds and Statecraft. It also includes, to a lesser extent, the Psionics field.', NULL),
(4, 'Industry', '21px-Industry.png', 'Mineral production and storage, robots, building construction.', 1),
(5, 'Materials', '21px-Materials.png', 'Armor, strategic resources', 1),
(6, 'Propulsion', '21px-Propulsion.png', 'Kinetic and explosive weapons, thrusters', 1),
(7, 'Voidcraft', '21px-Voidcraft.png', 'Ship types and hulls, starbases, strike craft', 1),
(8, 'Computing', '21px-Computing.png', 'Science Labs, research, science ships, ship computers, point-defense, sensors', 2),
(9, 'Field Manipulation', '21px-Field_Manipulation.png', 'Power Plants, shields, some strategic resources', 2),
(10, 'Particles', '21px-Particles.png', 'Ship reactors, energy weapons, FTL, some strategic resources', 2),
(11, 'Biology', '21px-Biology.png', 'Food production, leader lifespan and policies, species modification, army types, some strategic resources', 3),
(12, 'Military Theory', '21px-Military_Theory.png', 'Fleet command limit, naval capacity, army buildings and statistics, claim cost', 3),
(13, 'New Worlds', '21px-New_Worlds.png', 'Tile blocker clearance, terraforming, starbase capacity, administrative capacity', 3),
(14, 'Statecraft', '21px-Statecraft.png', 'Unity, edicts, leader pool and recruitment, planetary and empire capitals', 3),
(15, 'Psionics', '21px-Psionics.png', 'Exotic mid- to late- game technologies. Unlocked through the Psionic Theory technology', 3);

-- --------------------------------------------------------

--
-- Table structure for table `technology`
--

CREATE TABLE `technology` (
  `tech_id` int NOT NULL,
  `tech_sub_category_id` int NOT NULL,
  `tech_icon` varchar(400) NOT NULL,
  `tech_name` varchar(100) NOT NULL,
  `tech_desc` varchar(1000) NOT NULL,
  `tech_effect` varchar(250) NOT NULL,
  `tech_cost` int NOT NULL,
  `tech_rarity` varchar(50) NOT NULL,
  `DLC_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `technology`
--

INSERT INTO `technology` (`tech_id`, `tech_sub_category_id`, `tech_icon`, `tech_name`, `tech_desc`, `tech_effect`, `tech_cost`, `tech_rarity`, `DLC_id`) VALUES
(4, 4, 'Assembly Patterns.jpg', 'Assembly Patterns', 'Rapid iteration in construction simulations determines the optimal component assembly patterns for each building project ahead of time.', '+25% Planetary Build Speeds', 3000, 'Common', 1),
(5, 4, 'Autonomous Mining Drones.png', 'Autonomous Mining Drones', 'Fleets of autonomous drones equipped with mining beams are deployed to quickly and efficiently gather nearby minerals.', '+10% Mining Station Output', 6000, 'Common', 1),
(8, 4, 'Cross-Model Standardization.png', 'Cross-Model Standardization', 'Improved production practices allow for greater alterations to synthetic workers without compromising core functionality.', '+1 Mechanical pop trait points', 8000, 'Common', 1),
(18, 15, 'Psionic_Shields.jpg', 'Psionic Shields', 'These extremely powerful shields are generated out of pure psychic energy by a cadre of psionic specialists. Their powers are further augmented by large arrays of psi emitters.', 'Unlocks Psionic Barrier component', 48000, 'Rare', 2),
(21, 15, 'Thought_Enforcement.jpg', 'Thought Enforcement', 'Telepaths monitoring the citizenry for incorrect thoughts will make corrections as they find them.', 'Unlocks Thought Enforcement Edict', 20000, 'Rare', 2),
(22, 8, 'Scientific_Method.jpg', 'Scientific Method', 'Testable predictions of observable phenomena', 'Unlocks Research Labs Building', 1, 'Starter', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tipkorisnika`
--

CREATE TABLE `tipkorisnika` (
  `tip_id` int NOT NULL,
  `naziv_tipa` varchar(50) NOT NULL,
  `tip_desc` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tipkorisnika`
--

INSERT INTO `tipkorisnika` (`tip_id`, `naziv_tipa`, `tip_desc`) VALUES
(1, 'Admin', 'Administrator može uređivati sadržaj stranice po bilo kojoj želji, može brisati i dodavati nove korisnike i određivati njihovu ulogu'),
(2, 'Prijavljena osoba', 'Jedina stvar koju prijavljena osoba može raditi je ostavljati i brisati vlastite komentare');

-- --------------------------------------------------------

--
-- Table structure for table `traditions`
--

CREATE TABLE `traditions` (
  `tradition_id` int NOT NULL,
  `tradition_name` varchar(100) NOT NULL,
  `tradition_icon` varchar(400) NOT NULL,
  `tradition_effect` varchar(200) NOT NULL,
  `tradition_tree_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `traditions`
--

INSERT INTO `traditions` (`tradition_id`, `tradition_name`, `tradition_icon`, `tradition_effect`, `tradition_tree_id`) VALUES
(1, 'To Boldly Go', 'To_boldly_go.png', '+35% Survey Speed, +50% Science Ship Disengage Chance', 1),
(2, 'Science Division', 'Science_division.png', '+1 Research Alternatives, +2 Scientist Level Cap', 1),
(3, 'Planetary Survey Corps', 'Planetary_Survey_Corps.png', '+20% Research Station Output, +20% Research from Starbase Buildings, Unlocks the Research Subsidies edict', 1),
(4, 'Polytechnic Education', 'Polytechnic_Education.png', '+25% Leader Experience Gain, +1 Leader Level Cap', 1),
(5, 'Faith in Science', 'Faith_in_Science.png', '−20% Researcher Upkeep', 1),
(6, 'Colonial Viceroys', 'Colonial_Viceroys.png', '+2 Governor level Cap, +0.5 Monthly Influence', 2),
(7, 'Imperious Architecture', 'Imperious_Architecture.png', '+1 Housing from upgraded capital buildings if not Gestalt Consciousness, +1 Housing from all Housing buildings if not Gestalt Consciousness, +2 Housing from Synaptic Nodes if Hive Mind, −25% Empire Sp', 2),
(8, 'Judgment Corps', 'Judgment_Corps.png', '+1 Unity per Enforcer if not Gestalt Consciousness, Unlocks the Enhanced Surveillance edict if not Gestalt Consciousness, −10 Deviancy on all planets if Gestalt Consciousness', 2),
(9, 'Grand Council', 'Grand_Council.png', '+2 Ruler Level Cap, +1 Edict capacity', 2),
(10, 'Workplace Motivators', 'Workplace_Motivators.png', '+5% Worker and Slave Output if not Gestalt Consciousness, Unlocks the Extended Shifts edict if not Gestalt Consciousness, +5% Menial Drone Output if, Gestalt Consciousness, Unlocks the Drone Overdrive', 2),
(11, 'Reach For The Stars', 'Reach_For_The_Stars.png', '−10% Starbase Influence Cost', 3),
(12, 'Colonization Fever', 'Colonization_Fever.png', '+1 Extra pops when establishing colony', 3),
(13, 'Courier Network', 'Courier_Network.png', '−25% Empire Sprawl from Systems and Colonies', 3),
(14, 'Galactic Ambition', 'Galactic_Ambition.png', '−20% Starbase Upkeep', 3),
(15, 'A New Life', 'A_New_Life.png', '+10% Pop Growth Speed if not Machine Intelligence, +10% Pop Assembly Speed if Machine Intelligence', 3),
(16, 'Administrative Operations', 'Administrative_Operations.png', '−10% Building and District Upkeep', 4),
(17, 'Standart Construction Templates', 'Standart_Construction_Templates.png', '−10% Building and District Build Cost, +25% Planet Build Speed', 4),
(18, 'Trans Stellar Corporations', 'Trans_Stellar_Corporations.png', '+1 Clerk per City District if not Gestalt Consciousness', 4),
(19, 'Pursuit of Profit', 'Pursuit_of_Profit.png', '+5% Specialist and Complex Drone Output', 4),
(20, 'Public Works', 'Public_Works.png', ' +1 Housing per City/Hive/Nexus District if not Void Dwellers', 4),
(21, 'Master Shipwrights', 'Master_Shipwrights.png', '−10% Ship Build Cost, +25% Ship Build Speed', 5),
(22, 'Fleet Logistical Corps', 'Fleet_Logistical_Corps.png', '−10% Ship Upkeep, +20% Naval Capacity', 5),
(23, 'Overwhelming Force', 'Overwhelming_Force.png', '+10% Ship Fire Rate, +20% Orbital Bombardment Damage', 5),
(24, 'War Games', 'War_Games.png', '+20 Fleet command limit, +2 Admiral Level Cap', 5),
(25, 'Great Game', 'Great_Game.png', '+20% Damage against Starbases', 5),
(26, 'The Federation', 'The_Federation.png', 'Can create Federations, +1 Available envoys', 6),
(27, 'Federal Unity', 'Federal_Unity.png', '+3 Unity per Embassy', 6),
(28, 'Entente Coordination', 'Entente_Coordination.png', '+100% Federation Naval Capacity Contribution', 6),
(29, 'Direct Diplomacy', 'Direct_Diplomacy.png', '+33% Trust Cap, +33% Trust Growth', 6),
(30, 'Eminent Diplomats', 'Eminent_Diplomats.png', '+5 Diplomatic Acceptance, 1% Monthly chance to gain a Favor per Improve Relations action', 6),
(31, 'Dietary Enrichment', 'Dietary_Enrichment.png', '+10% Monthly food, 15% Refund per demolished building if Lithoid', 7),
(32, 'Environmental Diversification', 'Environmental_Diversification.png', '+10% Habitability', 7),
(33, 'Survival Fittest', 'Survival_Fittest.png', '−25% Orbital bombardment damage, +25% Defense Army Damage', 7),
(34, 'Adaptive Ecology', 'Adaptive_Ecology.png', '+1 Building slot for all planets', 7),
(35, 'Appropriation', 'Appropriation.png', '−33% Resettlement Cost', 7),
(36, 'Mind and Body', 'Mind_and_Body.png', '+20 Years Leader Lifespan if not Necrophage, +1 Leader Level Cap if not Necrophage, +5-100 Unity per converted pop if Necrophage', 8),
(37, 'Kinship', 'Kinship.png', '−75% Pop Demotion Time if not Shared Burdens, −20% Leader Upkeep if Shared Burdens', 8),
(38, 'The Greater Good', 'The_Greater_Good.png', '+25% Governing Ethics Attraction', 8),
(39, 'Harmonious Directives', 'Harmonious_Directives.png', '+1 Edict capacity', 8),
(40, 'Utopian Dream', 'Utopian_Dream.png', '+5 Stability on all planets', 8),
(41, 'Trickle up Economics', 'Trickle_up_Economics.png', '+1 Trade Value per Clerk', 9),
(42, 'Adaptive Economic Policies', 'Adaptive_Economic_Policies.png', 'Unlocks the Consumer Benefits trade policy if not a member of a Trade League federation, Unlocks the Marketplace of Ideas trade policy if not a member of a Federation trade.png Trade League federation', 9),
(43, 'Commercial Enterprise', 'Commercial_Enterprise.png', '+1 Merchant job per Commercial Zone, +1 Merchant job per Commercial Segment and Trade District', 9),
(44, 'Marketplace of Better Ideas', 'Marketplace_of_Better_Ideas.png', '+10% Trade Value', 9),
(45, 'Insider Trading', 'Insider_Trading.png', '−10% Market Fee', 9),
(46, 'Self-Preservation Protocols', 'Self-Preservation_Protocols.png', '+20 Years Leader Lifespan if niether Machine Intelligence nor Necrophage', 10),
(47, 'Synchronized Agents', 'Kinship.png', '−20% Leader Upkeep', 10),
(48, 'Integrated Preservation', 'The_Greater_Good.png', '+2 Amenities per Synapse Drone if Hive Mind +3 Administrative Capacity per Coordinator if Machine Intelligence', 10),
(49, 'Flexible Governing Algorithms', 'Harmonious_Directives.png', '+1 Edict capacity', 10),
(50, 'Collective Reasoning', 'Utopian_Dream.png', '+5 Stability on all planets', 10),
(51, 'Resistance is Frugal', 'Resistance_is_Frugal.png', '+25% Defense Army Health +3 Unity per Stronghold', 11),
(52, 'Defensive Zeal', 'Defensive_Zeal.png', '+33% Starbase Health, +33% Starbase Damage, +33% Defense platform damage, +33% Defense platform hull points', 11),
(53, 'Never Surrender', 'Never_Surrender.png', '−25% Orbital Bombardment Damage Received, −25% War exhaustion gain, Hostile claim influence cost +25% Hostile claim influence cost', 11),
(54, 'Fortress Doctrine', 'Fortress_Doctrine.png', '+2 Starbase capacity, −50% Starbase Upgrade Cost, +4 Hostile Operation Difficulty for Sabotage Starbase', 11),
(55, 'Bulwark of Harmony', 'Bulwark_of_Harmony.png', '+15% Ship Fire Rate within the empires borders, +33% Ship Build Speed while in a defensive war', 11),
(56, 'Universal Compatability', 'Universal_Compatability.png', '+50 Trust Cap from Machine Intelligence empires, +1 Available envoys', 12),
(57, 'Peak Performance', 'Peak_Performance.png', '−10% Pop Housing Usage', 12),
(58, 'Adaptive Programming', 'Adaptive_Programming.png', '−10% Market Fee', 12),
(59, 'Material Analysis', 'Material_Analysis.png', '−5% Job Upkeep', 12),
(60, 'Operational Proxies', 'Operational_Proxies.png', '−33% Resettlement Cost', 12);

-- --------------------------------------------------------

--
-- Table structure for table `traditiontrees`
--

CREATE TABLE `traditiontrees` (
  `tradition_tree_id` int NOT NULL,
  `tradition_tree_name` varchar(100) NOT NULL,
  `tradition_tree_icon` varchar(400) NOT NULL,
  `tradition_tree_starting_effect` varchar(1000) NOT NULL,
  `tradition_tree_completion_effect` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `traditiontrees`
--

INSERT INTO `traditiontrees` (`tradition_tree_id`, `tradition_tree_name`, `tradition_tree_icon`, `tradition_tree_starting_effect`, `tradition_tree_completion_effect`) VALUES
(1, 'Discovery', 'Discovery.png', '−33% Clear blocker cost, −20% Habitat Upkeep if Origin Void Dwellers', '+20% Administrative Capacity'),
(2, 'Domination', 'Domination.png', '+20% Anomaly Research Speed, Unlocks the Map The Stars edict', '+10% Research speed'),
(3, 'Expansion', 'Expansion.png', ' +25% Colony Development Speed', '+1 Max Districts for all non-artificial planets if not Origin Void Dwellers −20% Habitat Build Cost if Origin Void Dwellers'),
(4, 'Prosperity', 'Prosperity.png', '+20% Mining Station Output', '+5% Resources from Jobs +5 Stability on all planets'),
(5, 'Supremacy', 'Supremacy.png', '+20 Naval Capacity +20% Army Damage', 'Unlocks War Doctrine policies Unlocks the Supremacist diplomatic stance'),
(6, 'Diplomacy', 'Diplomacy.png', '−50% Diplomatic Influence Cost Unlocks the Diplomatic Grants edict', '+10% Diplomatic Weight +1 Available envoys'),
(7, 'Adaptability', 'Adaptability.png', '−10% Pop Housing Usage', ' Unlocks Planetary Prospecting Decision if not Origin Void Dwellers Unlocks Orbital Surveying Decision if Origin Void Dwellers'),
(8, 'Harmony', 'Harmony.png', ' −10% Pop Food Upkeep −10% Pop Minerals Upkeep', '−10% Empire Sprawl from Pops'),
(9, 'Mercantile', 'Mercantile.png', '+5 Trade protection +1 Collection range', '+10% Trade Value'),
(10, 'Synchronicity', 'Synchronicity.png', '−10% Pop Upkeep', '−10% Empire Sprawl from Pops Unlocks the Industrial Maintenance edict if Machine Intelligence'),
(11, 'Unyielding', 'Unyielding.png', '+2 Starbase capacity +50% Starbase Upgrade Speed', '+50% Defense platform cap −20% Starbase Upkeep '),
(12, 'Versatility', 'Versatility.png', '−10% Pop Assembly Cost', '50% Refund per demolished building or district');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view`
-- (See below for the actual view)
--
CREATE TABLE `view` (
`dlc_icon` varchar(400)
,`dlc_name` varchar(100)
,`tech_category_icon` varchar(400)
,`tech_category_name` varchar(50)
,`tech_cost` int
,`tech_desc` varchar(1000)
,`tech_effect` varchar(250)
,`tech_icon` varchar(400)
,`tech_id` int
,`tech_name` varchar(100)
,`tech_rarity` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `view`
--
DROP TABLE IF EXISTS `view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`zavrsni_ruzic`@`%` SQL SECURITY DEFINER VIEW `view`  AS  select `technology`.`tech_id` AS `tech_id`,`technology`.`tech_icon` AS `tech_icon`,`technology`.`tech_name` AS `tech_name`,`technology`.`tech_desc` AS `tech_desc`,`technology`.`tech_effect` AS `tech_effect`,`technology`.`tech_cost` AS `tech_cost`,`technology`.`tech_rarity` AS `tech_rarity`,`techcategories`.`tech_category_name` AS `tech_category_name`,`techcategories`.`tech_category_icon` AS `tech_category_icon`,`dlc`.`DLC_name` AS `dlc_name`,`dlc`.`DLC_icon` AS `dlc_icon` from ((`technology` join `techcategories` on(((`technology`.`tech_sub_category_id` = `techcategories`.`tech_sub_category_id`) and (`techcategories`.`tech_sub_category_id` = `techcategories`.`tech_category_name`)))) join `dlc` on((`technology`.`DLC_id` = `dlc`.`DLC_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appearance`
--
ALTER TABLE `appearance`
  ADD PRIMARY KEY (`appearance_id`),
  ADD KEY `appearance_ibfk_1` (`DLC_id1`);

--
-- Indexes for table `authority`
--
ALTER TABLE `authority`
  ADD PRIMARY KEY (`authority_id`),
  ADD KEY `authority_ibfk_1` (`DLC_id`);

--
-- Indexes for table `cityappearance`
--
ALTER TABLE `cityappearance`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `cityappearance_ibfk_1` (`DLC_id`);

--
-- Indexes for table `civics`
--
ALTER TABLE `civics`
  ADD PRIMARY KEY (`civic_id`),
  ADD KEY `civics_ibfk_1` (`DLC_id`);

--
-- Indexes for table `dlc`
--
ALTER TABLE `dlc`
  ADD PRIMARY KEY (`DLC_id`);

--
-- Indexes for table `dlc_type`
--
ALTER TABLE `dlc_type`
  ADD PRIMARY KEY (`DLC_type_id`);

--
-- Indexes for table `ethics`
--
ALTER TABLE `ethics`
  ADD PRIMARY KEY (`ethic_id`),
  ADD KEY `ethics_ibfk_1` (`DLC_id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`komentar_id`),
  ADD KEY `korisnik_id` (`korisnik_id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnik_id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`),
  ADD UNIQUE KEY `korisnicko_ime_2` (`korisnicko_ime`),
  ADD KEY `tip_id` (`tip_id`);

--
-- Indexes for table `origins`
--
ALTER TABLE `origins`
  ADD PRIMARY KEY (`origin_id`),
  ADD KEY `origins_ibfk_1` (`DLC_id`);

--
-- Indexes for table `speciestraits`
--
ALTER TABLE `speciestraits`
  ADD PRIMARY KEY (`species_trait_id`),
  ADD KEY `speciestraits_ibfk_1` (`DLC_id1`);

--
-- Indexes for table `techcategories`
--
ALTER TABLE `techcategories`
  ADD PRIMARY KEY (`tech_sub_category_id`),
  ADD KEY `tech_sub_cathegory_id` (`tech_category_id`);

--
-- Indexes for table `technology`
--
ALTER TABLE `technology`
  ADD PRIMARY KEY (`tech_id`),
  ADD KEY `tech_sub_cathegory_id` (`tech_sub_category_id`),
  ADD KEY `technology_ibfk_2` (`DLC_id`);

--
-- Indexes for table `tipkorisnika`
--
ALTER TABLE `tipkorisnika`
  ADD PRIMARY KEY (`tip_id`);

--
-- Indexes for table `traditions`
--
ALTER TABLE `traditions`
  ADD PRIMARY KEY (`tradition_id`),
  ADD KEY `tradition_tree_id` (`tradition_tree_id`);

--
-- Indexes for table `traditiontrees`
--
ALTER TABLE `traditiontrees`
  ADD PRIMARY KEY (`tradition_tree_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appearance`
--
ALTER TABLE `appearance`
  MODIFY `appearance_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `authority`
--
ALTER TABLE `authority`
  MODIFY `authority_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cityappearance`
--
ALTER TABLE `cityappearance`
  MODIFY `city_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `civics`
--
ALTER TABLE `civics`
  MODIFY `civic_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `dlc`
--
ALTER TABLE `dlc`
  MODIFY `DLC_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `dlc_type`
--
ALTER TABLE `dlc_type`
  MODIFY `DLC_type_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ethics`
--
ALTER TABLE `ethics`
  MODIFY `ethic_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `komentar_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnik_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `origins`
--
ALTER TABLE `origins`
  MODIFY `origin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `speciestraits`
--
ALTER TABLE `speciestraits`
  MODIFY `species_trait_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `technology`
--
ALTER TABLE `technology`
  MODIFY `tech_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tipkorisnika`
--
ALTER TABLE `tipkorisnika`
  MODIFY `tip_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `traditions`
--
ALTER TABLE `traditions`
  MODIFY `tradition_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `traditiontrees`
--
ALTER TABLE `traditiontrees`
  MODIFY `tradition_tree_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appearance`
--
ALTER TABLE `appearance`
  ADD CONSTRAINT `appearance_ibfk_1` FOREIGN KEY (`DLC_id1`) REFERENCES `dlc` (`DLC_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `authority`
--
ALTER TABLE `authority`
  ADD CONSTRAINT `authority_ibfk_1` FOREIGN KEY (`DLC_id`) REFERENCES `dlc` (`DLC_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cityappearance`
--
ALTER TABLE `cityappearance`
  ADD CONSTRAINT `cityappearance_ibfk_1` FOREIGN KEY (`DLC_id`) REFERENCES `dlc` (`DLC_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `civics`
--
ALTER TABLE `civics`
  ADD CONSTRAINT `civics_ibfk_1` FOREIGN KEY (`DLC_id`) REFERENCES `dlc` (`DLC_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ethics`
--
ALTER TABLE `ethics`
  ADD CONSTRAINT `ethics_ibfk_1` FOREIGN KEY (`DLC_id`) REFERENCES `dlc` (`DLC_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`);

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`tip_id`) REFERENCES `tipkorisnika` (`tip_id`);

--
-- Constraints for table `origins`
--
ALTER TABLE `origins`
  ADD CONSTRAINT `origins_ibfk_1` FOREIGN KEY (`DLC_id`) REFERENCES `dlc` (`DLC_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `speciestraits`
--
ALTER TABLE `speciestraits`
  ADD CONSTRAINT `speciestraits_ibfk_1` FOREIGN KEY (`DLC_id1`) REFERENCES `dlc` (`DLC_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `techcategories`
--
ALTER TABLE `techcategories`
  ADD CONSTRAINT `techcategories_ibfk_1` FOREIGN KEY (`tech_category_id`) REFERENCES `techcategories` (`tech_sub_category_id`);

--
-- Constraints for table `technology`
--
ALTER TABLE `technology`
  ADD CONSTRAINT `technology_ibfk_1` FOREIGN KEY (`tech_sub_category_id`) REFERENCES `techcategories` (`tech_sub_category_id`),
  ADD CONSTRAINT `technology_ibfk_2` FOREIGN KEY (`DLC_id`) REFERENCES `dlc` (`DLC_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `traditions`
--
ALTER TABLE `traditions`
  ADD CONSTRAINT `traditions_ibfk_1` FOREIGN KEY (`tradition_tree_id`) REFERENCES `traditiontrees` (`tradition_tree_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
