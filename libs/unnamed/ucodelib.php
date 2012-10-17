<?php
//
// The Unnamed UCode tag library
//

namespace UCode;

use \XBBC\RootTag,
	\XBBC\SimpleTag,
	\XBBC\SingleTag,
	\XBBC\LeafTag,
	\XBBC\QuoteTag;

class URoot extends RootTag {
	public function __construct() {
		parent::__construct();
		$this->before = '<div class="ucode">';
		$this->after  = '</div>';
	}
}

//
// [quote]
//
class UQuoteTag extends QuoteTag {
	public function GetAuthorString() {
		return $this->arg ? ucfirst($this->arg).' a écrit :' : false;
	}
}

//
// [blizzquote]
//
class BlizzquoteTag extends QuoteTag {
	public function __construct() {
		parent::__construct();
		$this->before = '<blockquote class="blizzquote">';
	}
	
	public function GetAuthorString() {
		return 'Blizzard :';
	}
}

//
// [list]
//
class ListTag extends SimpleTag {
	protected $max_nesting = 0;
	
	public function __construct() {
		parent::__construct("<ul>", "</ul>", true);
	}
	
	public function AllowText() {
		return false;
	}
	
	public function CanShift($tag) {
		return $tag instanceof ListItemTag;
	}
	
	public function Reduce() {
		switch(strtolower($this->arg)) {
			case '1';
				$this->before = '<ol>';
				$this->after = '</ol>';
				break;
				
			case 'a';
				$this->before = '<ol style="list-style-type: lower-alpha;">';
				$this->after = '</ol>';
				break;
				
			case 'i';
				$this->before = '<ol style="list-style-type: upper-roman">';
				$this->after = '</ol>';
				break;
		}
		
		return parent::Reduce();
	}
}

//
// [*]
//
class ListItemTag extends SimpleTag {
	protected $max_nesting = 0;
	
	public function __construct() {
		parent::__construct('<li>', '</li>');
		$this->display = \XBBC\DISPLAY_SPECIAL;
	}
	
	public function CanShift($tag) {
		if($tag instanceof self) {
			$this->ctx->Reduce($this->element());
			return true;
		}
		
		return parent::CanShift($tag);
	}
}

//
// [table]
//
class TableTag extends SimpleTag {
	protected $max_nesting = 5;
	
	public function __construct() {
		parent::__construct('<table cellspacing="0" cellpadding="0">', '</table>', true);
	}
	
	public function AllowText() {
		return false;
	}
	
	public function CanShift($tag) {
		return $tag instanceof TableRowTag;
	}
}

//
// [tr]
//
class TableRowTag extends SimpleTag {
	protected $max_nesting = 0;
	
	public function __construct() {
		parent::__construct("<tr>", "</tr>", true);
		$this->display = \XBBC\DISPLAY_SPECIAL;
	}
	
	public function AllowText() {
		return false;
	}
	
	public function CanShift($tag) {
		return $tag instanceof TableDataTag;
	}
}

//
// [td] / [th]
//
class TableDataTag extends SimpleTag {
	protected $max_nesting = 0;
	
	public function __construct($header = false) {
		if($header)
			parent::__construct("<th>", "</th>", true);
		else
			parent::__construct("<td>", "</td>", true);
		
		$this->display = \XBBC\DISPLAY_SPECIAL;
		$this->strip_empty = false;
	}
	
	public function StripWhitespaces() { return false; }
	
	public function Reduce() {
		$this->content = preg_replace('/^(\s|<br \/>)+|(\s|<br \/>)+$/', '', $this->FlushText()->content);
		return parent::Reduce();
	}
}

//
// [h1] ... [h4]
//
class TitleTag extends SimpleTag {
	protected $level;
	
	protected static $IDS_CACHE = array();
	
	public function __construct($level) {
		parent::__construct("<h$level>", "</h$level>", true);
		$this->level = $level;
	}
	
