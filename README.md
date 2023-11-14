API DE CLUBES Y LIGAS DE FUTBOL

Cuenta con un token de seguridad simulado para pruebas en los verbos POST y PUT. 

Se pueden agregar clubes que pertenezcan a la liga con id=1 o id=2. Si se crean en la db mas ligas se podrian agregar sin problema clubes que pertenezcan a esas nuevas ligas.


# ENDPOINTS

## GET

    **Token**
        Para solicitar un token se debe hacer un GET al siguiente endpoint conteniendo en las autorizaciones (Authorization) de la request una autorizacion de tipo basica (Basic Auth)
        ingresando como username 'webadmin' y password 'admin'. Este sistema de token funcionaria con cualquier usuario registrado en la bbdd de usuarios que ingrese correctamente
        su nombre de usuario y contrasenia.
        
        **Enpoint**:

        http://localhost/api.php.web2/api/user/token ->si se añade la autorizacion correctamente retornará un estado 200 con el token creado.

       
    **Listas**

        http://localhost/api.php.web2/api/:recurso -> para leer una lista de recursos;

        *Ejemplos*:

        http://localhost/api.php.web2/api/clubes -> para leer todos los clubes cargados.

        http://localhost/api.php.web2/api/ligas -> para leer todos las ligas cargadas.

    **Recurso unico**

        http://localhost/api.php.web2/api/:recurso/:id -> para leer un recurso con id=:id;

        *Ejemplos*:

        http://localhost/api.php.web2/api/clubes/1 -> para leer el club con id=1.

        http://localhost/api.php.web2/api/ligas/2 -> para leer la liga con id=2.

    **Subrecurso (solamente para recurso "ligas")**

        http://localhost/api.php.web2/api/ligas/2/clubes -> para traer todos los clubes que integran la liga con id=2;

## POST
    El verbo POST se utiliza solo para el recurso "clubes" y el endpoint (con token necesario) es:

    http://localhost/api.php.web2/api/clubes;

    *Para que funcione este verbo es necesario haber obtenido un token (ver seccion GET->Token ⬆) y al momento de hacer el POST enviarle un header de tipo Authorization incluyendo 
     el tipo Bearer y el token.
     Para postman seccion Authorization->type: Bearer Token y completar el campo con el token.

## PUT
    El verbo PUT se utiliza solo para el recurso "clubes" y el endpoint (con token necesario) es:

    http://localhost/api.php.web2/api/clubes/:id;

     *Para que funcione este verbo es necesario haber obtenido un token (ver seccion GET->Token ⬆) y al momento de hacer el PUT enviarle un header de tipo Authorization incluyendo 
     el tipo Bearer y el token.
     Para postman seccion Authorization->type: Bearer Token y completar el campo con el token.

## DELETE

    El verbo DELETE se utiliza solo para el recurso "clubes" y el endpoint es:

    http://localhost/api.php.web2/api/clubes/:id -> donde ':id' es el id del recurso a eliminar.

## FILTROS

    **Los filtros aplican para el recurso "clubes".**

    **Ordenar ascendente o descendente por un campo en particular**

        - La lista del recurso "clubes" se puede ordenar ascendente o descendentemente por los campos: "goles_en_liga", "goles_en_copa" y "cant_partidos_jugados";
        - Basta con reemplazar '$campoEnParticular' en el siguiente endpoint por algun campo de los mencionados anteriormente y seguidamente
          añadir el parametro order:
            - order=asc para leer la lista de "clubes" en orden ascendente de acuerdo al campo $campoEnParticular.
            - order=desc para leer la lista de "clubes" en orden descendente de acuerdo al campo $campoEnParticular.

        *Ejemplos*

        http://localhost/api.php.web2/api/clubes?sort=$campoEnParticular&order=asc -> Para traer la lista de clubes en orden ascendente de acuerdo al $campoEnParticular;

        http://localhost/api.php.web2/api/clubes?sort=goles_en_liga&order=desc -> Para traer la lista de clubes en orden descendente de acuerdo a los goles en liga de los equipos;

    **Filtro de minimo de goles**

        Se puede traer los clubes que hayan convertido mas de cierta cantidad de goles en liga. Para hacerlo se debe agregar el parametro '?minGolesEnLiga" de la siguiente manera:

        http://localhost/api.php.web2/api/clubes?minGolesEnLiga=10 -> Para traer la lista de clubes que hayan convertido MAS de 10 goles en la liga analizada.










