<?php

// GENDER ----------------------------------------------------------------------

define('GENDER_MALE',   0);
define('GENDER_FEMALE', 1);

$GENDERS = array(
	MALE    =>  array("Homme", "Hommes"),
	FEMALE  =>  array("Femme", "Femmes"),
);

// RACES -----------------------------------------------------------------------

define("RACE_HUMAN",    1);
define("RACE_ORC",      2);
define("RACE_DWARF",    3);
define("RACE_NIGHTELF", 4);
define("RACE_UNDEAD",   5);
define("RACE_TAUREN",   6);
define("RACE_GNOME",    7);
define("RACE_TROLL",    8);
define("RACE_GOBELIN",  9);
define("RACE_BLOODELF", 10);
define("RACE_DRAENEI",  11);
define("RACE_WORGEN",   22);
define("RACE_PANDAREN", 25);

$RACE = array(
	RACE_HUMAN     =>  array("Humain", "Humaine"),
	RACE_ORC       =>  array("Orc", "Orque"),
	RACE_DWARF     =>  array("Nain", "Naine"),
	RACE_NIGHTELF  =>  array("Elfe de la nuit", "Elfe de la nuit"),
	RACE_UNDEAD    =>  array("Mort-vivant", "Morte-vivante"),
	RACE_TAUREN    =>  array("Tauren", "Taurène"),
	RACE_GNOME     =>  array("Gnome", "Gnome"),
	RACE_TROLL     =>  array("Troll", "Trollesse"),
	RACE_GOBELIN   =>  array("Gobelin", "Gobeline"),
	RACE_BLOODELF  =>  array("Elfe de sang", "Elfe de sang"),
	RACE_DRAENEI   =>  array("Draeneï", "Draeneï"),
	RACE_WORGEN    =>  array("Worgen", "Worgen"),
	RACE_PANDAREN  =>  array("Pandaren", "Pandarène"),
);

$RACES = array(
	RACE_HUMAN     =>  array("Humains", "Humaines"),
	RACE_ORC       =>  array("Orcs", "Orques"),
	RACE_DWARF     =>  array("Nains", "Naines"),
	RACE_NIGHTELF  =>  array("Elfes de la nuit", "Elfes de la nuit"),
	RACE_UNDEAD    =>  array("Morts-vivants", "Mortes-vivantes"),
	RACE_TAUREN    =>  array("Taurens", "Taurènes"),
	RACE_GNOME     =>  array("Gnomes", "Gnomes"),
	RACE_TROLL     =>  array("Trolls", "Trollesses"),
	RACE_GOBELIN   =>  array("Gobelins", "Gobelines"),
	RACE_BLOODELF  =>  array("Elfes de sang", "Elfes de sang"),
	RACE_DRAENEI   =>  array("Draeneïs", "Draeneïs"),
	RACE_WORGEN    =>  array("Worgens", "Worgens"),
	RACE_PANDAREN  =>  array("Pandarens", "Pandarènes"),
);

// FACTIONS --------------------------------------------------------------------

define("FACTION_ALLIANCE",	0);
define("FACTION_HORDE",		1);

$FACTIONS = array(
	FACTION_ALLIANCE  =>  "Alliance",
	FACTION_HORDE     =>  "Horde",
);

$FACTIONS_COLORS = array(
	FACTION_ALLIANCE  =>  "#0C81CE",
	FACTION_HORDE     =>  "#CD2B00",
);

// CLASSES ---------------------------------------------------------------------

define("CLASS_WARRIOR", 1);
define("CLASS_PALADIN", 2);
define("CLASS_HUNTER",  3);
define("CLASS_ROGUE",   4);
define("CLASS_PRIEST",  5);
define("CLASS_DK",      6);
define("CLASS_SHAMAN",  7);
define("CLASS_MAGE",    8);
define("CLASS_WARLOCK", 9);
define("CLASS_DRUID",   11);
define("CLASS_MONK",    10);

$CLASS = array(
	CLASS_WARRIOR  =>  array("Guerrier", "Guerrière"),
	CLASS_PALADIN  =>  array("Paladin", "Paladin"),
	CLASS_HUNTER   =>  array("Chasseur", "Chasseresse"),
	CLASS_ROGUE    =>  array("Voleur", "Voleuse"),
	CLASS_PRIEST   =>  array("Prêtre", "Prêtresse"),
	CLASS_DK       =>  array("Chevalier de la mort", "Chevalier de la mort"),
	CLASS_SHAMAN   =>  array("Chaman", "Chamane"),
	CLASS_MAGE     =>  array("Mage", "Mage"),
	CLASS_WARLOCK  =>  array("Démoniste", "Démoniste"),
	CLASS_DRUID    =>  array("Druide", "Druidesse"),
	CLASS_MONK     =>  array("Moine", "Moniale"),
);

$CLASSES = array(
	CLASS_WARRIOR  =>  array("Guerriers", "Guerrières"),
	CLASS_PALADIN  =>  array("Paladins", "Paladins"),
	CLASS_HUNTER   =>  array("Chasseurs", "Chasseresses"),
	CLASS_ROGUE    =>  array("Voleurs", "Voleuses"),
	CLASS_PRIEST   =>  array("Prêtres", "Prêtresses"),
	CLASS_DK       =>  array("Chevaliers de la mort", "Chevaliers de la mort"),
	CLASS_SHAMAN   =>  array("Chamans", "Chamanes"),
	CLASS_MAGE     =>  array("Mages", "Mages"),
	CLASS_WARLOCK  =>  array("Démonistes", "Démonistes"),
	CLASS_DRUID    =>  array("Druides", "Druidesses"),
	CLASS_MONK     =>  array("Moines", "Moniales"),
);

$CLASS_COLORS = array(
	CLASS_WARRIOR  =>  "#C79C6E",
	CLASS_PALADIN  =>  "#F58CBA",
	CLASS_HUNTER   =>  "#ABD473",
	CLASS_ROGUE    =>  "#FFF569",
	CLASS_PRIEST   =>  "#FFFFFF",
	CLASS_DK       =>  "#C41F3B",
	CLASS_SHAMAN   =>  "#0070DE",
	CLASS_MAGE     =>  "#69CCF0",
	CLASS_WARLOCK  =>  "#9482C9",
	CLASS_DRUID    =>  "#FF7D0A",
	CLASS_MONK     =>  "#00FFBA",
);
