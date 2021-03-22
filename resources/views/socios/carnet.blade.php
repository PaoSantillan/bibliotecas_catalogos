<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../public/plugins/bootstrap/css/bootstrap.min.css">

    <style type="text/css" media="all">
        .tam {
            font-size: 11px;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th, td {
            padding: 2px;
        }

        .firma {
            font-size: 100px;  
            color: rgba(52, 166, 214, 0.4);
            z-index: 9999;
            position: absolute;
            top: 65%;
            left: 17%;
        }
        .firma-2 {
            font-size: 100px;  
            color: rgba(52, 166, 214, 0.4);
            z-index: 9999;
            position: absolute;
            top: 15%;
            left: 17%;
        }

        .firma-3 {
            font-size: 100px;  
            color: rgba(52, 166, 214, 0.4);
            z-index: 9999;
            position: absolute;
            top: 40%;
            left: 17%;
        }
    </style>

</head>
<body>
    <div class="" style="border: 0.5px solid #ccc">
        <div class="text-center">
            <img
                src="../public/images/carousel/FTZpdf.jpg"
                alt="Departamento de zoonosis"
                style="width: 200px; height: 100px; margin: 10px ;"
                class="img-fluid"
            >
            <h6><u>Departamento de Zoonosis y Control Animal</u></h6>
            <h6 style="border-bottom: 0.5px solid; padding-bottom: 5px;">SECRETARÍA DE SALUD, DESARROLLO HUMANO Y POLITICAS SOCIALES</h6>
        </div>

        <div class="text-center">
            <h6 style="margin-top: 5px;"><strong><u>CONSENTIMIENTO QUIRÚRGICO</u></strong></h6>
        </div>

        <div class="p-3">
            <div class="tam">
                <p style="display:inline-block;width:50%;font-weight: bold;"> Nro Consentimiento Pro tendencia:
                    <mark style="font-weight: 400"></mark>
                </p>
            </div>

            <div class="tam">
                <p style="display:inline-block;width:50%;font-weight: bold;"> Lugar:
                    <span style="font-weight: 400;"><span>
                </p>

                <p style="display:inline-block;font-weight: bold;"> Fecha:
                    <span style="font-weight: 400;"></span>
                </p>
            </div>

            <div class="tam">
                <p style="display:inline-block;width:50%;font-weight: bold;"> Apellido y Nombre del Dueño: <span style="font-weight: 400;">{{$socio->nombre}}<span></p>
                <p style="display:inline-block;font-weight: bold;"> Domicilio: <span style="font-weight: 400;">{{$socio->direccion}}</span></p>
            </div>

            <div class="tam">
                <p style="display:inline-block;width:50%;font-weight: bold;"> Telefono: <span style="font-weight: 400;">{{$socio->telefono}}<span></p>
                <p style="display:inline-block;font-weight: bold;"> Cantidad de animales que viven en la casa: <span style="font-weight: 400;">  </span></p>
            </div>

        </div>

        <div class="text-center">
            <h6 style="margin-top: 20px;"><strong><u>DATOS IDENTIFICACIÓN ANIMAL</u></strong></h6>
        </div>

        <div class="p-3">

            <div class="tam">
                <p style="display:inline-block;width:50%;font-weight: bold;"> Especie:
                    <span style="font-weight: 400;"><span>
                </p>

                <p style="display:inline-block;font-weight: bold;"> Nombre:
                    <span style="font-weight: 400;"></span>
                </p>
            </div>

            <div class="tam">
                <p style="display:inline-block;width:50%;font-weight: bold;"> Sexo:
                    <span style="font-weight: 400;"><span>
                </p>

                <p style="display:inline-block;font-weight: bold;"> Edad años y meses:
                    <span style="font-weight: 400;"></span>
                </p>
            </div>

            <div class="tam">
                <p style="display:inline-block;width:50%;font-weight: bold;"> Caracteristicas:
                    <span style="font-weight: 400;"> <span>
                </p>

                <p style="display:inline-block;font-weight: bold;"> Preñez:
                    <span style="font-weight: 400;"></span>
                </p>
            </div>

            <div class="tam">
                <p style="display:inline-block;width:50%;font-weight: bold;"> Ayuno cumplido:
                    <span style="font-weight: 400;"><span>
                </p>

                <p style="display:inline-block;font-weight: bold;"> Estado general:
                    <span style="font-weight: 400;"></span>
                </p>
            </div>

            <div class="tam">

                <p style="display:inline-block;width:50%;font-weight: bold;">Enfermedades conocidas: </p>
               
                <table style="width:100%">
                    <tr>
                        <th>Enfermedad</th>
                        <th>Tratamiento</th>
                        <th>Observaciones</th>
                    </tr>
                </table>
                <span style="font-weight: 400;">No posee.</span>
            </div>

        </div>

        <div class="p-3">
            <p class = "text-justify tam">
                Por la presente autorizo a los médicos veterinarios del Municipio de la Capital - Provincia
                de Catamarca, y a los ayudantes por ellos elegidos, a efectuar en el animal indicado de mi
                prioridad, la esterilización quirúrgico/ castración/ ovariohisterctomía y todo otro procedimiento
                medico veterinario clínico y/o quirúrgico que surja del criterio profesional actuante, incluyendo
                la administración de anestesia y otras medicaciones, habiendo tomado conocimiento pormenorizado
                de cada uno de los eventuales riesgos que pudiesen sobrevenir con motivo de la Intervención
                y acciones mencionadas, y notificándome expresamente que tal como se me ha informado, no es
                posible garantizar el resultado de la Intervención a la que será sometido el animal y asumiendo
                de mi parte los eventuales riesgos sin objeciones para el caso que se produzcan las consecuencias
                emergentes de las operaciones aludidas. Así mismo manifiesto liberar al Municipio de la Capital,
                a los médicos veterinarios Intervinientes y a sus ayudantes de toda responsabilidad con relación
                a la Intervención aludida. Acepto que la labor profesional está limitada exclusivamente a las
                acciones indicadas, asumiendo de mi parte exclusivamente, las obligaciones: retiro del animal en
                el horario establecido, los cuidados del mismo durante el período de convalecencia, como requerir
                tratamiento veterinario Independiente si fuera necesario y a cumplir con las Instrucciones recibidas
                en este acto. DECLARO BAJO JURAMENTO QUE LOS DATOS DECLARADOS SON AUTÉNTICOS - RECIBÍ LAS
                INSTRUCCIONES NECESARIAS PARA LLEVAR A CABO LOS CUIDADOS POST-QUIRÚRGICOS.
            </p>
        </div>

        <div class="tam pl-3 pb-4">
            <p style="display:inline-block;width:30%;font-weight: bold;">
              FIRMA:
            </p>
            <p style="display:inline-block;width:30%;font-weight: bold;">
               DNI:
                <span style="font-weight: 400;">
                </span>
            </p>

            <p style="display:inline-block;font-weight: bold;">
                ACLARACIÓN:
                <span style="font-weight: 400;">
                </span>
            </p>
        </div>
    </div>
</body>
</html>
