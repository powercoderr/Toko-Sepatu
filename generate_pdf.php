<?php
    function fetch_data()  
    {  
         $output = '';  
         $connect = mysqli_connect("localhost", "admin", "admin", "online_shop");  
         $sql = "SELECT * FROM barang";  
         $result = mysqli_query($connect, $sql);  
         while($row = mysqli_fetch_array($result))  
         {       
         $output .= '<tr>  
                             <td>'.$row["kode_barang"].'</td>  
                             <td>'.$row["nama_barang"].'</td>  
                             <td>'.$row["stok"].'</td>  
                             <td>'.$row["harga_barang"].'</td>
                        </tr>  
                             ';  
         }  
         return $output;  
    }  

    if(isset($_POST["generate_pdf"]))  
    {  
         require_once('tcpdf_min/tcpdf.php');  
         $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
         $obj_pdf->SetCreator(PDF_CREATOR);  
         $obj_pdf->SetTitle("Katalog Produk Online Shop");  
         $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
         $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
         $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
         $obj_pdf->SetDefaultMonospacedFont('helvetica');  
         $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
         $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
         $obj_pdf->setPrintHeader(false);  
         $obj_pdf->setPrintFooter(false);  
         $obj_pdf->SetAutoPageBreak(TRUE, 10);  
         $obj_pdf->SetFont('helvetica', '', 12);  
         $obj_pdf->AddPage();  
         $content = '';  
         $content .= '  
         <img src="img/buku.jpg" alt="gambar" width="100px" height="100px">
         <h3 align="center">KATALOG PRODUK ONLINE SHOP</h3><br /><br />  
         <table border="1" cellspacing="0" cellpadding="5">  
              <tr>  
                   <th width="30%">Kode Barang</th>  
                   <th width="40%">Nama Barang</th>  
                   <th width="10%">Stok</th>  
                   <th width="20%">Harga</th>
              </tr>  
         ';  
         $content .= fetch_data();  
         $content .= '</table>';  
         $obj_pdf->writeHTML($content);  
         $obj_pdf->Output('sample.pdf', 'I');  
    }  


?>