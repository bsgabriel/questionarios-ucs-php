-- Table: public.usuarios

-- DROP TABLE IF EXISTS public.usuarios;

CREATE TABLE IF NOT EXISTS public.usuarios
(
    id integer NOT NULL DEFAULT 'nextval('usuarios_id_seq'::regclass)',
    login character varying(20) COLLATE pg_catalog."default" NOT NULL,
    senha character varying(255) COLLATE pg_catalog."default" NOT NULL,
    nome character varying(120) COLLATE pg_catalog."default" NOT NULL,
    email character varying(120) COLLATE pg_catalog."default" NOT NULL,
    instituicao character varying(255) COLLATE pg_catalog."default",
    telefone character varying(11) COLLATE pg_catalog."default",
    tipo character(1) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT usuarios_pkey PRIMARY KEY (id),
    CONSTRAINT usuarios_login_key UNIQUE (login)
)

TABLESPACE pg_default;

ALTER TABLE IF EXISTS public.usuarios
    OWNER to postgres;