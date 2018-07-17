<?php
namespace CakePdf\Pdf\Engine;

use TCPDF;

class TcpdfEngine extends AbstractPdfEngine
{

    /**
     * Generates Pdf from html
     *
     * @return string raw pdf data
     */
    public function output()
    {
        $clazz = $this->_Pdf->classOverride();
        if (null !== $clazz) {
            $TCPDF = new $clazz($this->_Pdf->orientation(), 'mm', $this->_Pdf->pageSize());
        } else {
            $TCPDF = new TCPDF($this->_Pdf->orientation(), 'mm', $this->_Pdf->pageSize());
        }

        $TCPDF->AddPage();
        $TCPDF->writeHTML($this->_Pdf->html());

        return $TCPDF->Output('', 'S');
    }
}
