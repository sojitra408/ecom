<?php
namespace App\Http\Controllers\Admin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
 use DB;
use Session;
use Mail;
use Redirect;
use Lang;
 use Validator;
use Hash;
use Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\IOFactory;
	use PhpOffice\PhpSpreadsheet\Reader\IReader;
	use PhpOffice\PhpSpreadsheet\Writer\IWriter;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
	use Symfony\Component\HttpFoundation\StreamedResponse;
	use PhpOffice\PhpSpreadsheet\Writer as Writer;
 

class ReportController extends Controller

{

    /**

     * Show the profile for the given user.

     *

     * @param  int  $id

     * @return View

     */
 
public function __construct()
    {
       
		$this->middleware('auth:admin');
  

}
    
	public function report(){
	
	 $title 			  = 	array('pageTitle' => 'Registration Report');
	
	  return view('admin.report',$title);
		 

    }
	
	public function registerReport()
	{
	
	
	$result=DB::table('users')->orderBy('id','desc')->get()->toArray();
	 
	
	 
	
	$c=5;
	$spreadsheet = new Spreadsheet();
	$sheet = $spreadsheet->getActiveSheet();
	
      $spreadsheet->getActiveSheet()->mergeCells('D1:E1');	
	  $sheet->setCellValue('D1', 'Vendor Registration');
	    
	  
	    	
		
		
	  $spreadsheet->getActiveSheet()->getStyle('D1')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE);
	 $spreadsheet->getActiveSheet()->getStyle('D2')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE);
	
	 
	  
 	
	$sheet->getColumnDimension('A')->setAutoSize(false);
    $sheet->getColumnDimension('A')->setWidth(15);
	  $sheet->setCellValue('A'.$c, 'Sr No');
	  
	 $sheet->setCellValue('B'.$c, "Date(IST)");
	$sheet->getColumnDimension('B')->setAutoSize(false);
    $sheet->getColumnDimension('B')->setWidth(20); 
	  
	$sheet->setCellValue('C'.$c, "Time(IST)");
	$sheet->getColumnDimension('C')->setAutoSize(false);
    $sheet->getColumnDimension('C')->setWidth(20);
	 
	
	$sheet->setCellValue('D'.$c, "IP Address");
	$sheet->getColumnDimension('D')->setAutoSize(false);
    $sheet->getColumnDimension('D')->setWidth(25);
	
	$sheet->setCellValue('E'.$c, "Name Entered");
	$sheet->getColumnDimension('E')->setAutoSize(false);
    $sheet->getColumnDimension('E')->setWidth(25);
	
	$sheet->setCellValue('F'.$c, 'Brand Name Entered');
	$sheet->getColumnDimension('F')->setAutoSize(false);
    $sheet->getColumnDimension('F')->setWidth(25);
	
	$sheet->setCellValue('G'.$c, 'Email ID');
	$sheet->getColumnDimension('G')->setAutoSize(false);
    $sheet->getColumnDimension('G')->setWidth(25);
	
	$sheet->setCellValue('H'.$c, 'Email Verified');
	$sheet->getColumnDimension('H')->setAutoSize(false);
    $sheet->getColumnDimension('H')->setWidth(10);
	
	$sheet->setCellValue('I'.$c, 'Mobile');
	$sheet->getColumnDimension('I')->setAutoSize(false);
    $sheet->getColumnDimension('I')->setWidth(15);
	
	$sheet->setCellValue('J'.$c, 'Mobile Verified');
	$sheet->getColumnDimension('J')->setAutoSize(false);
    $sheet->getColumnDimension('J')->setWidth(10);
	 
 
	
	
	
	 
	
	$index=$c+1;
	
	 $i=1;
			 
			 foreach( $result as $key => $entry)
			 {
			 
			  $sheet->setCellValue('A'.$index, $i);
			  
			  
			  $sheet->setCellValue('B'.$index,date('Y-m-d',strtotime($entry->created_at)));
			$spreadsheet->getActiveSheet()->getStyle('B'.$index)->getAlignment()->applyFromArray( [ 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP, 'textRotation' => 0, 'wrapText' => TRUE ] );
			 
			  
			 $sheet->setCellValue('c'.$index,date('H:m:s',strtotime($entry->created_at)));
			 
			 
			 $sheet->setCellValue('D'.$index, $entry->user_ip);
			$spreadsheet->getActiveSheet()->getStyle('D'.$index)->getAlignment()->applyFromArray( [ 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP, 'textRotation' => 0, 'wrapText' => TRUE ] );
			 
			 $sheet->setCellValue('E'.$index, $entry->name);
			$spreadsheet->getActiveSheet()->getStyle('E'.$index)->getAlignment()->applyFromArray( [ 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP, 'textRotation' => 0, 'wrapText' => TRUE ] );
			 
			 $sheet->setCellValue('F'.$index, $entry->brand);
			$spreadsheet->getActiveSheet()->getStyle('F'.$index)->getAlignment()->applyFromArray( [ 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP, 'textRotation' => 0, 'wrapText' => TRUE ] );
			 $sheet->setCellValue('G'.$index, $entry->email);
			$spreadsheet->getActiveSheet()->getStyle('F'.$index)->getAlignment()->applyFromArray( [ 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP, 'textRotation' => 0, 'wrapText' => TRUE ] );
			
			 $sheet->setCellValue('H'.$index, 'Yes');
			 
			  $sheet->setCellValue('I'.$index, $entry->mobile);
			$spreadsheet->getActiveSheet()->getStyle('F'.$index)->getAlignment()->applyFromArray( [ 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP, 'textRotation' => 0, 'wrapText' => TRUE ] );
			
			 $sheet->setCellValue('J'.$index, 'Yes');
			 
		 
			 
			   
		 
			 
			 $index++;
			 $i++;
			 }
	

