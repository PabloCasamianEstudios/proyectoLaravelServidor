// ESTO ES LA ESTRUCTURA QUE RECIBIRÉ EN EL CORREO
<!DOCTYPE html>
<html>
    <body>
        <h1>Nuevo mensaje de contacto</h1>
        <p><strong>Nombre:</strong> {{ $data['nombre'] }}</p>
        <p><strong>Correo Electrónico:</strong> {{ $data['email'] }}</p>
        <p><strong>Mensaje:</strong> {{ $data['mensaje'] }}</p>
    </body>
</html>