<?php
//
// The Unnamed UCode tag library
//

namespace UCode;

use \XBBC\RootTag,
	\XBBC\SimpleTag,
	\XBBC\SingleTag,
	\XBBC\QuoteTag;

class Root extends RootTag {
	public function __construct() {
		parent::__construct();
		$this->before = '<div class="ucode">';
		$this->after  = '</div>';
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
// Lib loader
//
abstract class Lib {
	public static function load(\XBBC\Parser $parser) {
		// Basics
		$parser->DefineTag('hr',         new SingleTag('<div class="hr"></div>', true));
		$parser->DefineTag('blizzquote', new BlizzquoteTag());
		$parser->DefineTag('center',     new SimpleTag('<center>', '</center>'));
		
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
	}
}
