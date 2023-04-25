<?php
 session_start();
include "database.php";
 $connection = pg_connect("host=$servername dbname=$database user=$username password=$password");
$result = pg_query($connection,"CREATE TABLE IF NOT EXISTS public.players
(
    id integer NOT NULL DEFAULT nextval('players_id_seq'::regclass),
    timeline character varying(255) COLLATE pg_catalog.'default',
    username character varying(255) COLLATE pg_catalog.'default',
    playlist character varying(255) COLLATE pg_catalog.'default',
    temp character varying(255) COLLATE pg_catalog.'default',
    CONSTRAINT players_pkey PRIMARY KEY (id)
)");
    if ($result) {
        echo "ok";
    }
    ?>