	public function Reduce() {
		$id = 'h-'.sluggify(strip_tags($this->FlushText()->content));
		
		if(isset(self::$IDS_CACHE[$id])) {
			$id = $id.'-'.(self::$IDS_CACHE[$id]++);
		} else {
			self::$IDS_CACHE[$id] = 1;
		}
		
		$this->before = "<h{$this->level} id=\"$id\">";
		return parent::Reduce();
	}
}

//
// [color]
//
class ColorTag extends SimpleTag {
	public function __construct() {
		parent::__construct(null, '</span>');
	}
	
	public function __create() {
		if($wh_class = WowheadTag::ColorAsClass($this->arg)) {
			$this->before = "<span class=\"$wh_class\">";
		} elseif($color = self::ParseColor($this->arg)) {
			$this->before = "<span style=\"color:$color\">";
		} else {
			return false;
		}
	}
	
	public static function ParseColor($color) {
		$color = preg_replace('/\s/', '', $color);
		return preg_match('/^([a-z\-]+|#[0-9a-f]{3}|#[0-9a-f]{6})$/i', $color) ? $color : false;
	}
}

//
// [db]
//
class WowheadTag extends LeafTag {
	//
	// Colors stuff
	//
	
	// Public colors shared with the [color] tag
	protected static $colors = array(
		// Item qualities
		"poor"        => "q0",
		"common"      => "q1",
		"uncommon"    => "q2",
		"rare"        => "q3",
		"epic"        => "q4",
		"legendary"   => "q5",
		"artifact"    => "q6",
		"heirloom"    => "q7",
		"bonus"       => "q8",
		"glyph"       => "q9",
		"error"       => "q10",
		
		// Classes
		"warrior"     => "c1",
		"paladin"     => "c2",
		"hunter"      => "c3",
		"rogue"       => "c4",
		"priest"      => "c5",
		"deathknight" => "c6", "dk" => "c6",
		"shaman"      => "c7",
		"mage"        => "c8", 
		"warlock"     => "c9",
		"monk"        => "c10",
		"druid"       => "c11",
		
		// Difficulties
		"hard"        => "r1",
		"medium"      => "r2",
		"easy"        => "r3",
		"trivial"     => "r4",
		
		// NPC messages
		"yell"        => "s1",
		"say"         => "s2",
		"whisper"     => "s3",
		
		// Blizzard blue
		"blizzard"    => "blizzard-blue"
	);
	
	// Private colors not used by the [color] tag
	protected static $colors_private = array(
		// Item qualities
		"grey"        => "q0",
		"white"       => "q1",
		"green"       => "q2",
		"blue"        => "q3",
		"purple"      => "q4",
		"orange"      => "q5",
	);
	
	// Colors usable without 'color='
	protected static $aliased_colors = array(
		"poor", "common", "uncommon", "rare", "epic", "legendary"
	);
	
	// Return the wowhead's class name for a given color alias
	public static function ColorAsClass($color, $use_private = false) {
		$color = strtolower($color);
		
		// Checks public colors
		if(isset(self::$colors[$color]))
			return self::$colors[$color];
		
		// Checks private colors
		if($use_private && isset(self::$colors_private[$color]))
			return self::$colors_private[$color];
		
		// Not found
		return false;
	}
	
	//
	// Tag stuff
	//
	
	protected static $types = array(
		"item",
		"spell",
		"quest",
		"achievement",
	);
	
	protected static $domains = array(
		"fr",
		"www",
		"ptr"
	);
	
	protected $type = null;
	
	public function __construct() {
		parent::__construct(null, '</a>', false);
	}
	
