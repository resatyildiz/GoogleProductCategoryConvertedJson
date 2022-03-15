<?php

class GoogleCategories{
	
		public function export(){
			header('Content-Type: application/json; charset=utf-8');
			header("Access-Control-Allow-Origin: *");
			header("Access-Control-Allow-Headers: *");
			print_r($this->JsonGenerateCategories());
			exit;
		}
	
		public function JsonGenerateCategories() {

		// default format

		$pool = $mitigate = array();

		$pool = file('https://www.google.com/basepages/producttype/taxonomy-with-ids.tr-TR.txt', FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
		
		foreach ($pool as $row => $value) {
			list($id, $cat) = explode(' - ', $value);
			$mitigate[$row]["id"]= $id;
			$mitigate[$row]["value"] = $cat;
		}
		
		return json_encode($mitigate, JSON_UNESCAPED_UNICODE);
		}
}

$ctg = new GoogleCategories();
$ctg->export();

