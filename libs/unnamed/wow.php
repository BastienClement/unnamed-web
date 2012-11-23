<?php

// GENDER ----------------------------------------------------------------------

define('GENDER_MALE',   0);
define('GENDER_FEMALE', 1);

$GENDERS = array(
	GENDER_MALE    =>  array("Homme", "Hommes"),
	GENDER_FEMALE  =>  array("Femme", "Femmes"),
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

define("FACTION_ALLIANCE", 0);
define("FACTION_HORDE",    1);

$FACTIONS = array(
	FACTION_ALLIANCE  =>  "Alliance",
	FACTION_HORDE     =>  "Horde",
);

$FACTIONS_COLORS = array(
	FACTION_ALLIANCE  =>  "#0C81CE",
	FACTION_HORDE     =>  "#CD2B00",
);

// SPECS -----------------------------------------------------------------------

define("SPEC_WARRIOR_ARMS",        1);
define("SPEC_WARRIOR_FURRY",       2);
define("SPEC_WARRIOR_PROTECTION",  3);
define("SPEC_PALADIN_HOLY",        4);
define("SPEC_PALADIN_PROTECTION",  5);
define("SPEC_PALADIN_RETRIBUTION", 6);
define("SPEC_HUNTER_BEASTMASTERY", 7);
define("SPEC_HUNTER_MARKSMANSHIP", 8);
define("SPEC_HUNTER_SURVIVAL",     9);
define("SPEC_ROGUE_ASSASSINATION", 10);
define("SPEC_ROGUE_COMBAT",        11);
define("SPEC_ROGUE_SUBTLETY",      12);
define("SPEC_PRIEST_DISCIPLINE",   13);
define("SPEC_PRIEST_HOLY",         14);
define("SPEC_PRIEST_SHADOW",       15);
define("SPEC_DK_BLOOD",            16);
define("SPEC_DK_FROST",            17);
define("SPEC_DK_UNHOLY",           18);
define("SPEC_SHAMAN_ELEMENTAL",    19);
define("SPEC_SHAMAN_ENHANCEMENT",  20);
define("SPEC_SHAMAN_RESTORATION",  21);
define("SPEC_MAGE_ARCANE",         22);
define("SPEC_MAGE_FIRE",           23);
define("SPEC_MAGE_FROST",          24);
define("SPEC_WARLOCK_AFFLICTION",  25);
define("SPEC_WARLOCK_DEMONOLOGY",  26);
define("SPEC_WARLOCK_DESTRUCTION", 27);
define("SPEC_MONK_BREWMASTER",     28);
define("SPEC_MONK_MISTWEAVER",     29);
define("SPEC_MONK_WINDWALKER",     30);
define("SPEC_DRUID_BALANCE",       31);
define("SPEC_DRUID_FERAL",         32);
define("SPEC_DRUID_GUARDIAN",      33);
define("SPEC_DRUID_RESTORATION",   34);

$SPEC = array(
	SPEC_WARRIOR_ARMS         => "Armes",
	SPEC_WARRIOR_FURRY        => "Fureur",
	SPEC_WARRIOR_PROTECTION   => "Protection",
	SPEC_PALADIN_HOLY         => "Sacré",
	SPEC_PALADIN_PROTECTION   => "Protection",
	SPEC_PALADIN_RETRIBUTION  => "Rétribution",
	SPEC_HUNTER_BEASTMASTERY  => "Maîtrise des bêtes",
	SPEC_HUNTER_MARKSMANSHIP  => "Précision",
	SPEC_HUNTER_SURVIVAL      => "Survie",
	SPEC_ROGUE_ASSASSINATION  => "Assassinat",
	SPEC_ROGUE_COMBAT         => "Combat",
	SPEC_ROGUE_SUBTLETY       => "Finesse",
	SPEC_PRIEST_DISCIPLINE    => "Discipline",
	SPEC_PRIEST_HOLY          => "Sacré",
	SPEC_PRIEST_SHADOW        => "Ombre",
	SPEC_DK_BLOOD             => "Sang",
	SPEC_DK_FROST             => "Givre",
	SPEC_DK_UNHOLY            => "Impie",
	SPEC_SHAMAN_ELEMENTAL     => "Élementaire",
	SPEC_SHAMAN_ENHANCEMENT   => "Amélioration",
	SPEC_SHAMAN_RESTORATION   => "Restauration",
	SPEC_MAGE_ARCANE          => "Arcanes",
	SPEC_MAGE_FIRE            => "Feu",
	SPEC_MAGE_FROST           => "Givre",
	SPEC_WARLOCK_AFFLICTION   => "Affliction",
	SPEC_WARLOCK_DEMONOLOGY   => "Démonologie",
	SPEC_WARLOCK_DESTRUCTION  => "Destruction",
	SPEC_MONK_BREWMASTER      => "Maître brasseur",
	SPEC_MONK_MISTWEAVER      => "Tisse-brume",
	SPEC_MONK_WINDWALKER      => "Marche-vent",
	SPEC_DRUID_BALANCE        => "Équilibre",
	SPEC_DRUID_FERAL          => "Farouche",
	SPEC_DRUID_GUARDIAN       => "Gardien",
	SPEC_DRUID_RESTORATION    => "Restauration"
);

$SPEC_ICONS = array(
	SPEC_WARRIOR_ARMS         => "ability_warrior_savageblow",
	SPEC_WARRIOR_FURRY        => "ability_warrior_innerrage",
	SPEC_WARRIOR_PROTECTION   => "ability_warrior_defensivestance",
	SPEC_PALADIN_HOLY         => "spell_holy_holybolt",
	SPEC_PALADIN_PROTECTION   => "ability_paladin_shieldofthetemplar",
	SPEC_PALADIN_RETRIBUTION  => "spell_holy_auraoflight",
	SPEC_HUNTER_BEASTMASTERY  => "ability_hunter_bestialdiscipline",
	SPEC_HUNTER_MARKSMANSHIP  => "ability_hunter_focusedaim",
	SPEC_HUNTER_SURVIVAL      => "ability_hunter_camouflage",
	SPEC_ROGUE_ASSASSINATION  => "ability_rogue_eviscerate",
	SPEC_ROGUE_COMBAT         => "ability_backstab",
	SPEC_ROGUE_SUBTLETY       => "ability_stealth",
	SPEC_PRIEST_DISCIPLINE    => "spell_holy_powerwordshield",
	SPEC_PRIEST_HOLY          => "spell_holy_guardianspirit",
	SPEC_PRIEST_SHADOW        => "spell_shadow_shadowwordpain",
	SPEC_DK_BLOOD             => "spell_deathknight_bloodpresence",
	SPEC_DK_FROST             => "spell_deathknight_frostpresence",
	SPEC_DK_UNHOLY            => "spell_deathknight_unholypresence",
	SPEC_SHAMAN_ELEMENTAL     => "spell_nature_lightning",
	SPEC_SHAMAN_ENHANCEMENT   => "spell_shaman_improvedstormstrike",
	SPEC_SHAMAN_RESTORATION   => "spell_nature_magicimmunity",
	SPEC_MAGE_ARCANE          => "spell_holy_magicalsentry",
	SPEC_MAGE_FIRE            => "spell_fire_firebolt02",
	SPEC_MAGE_FROST           => "spell_frost_frostbolt02",
	SPEC_WARLOCK_AFFLICTION   => "spell_shadow_deathcoil",
	SPEC_WARLOCK_DEMONOLOGY   => "spell_shadow_metamorphosis",
	SPEC_WARLOCK_DESTRUCTION  => "spell_shadow_rainoffire",
	SPEC_MONK_BREWMASTER      => "spell_monk_brewmaster_spec",
	SPEC_MONK_MISTWEAVER      => "spell_monk_mistweaver_spec",
	SPEC_MONK_WINDWALKER      => "spell_monk_windwalker_spec",
	SPEC_DRUID_BALANCE        => "spell_nature_starfall",
	SPEC_DRUID_FERAL          => "ability_druid_catform",
	SPEC_DRUID_GUARDIAN       => "ability_racial_bearform",
	SPEC_DRUID_RESTORATION    => "spell_nature_healingtouch"
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

$CLASS_SPECS = array(
	CLASS_WARRIOR  => array(SPEC_WARRIOR_ARMS, SPEC_WARRIOR_FURRY, SPEC_WARRIOR_PROTECTION),
	CLASS_PALADIN  => array(SPEC_PALADIN_HOLY, SPEC_PALADIN_PROTECTION, SPEC_PALADIN_RETRIBUTION),
	CLASS_HUNTER   => array(SPEC_HUNTER_BEASTMASTERY, SPEC_HUNTER_MARKSMANSHIP, SPEC_HUNTER_SURVIVAL),
	CLASS_ROGUE    => array(SPEC_ROGUE_ASSASSINATION, SPEC_ROGUE_COMBAT, SPEC_ROGUE_SUBTLETY),
	CLASS_PRIEST   => array(SPEC_PRIEST_DISCIPLINE, SPEC_PRIEST_HOLY, SPEC_PRIEST_SHADOW),
	CLASS_DK       => array(SPEC_DK_BLOOD, SPEC_DK_FROST, SPEC_DK_UNHOLY),
	CLASS_SHAMAN   => array(SPEC_SHAMAN_ELEMENTAL, SPEC_SHAMAN_ENHANCEMENT, SPEC_SHAMAN_RESTORATION),
	CLASS_MAGE     => array(SPEC_MAGE_ARCANE, SPEC_MAGE_FIRE, SPEC_MAGE_FROST),
	CLASS_WARLOCK  => array(SPEC_WARLOCK_AFFLICTION, SPEC_WARLOCK_DEMONOLOGY, SPEC_WARLOCK_DESTRUCTION),
	CLASS_MONK     => array(SPEC_MONK_BREWMASTER, SPEC_MONK_MISTWEAVER, SPEC_MONK_WINDWALKER),
	CLASS_DRUID    => array(SPEC_DRUID_BALANCE, SPEC_DRUID_FERAL, SPEC_DRUID_GUARDIAN, SPEC_DRUID_RESTORATION)
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
