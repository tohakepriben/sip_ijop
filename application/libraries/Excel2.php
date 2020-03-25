<?php defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel2 extends Spreadsheet{

    public function __construct(){
        parent::__construct();
    }

	public function generate($filename){
		
		$writer = new Xlsx($this);
		$writer->save($filename.'.xlsx');
	}

        
}