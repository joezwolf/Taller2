<?php

namespace Jhon\Taller2\Controller;

use Jhon\Taller2\Model\Calculadora;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dompdf\Dompdf;

class CalculadoraController
{
    public function procesar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $valor1 = $_POST['valor1'];
            $valor2 = $_POST['valor2'];

            if (is_numeric($valor1) && is_numeric($valor2)) {
                $calculadora = new Calculadora($valor1, $valor2);


                $resultadoSuma = $calculadora->sumar();
                $resultadoMultiplicar = $calculadora->multiplicar();
                $conversionKmMillas = $calculadora->convertirKmAMillas();
                $imc = $calculadora->calcularIMC();


                echo "La suma es: " . $resultadoSuma . "<br>";
                echo "La multiplicación es: " . $resultadoMultiplicar . "<br>";
                echo "La conversión de kilómetros a millas es: " . $conversionKmMillas . " millas<br>";
                echo "El IMC es: " . $imc . "<br>";


                $this->enviarCorreo($resultadoSuma, $resultadoMultiplicar, $conversionKmMillas, $imc);


                $this->generarPDF($resultadoSuma, $resultadoMultiplicar, $conversionKmMillas, $imc);
            } else {
                echo "Por favor ingrese números válidos.";
            }
        }
    }

    private function enviarCorreo($suma, $multiplicacion, $kmMillas, $imc)
    {
        $mail = new PHPMailer(true);

        //Profe la libreria que iba a usar se llama phyMailer, pero no pude usarla debido a que es de pago entonces tuve que cambiar por una que es de manera local llamada mailhog

        try {
            
            $mail->isSMTP();
            $mail->Host = 'localhost'; 
            $mail->Port = 1025;

           
            $mail->setFrom('jhon.gutierrez9217@gmail.com', 'Calculadora PHP');
            $mail->addAddress('jhon.gutierrez24843@ucaldas.edu.co');  

           
            $mail->isHTML(true);
            $mail->Subject = 'Resultados de la calculadora';
            $mail->Body = "La suma es: $suma<br>La multiplicación es: $multiplicacion<br>
                           La conversión de kilómetros a millas es: $kmMillas<br>
                           El IMC es: $imc";

            $mail->send();
            echo 'El correo ha sido enviado con éxito.';
        } catch (Exception $e) {
            echo "El correo no pudo enviarse. Error: {$mail->ErrorInfo}";
        }
    }

    private function generarPDF($suma, $multiplicacion, $kmMillas, $imc)
    {
        $dompdf = new Dompdf();
        $html = "
            <h1>Resultados de la Calculadora</h1>
            <p>La suma es: $suma</p>
            <p>La multiplicación es: $multiplicacion</p>
            <p>La conversión de kilómetros a millas es: $kmMillas millas</p>
            <p>El IMC es: $imc</p>
        ";

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('resultados_calculadora.pdf', ['Attachment' => 0]);
    }
}
