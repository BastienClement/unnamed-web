<?php

// A node inside the TOC
class TOCNode {
	protected $level, $slug, $text;
	protected $children = array();
	
	public function __construct($level, $slug, $text) {
		$this->level = $level;
		$this->slug  = $slug;
		$this->text  = $text;
	}
	
	// Insert a new node inside the tree
	public function Insert($level, $slug, $text) {
		if(($last_child = end($this->children)) && $last_child->level < $level) {
			$last_child->Insert($level, $slug, $text);
		} else {
			$this->children[] = new TOCNode($level, $slug, $text);
			return;
		}
	}
	
	// Generate the partial tree of this node
	public function Generate() {
		return '<li><a href="#'.$this->slug.'">'.$this->text.'</a>'.$this->GenerateSubtree().'</li>';
	}
	
	// Generate the sub-tree from this node
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

// The root of the TOC
class TOC extends TOCNode {
	public function __construct() {
		parent::__construct(0, null, null);
	}
	
	// The root is null and only generates sub-trees
	public function Generate() {
		echo $this->GenerateSubtree();
	}
}

?>

<h2>Table des matières</h2>

<div id="sommaire-article">
<?php
	$toc = new TOC;
	
	foreach($titles as $title) {
		list(, $level, $slug, $text) = $title;
		$toc->Insert($level-2, $slug, $text);
	}
	
	$toc->Generate();
?>
</div>
