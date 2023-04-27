El sistema trae los seeder y migrations correspondientes para generar la BD de MongoDB para crearlos correr el siguiente comando
    <ul><li>php artisan migrate:fresh --seed</li></ul>
<div class="danger">En el Header siempre deberá estar "Accept: application/json"</div>
Primero deberá loguearse para poder ejecutar las demás funciones, si ejecuto las migration y seeder hay un usuario de prueba
<ul>
    <li>[POST] http://localhost/e-backend-logger/api/login</li>
    <li>usuario: prueba@correo.com</li>
    <li>contraseña: contrasena</li>
</ul>
Al iniciar sesión se le generará un token que deberá ser enviado como Bearer Token a las distintas API
<ul>
    <li>[GET] http://localhost/e-backend-logger/api/logs #Mostrará todos los Logs</li>
    <li>[POST] http://localhost/e-backend-logger/api/log/create </li>
        Contiene la siguiente estructura para almacenar un log, misma que deberá ser enviada mediante el body
        <code>
        {
            "type": enum['error', 'info', 'warning'],
            "priority":enum['lowest', 'low', 'medium', 'high', 'highest'],
            "path":"path_to_directory",
            "message": "your__message",
            "request": "your_request_info",
            "response":"your_response_info"
        }</code>
    <li>[DELETE] http://localhost/e-backend-logger/api/log/delete</li>
        Eliminará el log con el id enviado por medio del body
        <code>
        {
            "id": "644ad679c6d9a11f8907d9da"
        }</code>
    <li>[PUT] http://localhost/e-backend-logger/api/log/update</li>
        Actualizará el log con el id enviado
        <code>
        {
            "id":"log_id_to_update",
            "type": enum['error', 'info', 'warning'],
            "priority":enum['lowest', 'low', 'medium', 'high', 'highest'],
            "path":"path_to_directory",
            "message": "your__message",
            "request": "your_request_info",
            "response":"your_response_info"
        }</code>
</ul>
Para desloguearse de la aplicación teniendo una sesión iniciada
    <ul><li>[POST] http://localhost/e-backend-logger/api/logout</li></ul>
