El sistema trae los seeder y migrations correspondientes para generar la BD de MongoDB para crearlos correr el siguiente comando
    php artisan migrate:fresh --seed
En el Header siempre deberá estar "Accept: application/json"
Primero deberá loguearse para poder ejecutar las demás funciones, si ejecuto las migration y seeder hay un usuario de prueba
    [POST] http://localhost/e-backend-logger/api/login Method: POST
    url: http://localhost/e-backend-logger/api/login Method: POST
    usuario: prueba@correo.com
    contraseña: contrasena
Al iniciar sesión se le generará un token que deberá ser enviado como Bearer Token a las distintas API
    [GET] http://localhost/e-backend-logger/api/logs #Mostrará todos los Logs
    [POST] http://localhost/e-backend-logger/api/log/create 
        Contiene la siguiente estructura para almacenar un log, misma que deberá ser enviada mediante el body
        {
            "type": enum['error', 'info', 'warning'],
            "priority":enum['lowest', 'low', 'medium', 'high', 'highest'],
            "path":"path_to_directory",
            "message": "your__message",
            "request": "your_request_info",
            "response":"your_response_info"
        }
    [DELETE] http://localhost/e-backend-logger/api/log/delete
        Eliminará el log con el id enviado por medio del body
        {
            "id": "644ad679c6d9a11f8907d9da"
        }
    [PUT] http://localhost/e-backend-logger/api/log/update
        Actualizará el log con el id enviado
        {
            "id":"log_id_to_update",
            "type": enum['error', 'info', 'warning'],
            "priority":enum['lowest', 'low', 'medium', 'high', 'highest'],
            "path":"path_to_directory",
            "message": "your__message",
            "request": "your_request_info",
            "response":"your_response_info"
        }
Para desloguearse de la aplicación teniendo una sesión iniciada
    [POST] http://localhost/e-backend-logger/api/logout