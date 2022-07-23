<?php
	//Start session
	include("../config.php");
	
include("pdf/class.ezpdf.php");
// create the quer to be displayed
$a=$_POST['a'];
$b=$_POST['b'];
$query = "SELECT  * FROM   refugee r,  foodreg f, nationality n, takenfood t WHERE t.foodreg_rfid = f.fdid AND t.Refugee_rfid =r.refNo AND  r.nationality_nid= n.nid AND t.takenDate  BETWEEN '$a' AND '$b'";
// check if the query returned some results
if(mysql_num_rows(mysql_query($query))<1) { echo "No results were found";}
//start the pdf staff
$pdf =& new Cezpdf();
$pdf->selectFont('pdf/fonts/Helvetica');
//--------------------------------------------------
// initialize the array
$data = array();
// do the SQL query
$result = mysql_query($query) or die (mysql_error());
// step through the result set, populating the array, note that this could
//also have been written:
// while($data[] = mysql_fetch_assoc($result)) {}
while($data[] = mysql_fetch_array($result, MYSQL_ASSOC)) {}
// make the table
$pdf->ezTable($data,array('refNo'=>'Refugee No','Fname'=>'First Name','Lname'=>'Last Name','age'=>'Age','sex' =>'Gender','contact'=>'Phone','nationName'=>'HomeCountry','foodname'=>'Food Name','qty'=>'Quantity Taken'),"Refugee Report ");
// do the output, this is my standard testing output code, adding ?d=1
// to the url puts the pdf code to the screen in raw form, good for
//checking
// for parse errors before you actually try to generate the pdf file.
if (isset($d) && $d){
$pdfcode = $pdf->output(1);
$pdfcode = str_replace("\n","\n<br>",htmlspecialchars($pdfcode));
echo '<html><body>';
echo trim($pdfcode);
echo '</body></html>';
} else {
$pdf->stream();
}
?>