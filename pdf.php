<?php
require_once 'fpdf182/fpdf.php';
include 'localization.php';

class PDF extends FPDF
{
    protected $B = 0;
    protected $I = 0;
    protected $U = 0;
    protected $HREF = '';

    function WriteHTML($html)
    {
        // HTML parser
        $html = str_replace("\n",' ',$html);
        $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
        foreach($a as $i=>$e)
        {
            if($i%2==0)
            {
                // Text
                if($this->HREF)
                    $this->PutLink($this->HREF,$e);
                else
                    $this->Write(5,$e);
            }
            else
            {
                // Tag
                if($e[0]=='/')
                    $this->CloseTag(strtoupper(substr($e,1)));
                else
                {
                    // Extract attributes
                    $a2 = explode(' ',$e);
                    $tag = strtoupper(array_shift($a2));
                    $attr = array();
                    foreach($a2 as $v)
                    {
                        if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                            $attr[strtoupper($a3[1])] = $a3[2];
                    }
                    $this->OpenTag($tag,$attr);
                }
            }
        }
    }

    function OpenTag($tag, $attr)
    {
        // Opening tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,true);
        if($tag=='A')
            $this->HREF = $attr['HREF'];
        if($tag=='BR')
            $this->Ln(5);
    }

    function CloseTag($tag)
    {
        // Closing tag
        if($tag=='B' || $tag=='I' || $tag=='U')
            $this->SetStyle($tag,false);
        if($tag=='A')
            $this->HREF = '';
    }

    function SetStyle($tag, $enable)
    {
        // Modify style and select corresponding font
        $this->$tag += ($enable ? 1 : -1);
        $style = '';
        foreach(array('B', 'I', 'U') as $s)
        {
            if($this->$s>0)
                $style .= $s;
        }
        $this->SetFont('',$style);
    }

    function PutLink($URL, $txt)
    {
        // Put a hyperlink
        $this->SetTextColor(0,0,255);
        $this->SetStyle('U',true);
        $this->Write(5,$txt,$URL);
        $this->SetStyle('U',false);
        $this->SetTextColor(0);
    }
    function WriteHtmlCell($cellWidth, $html){
        $rm = $this->rMargin;
        $this->SetRightMargin($this->w - $this->GetX() - $cellWidth);
        $this->WriteHtml($html);
        $this->SetRightMargin($rm);
    }
    function Footer()
    {
        // Go to 1.5 cm from bottom
        $this->SetY(-15);
        // Select Arial italic 8
        $this->SetFont('Arial','I',8);
        // Print centered page number
        $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    }
}
$pdf = new PDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 16);
$pdf->WriteHTML($api_info);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial', '', 16);

//$authentication_text = wordwrap($authentication_text, 30, "<br>", false);
$pdf->WriteHTML($authentication_text);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

//$api_input_text_pendulum = wordwrap($api_input_text_pendulum, 50, "<br>", false);
$pdf->WriteHTML($api_input_text_pendulum);
$pdf->Ln();
$api_output_text = wordwrap($api_output_text, 45, "<br>", false);
$pdf->WriteHTML($api_output_text);
$pdf->Ln();
$pdf->Ln();
//$api_output_text_pendulum = wordwrap($api_output_text_pendulum, 50, "<br>", false);
$pdf->WriteHTML($api_output_text_pendulum);
$pdf->Ln();

$pdf->AddPage();

//$api_input_text_ball = wordwrap($api_input_text_ball, 50, "<br>", false);
$pdf->WriteHTML($api_input_text_ball);
$pdf->Ln();
$api_output_text = wordwrap($api_output_text, 50, "<br>", false);
$pdf->WriteHTML($api_output_text);
$pdf->Ln();
//$api_output_text_ball = wordwrap($api_output_text_ball, 50, "<br>", false);
$pdf->WriteHTML($api_output_text_ball);
$pdf->Ln();

$pdf->AddPage();

//$api_input_text_dampening = wordwrap($api_input_text_dampening, 50, "<br>", false);
$pdf->WriteHTML($api_input_text_dampening);
$pdf->Ln();
$api_output_text = wordwrap($api_output_text, 50, "<br>", false);
$pdf->WriteHTML($api_output_text);
$pdf->Ln();
//$api_output_text_dampening = wordwrap($api_output_text_dampening, 50, "<br>", false);
$pdf->WriteHTML($api_output_text_dampening);
$pdf->Ln();

$pdf->AddPage();

//$api_input_text_plane = wordwrap($api_input_text_plane, 50, "<br>", false);
$pdf->WriteHTML($api_input_text_plane);
$pdf->Ln();
$api_output_text = wordwrap($api_output_text, 50, "<br>", false);
$pdf->WriteHTML($api_output_text);
$pdf->Ln();
//$api_output_text_plane = wordwrap($api_output_text_plane, 50, "<br>", false);
$pdf->WriteHTML($api_output_text_plane);
$pdf->Ln();

$pdf->Output();