	public function __create() {
		$type = false;
		
		// Find the tag type in args
		foreach(static::$types as $t) {
			if(isset($this->xargs[$t])) {
				$type = $t;
				break;
			}
		}
		
		if(!$type)
			return false;
		
		// Wowhead root
		$domain = isset($this->xargs['domain']) && in_array($this->xargs['domain'], self::$domains)
			? $this->xargs['domain']
			: 'fr';
		$wh = "http://$domain.wowhead.com";
		
		// Link classes and styles
		$classes = array();
		$styles  = array();
		$args    = array();
		
		// The argument of the selected type
		$id = (int) $this->xargs[$type];
		
		// Handle the tag
		switch($type) {
			case "item":
				$path = "item=$id";
				$this->import_xarg($args, 'lvl');
				$this->import_xarg($args, 'ench');
				$this->import_xarg($args, 'sock');
				$this->import_xarg($args, 'gems');
				$this->import_xarg($args, 'set', 'pcs');
				$this->import_xarg($args, 'rand');
				break;
				
			case "spell":
				$path = "spell=$id";
				$this->import_xarg($args, 'lvl');
				$this->import_xarg($args, 'buff');
				break;
				
			case "quest":
				$path = "quest=$id";
				break;
				
			case "achievement":
				$path = "achievement=$id";
				$this->import_xarg($args, 'who');
				if(isset($this->xargs['when']) && ($when = strtotime($this->xargs['when'])))
					$args['when'] = $when*1000;
				break;
				
			default:
				return false;
		}
		
		// Color stuff
		foreach(self::$aliased_colors as $alias) {
			if(isset($this->xargs[$alias])) {
				$this->xargs['color'] = $alias;
				break;
			}
		}
		
		if(isset($this->xargs['color'])) {
			if($color_class = self::ColorAsClass($this->xargs['color'], true)) {
				$classes[] = $color_class;
			} else if($color_style = ColorTag::ParseColor($this->xargs['color'])) {
				$styles['color'] = $this->xargs['color'];
			}
		}
		
		// Compile classes
		if(!empty($classes)) {
			$classes = ' class="'.implode(' ', $classes).'"';
		} else {
			$classes = '';
		}
		
		// Compile styles
		if(!empty($styles)) {
			$styles_css = '';
			foreach($styles as $style => $value) {
				$styles_css .= "$style:$value";
			}
			$styles = " style=\"$styles_css\"";
		} else {
			$styles = '';
		}
		
		// Compile args
		if(!empty($args)) {
			$args_itms = '';
			foreach($args as $arg => $value) {
				$args_itms .= "&$arg=$value";
			}
			$args = htmlspecialchars($args_itms);
		} else {
			$args = '';
		}
		
		$this->before = "<a href=\"$wh/$path$args\"$styles$classes>";
	}
	
	protected function import_xarg(&$args, $key, $as = null) {
		if(!$as) $as = $key;
		if(isset($this->xargs[$key]))
			$args[$as] = $this->xargs[$key];
	}
}

//
// Lib loader
//
abstract class Lib {
	public static function load(\XBBC\Parser $parser) {
		// Basics
		$parser->DefineTag('hr',         new SingleTag('<div class="hr"></div>', true));
		$parser->DefineTag('center',     new SimpleTag('<center>', '</center>'));
		$parser->DefineTag('color',      new ColorTag());
		
		// Quotes
		$parser->RemoveTag('quote');
		$parser->DefineTag('quote',      new UQuoteTag());
		
		// Titles
		$parser->DefineTag('h1',         new TitleTag(3));
		$parser->DefineTag('h2',         new TitleTag(4));
		$parser->DefineTag('h3',         new TitleTag(5));
		$parser->DefineTag('h4',         new TitleTag(6));
		
		// Lists
		$parser->DefineTag('list',       new ListTag());
		$parser->DefineTag('*',          new ListItemTag());
		
		// Tables
		$parser->DefineTag('table',      new TableTag());
		$parser->DefineTag('tr',         new TableRowTag());
		$parser->DefineTag('td',         new TableDataTag());
		$parser->DefineTag('th',         new TableDataTag(true));
		
		// WoW Stuff
		$parser->DefineTag('db',         new WowheadTag());
		$parser->DefineTag('blizzquote', new BlizzquoteTag());
		
		// Root
		$parser->RootTag(new \UCode\URoot());
	}
}