$writer = new Writer\Xls($spreadsheet);

        $response =  new StreamedResponse(
            function () use ($writer) {
                $writer->save('php://output');
            }
        );
        $response->headers->set('Content-Type', 'application/vnd.ms-excel');
        $response->headers->set('Content-Disposition', 'attachment;filename="registreation.xls"');
        $response->headers->set('Cache-Control','max-age=0');
        return $response;




    
	
	 
	
	
	
	}
	
	public function notregisterReport()
	{
	
	
	$result=DB::table('register')->orderBy('id','desc')->get()->toArray();
	 
	
	 
	
	$c=5;
	$spreadsheet = new Spreadsheet();
	$sheet = $spreadsheet->getActiveSheet();
	
      $spreadsheet->getActiveSheet()->mergeCells('D1:E1');	
	  $sheet->setCellValue('D1', 'Unverified Registration');
	    
	  
	    	
		
		
	  $spreadsheet->getActiveSheet()->getStyle('D1')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE);
	 $spreadsheet->getActiveSheet()->getStyle('D2')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLUE);
	
	 
	  
 	
	$sheet->getColumnDimension('A')->setAutoSize(false);
    $sheet->getColumnDimension('A')->setWidth(15);
	  $sheet->setCellValue('A'.$c, 'Sr No');
	  
	 $sheet->setCellValue('B'.$c, "Date(IST)");
	$sheet->getColumnDimension('B')->setAutoSize(false);
    $sheet->getColumnDimension('B')->setWidth(20); 
	  
	$sheet->setCellValue('C'.$c, "Time(IST)");
	$sheet->getColumnDimension('C')->setAutoSize(false);
    $sheet->getColumnDimension('C')->setWidth(20);
	 
	
	$sheet->setCellValue('D'.$c, "IP Address");
	$sheet->getColumnDimension('D')->setAutoSize(false);
    $sheet->getColumnDimension('D')->setWidth(25);
	
	$sheet->setCellValue('E'.$c, "Name Entered");
	$sheet->getColumnDimension('E')->setAutoSize(false);
    $sheet->getColumnDimension('E')->setWidth(25);
	
	$sheet->setCellValue('F'.$c, 'Brand Name Entered');
	$sheet->getColumnDimension('F')->setAutoSize(false);
    $sheet->getColumnDimension('F')->setWidth(25);
	
	$sheet->setCellValue('G'.$c, 'Email ID');
	$sheet->getColumnDimension('G')->setAutoSize(false);
    $sheet->getColumnDimension('G')->setWidth(25);
	
	$sheet->setCellValue('H'.$c, 'Email Verified');
	$sheet->getColumnDimension('H')->setAutoSize(false);
    $sheet->getColumnDimension('H')->setWidth(10);
	
	$sheet->setCellValue('I'.$c, 'Mobile');
	$sheet->getColumnDimension('I')->setAutoSize(false);
    $sheet->getColumnDimension('I')->setWidth(15);
	
	$sheet->setCellValue('J'.$c, 'Mobile Verified');
	$sheet->getColumnDimension('J')->setAutoSize(false);
    $sheet->getColumnDimension('J')->setWidth(10);
	 
 
	
	
	
	 
	
	$index=$c+1;
	
	 $i=1;
			 
			 foreach( $result as $key => $entry)
			 {
			 
			  $sheet->setCellValue('A'.$index, $i);
			  
			  
			  $sheet->setCellValue('B'.$index,date('Y-m-d',strtotime($entry->created_at)));
			$spreadsheet->getActiveSheet()->getStyle('B'.$index)->getAlignment()->applyFromArray( [ 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP, 'textRotation' => 0, 'wrapText' => TRUE ] );
			 
			  
			 $sheet->setCellValue('c'.$index,date('H:m:s',strtotime($entry->created_at)));
			 
			 
			 $sheet->setCellValue('D'.$index, $entry->user_ip);
			$spreadsheet->getActiveSheet()->getStyle('D'.$index)->getAlignment()->applyFromArray( [ 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP, 'textRotation' => 0, 'wrapText' => TRUE ] );
			 
			 $sheet->setCellValue('E'.$index, $entry->name);
			$spreadsheet->getActiveSheet()->getStyle('E'.$index)->getAlignment()->applyFromArray( [ 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP, 'textRotation' => 0, 'wrapText' => TRUE ] );
			 
			 $sheet->setCellValue('F'.$index, $entry->brand);
			$spreadsheet->getActiveSheet()->getStyle('F'.$index)->getAlignment()->applyFromArray( [ 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP, 'textRotation' => 0, 'wrapText' => TRUE ] );
			 $sheet->setCellValue('G'.$index, $entry->email);
			$spreadsheet->getActiveSheet()->getStyle('F'.$index)->getAlignment()->applyFromArray( [ 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP, 'textRotation' => 0, 'wrapText' => TRUE ] );
			
			 $sheet->setCellValue('H'.$index, 'No');
			 
			  $sheet->setCellValue('I'.$index, $entry->mobile);
			$spreadsheet->getActiveSheet()->getStyle('F'.$index)->getAlignment()->applyFromArray( [ 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT, 'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP, 'textRotation' => 0, 'wrapText' => TRUE ] );
			
			 $sheet->setCellValue('J'.$index, 'No');
			 
		 
			 
			   
		 
			 
			 $index++;
			 $i++;
			 }
	

$writer = new Writer\Xls($spreadsheet);

        $response =  new StreamedResponse(
            function () use ($writer) {
                $writer->save('php://output');
            }
        );
        $response->headers->set('Content-Type', 'application/vnd.ms-excel');
        $response->headers->set('Content-Disposition', 'attachment;filename="unregistreation.xls"');
        $response->headers->set('Cache-Control','max-age=0');
        return $response;




    
	
	 
	
	
	
	}
	 
	
	

}