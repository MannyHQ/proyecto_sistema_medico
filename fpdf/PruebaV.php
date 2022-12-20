<?php

require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
     
      $this->Image('../img/Logo.png', 180, 12, 15,15,'PNG'); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->SetFont('Arial','B',20);
      $this->SetTextColor(32,100,210);
      $this->Cell(150, 20, utf8_decode('Consultorio Medico Dr. Pedro Angel Guzman'), 0, 0, 'C'); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(20); // Salto de línea
     

      /* UBICACION */
      $this->SetFont('Arial','B',10);
      $this->SetTextColor(39,39,51);
      $this->Cell(96, 10, utf8_decode("Ubicación : "), 0, 0, 'L', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->SetFont('Arial','B',10);
      $this->SetTextColor(39,39,51);
      $this->Cell(59, 10, utf8_decode("Teléfono : 809-247-5315"), 0, 0, 'L', 0);
      $this->Ln(5);

      /* COREEO */
      $this->SetFont('Arial','B',10);
      $this->SetTextColor(39,39,51);
      $this->Cell(85, 10, utf8_decode("Correo :  drpedroangel@outlook.com"), 0, 0, 'L', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->SetFont('Arial','B',10);
      $this->SetTextColor(39,39,51);
      $this->Cell(85, 10, utf8_decode("RNC: 1234563"), 0, 0, 'L', 0);
      $this->Ln(10);
            //**********************************************DATOS PACIENTE*******************************************************
      
            $this->SetFont('Arial','B',10);
            $this->SetTextColor(39,39,51);
            $this->Cell(20, 10, utf8_decode("Paciente : "), 0, 0, 'C', 0);
            $this->Ln(5);
      
            /* TELEFONO */
            $this->SetFont('Arial','',10);
            $this->SetTextColor(39,39,51);
            $this->Cell(200, 3, utf8_decode("Teléfono : 809-247-5315"), 0, 0, 'C', 0);
         
            $this->Ln(5);
            /* COREEO */
            $this->SetFont('Arial','',10);
            $this->SetTextColor(39,39,51);
            $this->Cell(62, 10, utf8_decode("Correo :  drpedroangel@outlook.com"), 0, 0, 'C', 0);
            $this->Ln(5);
      
            /* TELEFONO */
            $this->SetFont('Arial','B',10);
            $this->SetTextColor(39,39,51);
            $this->Cell(182, 0, utf8_decode("ID: 1234563"), 0, 0, 'C', 0);
            $this->Ln(10);

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(228, 100, 0);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 20);
      $this->Cell(100, 10, utf8_decode("Factura Cliente"), 0, 1, 'C', 0);
      $this->Ln(7);

            /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(228, 100, 0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(18, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('PROCEDIMIENTO'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('COSTO'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('COBERTURA'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('TOTAL'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('ESTADO'), 1, 1, 'C', 1);
   
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

require("../DATABASE/db.php");




//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

/*$consulta_reporte_alquiler = $conexion->query("  ");*/
$query = "SELECT * FROM detalle_factura order by id_factura asc limit 1";
$resultado= mysqli_query($conn,$query);
while ($row = $resultado->fetch_assoc()) { 
   $pdf->Cell(18, 10, $row['id_factura'], 1, 0, 'C', 0);
   $pdf->Cell(20, 10, $row['id_proc'], 1, 0, 'C', 0);
   $pdf->Cell(30, 10, $row['precio'], 1, 0, 'C', 0);
   $pdf->Cell(25, 10, $row['cobertura'], 1, 0, 'C', 0);
   //$pdf->Cell(70, 10, $row("info"), 1, 0, 'C', 0);
   
      }




$pdf->Output('Prueba.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
