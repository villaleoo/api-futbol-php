API DE CLUBES Y LIGAS DE FUTBOL

Cuenta con un token de seguridad simulado para pruebas en los verbos POST y PUT. Para usarlo correctamente con estos verbos
agregar la qery **"?token=AsJkt47Ops2tKlmZ"** a la URL.

**$tokenDeSeguridad**=AsJkt47Ops2tKlmZ


# ENDPOINTS

## GET
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

    El verbo POST se utiliza solo para el recurso "clubes" y el endpoint es:

    http://localhost/api.php.web2/api/clubes?token=$tokenDeSeguridad;

## PUT

    El verbo PUT se utiliza solo para el recurso "clubes" y el endpoint es:

    http://localhost/api.php.web2/api/clubes?token=$tokenDeSeguridad;

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










