<!DOCTYPE html>
<html>
<head>
    <title>Generar texto con OpenAI</title>
</head>
<body>


    <?php
    // Funci�n para hacer la solicitud a la API de OpenAI
    function genera_algo($texto_para_generar) {
        $openai_api_key = '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'; // Reemplaza 'TU_API_KEY' con tu clave de API de OpenAI
        $url = 'https://api.openai.com/v1/engines/text-davinci-003/completions';

        $data = array(
            'prompt' => $texto_para_generar,
            'max_tokens' => 100, // La cantidad de tokens m�xima para generar
            'temperature' => 0.5, // El nivel de creatividad o aleatoriedad del texto generado
            'n' => 1 // N�mero de respuestas a generar
        );

        $headers = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $openai_api_key
        );

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    // Ejemplo de llamada a la funci�n "genera_algo"
    $texto_generado = genera_algo("Enunciado de problema matem�tico con n�meros aleatorios que involucra sumas, restas, multiplicaciones y divisiones exactas");
    //genera_algo("Enunciado de matem�ticas con n�meros aleatorios en el que haya que hacer sumas y restas de enteros con multiplicaciones y divisiones exactas. El resulado puede ser positivo o negativo. El json generado debe ser de la forma {enuncidado:, respuesta:");

    // Devuelve el texto generado como JSON
    header('Content-Type: application/json');
    echo $texto_generado;
    ?>

</body>
</html>