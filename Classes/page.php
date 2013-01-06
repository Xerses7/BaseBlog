<?php

	class Page {
		private $result = '';
		private $totalRows = 0;
		private $rowsPerPage = 0;
		private $pageNumber = 0;
		private $presentable = '';
		
		public function __construct($aResult, $aTotalRows, $aRowsPerPage ){
			$this->result = $aResult;
			$this->totalRows = $aTotalRows;
			$this->rowsPerPage = $aRowsPerPage;
		}
		
		public function select ($aPageNumber = 1) {
			$this->pageNumber = $aPageNumber;
			#			if(isset($_GET['pageNumber'])) {
#  				$this->pageNumber = $_GET['pageNumber'];
#			}
			
			// calculate the number of pages for the item to paginate
			$this->totalPages = $this->totalRows/$this->rowsPerPage;
			// add a page for the pages not multiples of the rows per page.
			if ($this->totalRows % $this->rowsPerPage > 0) {
			 	$this->totalPages++;
			}
			
			$firstRow = (( $this->pageNumber - 1 ) * $this->rowsPerPage );
			$lastRow = $this->pageNumber * $this->rowsPerPage;
			
			// select the elements that have to show in the page
			$this->presentable = array_slice($this->result, $firstRow, $this->rowsPerPage);
		}
		
		public function toPresent(){
			return ($this->presentable);
		}
		
		public function numbers ($controller, $queryString = "") {
			// if the queryString is set, we insert an '&' to link it to the pn definition
			if(isset($queryString)){
				$queryString .= "&"; 
			}
			$pageNumbers = array(); 
			// create a link for each page needed, and store it in an array
			for($i=1 ; $i <= $this->totalPages; $i++ ){
				$pageNumbers[] = "<a href='$controller?".$queryString."pn=$i'>$i</a>";
			}
			
			return ($pageNumbers);
		}
		
	}

?>
