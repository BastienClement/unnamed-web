<?php

class TOCNode {
	protected $level, $slug, $text;
	protected $children = array();
	
	public function __construct($level, $slug, $text) {
		$this->level = $level;
		$this->slug = $slug;
		$this->text = $text;
	}
	
	public function Insert($level, $slug, $text) {
		if(($last_child = end($this->children)) && $last_child->level < $level) {
			$last_child->Insert($level, $slug, $text);
		} else {
			$this->children[] = new TOCNode($level, $slug, $text);
			return;
		}
	}
	
	public function Generate() {
		return '<li><a href="#'.$this->slug.'">'.$this->text.'</a>'.$this->GenerateSubtree().'</li>';
	}
	
	protected function GenerateSubtree() {
		if(!empty($this->children)) {
			$html = '<ol>';
			foreach($this->children as $child)
				$html .= $child->Generate();
			$html .= '</ol>';
			
			return $html;
		}

		return '';
	}
}

class TOC extends TOCNode {
	public function __construct() {
		parent::__construct(0, null, null);
	}
	
	public function Generate() {
		echo $this->GenerateSubtree();
	}
}
