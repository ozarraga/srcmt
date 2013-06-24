--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.4
-- Dumped by pg_dump version 9.1.4
-- Started on 2013-01-27 14:32:23

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 2132 (class 0 OID 0)
-- Dependencies: 5
-- Name: SCHEMA "public"; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON SCHEMA "public" IS 'standard public schema';


--
-- TOC entry 200 (class 3079 OID 11639)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS "plpgsql" WITH SCHEMA "pg_catalog";


--
-- TOC entry 2133 (class 0 OID 0)
-- Dependencies: 200
-- Name: EXTENSION "plpgsql"; Type: COMMENT; Schema: -; Owner: -
--

COMMENT ON EXTENSION "plpgsql" IS 'PL/pgSQL procedural language';


SET search_path = "public", pg_catalog;

--
-- TOC entry 1509 (class 3764 OID 28730)
-- Dependencies: 5
-- Name: snowball; Type: TEXT SEARCH TEMPLATE; Schema: public; Owner: -
--

CREATE TEXT SEARCH TEMPLATE "snowball" (
    INIT = "dsnowball_init",
    LEXIZE = "dsnowball_lexize" );


--
-- TOC entry 1526 (class 3600 OID 28731)
-- Dependencies: 5 1508
-- Name: spanish_stem; Type: TEXT SEARCH DICTIONARY; Schema: public; Owner: -
--

CREATE TEXT SEARCH DICTIONARY "spanish_stem" (
    TEMPLATE = "pg_catalog"."snowball",
    language = 'spanish', stopwords = 'spanish' );


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 161 (class 1259 OID 28732)
-- Dependencies: 5
-- Name: sf_guard_forgot_password; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "sf_guard_forgot_password" (
    "id" bigint NOT NULL,
    "user_id" bigint NOT NULL,
    "unique_key" character varying(255),
    "expires_at" timestamp without time zone NOT NULL,
    "created_at" timestamp without time zone NOT NULL,
    "updated_at" timestamp without time zone NOT NULL
);


--
-- TOC entry 162 (class 1259 OID 28735)
-- Dependencies: 161 5
-- Name: sf_guard_forgot_password_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE "sf_guard_forgot_password_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2134 (class 0 OID 0)
-- Dependencies: 162
-- Name: sf_guard_forgot_password_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE "sf_guard_forgot_password_id_seq" OWNED BY "sf_guard_forgot_password"."id";


--
-- TOC entry 2135 (class 0 OID 0)
-- Dependencies: 162
-- Name: sf_guard_forgot_password_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('"sf_guard_forgot_password_id_seq"', 1, false);


--
-- TOC entry 163 (class 1259 OID 28737)
-- Dependencies: 5
-- Name: sf_guard_group; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "sf_guard_group" (
    "id" bigint NOT NULL,
    "name" character varying(255),
    "description" character varying(1000),
    "created_at" timestamp without time zone NOT NULL,
    "updated_at" timestamp without time zone NOT NULL
);


--
-- TOC entry 164 (class 1259 OID 28743)
-- Dependencies: 5 163
-- Name: sf_guard_group_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE "sf_guard_group_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2136 (class 0 OID 0)
-- Dependencies: 164
-- Name: sf_guard_group_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE "sf_guard_group_id_seq" OWNED BY "sf_guard_group"."id";


--
-- TOC entry 2137 (class 0 OID 0)
-- Dependencies: 164
-- Name: sf_guard_group_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('"sf_guard_group_id_seq"', 10, true);


--
-- TOC entry 165 (class 1259 OID 28745)
-- Dependencies: 5
-- Name: sf_guard_group_permission; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "sf_guard_group_permission" (
    "group_id" bigint NOT NULL,
    "permission_id" bigint NOT NULL,
    "created_at" timestamp without time zone NOT NULL,
    "updated_at" timestamp without time zone NOT NULL
);


--
-- TOC entry 166 (class 1259 OID 28748)
-- Dependencies: 5
-- Name: sf_guard_permission; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "sf_guard_permission" (
    "id" bigint NOT NULL,
    "name" character varying(255),
    "description" character varying(1000),
    "created_at" timestamp without time zone NOT NULL,
    "updated_at" timestamp without time zone NOT NULL
);


--
-- TOC entry 167 (class 1259 OID 28754)
-- Dependencies: 166 5
-- Name: sf_guard_permission_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE "sf_guard_permission_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2138 (class 0 OID 0)
-- Dependencies: 167
-- Name: sf_guard_permission_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE "sf_guard_permission_id_seq" OWNED BY "sf_guard_permission"."id";


--
-- TOC entry 2139 (class 0 OID 0)
-- Dependencies: 167
-- Name: sf_guard_permission_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('"sf_guard_permission_id_seq"', 21, true);


--
-- TOC entry 168 (class 1259 OID 28756)
-- Dependencies: 5
-- Name: sf_guard_remember_key; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "sf_guard_remember_key" (
    "id" bigint NOT NULL,
    "user_id" bigint,
    "remember_key" character varying(32),
    "ip_address" character varying(50),
    "created_at" timestamp without time zone NOT NULL,
    "updated_at" timestamp without time zone NOT NULL
);


--
-- TOC entry 169 (class 1259 OID 28759)
-- Dependencies: 168 5
-- Name: sf_guard_remember_key_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE "sf_guard_remember_key_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2140 (class 0 OID 0)
-- Dependencies: 169
-- Name: sf_guard_remember_key_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE "sf_guard_remember_key_id_seq" OWNED BY "sf_guard_remember_key"."id";


--
-- TOC entry 2141 (class 0 OID 0)
-- Dependencies: 169
-- Name: sf_guard_remember_key_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('"sf_guard_remember_key_id_seq"', 1, false);


--
-- TOC entry 170 (class 1259 OID 28761)
-- Dependencies: 1979 1980 1981 5
-- Name: sf_guard_user; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "sf_guard_user" (
    "id" bigint NOT NULL,
    "first_name" character varying(255),
    "last_name" character varying(255),
    "email_address" character varying(255) NOT NULL,
    "username" character varying(128) NOT NULL,
    "algorithm" character varying(128) DEFAULT 'sha1'::character varying NOT NULL,
    "salt" character varying(128),
    "password" character varying(128),
    "is_active" boolean DEFAULT true,
    "is_super_admin" boolean DEFAULT false,
    "last_login" timestamp without time zone,
    "created_at" timestamp without time zone NOT NULL,
    "updated_at" timestamp without time zone NOT NULL
);


--
-- TOC entry 171 (class 1259 OID 28770)
-- Dependencies: 5
-- Name: sf_guard_user_group; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "sf_guard_user_group" (
    "user_id" bigint NOT NULL,
    "group_id" bigint NOT NULL,
    "created_at" timestamp without time zone NOT NULL,
    "updated_at" timestamp without time zone NOT NULL
);


--
-- TOC entry 172 (class 1259 OID 28773)
-- Dependencies: 170 5
-- Name: sf_guard_user_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE "sf_guard_user_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2142 (class 0 OID 0)
-- Dependencies: 172
-- Name: sf_guard_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE "sf_guard_user_id_seq" OWNED BY "sf_guard_user"."id";


--
-- TOC entry 2143 (class 0 OID 0)
-- Dependencies: 172
-- Name: sf_guard_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('"sf_guard_user_id_seq"', 1, false);


--
-- TOC entry 173 (class 1259 OID 28775)
-- Dependencies: 5
-- Name: sf_guard_user_permission; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "sf_guard_user_permission" (
    "user_id" bigint NOT NULL,
    "permission_id" bigint NOT NULL,
    "created_at" timestamp without time zone NOT NULL,
    "updated_at" timestamp without time zone NOT NULL
);


--
-- TOC entry 174 (class 1259 OID 28778)
-- Dependencies: 1983 1984 5
-- Name: srcmt_actividad_academica_brigadista_dado; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "srcmt_actividad_academica_brigadista_dado" (
    "id" integer NOT NULL,
    "codigo_brigadista" integer NOT NULL,
    "codigo_actividad_academica" integer NOT NULL,
    "created_at" timestamp without time zone DEFAULT ('now'::"text")::timestamp without time zone,
    "updated_at" timestamp without time zone DEFAULT ('now'::"text")::timestamp without time zone NOT NULL
);


--
-- TOC entry 175 (class 1259 OID 28783)
-- Dependencies: 5 174
-- Name: srcmt_actividad_academica_brigadista_dado_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE "srcmt_actividad_academica_brigadista_dado_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2144 (class 0 OID 0)
-- Dependencies: 175
-- Name: srcmt_actividad_academica_brigadista_dado_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE "srcmt_actividad_academica_brigadista_dado_id_seq" OWNED BY "srcmt_actividad_academica_brigadista_dado"."id";


--
-- TOC entry 2145 (class 0 OID 0)
-- Dependencies: 175
-- Name: srcmt_actividad_academica_brigadista_dado_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('"srcmt_actividad_academica_brigadista_dado_id_seq"', 1, false);


--
-- TOC entry 176 (class 1259 OID 28785)
-- Dependencies: 1986 1987 5
-- Name: srcmt_actividad_academica_miliciano; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "srcmt_actividad_academica_miliciano" (
    "id" integer NOT NULL,
    "codigo_miliciano" integer NOT NULL,
    "codigo_actividad_academica" integer NOT NULL,
    "created_at" timestamp without time zone DEFAULT ('now'::"text")::timestamp without time zone,
    "updated_at" timestamp without time zone DEFAULT ('now'::"text")::timestamp without time zone NOT NULL
);


--
-- TOC entry 177 (class 1259 OID 28790)
-- Dependencies: 176 5
-- Name: srcmt_actividad_academica_miliciano_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE "srcmt_actividad_academica_miliciano_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2146 (class 0 OID 0)
-- Dependencies: 177
-- Name: srcmt_actividad_academica_miliciano_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE "srcmt_actividad_academica_miliciano_id_seq" OWNED BY "srcmt_actividad_academica_miliciano"."id";


--
-- TOC entry 2147 (class 0 OID 0)
-- Dependencies: 177
-- Name: srcmt_actividad_academica_miliciano_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('"srcmt_actividad_academica_miliciano_id_seq"', 1, false);


--
-- TOC entry 178 (class 1259 OID 28792)
-- Dependencies: 1989 1990 5
-- Name: srcmt_actividad_icm_brigadista_dado; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "srcmt_actividad_icm_brigadista_dado" (
    "id" integer NOT NULL,
    "codigo_brigadista" integer NOT NULL,
    "codigo_actividad" integer NOT NULL,
    "created_at" timestamp without time zone DEFAULT ('now'::"text")::timestamp without time zone,
    "updated_at" timestamp without time zone DEFAULT ('now'::"text")::timestamp without time zone NOT NULL
);


--
-- TOC entry 179 (class 1259 OID 28797)
-- Dependencies: 178 5
-- Name: srcmt_actividad_icm_brigadista_dado_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE "srcmt_actividad_icm_brigadista_dado_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2148 (class 0 OID 0)
-- Dependencies: 179
-- Name: srcmt_actividad_icm_brigadista_dado_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE "srcmt_actividad_icm_brigadista_dado_id_seq" OWNED BY "srcmt_actividad_icm_brigadista_dado"."id";


--
-- TOC entry 2149 (class 0 OID 0)
-- Dependencies: 179
-- Name: srcmt_actividad_icm_brigadista_dado_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('"srcmt_actividad_icm_brigadista_dado_id_seq"', 1, false);


--
-- TOC entry 180 (class 1259 OID 28799)
-- Dependencies: 1992 1993 5
-- Name: srcmt_actividad_icm_miliciano; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "srcmt_actividad_icm_miliciano" (
    "id" integer NOT NULL,
    "codigo_miliciano" integer NOT NULL,
    "codigo_actividad" integer NOT NULL,
    "created_at" timestamp without time zone DEFAULT ('now'::"text")::timestamp without time zone NOT NULL,
    "updated_at" timestamp without time zone DEFAULT ('now'::"text")::timestamp without time zone NOT NULL
);


--
-- TOC entry 181 (class 1259 OID 28804)
-- Dependencies: 5 180
-- Name: srcmt_actividad_icm_miliciano_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE "srcmt_actividad_icm_miliciano_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2150 (class 0 OID 0)
-- Dependencies: 181
-- Name: srcmt_actividad_icm_miliciano_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE "srcmt_actividad_icm_miliciano_id_seq" OWNED BY "srcmt_actividad_icm_miliciano"."id";


--
-- TOC entry 2151 (class 0 OID 0)
-- Dependencies: 181
-- Name: srcmt_actividad_icm_miliciano_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('"srcmt_actividad_icm_miliciano_id_seq"', 1, false);


--
-- TOC entry 182 (class 1259 OID 28806)
-- Dependencies: 1995 1996 5
-- Name: srcmt_actividades_academicas; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "srcmt_actividades_academicas" (
    "codigo_actividad_academica" integer NOT NULL,
    "codigo_tipo_actividad" integer NOT NULL,
    "actividad" character varying(255) NOT NULL,
    "responsable" character varying(255),
    "fecha" "date" NOT NULL,
    "lugar" character varying(255) NOT NULL,
    "duracion" character varying(50) NOT NULL,
    "descripcion" character varying(255),
    "created_at" timestamp without time zone DEFAULT ('now'::"text")::timestamp without time zone NOT NULL,
    "updated_at" timestamp without time zone DEFAULT ('now'::"text")::timestamp without time zone NOT NULL
);


--
-- TOC entry 2152 (class 0 OID 0)
-- Dependencies: 182
-- Name: TABLE "srcmt_actividades_academicas"; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE "srcmt_actividades_academicas" IS 'Actividades Academicas
Adiestramiento
';


--
-- TOC entry 183 (class 1259 OID 28814)
-- Dependencies: 5 182
-- Name: srcmt_actividades_academicas_codigo_actividad_academica_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE "srcmt_actividades_academicas_codigo_actividad_academica_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2153 (class 0 OID 0)
-- Dependencies: 183
-- Name: srcmt_actividades_academicas_codigo_actividad_academica_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE "srcmt_actividades_academicas_codigo_actividad_academica_seq" OWNED BY "srcmt_actividades_academicas"."codigo_actividad_academica";


--
-- TOC entry 2154 (class 0 OID 0)
-- Dependencies: 183
-- Name: srcmt_actividades_academicas_codigo_actividad_academica_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('"srcmt_actividades_academicas_codigo_actividad_academica_seq"', 1, false);


--
-- TOC entry 184 (class 1259 OID 28816)
-- Dependencies: 1998 1999 5
-- Name: srcmt_actividades_icm; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "srcmt_actividades_icm" (
    "codigo_actividad_icm" integer NOT NULL,
    "codigo_tipo_actividad" integer NOT NULL,
    "actividad" character varying(255) NOT NULL,
    "responsable" character varying(255),
    "fecha" "date" NOT NULL,
    "lugar" character varying(255) NOT NULL,
    "duracion" character varying(50) NOT NULL,
    "descripcion" character varying(255),
    "created_at" timestamp without time zone DEFAULT ('now'::"text")::timestamp without time zone NOT NULL,
    "updated_at" timestamp without time zone DEFAULT ('now'::"text")::timestamp without time zone
);


--
-- TOC entry 2155 (class 0 OID 0)
-- Dependencies: 184
-- Name: TABLE "srcmt_actividades_icm"; Type: COMMENT; Schema: public; Owner: -
--

COMMENT ON TABLE "srcmt_actividades_icm" IS 'Acividades de Integracion Civico Miltar
Entrenamiento';


--
-- TOC entry 185 (class 1259 OID 28824)
-- Dependencies: 5 184
-- Name: srcmt_actividades_icm_codigo_actividad_icm_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE "srcmt_actividades_icm_codigo_actividad_icm_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2156 (class 0 OID 0)
-- Dependencies: 185
-- Name: srcmt_actividades_icm_codigo_actividad_icm_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE "srcmt_actividades_icm_codigo_actividad_icm_seq" OWNED BY "srcmt_actividades_icm"."codigo_actividad_icm";


--
-- TOC entry 2157 (class 0 OID 0)
-- Dependencies: 185
-- Name: srcmt_actividades_icm_codigo_actividad_icm_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('"srcmt_actividades_icm_codigo_actividad_icm_seq"', 1, false);


--
-- TOC entry 186 (class 1259 OID 28826)
-- Dependencies: 2001 2002 5
-- Name: srcmt_brigadistas_dado; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "srcmt_brigadistas_dado" (
    "codigo_brigadista" integer NOT NULL,
    "nacionalidad" character varying(1) NOT NULL,
    "cedula_identidad" integer NOT NULL,
    "religion" character varying(15),
    "primer_apellido" character varying(30) NOT NULL,
    "segundo_apellido" character varying(30),
    "primer_nombre" character varying(30) NOT NULL,
    "segundo_nombre" character varying(30),
    "sexo" character varying(1) NOT NULL,
    "fecha_nacimiento" "date" NOT NULL,
    "lugar_de_nacimiento" character varying(40),
    "estado_civil" character varying(11),
    "foto" character varying(255),
    "grupo_sanguineo" character varying(4) NOT NULL,
    "codigo_estado" integer,
    "codigo_municipio" integer,
    "codigo_parroquia" integer,
    "codigo_ciudad" integer,
    "direccion_domiciliaria" character varying(100) NOT NULL,
    "telefono_domicilio" character varying(20) NOT NULL,
    "telefono_movil" character varying(20),
    "correo_electronico" "text",
    "direccion_emergencia" character varying(100) NOT NULL,
    "telefono_emergencia" character varying(20) NOT NULL,
    "unidad_adscripcion_laboral" character varying(50),
    "extension_interna" character varying(6),
    "perfil_empleado" character varying(14),
    "jefe_sector" character varying(50),
    "grado_instruccion" character varying(14) NOT NULL,
    "especialidad" character varying(50) NOT NULL,
    "sedes" integer NOT NULL,
    "jerarquia" character varying(20),
    "profesion" character varying(100),
    "oficio" character varying(100),
    "centro_votacion_cne" character varying(255),
    "direccion_oficina" character varying(100),
    "talla_pantalon" character varying(4),
    "talla_camisa" character varying(4),
    "talla_calzado" character varying(4),
    "talla_gorra" character varying(4),
    "estatura" character varying(4),
    "peso" real NOT NULL,
    "color_cabello" character varying(10) NOT NULL,
    "color_piel" character varying(20) NOT NULL,
    "discapacidad" character varying(255),
    "alergias" character varying(255),
    "dominio_mano" character varying(15),
    "deporte" character varying(20),
    "actividades_culturales" character varying(20),
    "apellidos_beneficiario" character varying(60) NOT NULL,
    "nombres_beneficiario" character varying(60) NOT NULL,
    "cedula_beneficiario" character varying(11),
    "telefono_beneficiario" character varying(20) NOT NULL,
    "created_at" timestamp without time zone DEFAULT ('now'::"text")::timestamp without time zone NOT NULL,
    "updated_at" timestamp without time zone DEFAULT ('now'::"text")::timestamp without time zone NOT NULL
);


--
-- TOC entry 187 (class 1259 OID 28834)
-- Dependencies: 5 186
-- Name: srcmt_brigadistas_dado_codigo_brigadista_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE "srcmt_brigadistas_dado_codigo_brigadista_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2158 (class 0 OID 0)
-- Dependencies: 187
-- Name: srcmt_brigadistas_dado_codigo_brigadista_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE "srcmt_brigadistas_dado_codigo_brigadista_seq" OWNED BY "srcmt_brigadistas_dado"."codigo_brigadista";


--
-- TOC entry 2159 (class 0 OID 0)
-- Dependencies: 187
-- Name: srcmt_brigadistas_dado_codigo_brigadista_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('"srcmt_brigadistas_dado_codigo_brigadista_seq"', 1, false);


--
-- TOC entry 188 (class 1259 OID 28836)
-- Dependencies: 5
-- Name: srcmt_ciudad; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "srcmt_ciudad" (
    "codigo_ciudad" integer NOT NULL,
    "codigo_estado" integer NOT NULL,
    "codigo_municipio" integer NOT NULL,
    "ciudad" character varying(50) NOT NULL
);


--
-- TOC entry 189 (class 1259 OID 28839)
-- Dependencies: 5
-- Name: srcmt_estado; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "srcmt_estado" (
    "codigo_estado" integer NOT NULL,
    "estado" character varying(20) NOT NULL
);


--
-- TOC entry 190 (class 1259 OID 28842)
-- Dependencies: 5
-- Name: srcmt_milicianos_codigo_miliciano_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE "srcmt_milicianos_codigo_miliciano_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2160 (class 0 OID 0)
-- Dependencies: 190
-- Name: srcmt_milicianos_codigo_miliciano_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('"srcmt_milicianos_codigo_miliciano_seq"', 1, false);


--
-- TOC entry 191 (class 1259 OID 28844)
-- Dependencies: 2004 2005 2006 5
-- Name: srcmt_milicianos; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "srcmt_milicianos" (
    "codigo_miliciano" integer DEFAULT "nextval"('"srcmt_milicianos_codigo_miliciano_seq"'::"regclass") NOT NULL,
    "nacionalidad" character varying(1) NOT NULL,
    "cedula_identidad" integer NOT NULL,
    "primer_apellido" character varying(30) NOT NULL,
    "segundo_apellido" character varying(30),
    "primer_nombre" character varying(30) NOT NULL,
    "segundo_nombre" character varying(30),
    "sexo" character varying(1) NOT NULL,
    "fecha_nacimiento" "date" NOT NULL,
    "estado_civil" character varying(11),
    "foto" character varying(255),
    "grupo_sanguineo" character varying(4) NOT NULL,
    "codigo_estado" integer,
    "codigo_municipio" integer,
    "codigo_parroquia" integer,
    "codigo_ciudad" integer,
    "direccion" character varying(100) NOT NULL,
    "telefono_local" character varying(20) NOT NULL,
    "movil" character varying(20),
    "correo_electronico" "text",
    "direccion_emergencia" character varying(100) NOT NULL,
    "telefono_emergencia" character varying(20) NOT NULL,
    "grado_instruccion" character varying(14) NOT NULL,
    "especialidad" character varying(50) NOT NULL,
    "idiomas" character varying(20),
    "nivel_dominio_idioma" character varying(8),
    "programa_formacion_grado" integer NOT NULL,
    "trayecto" character varying(3) NOT NULL,
    "tramo" character varying(3) NOT NULL,
    "aldea" character varying(100),
    "sedes" integer NOT NULL,
    "componente" character varying(30),
    "jerarquia" character varying(20),
    "contingente" character varying(15),
    "arma_servicio" character varying(100),
    "batallon_unidad_origen" character varying(100),
    "profesion" character varying(100),
    "oficio" character varying(100),
    "trabaja_si_no" boolean,
    "nombre_empresa" character varying(100),
    "direccion_oficina" character varying(100),
    "telefono_oficina" character varying(20),
    "posee_vehiculo" boolean,
    "tipo_vehiculo" character varying(20),
    "modelo_vehiculo" character varying(20),
    "numero_placa" character varying(15),
    "posee_licencia" boolean,
    "grado_licencia" character varying(5),
    "porte_armas" boolean,
    "numero_porte_armas" character varying(15),
    "tipo_armamento" character varying(11),
    "calibre_armamento" character varying(5),
    "signos_particulares" character varying(100),
    "talla_uniforme" character varying(3) NOT NULL,
    "talla_calzado" character varying(2) NOT NULL,
    "estatura" character varying(4) NOT NULL,
    "peso" real NOT NULL,
    "color_cabello" character varying(10) NOT NULL,
    "color_piel" character varying(20) NOT NULL,
    "discapacidad" character varying(255),
    "alergias" character varying(255),
    "dominio_mano" character varying(15) NOT NULL,
    "practica_deporte" boolean,
    "deporte" character varying(20),
    "participa_actividad_cultural" boolean,
    "actividad_cultural" character varying(20),
    "agrupacion_social" character varying(100),
    "misiones" character varying(255),
    "cooperativas" character varying(255),
    "apellidos_beneficiario" character varying(60) NOT NULL,
    "nombres_beneficiario" character varying(60) NOT NULL,
    "cedula_beneficiario" character varying(11),
    "telefono_beneficiario" character varying(20) NOT NULL,
    "created_at" timestamp without time zone DEFAULT ('now'::"text")::timestamp without time zone NOT NULL,
    "updated_at" timestamp without time zone DEFAULT ('now'::"text")::timestamp without time zone NOT NULL
);


--
-- TOC entry 192 (class 1259 OID 28853)
-- Dependencies: 5
-- Name: srcmt_municipio; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "srcmt_municipio" (
    "codigo_municipio" integer NOT NULL,
    "codigo_estado" integer NOT NULL,
    "municipio" character varying(50) NOT NULL
);


--
-- TOC entry 193 (class 1259 OID 28856)
-- Dependencies: 5
-- Name: srcmt_parroquia; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "srcmt_parroquia" (
    "codigo_parroquia" integer NOT NULL,
    "parroquia" character varying(50) NOT NULL,
    "codigo_municipio" integer NOT NULL,
    "codigo_estado" integer NOT NULL
);


--
-- TOC entry 194 (class 1259 OID 28859)
-- Dependencies: 5
-- Name: srcmt_pfg; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "srcmt_pfg" (
    "id_pfg" integer NOT NULL,
    "pfg" character varying(50) NOT NULL
);


--
-- TOC entry 195 (class 1259 OID 28862)
-- Dependencies: 194 5
-- Name: srcmt_pfg_id_pfg_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE "srcmt_pfg_id_pfg_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2161 (class 0 OID 0)
-- Dependencies: 195
-- Name: srcmt_pfg_id_pfg_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE "srcmt_pfg_id_pfg_seq" OWNED BY "srcmt_pfg"."id_pfg";


--
-- TOC entry 2162 (class 0 OID 0)
-- Dependencies: 195
-- Name: srcmt_pfg_id_pfg_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('"srcmt_pfg_id_pfg_seq"', 16, true);


--
-- TOC entry 196 (class 1259 OID 28864)
-- Dependencies: 5
-- Name: srcmt_sedes_id_sedes_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE "srcmt_sedes_id_sedes_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2163 (class 0 OID 0)
-- Dependencies: 196
-- Name: srcmt_sedes_id_sedes_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('"srcmt_sedes_id_sedes_seq"', 1, false);


--
-- TOC entry 197 (class 1259 OID 28866)
-- Dependencies: 2008 5
-- Name: srcmt_sedes; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "srcmt_sedes" (
    "id_sedes" integer DEFAULT "nextval"('"srcmt_sedes_id_sedes_seq"'::"regclass") NOT NULL,
    "sedes" character varying(50) NOT NULL,
    "direccion" character varying(255)
);


--
-- TOC entry 198 (class 1259 OID 28870)
-- Dependencies: 5
-- Name: srcmt_tipo_actividad; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE "srcmt_tipo_actividad" (
    "codigo_tipo_actividad" integer NOT NULL,
    "tipo_actividad" character varying(50) NOT NULL
);


--
-- TOC entry 199 (class 1259 OID 28873)
-- Dependencies: 198 5
-- Name: srcmt_tipo_actividad_codigo_tipo_actividad_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE "srcmt_tipo_actividad_codigo_tipo_actividad_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 2164 (class 0 OID 0)
-- Dependencies: 199
-- Name: srcmt_tipo_actividad_codigo_tipo_actividad_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE "srcmt_tipo_actividad_codigo_tipo_actividad_seq" OWNED BY "srcmt_tipo_actividad"."codigo_tipo_actividad";


--
-- TOC entry 2165 (class 0 OID 0)
-- Dependencies: 199
-- Name: srcmt_tipo_actividad_codigo_tipo_actividad_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('"srcmt_tipo_actividad_codigo_tipo_actividad_seq"', 10, true);


--
-- TOC entry 1975 (class 2604 OID 28875)
-- Dependencies: 162 161
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY "sf_guard_forgot_password" ALTER COLUMN "id" SET DEFAULT "nextval"('"sf_guard_forgot_password_id_seq"'::"regclass");


--
-- TOC entry 1976 (class 2604 OID 29080)
-- Dependencies: 164 163
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY "sf_guard_group" ALTER COLUMN "id" SET DEFAULT "nextval"('"sf_guard_group_id_seq"'::"regclass");


--
-- TOC entry 1977 (class 2604 OID 29081)
-- Dependencies: 167 166
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY "sf_guard_permission" ALTER COLUMN "id" SET DEFAULT "nextval"('"sf_guard_permission_id_seq"'::"regclass");


--
-- TOC entry 1978 (class 2604 OID 28878)
-- Dependencies: 169 168
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY "sf_guard_remember_key" ALTER COLUMN "id" SET DEFAULT "nextval"('"sf_guard_remember_key_id_seq"'::"regclass");


--
-- TOC entry 1982 (class 2604 OID 28879)
-- Dependencies: 172 170
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY "sf_guard_user" ALTER COLUMN "id" SET DEFAULT "nextval"('"sf_guard_user_id_seq"'::"regclass");


--
-- TOC entry 1985 (class 2604 OID 28880)
-- Dependencies: 175 174
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY "srcmt_actividad_academica_brigadista_dado" ALTER COLUMN "id" SET DEFAULT "nextval"('"srcmt_actividad_academica_brigadista_dado_id_seq"'::"regclass");


--
-- TOC entry 1988 (class 2604 OID 28881)
-- Dependencies: 177 176
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY "srcmt_actividad_academica_miliciano" ALTER COLUMN "id" SET DEFAULT "nextval"('"srcmt_actividad_academica_miliciano_id_seq"'::"regclass");


--
-- TOC entry 1991 (class 2604 OID 28882)
-- Dependencies: 179 178
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY "srcmt_actividad_icm_brigadista_dado" ALTER COLUMN "id" SET DEFAULT "nextval"('"srcmt_actividad_icm_brigadista_dado_id_seq"'::"regclass");


--
-- TOC entry 1994 (class 2604 OID 28883)
-- Dependencies: 181 180
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY "srcmt_actividad_icm_miliciano" ALTER COLUMN "id" SET DEFAULT "nextval"('"srcmt_actividad_icm_miliciano_id_seq"'::"regclass");


--
-- TOC entry 1997 (class 2604 OID 28884)
-- Dependencies: 183 182
-- Name: codigo_actividad_academica; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY "srcmt_actividades_academicas" ALTER COLUMN "codigo_actividad_academica" SET DEFAULT "nextval"('"srcmt_actividades_academicas_codigo_actividad_academica_seq"'::"regclass");


--
-- TOC entry 2000 (class 2604 OID 28885)
-- Dependencies: 185 184
-- Name: codigo_actividad_icm; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY "srcmt_actividades_icm" ALTER COLUMN "codigo_actividad_icm" SET DEFAULT "nextval"('"srcmt_actividades_icm_codigo_actividad_icm_seq"'::"regclass");


--
-- TOC entry 2003 (class 2604 OID 28886)
-- Dependencies: 187 186
-- Name: codigo_brigadista; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY "srcmt_brigadistas_dado" ALTER COLUMN "codigo_brigadista" SET DEFAULT "nextval"('"srcmt_brigadistas_dado_codigo_brigadista_seq"'::"regclass");


--
-- TOC entry 2007 (class 2604 OID 29082)
-- Dependencies: 195 194
-- Name: id_pfg; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY "srcmt_pfg" ALTER COLUMN "id_pfg" SET DEFAULT "nextval"('"srcmt_pfg_id_pfg_seq"'::"regclass");


--
-- TOC entry 2009 (class 2604 OID 29083)
-- Dependencies: 199 198
-- Name: codigo_tipo_actividad; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY "srcmt_tipo_actividad" ALTER COLUMN "codigo_tipo_actividad" SET DEFAULT "nextval"('"srcmt_tipo_actividad_codigo_tipo_actividad_seq"'::"regclass");


--
-- TOC entry 2106 (class 0 OID 28732)
-- Dependencies: 161
-- Data for Name: sf_guard_forgot_password; Type: TABLE DATA; Schema: public; Owner: -
--

COPY "sf_guard_forgot_password" ("id", "user_id", "unique_key", "expires_at", "created_at", "updated_at") FROM stdin;
\.


--
-- TOC entry 2107 (class 0 OID 28737)
-- Dependencies: 163
-- Data for Name: sf_guard_group; Type: TABLE DATA; Schema: public; Owner: -
--

COPY "sf_guard_group" ("id", "name", "description", "created_at", "updated_at") FROM stdin;
1	Sede Aragua	Usuarios de la sede Aragua	2011-11-07 00:47:49	2011-11-07 00:47:49
2	Sede Barinas	Usuarios de la Sede Barinas	2011-11-07 00:48:22	2011-11-07 00:48:22
3	Sede Bolívar	Usuarios de la Sede Bolívar	2011-11-07 00:49:08	2011-11-07 00:49:08
4	Sede Caracas	Usuarios de la Sede Caracas	2011-11-07 00:49:39	2011-11-07 00:49:39
5	Sede Falcón	Usuarios de la Sede Falcón	2011-11-07 00:50:32	2011-11-07 00:50:32
6	Sede Monagas	Usuarios de la sede Monagas	2011-11-07 00:51:05	2011-11-07 00:51:05
7	Sede Valles del Tuy	Usuarios de la sede Valles del Tuy	2011-11-07 00:51:53	2011-11-07 00:51:53
8	Sede Zulia	Usuarios de la sede Zulia	2011-11-07 00:52:53	2011-11-07 00:52:53
\.


--
-- TOC entry 2108 (class 0 OID 28745)
-- Dependencies: 165
-- Data for Name: sf_guard_group_permission; Type: TABLE DATA; Schema: public; Owner: -
--

COPY "sf_guard_group_permission" ("group_id", "permission_id", "created_at", "updated_at") FROM stdin;
\.


--
-- TOC entry 2109 (class 0 OID 28748)
-- Dependencies: 166
-- Data for Name: sf_guard_permission; Type: TABLE DATA; Schema: public; Owner: -
--

COPY "sf_guard_permission" ("id", "name", "description", "created_at", "updated_at") FROM stdin;
1	Recuperar Brigadistas DADO		2011-11-17 13:45:24	2011-11-17 13:45:24
2	Crear Brigadistas DADO		2011-11-17 13:46:44	2011-11-17 13:46:44
3	Suprimir Brigadistas DADO		2011-11-17 13:47:06	2011-11-17 13:47:06
4	Actualizar Brigadistas DADO		2011-11-17 13:47:21	2011-11-17 13:47:21
5	Recuperar Actividades Academicas		2011-11-17 13:48:22	2011-11-17 13:48:22
6	Crear Actividades Academicas		2011-11-17 13:48:45	2011-11-17 13:48:45
7	Suprimir Actividades Academicas		2011-11-17 13:49:07	2011-11-17 13:49:07
8	Actualizar Actividades Academicas		2011-11-17 13:49:26	2011-11-17 13:49:26
9	Recuperar Actividades ICM		2011-11-17 13:51:20	2011-11-17 13:51:20
10	Crear Actividades ICM		2011-11-17 13:52:00	2011-11-17 13:52:00
11	Suprimir Actividades ICM		2011-11-17 13:53:19	2011-11-17 13:53:19
12	Actualizar Actividades ICM		2011-11-17 13:53:44	2011-11-17 13:53:44
13	Recuperar Brigadistas Estudiantiles		2011-11-17 13:57:48	2011-11-17 13:57:48
14	Crear Brigadista Estudiantil		2011-11-17 13:58:34	2011-11-17 13:58:34
15	Actualizar Brigadistas Estudiantiles		2011-11-17 13:59:07	2011-11-17 13:59:07
16	Suprimir Brigadistas Estudiantiles		2011-11-17 14:04:10	2011-11-17 14:04:10
\.


--
-- TOC entry 2110 (class 0 OID 28756)
-- Dependencies: 168
-- Data for Name: sf_guard_remember_key; Type: TABLE DATA; Schema: public; Owner: -
--

COPY "sf_guard_remember_key" ("id", "user_id", "remember_key", "ip_address", "created_at", "updated_at") FROM stdin;
\.


--
-- TOC entry 2111 (class 0 OID 28761)
-- Dependencies: 170
-- Data for Name: sf_guard_user; Type: TABLE DATA; Schema: public; Owner: -
--

COPY "sf_guard_user" ("id", "first_name", "last_name", "email_address", "username", "algorithm", "salt", "password", "is_active", "is_super_admin", "last_login", "created_at", "updated_at") FROM stdin;
\.


--
-- TOC entry 2112 (class 0 OID 28770)
-- Dependencies: 171
-- Data for Name: sf_guard_user_group; Type: TABLE DATA; Schema: public; Owner: -
--

COPY "sf_guard_user_group" ("user_id", "group_id", "created_at", "updated_at") FROM stdin;
\.


--
-- TOC entry 2113 (class 0 OID 28775)
-- Dependencies: 173
-- Data for Name: sf_guard_user_permission; Type: TABLE DATA; Schema: public; Owner: -
--

COPY "sf_guard_user_permission" ("user_id", "permission_id", "created_at", "updated_at") FROM stdin;
\.


--
-- TOC entry 2114 (class 0 OID 28778)
-- Dependencies: 174
-- Data for Name: srcmt_actividad_academica_brigadista_dado; Type: TABLE DATA; Schema: public; Owner: -
--

COPY "srcmt_actividad_academica_brigadista_dado" ("id", "codigo_brigadista", "codigo_actividad_academica", "created_at", "updated_at") FROM stdin;
\.


--
-- TOC entry 2115 (class 0 OID 28785)
-- Dependencies: 176
-- Data for Name: srcmt_actividad_academica_miliciano; Type: TABLE DATA; Schema: public; Owner: -
--

COPY "srcmt_actividad_academica_miliciano" ("id", "codigo_miliciano", "codigo_actividad_academica", "created_at", "updated_at") FROM stdin;
\.


--
-- TOC entry 2116 (class 0 OID 28792)
-- Dependencies: 178
-- Data for Name: srcmt_actividad_icm_brigadista_dado; Type: TABLE DATA; Schema: public; Owner: -
--

COPY "srcmt_actividad_icm_brigadista_dado" ("id", "codigo_brigadista", "codigo_actividad", "created_at", "updated_at") FROM stdin;
\.


--
-- TOC entry 2117 (class 0 OID 28799)
-- Dependencies: 180
-- Data for Name: srcmt_actividad_icm_miliciano; Type: TABLE DATA; Schema: public; Owner: -
--

COPY "srcmt_actividad_icm_miliciano" ("id", "codigo_miliciano", "codigo_actividad", "created_at", "updated_at") FROM stdin;
\.


--
-- TOC entry 2118 (class 0 OID 28806)
-- Dependencies: 182
-- Data for Name: srcmt_actividades_academicas; Type: TABLE DATA; Schema: public; Owner: -
--

COPY "srcmt_actividades_academicas" ("codigo_actividad_academica", "codigo_tipo_actividad", "actividad", "responsable", "fecha", "lugar", "duracion", "descripcion", "created_at", "updated_at") FROM stdin;
\.


--
-- TOC entry 2119 (class 0 OID 28816)
-- Dependencies: 184
-- Data for Name: srcmt_actividades_icm; Type: TABLE DATA; Schema: public; Owner: -
--

COPY "srcmt_actividades_icm" ("codigo_actividad_icm", "codigo_tipo_actividad", "actividad", "responsable", "fecha", "lugar", "duracion", "descripcion", "created_at", "updated_at") FROM stdin;
\.


--
-- TOC entry 2120 (class 0 OID 28826)
-- Dependencies: 186
-- Data for Name: srcmt_brigadistas_dado; Type: TABLE DATA; Schema: public; Owner: -
--

COPY "srcmt_brigadistas_dado" ("codigo_brigadista", "nacionalidad", "cedula_identidad", "religion", "primer_apellido", "segundo_apellido", "primer_nombre", "segundo_nombre", "sexo", "fecha_nacimiento", "lugar_de_nacimiento", "estado_civil", "foto", "grupo_sanguineo", "codigo_estado", "codigo_municipio", "codigo_parroquia", "codigo_ciudad", "direccion_domiciliaria", "telefono_domicilio", "telefono_movil", "correo_electronico", "direccion_emergencia", "telefono_emergencia", "unidad_adscripcion_laboral", "extension_interna", "perfil_empleado", "jefe_sector", "grado_instruccion", "especialidad", "sedes", "jerarquia", "profesion", "oficio", "centro_votacion_cne", "direccion_oficina", "talla_pantalon", "talla_camisa", "talla_calzado", "talla_gorra", "estatura", "peso", "color_cabello", "color_piel", "discapacidad", "alergias", "dominio_mano", "deporte", "actividades_culturales", "apellidos_beneficiario", "nombres_beneficiario", "cedula_beneficiario", "telefono_beneficiario", "created_at", "updated_at") FROM stdin;
\.


--
-- TOC entry 2121 (class 0 OID 28836)
-- Dependencies: 188
-- Data for Name: srcmt_ciudad; Type: TABLE DATA; Schema: public; Owner: -
--

COPY "srcmt_ciudad" ("codigo_ciudad", "codigo_estado", "codigo_municipio", "ciudad") FROM stdin;
1	1	1	Caracas
2	22	7	La Esmeralda
3	22	7	Acanaña
4	22	7	Toky-Shamanaña
5	22	7	Mavaca
6	22	7	Parimabé
7	22	2	San Fernando de Atabapo
8	22	2	Guarinuma
9	22	2	Laja Lisa
10	22	2	Macuruco
11	22	1	Puerto Ayacucho
12	22	1	Limón de Parhueña
13	22	1	Platanillal
14	22	5	Isla de Ratón
15	22	5	San Pedro del Orinoco
16	22	5	Munduapo
17	22	5	Samariapo
18	22	5	Pendare
19	22	3	Maroa
20	22	3	Comunidad
21	22	3	Victorino
22	22	6	San Juan de Manapiare
23	22	6	Cacurí
24	22	6	Marueta
25	22	6	Camani
26	22	4	San Carlos de Río Negro
27	22	4	Curimacare
28	22	4	Santa Lucía
29	22	4	Solano
30	2	1	Anaco
31	2	1	San Joaquín
32	2	2	Aragua de Barcelona
33	2	2	Cachipo
34	2	11	Puerto Píritu
35	2	11	San Miguel
36	2	11	El Hatillo
37	2	18	Valle de Guanape
38	2	18	Santa Bárbara
39	2	9	Pariaguán
40	2	9	Atapirire
41	2	9	Boca del Pao
42	2	9	El Pao de Barcelona
43	2	9	Múcura
44	2	15	Guanta
45	2	15	Pertigalete
46	2	7	Soledad
47	2	7	Carapa
48	2	10	Mapire
49	2	10	Santa Cruz de Orinoco
50	2	10	San Diego de Cabrutica
51	2	10	Santa Clara
52	2	10	Uverito
53	2	10	Zuata
54	2	13	Puerto La Cruz
55	2	13	Pozuelos
56	2	5	Onoto
57	2	5	San Pablo
58	2	8	San Mateo
59	2	8	El Carito
60	2	8	Santa Inés
61	2	4	Clarines
62	2	4	Guanape
63	2	4	Sabana de Uchire
64	2	6	Cantaura
65	2	6	Mundo Nuevo
66	2	6	Santa Rosa
67	2	6	Urica
68	2	16	San Francisco
69	2	16	Píritu
70	2	14	San José de Guanpa (El Tigrito)
71	2	21	Boca de Uchire
72	2	21	Boca de Chávez
73	2	19	Pueblo Nuevo
74	2	19	Santa Ana
75	2	3	Barcelona
76	2	3	Bergantín
77	2	3	Caigua
78	2	3	El Pilar
79	2	3	Naricual
80	2	12	El Tigre
81	2	20	El Chaparro
82	2	20	José Gregorio Monagas
83	2	17	Lecherías
84	3	1	Achaguas
85	3	1	Apurito
86	3	1	El Yagual
87	3	1	Guachara
88	3	1	El Samán de Apure
89	3	1	Guasimal
90	3	7	Biruaca
91	3	2	Bruzual
92	3	2	Mantecal
93	3	2	Quintero
94	3	2	La Estacada
95	3	2	San Vicente
96	3	3	Guasdualito
97	3	3	Palmarito
98	3	3	El Amparo
99	3	3	El Nula
100	3	3	La Victoria
101	3	4	San Juan de Payara
102	3	4	Puerto Páez
103	3	4	San Miguel de Cunaviche
105	3	5	Elorza
106	3	5	La Trinidad de Orichuna
107	3	6	San Fernando de Apure
108	3	6	El Recreo
109	3	6	Arichuna
110	3	6	San Rafael de Atamaica
111	4	11	San Mateo
112	4	15	Camatagua
113	4	15	Carmen de Cura
114	4	1	Maracay
115	4	1	Choroní
116	4	10	Santa Cruz
117	4	3	La Victoria
118	4	3	Las Mercedes
119	4	3	Las Guacamayas
120	4	3	Pao de Zárate
121	4	3	Zuata
122	4	16	El Consejo
123	4	9	Palo Negro
124	4	9	La Pica
125	4	13	El Limón
126	4	13	Caña de Azúcar
127	4	4	San Casimiro
128	4	4	Güiripa
129	4	4	Ollas de Caramacate
130	4	4	Valle Morín
131	4	5	San Sebastián
132	4	2	Turmero
133	4	2	San Joaquín
134	4	2	Rosario de Paya
135	4	2	Chuao
136	4	2	19 de Abril
137	4	12	Las Tejerías
138	4	12	Tiara
140	4	6	Cagua
141	4	6	Bella Vista
142	4	14	La colonia Tovar
143	4	7	Barbacoas
144	4	7	Las peñitas
145	4	7	San Francisco de Cara
146	4	7	Taguay
147	4	8	Villa de Cura
148	4	8	Tocorón
149	4	8	Magdaleno
899	19	5	Santa Rosa
150	4	8	San Francisco de Asís
151	4	8	Los Bagres
152	4	17	Santa Rita
153	4	17	Francisco de Miranda
154	4	17	Paraparal
156	5	9	Sabaneta
157	5	9	Veguitas
158	5	10	Socopó
159	5	10	Bum-Bum
160	5	10	Chameta
161	5	1	Arismendi
162	5	1	Guadarrama
163	5	1	La Unión
164	5	1	San Antonio
165	5	2	Barinas
166	5	2	Quebrada Seca
167	5	2	La Mula
168	5	2	El Corozo
169	5	2	La Caramuca
170	5	2	Santa Inés
171	5	2	Santa Lucía
172	5	2	San Silvestre
173	5	2	Torunos
174	5	3	Barinitas
175	5	3	Altamira
176	5	3	Calderas
177	5	11	Barrancas
178	5	11	La Yuca
179	5	11	Masparrito
180	5	4	Santa Bárbara
181	5	4	Pedraza la Vieja
182	5	4	Capitanejo
183	5	4	Punta de piedra
184	5	5	Obispos
185	5	5	El Real
186	5	5	La Luz
187	5	5	Los Guasimitos
188	5	6	Ciudad Bolivia
189	5	6	Maporal
190	5	6	Curbatí
191	5	7	Libertad
192	5	7	Dolores
193	5	7	Mijagual
194	5	7	Santa Rosa
195	5	7	Arauquita
196	5	8	Ciudad de Nutrias
197	5	8	El Regalo
198	5	8	Puerto de Nutrias
199	5	8	Santa Catalina
200	5	8	Las Casitas del Vegón de Nutria
201	5	12	El Cantón
202	5	12	Puerto Vivas
203	5	12	Santa Cruz de Guacas
204	5	13	San Rafael De Canaguá
205	5	13	Potrero de la Virgen
206	5	13	Las Malvinas
207	6	1	Ciudad Guayana
208	6	1	Pozo Verde
209	6	1	El Rosario
210	6	2	Caicara del Orinoco
211	6	2	Las Bonitas
212	6	2	Santa Rosalía
213	6	2	El Milagro
214	6	2	La Urbina
215	6	2	Morichalito
216	6	10	El Callao
217	6	9	Santa Elena de Uairén
218	6	9	Ikabarú
219	6	3	Ciudad Bolívar
220	6	3	Almacén
221	6	3	San José de Bongo
222	6	3	La Carolina
223	6	4	Upata
224	6	4	El Pao de Hierro
225	6	4	El Manteco
226	6	8	Ciudad Piar
227	6	8	La Paragua
228	6	8	San Francisco
229	6	8	Santa Bárbara de Centurión
230	6	5	Guasipati
231	6	5	El Miamo
232	6	7	Tumeremo
233	6	7	El Dorado
234	6	7	Las Claritas
235	6	6	Maripa
236	6	6	Aripao
237	6	6	Guarataro
238	6	6	Las Majadas
239	6	6	Moitaco
240	6	11	El Palmar
241	7	1	Bejuma
242	7	1	Canoabo
243	7	1	Chirgua
244	7	2	Güigüe
245	7	2	Belén
246	7	2	Central Tacarigua
247	7	3	Mariara
248	7	4	Guacara
249	7	4	Yagua
250	7	6	Morón
251	7	6	Urama
252	7	14	Tocuyito
253	7	11	Los Guayos
254	7	10	Miranda
255	7	5	Montalban
256	7	12	Naguanagua
257	7	7	Puerto Cabello
258	7	7	Borburata
259	7	7	Patanemo
260	7	13	San Diego
261	7	8	San Joaquín
262	7	9	Valencia
263	7	15	Miguel Peña
264	7	15	Los Naranjos
265	8	1	Cojedes
266	8	1	Apartaderos
267	8	2	Tinaquillo
268	8	3	El Baúl
269	8	3	Sucre
270	8	8	Macapo
271	8	8	La Aguadita
272	8	4	El Pao
273	8	5	Libertad
274	8	5	El Amparo
275	8	9	Las Vegas
276	8	6	San Carlos
277	8	6	La Sierra
278	8	6	Manrique
279	8	6	San Carlos
280	8	7	Tinaco
281	23	3	Curiapo
282	23	3	Manoa
283	23	3	Boca de Cuyubini
284	23	3	Araguabisi
285	23	3	San Francisco de Guayo
286	23	3	Araguaimujo
287	23	4	Sierra Imataca
288	23	4	Piacoa
289	23	4	El Triunfo
290	23	4	Santa Catalina
291	23	4	Moruca
292	23	2	Pedernales
293	23	2	Capure
294	23	1	Tucupita
295	23	1	Hacienda del Medio
296	23	1	Carapal de Guara
297	23	1	Urb. Leonardo Ruiz Pineda
298	23	1	Paloma
299	23	1	Urb. Delfiín Mendoza
300	23	1	Tucupita
301	23	1	San Rafael
302	23	1	La Horqueta
303	9	1	San Juan de los Cayos
304	9	1	Capadare
305	9	1	La Pastora
306	9	1	El Mene de San Lorenzo
308	9	2	San Luis
309	9	2	Aracua
310	9	2	La Peña
311	9	3	Capatárida
312	9	3	Bariro
313	9	3	Borojó
314	9	3	Guajiro
315	9	3	San José de Seque
316	9	3	Zazárida
317	9	21	Yaracal
318	9	4	Punto Fijo
319	9	4	Punta Cardón
320	9	4	Santa Ana
321	9	5	La Vela de Coro
322	9	5	Acurigua
323	9	5	Guaibacoa
324	9	5	Las Calderas
325	9	5	El Moyepo
326	9	14	Dabajuro
327	9	6	Pedregal
328	9	6	El Manantial
329	9	6	Tupure
330	9	6	Pedregal
331	9	6	Piedra Grande
332	9	6	Purureche
333	9	7	Pueblo Nuevo
334	9	7	Adícora
335	9	7	Adaure
336	9	7	Baraived
337	9	7	Buena Vista
338	9	7	El Hato
339	9	7	El Vínculo
340	9	7	Jadacaquiva
341	9	7	Moruy
342	9	7	Pueblo Nuevo
343	9	8	Churuguara
344	9	8	Agua Larga
345	9	8	El Paují
346	9	8	El Tupí
347	9	8	Mapararí
348	9	20	Churuguara
349	9	20	Agua Linda
350	9	20	Araurima
351	9	20	Jacura
352	9	16	Santa Cruz de Los Taques
353	9	16	Judibana
354	9	9	Mene de Mauroa
355	9	9	Casigua
356	9	9	San Félix
357	9	10	Santa Ana de Coro
358	9	10	La Negrita
359	9	10	Mitare
360	9	10	Río Seco
361	9	10	Sabaneta
362	9	15	Chichiriviche
363	9	15	Boca de Tocuyo
364	9	15	Tocuyo de la Costa
365	9	22	Palma Sola
366	9	11	Cabure
367	9	11	Pueblo Nuevo de la Sierra
368	9	11	Curimagua
369	9	17	Píritu
370	9	17	San José de la Costa
371	9	19	Mirimire
372	9	12	Tucacas
373	9	12	Boca de Aroa
374	9	23	La Cruz de Taratara
375	9	23	Pecaya
376	9	25	Tocópero
377	9	18	Santa Cruz de Bucaral
378	9	18	El Charal
379	9	18	Las Vegas del Tuy
380	9	24	San José de Bruzual
381	9	24	Urumaco
382	9	13	Puerto Cumarebo
383	9	13	La Ciénaga
384	9	13	La Soledad
385	9	13	Pueblo Cumarebo
386	9	13	Puerto Cumarebo
387	9	13	Zazárida
388	10	8	Camaguán
389	10	8	Puerto Miranda
390	10	8	Uverito
391	10	14	Chaguaramas
392	10	11	El Socorro
393	10	3	Calabozo
394	10	3	El Calvario
395	10	3	El Rastro
396	10	3	Guardatinajas
397	10	5	Tucupido
398	10	5	San Rafael de Laya
399	10	5	Tucupido
400	10	4	Altagracia de Orituco
401	10	4	Lezama
402	10	4	Libertad de Orituco
403	10	4	Paso Real de Macaira
404	10	4	San Francisco de Macaira
405	10	4	San Rafael de Orituco
406	10	4	Sabana Grande de Orituco
407	10	6	San Juan de los Morros
408	10	6	Cantagallo
409	10	6	Parapara
410	10	2	El Sombrero
411	10	2	Sosa
412	10	10	Las Mercedes
413	10	10	Cabruta
414	10	10	Santa Rita
415	10	1	Valle de la Pascua
416	10	1	Espino
417	10	7	Zaraza
418	10	7	San José de Unare
419	10	12	San Francisco de Tiznados
420	10	12	San José de Tiznados
421	10	12	La Unión de Canuto
422	10	12	Ortiz
423	10	15	Guayabal
424	10	15	Cazorla
425	10	9	San José de Guaribe
426	10	13	Santa María de Ipire
427	10	13	Altamira
428	11	8	Sanare
429	11	8	La Bucarita
430	11	8	La Escalera
431	11	1	Duaca
432	11	1	El Eneal
433	11	2	Barquisimeto
434	11	2	Bobare
435	11	2	Buena Vista
436	11	2	Río Claro
437	11	3	Quibor
438	11	3	La Ceiba
439	11	3	Cuara
440	11	3	Cubiro
441	11	3	El Hato
442	11	3	Agua Negra
443	11	3	San Miguel
444	11	3	Tintorero
445	11	4	El Tocuyo
446	11	4	Anzoátegui
447	11	4	Guárico
448	11	4	Villanueva
449	11	4	Humocaro Alto
450	11	4	Humocaro Bajo
451	11	4	Guaitó
452	11	4	Barbacoas
453	11	5	Cabudare
454	11	5	Los Rastrojos
455	11	5	Agua Viva
456	11	9	Sarare
457	11	9	Manzanita
458	11	9	La Miel
460	11	6	Carora
461	11	6	Curarigua
462	11	6	Río Tocuyo
463	11	6	Atarigua
464	11	6	La Pastora
465	11	6	Aregue
466	11	6	Quebrada Arriba
467	11	6	Arenales
468	11	6	El Paradero
469	11	6	San Pedro
470	11	6	Burere
471	11	6	El Empedrado
472	11	6	Palmarito
473	11	6	San Francisco
474	11	6	El Jabón
475	11	6	Parapara
476	11	6	Altagracia
477	11	7	Siquisique
478	11	7	Santa Inés
479	11	7	Aguada Grande
480	11	7	Baragua
481	12	1	El Vigía
482	12	1	La Palmita
483	12	1	Mucujepe
484	12	1	Los Naranjos
485	12	1	La Blanca -12 de Octubre
486	12	2	La Azulita
487	12	11	Santa Cruz de Mora
488	12	11	Mesa Bolívar
489	12	11	Mesa de las Palmas
490	12	22	Aricagua
491	12	22	Campo Elías
492	12	3	Canaguá
493	12	3	Capurí
494	12	3	Chacantá
495	12	3	El Molino
496	12	3	El Viento
497	12	3	Mucuchachí
498	12	3	Mucutuy
499	12	4	Ejido
500	12	4	Acequias
501	12	4	Jají
502	12	4	La Mesa
503	12	4	San José
504	12	13	El Pinar
505	12	14	Santo Domingo
506	12	14	Las Piedras
507	12	5	El Guaraque
508	12	5	Mesa de Quintero
509	12	5	Río Negro
510	12	6	Arapuey
511	12	6	San José de Palmira
512	12	7	Torondoy
513	12	7	San Cristóbal de Torondoy
514	12	8	Mérida
515	12	8	El Morro
516	12	8	Los Nevados
517	12	10	Timotes
518	12	10	Chachopo
519	12	10	La Venta
520	12	10	Piñango
521	12	12	Santa Elena de Arenales
522	12	12	Guayabones
523	12	12	San Rafael de Alcazar
524	12	21	Santa María de Caparo
525	12	15	Pueblo Llano
526	12	16	Mucuchíes
527	12	16	Cacute
528	12	16	La Toma
529	12	16	Mucurubá
530	12	16	San Rafael
531	12	9	Tabay
532	12	18	Lagunillas
533	12	18	Chiguará
534	12	18	Estánques
535	12	18	La Trampa
536	12	18	Pueblo Nuevo del Sur
537	12	18	San Juan
538	12	19	Tovar
539	12	20	Nueva Bolívia
540	12	20	Palmarito
541	12	20	Las Virtudes
542	12	20	Santa Apolonia
543	12	23	Caño El Tigre
544	13	1	Caucagua
545	13	1	Aragüita
546	13	1	El Clavo
547	13	1	Capaya
548	13	1	El Café
549	13	1	Marizapa
550	13	1	Panaquire
551	13	1	Tapipa
552	13	14	San José de Barlovento
553	13	14	Cumbo
554	13	16	Nuestra Señora del Rosario de Baruta
555	13	16	El Cafetal
556	13	16	Las Minas de Baruta
558	13	2	Higuerote
559	13	2	Curiepe
560	13	2	Tacarigua de Mamporal
561	13	20	Mamporal
562	13	17	Carrizal
563	13	18	Chacao
564	13	12	Charallave
565	13	12	Las Brisas
566	13	19	El Hatillo
567	13	3	Los Teques
568	13	3	Altagracia de la Montaña
569	13	3	San Diego
570	13	3	El Jarillo
571	13	3	Paracotos
572	13	3	San Pedro
573	13	3	Tácata
574	13	4	Santa Teresa del Tuy
575	13	4	El Cartanal
576	13	5	Ocumare del Tuy
577	13	5	La Democracia
578	13	5	Santa Bárbara
579	13	13	San Antonio de los Altos
580	13	6	Río Chico
581	13	6	El Guapo
582	13	6	Paparo
583	13	6	Río Chico
584	13	6	Tacarigua de la Laguna
585	13	6	San Fernando del Guapo
586	13	7	Santa Lucía
587	13	21	Cúpira
588	13	21	Machurucuto
589	13	8	Guarenas
591	13	15	San Francisco de Yare
592	13	15	San Antonio de Yare
593	13	9	Petare
594	13	9	Caucagüita
595	13	9	Filas de Mariches
596	13	9	La Dolorita
597	13	9	Los dos Caminos
598	13	10	Cúa
599	13	10	Nueva Cúa
600	13	11	Guatire
601	13	11	Araira
602	14	1	San Antonio
603	14	1	San Francisco
604	14	11	Aguasay
605	14	2	Caripito
606	14	3	Caripe
607	14	3	El Guácharo
608	14	3	La Guanota
609	14	3	Sabana de Piedra
610	14	3	San Agustín
611	14	3	Teresén
612	14	4	Caicara
613	14	4	Areo
614	14	4	San Félix
615	14	4	Viento Fresco
616	14	5	Punta de Mata
617	14	5	El Tejero
618	14	6	Temblador
619	14	6	Chaguaramas
620	14	6	Las Alhuacas
621	14	6	Tabasca
622	14	7	Maturín
623	14	7	El Corozo
624	14	7	El Furrial
625	14	7	Jusepín
626	14	7	La Pica
627	14	7	San Vicente
628	14	8	Aragua
629	14	8	Aparicio
630	14	8	Chaguaramal
631	14	8	El Pinto
632	14	8	Guanaguana
633	14	8	La Toscana
634	14	8	Taguaya
635	14	9	Quiriquire
636	14	9	Cachipo
637	14	12	Santa Bárbara
638	14	10	Barrancas
639	14	10	Los Barrancos de Fajardo
640	14	13	Uracoa
641	15	10	La Plaza de Paraguachí
642	15	1	La Asunción
643	15	2	San Juan Bautista
644	15	2	La Guardia
645	15	11	El Valle del Espíritu Santo
646	15	11	Villa Rosa
647	15	3	Santa Ana
648	15	3	El Maco
649	15	3	Tacarigua
650	15	3	Pedro González
651	15	3	Altagracia
652	15	4	Pampatar
653	15	4	El Pilar (Los Robles)
654	15	5	Juangriego
655	15	5	Los Millanes}
656	15	6	Porlamar
657	15	7	Boca de Río
658	15	7	Boca del Pozo
659	15	9	Punta de Piedras
660	15	9	El Guamache
661	15	8	San Pedro de Coche
662	15	8	Güinima
663	16	10	Agua Blanca
664	16	1	Araure
665	16	1	Río Acarigia
666	16	2	Píritu
667	16	2	Uveral
668	16	3	Guanare
669	16	3	Córdoba
670	16	3	San José de la Montaña
671	16	3	Mesa de Cavacas
672	16	3	Quebrada de la Virgen
674	16	4	Guanarito
675	16	4	Trinidad de la Capilla
676	16	4	Morrones
677	16	9	Chabasquen
678	16	9	Peña Blanca
679	16	5	Ospino
680	16	5	La Aparición
681	16	5	La Estación
682	16	6	Acarigua
683	16	6	Payara
684	16	6	Pimpinela
685	16	6	Mijagüito
686	16	11	Caño Delgadito
687	16	12	Boconoito
688	16	12	San Nicolás
689	16	13	San Rafael de Onoto
690	16	13	Santa Fé
691	16	13	El Algarrobito
692	16	14	El Playón
693	16	14	Nueva Florida
694	16	7	Biscucuy
695	16	7	La Concepción
696	16	7	San Rafael de Palo Alzado
697	16	7	Las Cruces
698	16	7	San José de Saguaz
699	16	7	Villa Rosa
700	16	8	Villa Bruzual
701	16	8	La Misión
702	16	8	Colonia Turén
703	16	8	Santa Cruz
704	17	11	Casanay
705	17	11	San Vicente
707	17	13	San José de Aerocuar
708	17	13	Río Casanay
709	17	1	Río Caribe
710	17	1	San Juan de Unare
711	17	1	El Morro de Puerto Santo
712	17	1	Puerto Santo
714	17	1	San Juan de las Galdonas
715	17	2	El Pilar
716	17	2	El Rincón
717	17	2	Los Arroyos
718	17	2	Guaraúnos
719	17	2	Tunapuicito
720	17	2	Guariquén
721	17	3	Carúpano
722	17	3	Playa Grande
723	17	14	Marigüitar
724	17	4	Yaguaraparo
725	17	4	Río Seco
726	17	4	El Paujíl
727	17	15	Araya
728	17	15	Chacopata
729	17	15	Manicuare
730	17	12	Tunapuy
731	17	12	Guayana
732	17	5	Irapa
733	17	5	Campo Claro
734	17	5	Marabal
735	17	5	San Antonio de Irapa
736	17	5	Soro
737	17	6	San Antonio del Golfo
738	17	7	Cumanacoa
739	17	7	Arenas
740	17	7	Aricagua
741	17	7	las Piedras
742	17	7	Cumanacoa
743	17	7	Villaroel o Quebrada Seca
744	17	7	San Lorenzo
745	17	8	Cariaco
746	17	8	Villa frontado o Muelle de Cariaco
747	17	8	Santa Cruz
748	17	8	Santa Maria
749	17	9	Cumaná
750	17	9	Los Puertos de Santa Fé
751	17	9	Los Altos
752	17	9	San Juan
753	17	9	Caigüire
754	17	10	Güiria
755	17	10	Río Salado
756	17	10	Macuro
757	17	10	Yoco
758	18	18	Cordero
759	18	23	Las Mesas
761	18	1	Colón
762	18	1	San Félix
763	18	1	San Pedro del Río
764	18	2	San Antonio del Táchira
765	18	2	El Recreo
766	18	2	Las Dantas
767	18	2	Palotal
768	18	4	Táriba
769	18	4	Palo Gordo
770	18	4	La Florida
771	18	10	Santa Ana del Táchira
772	18	19	San Rafael del Piñal
773	18	19	Puerto Teteo
774	18	19	San Lorenzo
775	18	24	San José de Bolívar
776	18	11	La Fría
777	18	11	Boca de Grita
778	18	11	Orope
779	18	12	Palmira
780	18	3	Capacho Nuevo
781	18	3	El Valle
782	18	3	Peribeca
783	18	5	La Grita
784	18	5	Pueblo Hondo
785	18	5	Sabana Grande
786	18	25	El Cobre
787	18	6	Rubio
788	18	6	Bramón
789	18	6	Río Chiquito
790	18	6	San Vicente de la Revancha
791	18	20	Capacho Viejo
792	18	20	Hato de la Virgen
793	18	20	El Pueblito
794	18	14	Abejales
795	18	14	El Milagro
796	18	14	Puerto Nuevo
797	18	14	San Joaquín de Navay
798	18	7	Lobatera
799	18	7	Borotá
800	18	13	Michelena
801	18	15	Coloncito
802	18	15	La Palmita
803	18	16	Ureña
804	18	16	Aguas Calientes
805	18	26	Delicias
806	18	21	La Tendida
807	18	21	Boconó
808	18	21	Hernández
809	18	8	San Cristóbal
810	18	8	Macanillo
811	18	22	Seboruco
812	18	27	San Simón
813	18	17	Queniquea
814	18	17	Mesa del Tigre
815	18	17	San Pablo
816	18	28	San Josesito
817	18	9	Pregonero
818	18	9	La Fundación
819	18	9	Laguna de García
820	18	9	Patio Redondo
821	18	29	Umuquena
822	19	15	Santa Isabel
823	19	15	Araguaney
824	19	15	El Jagüito
825	19	15	El Gallo
826	19	2	Boconó
827	19	2	Batatal
828	19	2	Burbusay
829	19	2	El Carmen
830	19	2	Las Mesitas
831	19	2	Guaramacal
832	19	2	La Vega de Guaramacal
833	19	2	Niquitao
834	19	2	Mosquey
835	19	2	San Rafael
836	19	2	Tostos
837	19	2	San Miguel
838	19	16	Sabana Grande
839	19	16	Altamira de Cáus
840	19	16	Granados
841	19	8	Chenjendé
842	19	8	Minas
843	19	8	Bolivia
844	19	8	Torococo
845	19	8	Mitón
846	19	8	Chejendé
847	19	8	Sabana Grande
848	19	8	Las Llanadas
849	19	3	Carache
850	19	3	Cuicas
851	19	3	La Concepción
852	19	3	El Zapatero
853	19	3	La Cuchilla
854	19	4	El Alto
855	19	4	Sabana Libre
856	19	4	La Mata
857	19	17	El Paradero
858	19	17	La Placita
859	19	17	Los Caprichos
860	19	18	Campo Elías
861	19	18	Las Quebradas
862	19	19	Santa Apolonia
863	19	19	La Ceiba
864	19	19	Zona Rica
865	19	19	Tres de Febrero
866	19	9	El Dividive
867	19	9	Agua Caliente
868	19	9	Agua Santa
869	19	9	El Cenizo
870	19	9	Valerita
871	19	10	Buena Vista
872	19	10	Monte Carmelo
873	19	10	Casa de Tabla
874	19	11	Motatán
875	19	11	El Baño
876	19	11	Jalisco
877	19	12	Pampán
878	19	12	Flor de Patria
879	19	12	Monay
880	19	12	Santa Ana
881	19	20	Pampanito
882	19	20	La Concepción
883	19	20	Pampanito II
884	19	1	Betijoque
885	19	1	Isnotú
886	19	1	Los Cedros
887	19	1	Las Rurales
888	19	13	Carvajal
889	19	13	La Cejita
890	19	13	Campo Alegre
891	19	13	Las Mesetas
892	19	14	Sabana de Mendoza
893	19	14	El Paraíso
894	19	14	Junín
895	19	14	Sabana de Mendoza
896	19	14	Valmore Rodríguez
897	19	5	Trujillo
898	19	5	San Lázaro
900	19	5	La Plazuela
901	19	5	Chiquinquirá
902	19	5	Matriz
903	19	5	San Jacinto
904	19	5	Tres Esquinas
905	19	6	La Quebrada
906	19	6	Cabimbú
907	19	6	Jajó
908	19	6	La Mesa de Esnujaque
909	19	6	La Uquebrada
910	19	6	Santiago
911	19	6	Tuñame
912	19	7	Valera
913	19	7	Juan Ignacio Montilla
914	19	7	La Beatriz
915	19	7	la Puerta
916	19	7	Mendoza
917	19	7	Mercedes Díaz
918	19	7	San Luis
919	20	12	San Pablo
920	20	1	Aroa
921	20	2	Chivacoa
922	20	2	Campo Elías
923	20	10	Cocorote
924	20	11	Independencia
925	20	8	Sabana de Parra
926	20	9	Boraure
927	20	13	Yumare
928	20	3	Nirgua
929	20	3	Salom
930	20	3	Temerla
931	20	7	Yaritagua
932	20	7	Cambural
933	20	4	San Felipe
934	20	4	Albarico
935	20	4	Marín
936	20	5	Guama
937	20	6	Urachiche
938	20	14	Aldea Casimiro Vásquez
939	21	17	El Toro
940	21	17	San Carlos
941	21	1	San Timoteo
942	21	1	Ceuta
943	21	1	Mene Grande
944	21	1	El Venado
945	21	1	El Tigre
946	21	1	Pueblo Nuevo
948	21	14	Cabimas
949	21	14	Palito Blanco
950	21	14	Punta Gorda
951	21	12	Encontrados
952	21	12	El Guayabo
953	21	3	San Carlos del Zulia
954	21	3	El Moralito
955	21	3	Santa Bárbara
956	21	3	Santa Cruz del Zulia
957	21	3	Concha
959	21	20	Cuatro Esquinas
960	21	20	Los Naranjos
961	21	20	Pueblo Nuevo (El Chivo)
962	21	16	La Concepción
963	21	16	La Paz
964	21	16	Jobo Alto
965	21	16	San José
966	21	19	Casigua-El Cubo
967	21	19	El Cruce
968	21	10	Concepción
969	21	10	Kilómetro 48 (Santo Domingo)
970	21	10	La Ensenada
971	21	10	El Carmelo
972	21	10	Potreritos
973	21	11	Ciudad Ojeda
974	21	11	Campo Lara
975	21	11	PicaPica
976	21	11	Lagunillas
977	21	8	Machiques
978	21	8	Las Piedras
979	21	8	San José
980	21	8	Río Negro
981	21	4	San Rafael Del Moján
982	21	4	La Sierrita
983	21	4	Las Parcelas
984	21	4	Carrasquero
985	21	4	Cachirí
986	21	4	Santa Cruz de Mara
987	21	4	Tamare
988	21	5	Maracaibo
989	21	5	San Isidro
990	21	6	Los Puertos de Altagracia
991	21	6	El Mecocal
992	21	6	Quisiro
993	21	6	El Consejo de Ciruma
994	21	6	Sabaneta de Palmas
995	21	7	Sinamaica
996	21	7	Cojoro
997	21	7	El Molinete
998	21	7	Paraguaipoa
999	21	13	La Villa del Rosario
1000	21	13	Barranquitas
1001	21	13	San Ignacio
1002	21	18	San Francisco
1003	21	18	El Silencio
1004	21	18	El Bajo
1005	21	18	Sierra Maestra
1006	21	18	Los Cortijos
1007	21	18	Sur América
1009	21	2	Santa Rita
1010	21	2	El Mene
1011	21	2	Palmarejo
1012	21	2	El Guanábano
1014	21	21	Tía Juana
1015	21	21	San Isidro
1016	21	21	Sabana de la Plata
1017	21	9	Bobures
1018	21	9	El Batey
1019	21	9	Gibraltar
1020	21	9	San Antonio
1021	21	9	Santa María
1022	21	9	Caja Seca
1023	21	15	Bachaquero
1024	21	15	El Corozo
1025	24	1	La Guaira
1026	24	1	Caraballeda
1027	24	1	Carayaca
1028	24	1	La Sabana
1029	24	1	Catia La Mar
1030	24	1	El Junko
1031	24	1	Macuto
1032	24	1	Maiquetía
1033	24	1	Naiguatá
1034	4	18	Ocumare de la Costa
1035	12	17	Bailadores
1036	12	17	La Playa
1037	16	11	Papelón
1038	19	4	Escuque
1039	20	14	Farriar
1040	24	1	* (No especificada en Gaceta Oficial del 20-01-19)
1041	12	13	Tucaní
1042	12	23	Zea
\.


--
-- TOC entry 2122 (class 0 OID 28839)
-- Dependencies: 189
-- Data for Name: srcmt_estado; Type: TABLE DATA; Schema: public; Owner: -
--

COPY "srcmt_estado" ("codigo_estado", "estado") FROM stdin;
1	DTTO. CAPITAL
2	ANZOATEGUI
3	APURE
4	ARAGUA
5	BARINAS
6	BOLIVAR
7	CARABOBO
8	COJEDES
9	FALCON
10	GUARICO
11	LARA
12	MERIDA
13	MIRANDA
14	MONAGAS
15	NVA.ESPARTA
16	PORTUGUESA
17	SUCRE
18	TACHIRA
19	TRUJILLO
20	YARACUY
21	ZULIA
22	AMAZONAS
23	DELTA AMACURO
24	VARGAS
\.


--
-- TOC entry 2123 (class 0 OID 28844)
-- Dependencies: 191
-- Data for Name: srcmt_milicianos; Type: TABLE DATA; Schema: public; Owner: -
--

COPY "srcmt_milicianos" ("codigo_miliciano", "nacionalidad", "cedula_identidad", "primer_apellido", "segundo_apellido", "primer_nombre", "segundo_nombre", "sexo", "fecha_nacimiento", "estado_civil", "foto", "grupo_sanguineo", "codigo_estado", "codigo_municipio", "codigo_parroquia", "codigo_ciudad", "direccion", "telefono_local", "movil", "correo_electronico", "direccion_emergencia", "telefono_emergencia", "grado_instruccion", "especialidad", "idiomas", "nivel_dominio_idioma", "programa_formacion_grado", "trayecto", "tramo", "aldea", "sedes", "componente", "jerarquia", "contingente", "arma_servicio", "batallon_unidad_origen", "profesion", "oficio", "trabaja_si_no", "nombre_empresa", "direccion_oficina", "telefono_oficina", "posee_vehiculo", "tipo_vehiculo", "modelo_vehiculo", "numero_placa", "posee_licencia", "grado_licencia", "porte_armas", "numero_porte_armas", "tipo_armamento", "calibre_armamento", "signos_particulares", "talla_uniforme", "talla_calzado", "estatura", "peso", "color_cabello", "color_piel", "discapacidad", "alergias", "dominio_mano", "practica_deporte", "deporte", "participa_actividad_cultural", "actividad_cultural", "agrupacion_social", "misiones", "cooperativas", "apellidos_beneficiario", "nombres_beneficiario", "cedula_beneficiario", "telefono_beneficiario", "created_at", "updated_at") FROM stdin;
\.


--
-- TOC entry 2124 (class 0 OID 28853)
-- Dependencies: 192
-- Data for Name: srcmt_municipio; Type: TABLE DATA; Schema: public; Owner: -
--

COPY "srcmt_municipio" ("codigo_municipio", "codigo_estado", "municipio") FROM stdin;
1	1	LIBERTADOR
1	2	ANACO
2	2	ARAGUA
3	2	BOLIVAR
4	2	BRUZUAL
5	2	CAJIGAL
6	2	FREITES
7	2	INDEPENDENCIA
8	2	LIBERTAD
9	2	MIRANDA
10	2	MONAGAS
11	2	PEÑALVER
12	2	SIMON RODRIGUEZ
13	2	SOTILLO
14	2	GUANIPA
15	2	GUANTA
16	2	PIRITU
17	2	M.L/DIEGO BAUTISTA U
18	2	CARVAJAL
19	2	SANTA ANA
20	2	MC GREGOR
21	2	S JUAN CAPISTRANO
1	3	ACHAGUAS
2	3	MUÑOZ
3	3	PAEZ
4	3	PEDRO CAMEJO
5	3	ROMULO GALLEGOS
6	3	SAN FERNANDO
7	3	BIRUACA
1	4	GIRARDOT
2	4	SANTIAGO MARIÑO
3	4	JOSE FELIX RIVAS
4	4	SAN CASIMIRO
5	4	SAN SEBASTIAN
6	4	SUCRE
7	4	URDANETA
8	4	ZAMORA
9	4	LIBERTADOR
10	4	JOSE ANGEL LAMAS
11	4	BOLIVAR
12	4	SANTOS MICHELENA
13	4	MARIO B IRAGORRY
14	4	TOVAR
15	4	CAMATAGUA
16	4	JOSE R REVENGA
17	4	FRANCISCO LINARES A.
18	4	M.OCUMARE D LA COSTA
1	5	ARISMENDI
2	5	BARINAS
3	5	BOLIVAR
4	5	EZEQUIEL ZAMORA
5	5	OBISPOS
6	5	PEDRAZA
7	5	ROJAS
8	5	SOSA
9	5	ALBERTO ARVELO T
10	5	A JOSE DE SUCRE
11	5	CRUZ PAREDES
12	5	ANDRES E. BLANCO
13	5	JOSE ANTONIO PAEZ
1	6	CARONI
2	6	CEDEÑO
3	6	HERES
4	6	PIAR
5	6	ROSCIO
6	6	SUCRE
7	6	SIFONTES
8	6	RAUL LEONI
9	6	GRAN SABANA
10	6	EL CALLAO
11	6	PADRE PEDRO CHIEN
1	7	BEJUMA
2	7	CARLOS ARVELO
3	7	DIEGO IBARRA
4	7	GUACARA
5	7	MONTALBAN
6	7	JUAN JOSE MORA
7	7	PUERTO CABELLO
8	7	SAN JOAQUIN
9	7	VALENCIA
10	7	MIRANDA
11	7	LOS GUAYOS
12	7	NAGUANAGUA
13	7	SAN DIEGO
14	7	LIBERTADOR
15	7	MIGUEL PEÑA
1	8	ANZOATEGUI
2	8	FALCON
3	8	GIRARDOT
4	8	 PAO SN J BAUTISTA
5	8	RICAURTE
6	8	SAN CARLOS
7	8	TINACO
8	8	LIMA BLANCO
9	8	ROMULO GALLEGOS
1	9	ACOSTA
2	9	BOLIVAR
3	9	BUCHIVACOA
4	9	CARIRUBANA
5	9	COLINA
6	9	DEMOCRACIA
7	9	FALCON
8	9	FEDERACION
9	9	MAUROA
10	9	MIRANDA
11	9	PETIT
12	9	SILVA
13	9	ZAMORA
14	9	DABAJURO
15	9	MONS. ITURRIZA
16	9	LOS TAQUES
17	9	PIRITU
18	9	UNION
19	9	SAN FRANCISCO
20	9	JACURA
21	9	CACIQUE MANAURE
22	9	PALMA SOLA
23	9	SUCRE
24	9	URUMACO
25	9	TOCOPERO
1	10	INFANTE
2	10	MELLADO
3	10	MIRANDA
4	10	MONAGAS
5	10	RIBAS
6	10	ROSCIO
7	10	ZARAZA
8	10	CAMAGUAN
9	10	S JOSE DE GUARIBE
10	10	LAS MERCEDES
11	10	EL SOCORRO
12	10	ORTIZ
13	10	S MARIA DE IPIRE
14	10	CHAGUARAMAS
15	10	SAN GERONIMO DE GUAYABAL
1	11	CRESPO
2	11	IRIBARREN
3	11	JIMENEZ
4	11	MORAN
5	11	PALAVECINO
6	11	TORRES
7	11	URDANETA
8	11	ANDRES E BLANCO
9	11	SIMON PLANAS
1	12	ALBERTO ADRIANI
2	12	ANDRES BELLO
3	12	ARZOBISPO CHACON
4	12	CAMPO ELIAS
5	12	GUARAQUE
6	12	JULIO CESAR SALAS
7	12	JUSTO BRICEÑO
8	12	LIBERTADOR
9	12	SANTOS MARQUINA
10	12	MIRANDA
11	12	ANTONIO PINTO SALINAS
12	12	OBISPO RAMOS DE LORA
13	12	CARACCIOLO PARRA OLMEDO
14	12	CARDENAL QUINTERO
15	12	PUEBLO LLANO
16	12	RANGEL
17	12	RIVAS DAVILA
18	12	SUCRE
19	12	TOVAR
20	12	TULIO FEBRES CORDERO
21	12	PADRE NOGUERA
22	12	ARICAGUA
23	12	ZEA
1	13	ACEVEDO
2	13	BRION
3	13	GUAICAIPURO
4	13	INDEPENDENCIA
5	13	LANDER
6	13	PAEZ
7	13	PAZ CASTILLO
8	13	PLAZA
9	13	SUCRE
10	13	URDANETA
11	13	ZAMORA
12	13	CRISTOBAL ROJAS
13	13	LOS SALIAS
14	13	ANDRES BELLO
15	13	SIMON BOLIVAR
16	13	BARUTA
17	13	CARRIZAL
18	13	CHACAO
19	13	EL HATILLO
20	13	BUROZ
21	13	PEDRO GUAL
1	14	ACOSTA
2	14	BOLIVAR
3	14	CARIPE
4	14	CEDEÑO
5	14	EZEQUIEL ZAMORA
6	14	LIBERTADOR
7	14	MATURIN
8	14	PIAR
9	14	PUNCERES
10	14	SOTILLO
11	14	AGUASAY
12	14	SANTA BARBARA
13	14	URACOA
1	15	ARISMENDI
2	15	DIAZ
3	15	GOMEZ
4	15	MANEIRO
5	15	MARCANO
6	15	MARIÑO
7	15	PENIN. DE MACANAO
8	15	VILLALBA(I.COCHE)
9	15	TUBORES
10	15	ANTOLIN DEL CAMPO
11	15	GARCIA
1	16	ARAURE
2	16	ESTELLER
3	16	GUANARE
4	16	GUANARITO
5	16	OSPINO
6	16	PAEZ
7	16	SUCRE
8	16	TUREN
9	16	M.JOSE V DE UNDA
10	16	AGUA BLANCA
11	16	PAPELON
12	16	SAN GENARO DE BOCONOITO
13	16	SAN RAFAEL DE ONOTO
14	16	SANTA ROSALIA
1	17	ARISMENDI
2	17	BENITEZ
3	17	BERMUDEZ
4	17	CAJIGAL
5	17	MARIÑO
6	17	MEJIA
7	17	MONTES
8	17	RIBERO
9	17	SUCRE
10	17	VALDEZ
11	17	ANDRES E BLANCO
12	17	LIBERTADOR
13	17	ANDRES MATA
14	17	BOLIVAR
15	17	CRUZ S ACOSTA
1	18	AYACUCHO
2	18	BOLIVAR
3	18	INDEPENDENCIA
4	18	CARDENAS
5	18	JAUREGUI
6	18	JUNIN
7	18	LOBATERA
8	18	SAN CRISTOBAL
9	18	URIBANTE
10	18	CORDOBA
11	18	GARCIA DE HEVIA
12	18	GUASIMOS
13	18	MICHELENA
14	18	LIBERTADOR
15	18	PANAMERICANO
16	18	PEDRO MARIA UREÑA
17	18	SUCRE
18	18	ANDRES BELLO
19	18	FERNANDEZ FEO
20	18	LIBERTAD
21	18	SAMUEL MALDONADO
22	18	SEBORUCO
23	18	ANTONIO ROMULO C
24	18	FCO DE MIRANDA
25	18	JOSE MARIA VARGA
26	18	RAFAEL URDANETA
27	18	SIMON RODRIGUEZ
28	18	TORBES
29	18	SAN JUDAS TADEO
1	19	RAFAEL RANGEL
2	19	BOCONÓ
3	19	CARACHE
4	19	ESCUQUE
5	19	TRUJILLO
6	19	URDANETA
7	19	VALERA
8	19	CANDELARIA
9	19	MIRANDA
10	19	MONTE CARMELO
11	19	MOTATAN
12	19	PAMPAN
13	19	SAN RAFAEL DE CARVAJAL
14	19	SUCRE
15	19	ANDRES BELLO
16	19	BOLÍVAR
17	19	JOSE FELIPE MÁRQUEZ CAÑIZALES
18	19	JUAN VICENTE CAMPO ELIAS
19	19	LA CEIBA
20	19	PAMPANITO
1	20	BOLIVAR
2	20	BRUZUAL
3	20	NIRGUA
4	20	SAN FELIPE
5	20	SUCRE
6	20	URACHICHE
7	20	PEÑA
8	20	JOSE ANTONIO PAEZ
9	20	LA TRINIDAD
10	20	COCOROTE
11	20	INDEPENDENCIA
12	20	ARISTIDES BASTIDAS
13	20	MANUEL MONGE
14	20	VEROES
1	21	BARALT
2	21	SANTA RITA
3	21	COLON
4	21	MARA
5	21	MARACAIBO
6	21	MIRANDA
7	21	PAEZ
8	21	MACHIQUES DE PERIJA
9	21	SUCRE
10	21	LA CAÑADA DE URDANETA
11	21	LAGUNILLAS
12	21	CATATUMBO
13	21	ROSARIO DE PERIJA
14	21	CABIMAS
15	21	VALMORE RODRIGUEZ
16	21	JESUS ENRIQUE LOSSADA
17	21	ALMIRANTE PADILLA
18	21	SAN FRANCISCO
19	21	JESUS MARIA SEMPRUN
20	21	FRANCISCO JAVIER PULGAR
21	21	SIMON BOLIVAR
1	22	ATURES
2	22	ATABAPO
3	22	MAROA
4	22	RIO NEGRO
5	22	AUTANA
6	22	MANAPIARE
7	22	ALTO ORINOCO
1	23	TUCUPITA
2	23	PEDERNALES
3	23	ANTONIO DIAZ
4	23	CASACOIMA
1	24	VARGAS
\.


--
-- TOC entry 2125 (class 0 OID 28856)
-- Dependencies: 193
-- Data for Name: srcmt_parroquia; Type: TABLE DATA; Schema: public; Owner: -
--

COPY "srcmt_parroquia" ("codigo_parroquia", "parroquia", "codigo_municipio", "codigo_estado") FROM stdin;
1	ALTAGRACIA	1	1
2	CANDELARIA	1	1
3	CATEDRAL	1	1
4	LA PASTORA	1	1
5	SAN AGUSTIN	1	1
6	SAN JOSE	1	1
7	SAN JUAN	1	1
8	SANTA ROSALIA	1	1
9	SANTA TERESA	1	1
10	SUCRE	1	1
11	23 DE ENERO	1	1
12	ANTIMANO	1	1
13	EL RECREO	1	1
14	EL VALLE	1	1
15	LA VEGA	1	1
16	MACARAO	1	1
17	CARICUAO	1	1
18	EL JUNQUITO	1	1
19	COCHE	1	1
20	SAN PEDRO	1	1
21	SAN BERNARDINO	1	1
22	EL PARAISO	1	1
1	ANACO	1	2
2	SAN JOAQUIN	1	2
1	ARAGUA DE BARCELONA	2	2
2	CACHIPO	2	2
1	EL CARMEN	3	2
2	SAN CRISTOBAL	3	2
3	BERGANTIN	3	2
4	CAIGUA	3	2
5	EL PILAR	3	2
6	NARICUAL	3	2
1	CLARINES	4	2
2	GUANAPE	4	2
3	SABANA DE UCHIRE	4	2
1	ONOTO	5	2
2	SAN PABLO	5	2
1	CANTAURA	6	2
2	LIBERTADOR	6	2
3	SANTA ROSA	6	2
4	URICA	6	2
1	SOLEDAD	7	2
2	MAMO	7	2
1	SAN MATEO	8	2
2	EL CARITO	8	2
3	SANTA INES	8	2
1	ATAPIRIRE	9	2
2	BOCA DEL PAO	9	2
3	EL PAO DE BARCELONA	9	2
4	MÚCURA	9	2
1	MAPIRE	10	2
2	PIAR	10	2
3	SN DIEGO DE CABRUTICA	10	2
4	SANTA CLARA	10	2
5	UVERITO	10	2
6	ZUATA	10	2
1	PUERTO PIRITU	11	2
2	SAN MIGUEL	11	2
3	SUCRE	11	2
1	Edmundo Barrios	12	2
2	Miguel Otero Silva	12	2
1	POZUELOS	13	2
2	PUERTO LA CRUZ	13	2
1	SAN JOSE DE GUANIPA	14	2
1	GUANTA	15	2
2	CHORRERON	15	2
1	PIRITU	16	2
2	SAN FRANCISCO	16	2
1	LECHERIAS	17	2
2	EL MORRO	17	2
1	VALLE GUANAPE	18	2
2	SANTA BARBARA	18	2
1	SANTA ANA	19	2
2	PUEBLO NUEVO	19	2
1	EL CHAPARRO	20	2
2	TOMAS ALFARO CALATRAVA	20	2
1	BOCA UCHIRE	21	2
2	BOCA DE CHAVEZ	21	2
1	ACHAGUAS	1	3
2	APURITO	1	3
3	EL YAGUAL	1	3
4	GUACHARA	1	3
5	MUCURITAS	1	3
6	QUESERAS DEL MEDIO	1	3
1	BRUZUAL	2	3
2	MANTECAL	2	3
3	QUINTERO	2	3
4	SAN VICENTE	2	3
5	RINCON HONDO	2	3
1	GUASDUALITO	3	3
2	ARAMENDI	3	3
3	EL AMPARO	3	3
4	SAN CAMILO	3	3
5	URDANETA	3	3
1	SAN JUAN DE PAYARA	4	3
2	CODAZZI	4	3
3	CUNAVICHE	4	3
1	ELORZA	5	3
2	LA TRINIDAD	5	3
1	SAN FERNANDO	6	3
2	PEÑALVER	6	3
3	EL RECREO	6	3
4	SN RAFAEL DE ATAMAICA	6	3
1	BIRUACA	7	3
1	LAS DELICIAS	1	4
2	CHORONI	1	4
3	MADRE MA DE SAN JOSE	1	4
4	JOAQUIN CRESPO	1	4
5	PEDRO JOSE OVALLES	1	4
6	JOSE CASANOVA GODOY	1	4
7	ANDRES ELOY BLANCO	1	4
8	LOS TACARIGUAS	1	4
1	TURMERO	2	4
2	SAMAN DE GUERE	2	4
3	ALFREDO PACHECO M	2	4
4	CHUAO	2	4
5	AREVALO APONTE	2	4
1	LA VICTORIA	3	4
2	ZUATA	3	4
3	PAO DE ZARATE	3	4
4	CASTOR NIEVES RIOS	3	4
5	LAS GUACAMAYAS	3	4
1	SAN CASIMIRO	4	4
2	VALLE MORIN	4	4
3	GUIRIPA	4	4
4	OLLAS DE CARAMACATE	4	4
1	SAN SEBASTIAN	5	4
1	CAGUA	6	4
2	BELLA VISTA	6	4
1	BARBACOAS	7	4
2	SAN FRANCISCO DE CARA	7	4
3	TAGUAY	7	4
4	LAS PEÑITAS	7	4
1	VILLA DE CURA	8	4
2	MAGDALENO	8	4
3	SAN FRANCISCO DE ASIS	8	4
4	VALLES DE TUCUTUNEMO	8	4
5	AUGUSTO MIJARES	8	4
1	PALO NEGRO	9	4
2	SAN MARTIN DE PORRES	9	4
1	SANTA CRUZ	10	4
1	SAN MATEO	11	4
1	LAS TEJERIAS	12	4
2	TIARA	12	4
1	EL LIMON	13	4
2	CA A DE AZUCAR	13	4
1	COLONIA TOVAR	14	4
1	CAMATAGUA	15	4
2	CARMEN DE CURA	15	4
1	EL CONSEJO	16	4
1	SANTA RITA	17	4
2	FRANCISCO DE MIRANDA	17	4
3	MONS FELICIANO G	17	4
1	OCUMARE DE LA COSTA	18	4
1	ARISMENDI	1	5
2	GUADARRAMA	1	5
3	LA UNION	1	5
4	SAN ANTONIO	1	5
1	ALFREDO A LARRIVA	2	5
2	BARINAS	2	5
3	SAN SILVESTRE	2	5
4	SANTA INES	2	5
5	SANTA LUCIA	2	5
6	TORUNOS	2	5
7	EL CARMEN	2	5
8	ROMULO BETANCOURT	2	5
9	CORAZON DE JESUS	2	5
10	RAMON I MENDEZ	2	5
11	ALTO BARINAS	2	5
12	MANUEL P FAJARDO	2	5
13	JUAN A RODRIGUEZ D	2	5
14	DOMINGA ORTIZ P	2	5
1	ALTAMIRA	3	5
2	BARINITAS	3	5
3	CALDERAS	3	5
1	SANTA BARBARA	4	5
2	JOSE IGNACIO DEL PUMAR	4	5
3	RAMON IGNACIO MENDEZ	4	5
4	PEDRO BRICEÑO MENDEZ	4	5
1	EL REAL	5	5
2	LA LUZ	5	5
3	OBISPOS	5	5
4	LOS GUASIMITOS	5	5
1	CIUDAD BOLIVIA	6	5
2	IGNACIO BRICEÑO	6	5
4	JOSE FELIX RIBAS	6	5
1	DOLORES	7	5
2	LIBERTAD	7	5
3	PALACIO FAJARDO	7	5
4	SANTA ROSA	7	5
5	Simón Rodríguez	7	5
1	CIUDAD DE NUTRIAS	8	5
2	EL REGALO	8	5
3	PUERTO DE NUTRIAS	8	5
4	SANTA CATALINA	8	5
5	Simón Bolívar	8	5
1	RODRIGUEZ DOMINGUEZ	9	5
2	SABANETA	9	5
1	TICOPORO	10	5
2	NICOLAS PULIDO	10	5
3	ANDRES BELLO	10	5
1	BARRANCAS	11	5
2	EL SOCORRO	11	5
3	MASPARRITO	11	5
1	EL CANTON	12	5
2	SANTA CRUZ DE GUACAS	12	5
3	PUERTO VIVAS	12	5
1	José Antonio Páez	13	5
2	Dominga Ortiz de Páez	13	5
3	Santa Rosalía	13	5
1	SIMON BOLIVAR	1	6
2	ONCE DE ABRIL	1	6
3	VISTA AL SOL	1	6
4	CHIRICA	1	6
5	DALLA COSTA	1	6
6	CACHAMAY	1	6
7	UNIVERSIDAD	1	6
8	UNARE	1	6
9	YOCOIMA	1	6
10	POZO VERDE	1	6
1	CAICARA DEL ORINOCO	2	6
2	ASCENSION FARRERAS	2	6
3	ALTAGRACIA	2	6
4	LA URBANA	2	6
5	GUANIAMO	2	6
6	PIJIGUAOS	2	6
1	CATEDRAL	3	6
2	AGUA SALADA	3	6
3	LA SABANITA	3	6
4	VISTA HERMOSA	3	6
5	MARHUANTA	3	6
6	JOSE ANTONIO PAEZ	3	6
7	ORINOCO	3	6
8	PANAPANA	3	6
9	ZEA	3	6
1	UPATA	4	6
2	ANDRES ELOY BLANCO	4	6
3	PEDRO COVA	4	6
1	GUASIPATI	5	6
2	SALOM	5	6
1	MARIPA	6	6
2	ARIPAO	6	6
3	LAS MAJADAS	6	6
4	MOITACO	6	6
5	GUARATARO	6	6
1	TUMEREMO	7	6
2	DALLA COSTA	7	6
3	SAN ISIDRO	7	6
1	CIUDAD PIAR	8	6
2	SAN FRANCISCO	8	6
3	BARCELONETA	8	6
4	SANTA BARBARA	8	6
1	SANTA ELENA DE UAIREN	9	6
2	IKABARU	9	6
1	EL CALLAO	10	6
1	EL PALMAR	11	6
1	BEJUMA	1	7
2	CANOABO	1	7
3	SIMON BOLIVAR	1	7
1	GUIGUE	2	7
2	BELEN	2	7
3	TACARIGUA	2	7
1	MARIARA	3	7
2	AGUAS CALIENTES	3	7
1	GUACARA	4	7
2	CIUDAD ALIANZA	4	7
3	YAGUA	4	7
1	MONTALBAN	5	7
1	MORON	6	7
2	URAMA	6	7
1	DEMOCRACIA	7	7
2	FRATERNIDAD	7	7
3	GOAIGOAZA	7	7
4	JUAN JOSE FLORES	7	7
5	BARTOLOME SALOM	7	7
6	UNION	7	7
7	BORBURATA	7	7
8	PATANEMO	7	7
1	SAN JOAQUIN	8	7
1	CANDELARIA	9	7
2	CATEDRAL	9	7
3	EL SOCORRO	9	7
5	SAN BLAS	9	7
6	SAN JOSE	9	7
7	SANTA ROSA	9	7
8	RAFAEL URDANETA	9	7
1	MIRANDA	10	7
1	U LOS GUAYOS	11	7
1	NAGUANAGUA	12	7
1	URB SAN DIEGO	13	7
1	U TOCUYITO	14	7
2	U INDEPENDENCIA	14	7
1	Miguel Peña	15	7
2	Negro Primero	15	7
1	COJEDES	1	8
2	JUAN DE MATA SUAREZ	1	8
1	TINAQUILLO	2	8
1	EL BAUL	3	8
2	SUCRE	3	8
1	EL PAO	4	8
1	LIBERTAD DE COJEDES	5	8
2	EL AMPARO	5	8
1	SAN CARLOS DE AUSTRIA	6	8
2	JUAN ANGEL BRAVO	6	8
3	MANUEL MANRIQUE	6	8
1	General en Jefe JOSE L SILVA	7	8
1	MACAPO	8	8
2	LA AGUADITA	8	8
1	ROMULO GALLEGOS	9	8
1	SAN JUAN DE LOS CAYOS	1	9
2	CAPADARE	1	9
3	LA PASTORA	1	9
4	LIBERTADOR	1	9
1	SAN LUIS	2	9
2	ARACUA	2	9
3	LA PEÑA	2	9
1	CAPATARIDA	3	9
2	BOROJO	3	9
3	SEQUE	3	9
4	ZAZARIDA	3	9
5	BARIRO	3	9
6	GUAJIRO	3	9
1	NORTE	4	9
2	CARIRUBANA	4	9
3	PUNTA CARDON	4	9
4	SANTA ANA	4	9
1	LA VELA DE CORO	5	9
2	ACURIGUA	5	9
3	GUAIBACOA	5	9
4	MACORUCA	5	9
5	LAS CALDERAS	5	9
1	PEDREGAL	6	9
2	AGUA CLARA	6	9
3	AVARIA	6	9
4	PIEDRA GRANDE	6	9
5	PURURECHE	6	9
1	PUEBLO NUEVO	7	9
2	ADICORA	7	9
3	BARAIVED	7	9
4	BUENA VISTA	7	9
5	JADACAQUIVA	7	9
6	MORUY	7	9
7	EL VINCULO	7	9
8	EL HATO	7	9
9	ADAURE	7	9
1	CHURUGUARA	8	9
2	AGUA LARGA	8	9
3	INDEPENDENCIA	8	9
4	MAPARARI	8	9
5	EL PAUJI	8	9
1	MENE DE MAUROA	9	9
2	CASIGUA	9	9
3	SAN FELIX	9	9
1	SAN ANTONIO	10	9
2	SAN GABRIEL	10	9
3	SANTA ANA	10	9
4	GUZMAN GUILLERMO	10	9
5	MITARE	10	9
6	SABANETA	10	9
7	RIO SECO	10	9
1	CABURE	11	9
2	CURIMAGUA	11	9
3	COLINA	11	9
1	TUCACAS	12	9
2	BOCA DE AROA	12	9
1	PUERTO CUMAREBO	13	9
2	LA CIENAGA	13	9
3	LA SOLEDAD	13	9
4	PUEBLO CUMAREBO	13	9
5	ZAZARIDA	13	9
1	DABAJURO	14	9
1	CHICHIRIVICHE	15	9
2	BOCA DE TOCUYO	15	9
3	TOCUYO DE LA COSTA	15	9
1	LOS TAQUES	16	9
2	JUDIBANA	16	9
1	PIRITU	17	9
2	SAN JOSE DE LA COSTA	17	9
1	STA.CRUZ DE BUCARAL	18	9
2	EL CHARAL	18	9
3	LAS VEGAS DEL TUY	18	9
1	MIRIMIRE	19	9
1	JACURA	20	9
2	AGUA LINDA	20	9
3	ARAURIMA	20	9
1	YARACAL	21	9
1	PALMA SOLA	22	9
1	SUCRE	23	9
2	PECAYA	23	9
1	URUMACO	24	9
2	BRUZUAL	24	9
1	TOCOPERO	25	9
1	VALLE DE LA PASCUA	1	10
2	ESPINO	1	10
1	EL SOMBRERO	2	10
2	SOSA	2	10
1	CALABOZO	3	10
2	EL CALVARIO	3	10
3	EL RASTRO	3	10
4	GUARDATINAJAS	3	10
1	ALTAGRACIA DE ORITUCO	4	10
2	LEZAMA	4	10
3	LIBERTAD DE ORITUCO	4	10
4	SAN FCO DE MACAIRA	4	10
5	SAN RAFAEL DE ORITUCO	4	10
6	SOUBLETTE	4	10
7	PASO REAL DE MACAIRA	4	10
1	TUCUPIDO	5	10
2	SAN RAFAEL DE LAYA	5	10
1	SAN JUAN DE LOS MORROS	6	10
2	PARAPARA	6	10
3	CANTAGALLO	6	10
1	ZARAZA	7	10
2	SAN JOSE DE UNARE	7	10
1	CAMAGUAN	8	10
2	PUERTO MIRANDA	8	10
3	UVERITO	8	10
1	SAN JOSE DE GUARIBE	9	10
1	LAS MERCEDES	10	10
2	STA RITA DE MANAPIRE	10	10
3	CABRUTA	10	10
1	EL SOCORRO	11	10
1	ORTIZ	12	10
2	SAN FCO. DE TIZNADOS	12	10
3	SAN JOSE DE TIZNADOS	12	10
4	S LORENZO DE TIZNADOS	12	10
1	SANTA MARIA DE IPIRE	13	10
2	ALTAMIRA	13	10
1	CHAGUARAMAS	14	10
1	GUAYABAL	15	10
2	CAZORLA	15	10
1	FREITEZ	1	11
2	JOSE MARIA BLANCO	1	11
1	CATEDRAL	2	11
2	LA CONCEPCION	2	11
3	SANTA ROSA	2	11
4	UNION	2	11
5	EL CUJI	2	11
6	TAMACA	2	11
7	JUAN DE VILLEGAS	2	11
8	AGUEDO F. ALVARADO	2	11
9	BUENA VISTA	2	11
10	JUAREZ	2	11
1	JUAN B RODRIGUEZ	3	11
2	DIEGO DE LOZADA	3	11
3	SAN MIGUEL	3	11
4	CUARA	3	11
5	PARAISO DE SAN JOSE	3	11
6	TINTORERO	3	11
7	JOSE BERNARDO DORANTE	3	11
8	CRNEL. MARIANO PERAZA	3	11
1	BOLIVAR	4	11
2	ANZOATEGUI	4	11
3	GUARICO	4	11
4	HUMOCARO ALTO	4	11
5	HUMOCARO BAJO	4	11
6	MORAN	4	11
7	HILARIO LUNA Y LUNA	4	11
8	LA CANDELARIA	4	11
1	CABUDARE	5	11
2	JOSE G. BASTIDAS	5	11
3	AGUA VIVA	5	11
1	TRINIDAD SAMUEL	6	11
2	ANTONIO DIAZ	6	11
3	CAMACARO	6	11
4	CASTAÑEDA	6	11
5	CHIQUINQUIRA	6	11
6	ESPINOZA LOS MONTEROS	6	11
7	LARA	6	11
8	MANUEL MORILLO	6	11
9	MONTES DE OCA	6	11
10	TORRES	6	11
11	EL BLANCO	6	11
12	MONTA A VERDE	6	11
13	HERIBERTO ARROYO	6	11
14	LAS MERCEDES	6	11
15	CECILIO ZUBILLAGA	6	11
16	REYES VARGAS	6	11
17	ALTAGRACIA	6	11
1	SIQUISIQUE	7	11
2	SAN MIGUEL	7	11
3	XAGUAS	7	11
4	MOROTURO	7	11
1	PIO TAMAYO	8	11
2	YACAMBU	8	11
3	QBDA. HONDA DE GUACHE	8	11
1	SARARE	9	11
2	GUSTAVO VEGAS LEON	9	11
3	BURIA	9	11
1	GABRIEL PICON G.	1	12
2	HECTOR AMABLE MORA	1	12
3	JOSE NUCETE SARDI	1	12
4	PULIDO MENDEZ	1	12
5	PTE. ROMULO GALLEGOS	1	12
6	PRESIDENTE BETANCOURT	1	12
7	PRESIDENTE PAEZ	1	12
1	LA AZULITA	2	12
1	CANAGUA	3	12
2	CAPURI	3	12
3	CHACANTA	3	12
4	EL MOLINO	3	12
5	GUAIMARAL	3	12
6	MUCUTUY	3	12
7	MUCUCHACHI	3	12
1	ACEQUIAS	4	12
2	JAJI	4	12
3	LA MESA	4	12
4	SAN JOSE	4	12
5	MONTALBAN	4	12
6	MATRIZ	4	12
7	FERNANDEZ PEÑA	4	12
1	GUARAQUE	5	12
2	MESA DE QUINTERO	5	12
3	RIO NEGRO	5	12
1	ARAPUEY	6	12
2	PALMIRA	6	12
1	TORONDOY	7	12
2	SAN CRISTOBAL DE T	7	12
1	ARIAS	8	12
2	SAGRARIO	8	12
3	MILLA	8	12
4	EL LLANO	8	12
5	JUAN RODRIGUEZ SUAREZ	8	12
6	JACINTO PLAZA	8	12
7	DOMINGO PEÑA	8	12
8	GONZALO PICON FEBRES	8	12
9	OSUNA RODRIGUEZ	8	12
10	LASSO DE LA VEGA	8	12
11	CARACCIOLO PARRA P	8	12
12	MARIANO PICON SALAS	8	12
13	ANTONIO SPINETTI DINI	8	12
14	EL MORRO	8	12
15	LOS NEVADOS	8	12
1	TABAY	9	12
1	TIMOTES	10	12
2	ANDRES ELOY BLANCO	10	12
3	PIÑANGO	10	12
4	LA VENTA	10	12
1	STA CRUZ DE MORA	11	12
2	MESA BOLIVAR	11	12
3	MESA DE LAS PALMAS	11	12
1	STA ELENA DE ARENALES	12	12
2	ELOY PAREDES	12	12
3	R DE ALCAZAR	12	12
1	TUCANI	13	12
2	FLORENCIO RAMIREZ	13	12
1	SANTO DOMINGO	14	12
2	LAS PIEDRAS	14	12
1	PUEBLO LLANO	15	12
1	MUCUCHIES	16	12
2	MUCURUBA	16	12
3	SAN RAFAEL	16	12
4	CACUTE	16	12
5	LA TOMA	16	12
1	BAILADORES	17	12
2	GERONIMO MALDONADO	17	12
1	LAGUNILLAS	18	12
2	CHIGUARA	18	12
3	ESTANQUES	18	12
4	SAN JUAN	18	12
5	PUEBLO NUEVO DEL SUR	18	12
6	LA TRAMPA	18	12
1	EL LLANO	19	12
2	TOVAR	19	12
3	EL AMPARO	19	12
4	SAN FRANCISCO	19	12
1	NUEVA BOLIVIA	20	12
2	INDEPENDENCIA	20	12
3	MARIA C PALACIOS	20	12
4	SANTA APOLONIA	20	12
1	STA MARIA DE CAPARO	21	12
1	ARICAGUA	22	12
2	SAN ANTONIO	22	12
1	ZEA	23	12
2	CAÑO EL TIGRE	23	12
1	CAUCAGUA	1	13
2	ARAGUITA	1	13
3	AREVALO GONZALEZ	1	13
4	CAPAYA	1	13
5	PANAQUIRE	1	13
6	RIBAS	1	13
7	EL CAFE	1	13
8	MARIZAPA	1	13
1	HIGUEROTE	2	13
2	CURIEPE	2	13
3	TACARIGUA	2	13
1	LOS TEQUES	3	13
4	RIO NEGRO	8	21
2	CECILIO ACOSTA	3	13
3	PARACOTOS	3	13
4	SAN PEDRO	3	13
5	TACATA	3	13
6	EL JARILLO	3	13
7	ALTAGRACIA DE LA M	3	13
1	STA TERESA DEL TUY	4	13
2	EL CARTANAL	4	13
1	OCUMARE DEL TUY	5	13
2	LA DEMOCRACIA	5	13
3	SANTA BARBARA	5	13
1	RIO CHICO	6	13
2	EL GUAPO	6	13
3	TACARIGUA DE LA LAGUNA	6	13
4	PAPARO	6	13
5	SN FERNANDO DEL GUAPO	6	13
1	SANTA LUCIA	7	13
1	GUARENAS	8	13
1	PETARE	9	13
2	LEONCIO MARTINEZ	9	13
3	CAUCAGUITA	9	13
4	FILAS DE MARICHES	9	13
5	LA DOLORITA	9	13
1	CUA	10	13
2	NUEVA CUA	10	13
1	GUATIRE	11	13
2	BOLIVAR	11	13
1	CHARALLAVE	12	13
2	LAS BRISAS	12	13
1	SAN ANTONIO LOS ALTOS	13	13
1	SAN JOSE DE BARLOVENTO	14	13
2	CUMBO	14	13
1	SAN FCO DE YARE	15	13
2	S ANTONIO DE YARE	15	13
1	BARUTA	16	13
2	EL CAFETAL	16	13
3	LAS MINAS DE BARUTA	16	13
1	CARRIZAL	17	13
1	CHACAO	18	13
1	EL HATILLO	19	13
1	MAMPORAL	20	13
1	CUPIRA	21	13
2	MACHURUCUTO	21	13
1	SAN ANTONIO	1	14
2	SAN FRANCISCO	1	14
1	CARIPITO	2	14
1	CARIPE	3	14
2	TERESEN	3	14
3	EL GUACHARO	3	14
4	SAN AGUSTIN	3	14
5	LA GUANOTA	3	14
6	SABANA DE PIEDRA	3	14
1	CAICARA	4	14
2	AREO	4	14
3	SAN FELIX	4	14
4	VIENTO FRESCO	4	14
1	PUNTA DE MATA	5	14
2	EL TEJERO	5	14
1	TEMBLADOR	6	14
2	TABASCA	6	14
3	LAS ALHUACAS	6	14
4	CHAGUARAMAS	6	14
1	EL FURRIAL	7	14
2	JUSEPIN	7	14
3	EL COROZO	7	14
4	SAN VICENTE	7	14
5	LA PICA	7	14
6	ALTO DE LOS GODOS	7	14
7	BOQUERON	7	14
8	LAS COCUIZAS	7	14
9	SANTA CRUZ	7	14
10	SAN SIMON	7	14
1	ARAGUA	8	14
2	CHAGUARAMAL	8	14
3	GUANAGUANA	8	14
4	APARICIO	8	14
5	TAGUAYA	8	14
6	EL PINTO	8	14
7	LA TOSCANA	8	14
1	QUIRIQUIRE	9	14
2	CACHIPO	9	14
1	BARRANCAS	10	14
2	LOS BARRANCOS DE FAJARDO	10	14
1	AGUASAY	11	14
1	SANTA BARBARA	12	14
1	URACOA	13	14
1	LA ASUNCION	1	15
1	SAN JUAN BAUTISTA	2	15
2	ZABALA	2	15
1	SANTA ANA	3	15
2	GUEVARA	3	15
3	MATASIETE	3	15
4	BOLIVAR	3	15
5	SUCRE	3	15
1	PAMPATAR	4	15
2	AGUIRRE	4	15
1	JUAN GRIEGO	5	15
2	ADRIAN	5	15
1	PORLAMAR	6	15
1	BOCA DEL RIO	7	15
2	SAN FRANCISCO	7	15
1	SAN PEDRO DE COCHE	8	15
2	VICENTE FUENTES	8	15
1	PUNTA DE PIEDRAS	9	15
2	LOS BARALES	9	15
1	CM.LA PLAZA DE PARAGUACHI	10	15
1	VALLE ESP SANTO	11	15
2	FRANCISCO FAJARDO	11	15
1	ARAURE	1	16
2	RIO ACARIGUA	1	16
1	PIRITU	2	16
2	UVERAL	2	16
1	GUANARE	3	16
2	CORDOBA	3	16
3	SAN JUAN GUANAGUANARE	3	16
4	VIRGEN DE LA COROMOTO	3	16
5	SAN JOSE DE LA MONTAÑA	3	16
1	GUANARITO	4	16
2	TRINIDAD DE LA CAPILLA	4	16
3	DIVINA PASTORA	4	16
1	OSPINO	5	16
2	APARICION	5	16
3	LA ESTACION	5	16
1	ACARIGUA	6	16
2	PAYARA	6	16
3	PIMPINELA	6	16
4	RAMON PERAZA	6	16
1	BISCUCUY	7	16
2	CONCEPCION	7	16
3	SAN RAFAEL PALO ALZADO	7	16
4	UVENCIO A VELASQUEZ	7	16
5	SAN JOSE DE SAGUAZ	7	16
6	VILLA ROSA	7	16
1	VILLA BRUZUAL	8	16
2	CANELONES	8	16
3	SANTA CRUZ	8	16
4	SAN ISIDRO LABRADOR	8	16
1	CHABASQUEN	9	16
2	PEÑA BLANCA	9	16
1	AGUA BLANCA	10	16
1	PAPELON	11	16
2	CAÑO DELGADITO	11	16
1	BOCONOITO	12	16
2	ANTOLIN TOVAR AQUINO	12	16
1	SAN RAFAEL DE ONOTO	13	16
2	SANTA FE	13	16
3	THERMO MORLES	13	16
1	EL PLAYON	14	16
2	FLORIDA	14	16
1	RIO CARIBE	1	17
2	SAN JUAN GALDONAS	1	17
3	PUERTO SANTO	1	17
4	EL MORRO DE PTO SANTO	1	17
5	ANTONIO JOSE DE SUCRE	1	17
1	EL PILAR	2	17
2	EL RINCON	2	17
3	GUARAUNOS	2	17
4	TUNAPUICITO	2	17
5	UNION	2	17
6	GRAL FCO. A VASQUEZ	2	17
1	SANTA CATALINA	3	17
2	SANTA ROSA	3	17
3	SANTA TERESA	3	17
4	BOLIVAR	3	17
5	MACARAPANA	3	17
1	YAGUARAPARO	4	17
2	LIBERTAD	4	17
3	PAUJIL	4	17
1	IRAPA	5	17
2	CAMPO CLARO	5	17
3	SORO	5	17
4	SAN ANTONIO DE IRAPA	5	17
5	MARABAL	5	17
1	SAN ANT DEL GOLFO	6	17
1	CUMANACOA	7	17
2	ARENAS	7	17
3	ARICAGUA	7	17
4	COCOLLAR	7	17
5	SAN FERNANDO	7	17
6	SAN LORENZO	7	17
1	CARIACO	8	17
2	CATUARO	8	17
3	RENDON	8	17
4	SANTA CRUZ	8	17
5	SANTA MARIA	8	17
1	ALTAGRACIA	9	17
2	AYACUCHO	9	17
3	SANTA INES	9	17
4	VALENTIN VALIENTE	9	17
5	SAN JUAN	9	17
6	Santa Fe	9	17
7	RAUL LEONI	9	17
1	GUIRIA	10	17
2	CRISTOBAL COLON	10	17
3	PUNTA DE PIEDRA	10	17
4	BIDEAU	10	17
1	MARIÑO	11	17
2	ROMULO GALLEGOS	11	17
1	TUNAPUY	12	17
2	CAMPO ELIAS	12	17
1	SAN JOSE DE AREOCUAR	13	17
2	TAVERA ACOSTA	13	17
1	MARIGUITAR	14	17
1	ARAYA	15	17
2	MANICUARE	15	17
3	CHACOPATA	15	17
1	COLON	1	18
2	RIVAS BERTI	1	18
3	SAN PEDRO DEL RIO	1	18
1	SAN ANT DEL TACHIRA	2	18
2	PALOTAL	2	18
3	JUAN VICENTE GOMEZ	2	18
4	ISAIAS MEDINA ANGARIT	2	18
1	CAPACHO NUEVO	3	18
2	JUAN GERMAN ROSCIO	3	18
3	ROMAN CARDENAS	3	18
1	TARIBA	4	18
2	LA FLORIDA	4	18
3	AMENODORO RANGEL LAMU	4	18
1	LA GRITA	5	18
2	EMILIO C. GUERRERO	5	18
3	MONS. MIGUEL A SALAS	5	18
1	RUBIO	6	18
2	BRAMON	6	18
3	LA PETROLEA	6	18
4	QUINIMARI	6	18
1	LOBATERA	7	18
2	CONSTITUCION	7	18
1	LA CONCORDIA	8	18
2	PEDRO MARIA MORANTES	8	18
3	SN JUAN BAUTISTA	8	18
4	SAN SEBASTIAN	8	18
5	DR. FCO. ROMERO LOBO	8	18
1	PREGONERO	9	18
2	CARDENAS	9	18
3	POTOSI	9	18
4	JUAN PABLO PEÑALOSA	9	18
1	STA. ANA  DEL TACHIRA	10	18
1	LA FRIA	11	18
2	BOCA DE GRITA	11	18
3	JOSE ANTONIO PAEZ	11	18
1	PALMIRA	12	18
1	MICHELENA	13	18
1	ABEJALES	14	18
2	SAN JOAQUIN DE NAVAY	14	18
3	DORADAS	14	18
4	EMETERIO OCHOA	14	18
1	COLONCITO	15	18
2	LA PALMITA	15	18
1	UREÑA	16	18
2	NUEVA ARCADIA	16	18
1	QUENIQUEA	17	18
2	SAN PABLO	17	18
3	ELEAZAR LOPEZ CONTRERA	17	18
1	CORDERO	18	18
1	CM.SAN RAFAEL DEL PINAL	19	18
2	SANTO DOMINGO	19	18
3	ALBERTO ADRIANI	19	18
1	CAPACHO VIEJO	20	18
2	CIPRIANO CASTRO	20	18
3	MANUEL FELIPE RUGELES	20	18
1	LA TENDIDA	21	18
2	BOCONO	21	18
3	HERNANDEZ	21	18
1	SEBORUCO	22	18
1	LAS MESAS	23	18
1	SAN JOSE DE BOLIVAR	24	18
1	EL COBRE	25	18
1	DELICIAS	26	18
1	SAN SIMON	27	18
1	SAN JOSECITO	28	18
1	UMUQUENA	29	18
1	BETIJOQUE	1	19
2	JOSE G HERNANDEZ	1	19
3	LA PUEBLITA	1	19
4	EL CEDRO	1	19
1	BOCONO	2	19
2	EL CARMEN	2	19
3	MOSQUEY	2	19
4	AYACUCHO	2	19
5	BURBUSAY	2	19
6	GENERAL RIVAS	2	19
7	MONSEÑOR JAUREGUI	2	19
8	RAFAEL RANGEL	2	19
9	SAN JOSE	2	19
10	SAN MIGUEL	2	19
11	GUARAMACAL	2	19
12	LA VEGA DE GUARAMACAL	2	19
1	CARACHE	3	19
2	LA CONCEPCION	3	19
3	CUICAS	3	19
4	PANAMERICANA	3	19
5	SANTA CRUZ	3	19
1	ESCUQUE	4	19
2	SABANA LIBRE	4	19
3	LA UNION	4	19
4	SANTA RITA	4	19
1	CRISTOBAL MENDOZA	5	19
2	CHIQUINQUIRA	5	19
3	MATRIZ	5	19
4	MONSEÑOR CARRILLO	5	19
5	CRUZ CARRILLO	5	19
6	ANDRES LINARES	5	19
7	TRES ESQUINAS	5	19
1	LA QUEBRADA	6	19
2	JAJO	6	19
3	LA MESA	6	19
4	SANTIAGO	6	19
5	CABIMBU	6	19
6	TUÑAME	6	19
1	MERCEDES DIAZ	7	19
2	JUAN IGNACIO MONTILLA	7	19
3	LA BEATRIZ	7	19
4	MENDOZA	7	19
5	LA PUERTA	7	19
6	SAN LUIS	7	19
1	CHEJENDE	8	19
2	CARRILLO	8	19
3	CEGARRA	8	19
4	BOLIVIA	8	19
5	MANUEL SALVADOR ULLOA	8	19
6	SAN JOSE	8	19
7	ARNOLDO GABALDON	8	19
1	EL DIVIDIVE	9	19
2	AGUA CALIENTE	9	19
3	EL CENIZO	9	19
4	AGUA SANTA	9	19
5	VALERITA	9	19
1	MONTE CARMELO	10	19
2	BUENA VISTA	10	19
3	STA MARIA DEL HORCON	10	19
1	MOTATAN	11	19
2	EL BAÑO	11	19
3	JALISCO	11	19
1	PAMPAN	12	19
2	SANTA ANA	12	19
3	LA PAZ	12	19
4	FLOR DE PATRIA	12	19
1	CARVAJAL	13	19
2	ANTONIO N BRICEÑO	13	19
3	CAMPO ALEGRE	13	19
4	JOSE LEONARDO SUAREZ	13	19
1	SABANA DE MENDOZA	14	19
2	JUNIN	14	19
3	VALMORE RODRIGUEZ	14	19
4	EL PARAISO	14	19
1	SANTA ISABEL	15	19
2	ARAGUANEY	15	19
3	EL JAGUITO	15	19
4	LA ESPERANZA	15	19
1	SABANA GRANDE	16	19
2	CHEREGUE	16	19
3	GRANADOS	16	19
1	EL SOCORRO	17	19
2	LOS CAPRICHOS	17	19
3	ANTONIO JOSE DE SUCRE	17	19
1	CAMPO ELIAS	18	19
2	ARNOLDO GABALDON	18	19
1	SANTA APOLONIA	19	19
2	LA CEIBA	19	19
3	EL PROGRESO	19	19
4	TRES DE FEBRERO	19	19
1	PAMPANITO	20	19
2	PAMPANITO II	20	19
3	LA CONCEPCION	20	19
1	AROA	1	20
1	CHIVACOA	2	20
2	CAMPO ELIAS	2	20
1	NIRGUA	3	20
2	SALOM	3	20
3	TEMERLA	3	20
1	SAN FELIPE	4	20
2	ALBARICO	4	20
3	SAN JAVIER	4	20
1	GUAMA	5	20
1	URACHICHE	6	20
1	YARITAGUA	7	20
2	SAN ANDRES	7	20
1	SABANA DE PARRA	8	20
1	BORAURE	9	20
1	COCOROTE	10	20
1	INDEPENDENCIA	11	20
1	SAN PABLO	12	20
1	YUMARE	13	20
1	FARRIAR	14	20
2	EL GUAYABO	14	20
1	GENERAL URDANETA	1	21
2	LIBERTADOR	1	21
3	MANUEL GUANIPA MATOS	1	21
4	MARCELINO BRICEÑO	1	21
5	SAN TIMOTEO	1	21
6	PUEBLO NUEVO	1	21
1	PEDRO LUCAS URRIBARRI	2	21
2	SANTA RITA	2	21
3	JOSE CENOVIO URRIBARR	2	21
4	EL MENE	2	21
1	SANTA CRUZ DEL ZULIA	3	21
2	URRIBARRI	3	21
3	MORALITO	3	21
4	SAN CARLOS DEL ZULIA	3	21
5	SANTA BARBARA	3	21
1	LUIS DE VICENTE	4	21
2	RICAURTE	4	21
3	MONS.MARCOS SERGIO G	4	21
4	SAN RAFAEL	4	21
5	LAS PARCELAS	4	21
6	TAMARE	4	21
7	LA SIERRITA	4	21
1	BOLIVAR	5	21
2	COQUIVACOA	5	21
3	CRISTO DE ARANZA	5	21
4	CHIQUINQUIRA	5	21
5	SANTA LUCIA	5	21
6	OLEGARIO VILLALOBOS	5	21
7	JUANA DE AVILA	5	21
8	CARACCIOLO PARRA PEREZ	5	21
9	IDELFONZO VASQUEZ	5	21
10	CACIQUE MARA	5	21
11	CECILIO ACOSTA	5	21
12	RAUL LEONI	5	21
13	FRANCISCO EUGENIO B	5	21
14	MANUEL DAGNINO	5	21
15	LUIS HURTADO HIGUERA	5	21
16	VENANCIO PULGAR	5	21
17	ANTONIO BORJAS ROMERO	5	21
18	SAN ISIDRO	5	21
1	FARIA	6	21
2	SAN ANTONIO	6	21
3	ANA MARIA CAMPOS	6	21
4	SAN JOSE	6	21
5	ALTAGRACIA	6	21
1	GOAJIRA	7	21
2	ELIAS SANCHEZ RUBIO	7	21
3	SINAMAICA	7	21
4	ALTA GUAJIRA	7	21
1	SAN JOSE DE PERIJA	8	21
2	BARTOLOME DE LAS CASAS	8	21
3	LIBERTAD	8	21
1	GIBRALTAR	9	21
2	HERAS	9	21
3	M.ARTURO CELESTINO A	9	21
4	ROMULO GALLEGOS	9	21
5	BOBURES	9	21
6	EL BATEY	9	21
1	ANDRES BELLO (KM 48)	10	21
2	POTRERITOS	10	21
3	EL CARMELO	10	21
4	CHIQUINQUIRA	10	21
5	CONCEPCION	10	21
1	ELEAZAR LOPEZ C	11	21
2	ALONSO DE OJEDA	11	21
3	VENEZUELA	11	21
4	CAMPO LARA	11	21
5	LIBERTAD	11	21
1	UDON PEREZ	12	21
2	ENCONTRADOS	12	21
1	DONALDO GARCIA	13	21
2	SIXTO ZAMBRANO	13	21
3	EL ROSARIO	13	21
1	AMBROSIO	14	21
2	GERMAN RIOS LINARES	14	21
3	JORGE HERNANDEZ	14	21
4	LA ROSA	14	21
5	PUNTA GORDA	14	21
6	CARMEN HERRERA	14	21
7	SAN BENITO	14	21
8	ROMULO BETANCOURT	14	21
9	ARISTIDES CALVANI	14	21
1	RAUL CUENCA	15	21
2	LA VICTORIA	15	21
3	RAFAEL URDANETA	15	21
1	JOSE RAMON YEPEZ	16	21
2	LA CONCEPCION	16	21
3	SAN JOSE	16	21
4	MARIANO PARRA LEON	16	21
1	MONAGAS	17	21
2	ISLA DE TOAS	17	21
1	MARCIAL HERNANDEZ	18	21
2	FRANCISCO OCHOA	18	21
3	SAN FRANCISCO	18	21
4	EL BAJO	18	21
5	DOMITILA FLORES	18	21
6	LOS CORTIJOS	18	21
1	BARI	19	21
2	JESUS M SEMPRUN	19	21
1	SIMON RODRIGUEZ	20	21
2	CARLOS QUEVEDO	20	21
3	FRANCISCO J PULGAR	20	21
1	RAFAEL MARIA BARALT	21	21
2	MANUEL MANRIQUE	21	21
3	RAFAEL URDANETA	21	21
1	FERNANDO GIRON TOVAR	1	22
2	LUIS ALBERTO GOMEZ	1	22
3	PARHUEÑA	1	22
4	PLATANILLAL	1	22
1	SAN FERNANDO DE ATABA	2	22
2	UCATA	2	22
3	YAPACANA	2	22
4	CANAME	2	22
1	MAROA	3	22
2	VICTORINO	3	22
3	COMUNIDAD	3	22
1	SAN CARLOS DE RIO NEG	4	22
2	SOLANO	4	22
3	CASIQUIARE	4	22
4	COCUY	4	22
1	ISLA DE RATON	5	22
2	SAMARIAPO	5	22
3	SIPAPO	5	22
4	MUNDUAPO	5	22
5	GUAYAPO	5	22
1	SAN JUAN DE MANAPIARE	6	22
2	ALTO VENTUARI	6	22
3	MEDIO VENTUARI	6	22
4	BAJO VENTUARI	6	22
1	LA ESMERALDA	7	22
2	HUACHAMACARE	7	22
3	MARAWAKA	7	22
4	MAVACA	7	22
5	SIERRA PARIMA	7	22
1	SAN JOSE	1	23
2	VIRGEN DEL VALLE	1	23
3	SAN RAFAEL	1	23
4	JOSE VIDAL MARCANO	1	23
5	LEONARDO RUIZ PINEDA	1	23
6	MONS. ARGIMIRO GARCIA	1	23
7	MCL.ANTONIO J DE SUCRE	1	23
8	JUAN MILLAN	1	23
1	PEDERNALES	2	23
2	LUIS B PRIETO FIGUERO	2	23
1	CURIAPO	3	23
2	SANTOS DE ABELGAS	3	23
3	MANUEL RENAUD	3	23
4	PADRE BARRAL	3	23
5	ANICETO LUGO	3	23
6	ALMIRANTE LUIS BRION	3	23
1	IMATACA	4	23
2	ROMULO GALLEGOS	4	23
3	JUAN BAUTISTA ARISMEN	4	23
4	MANUEL PIAR	4	23
5	5 DE JULIO	4	23
1	CARABALLEDA	1	24
2	CARAYACA	1	24
3	CARUAO	1	24
4	CATIA LA MAR	1	24
5	LA GUAIRA	1	24
6	MACUTO	1	24
7	MAIQUETIA	1	24
8	NAIGUATA	1	24
9	EL JUNKO	1	24
10	RAUL LEONI	1	24
11	CARLOS SOUBLETTE	1	24
\.


--
-- TOC entry 2126 (class 0 OID 28859)
-- Dependencies: 194
-- Data for Name: srcmt_pfg; Type: TABLE DATA; Schema: public; Owner: -
--

COPY "srcmt_pfg" ("id_pfg", "pfg") FROM stdin;
1	AGROECOLOGIA
2	ARQUITECTURA
3	COMUNICACION SOCIAL
4	ECONOMIA POLITICA
5	EDUCACION
6	ESTUDIOS JURIDICOS
7	ESTUDIOS POLITICOS
8	GAS
9	GESTION AMBIENTAL
10	GESTION SALUD
11	GESTION SOCIAL
12	INFORMATICA PARA LA GESTION SOCIAL
13	MEDICINA INTEGRAL
14	RADIOTERAPIA
15	PETROLEO
16	REFINACION Y PETROQUIMICA
\.


--
-- TOC entry 2127 (class 0 OID 28866)
-- Dependencies: 197
-- Data for Name: srcmt_sedes; Type: TABLE DATA; Schema: public; Owner: -
--

COPY "srcmt_sedes" ("id_sedes", "sedes", "direccion") FROM stdin;
1	ARAGUA	\N
2	BARINAS	\N
3	BOLIVAR	\N
4	CARACAS	\N
5	FALCON	\N
6	MONAGAS	\N
7	VALLES DEL TUY	\N
8	ZULIA	\N
\.


--
-- TOC entry 2128 (class 0 OID 28870)
-- Dependencies: 198
-- Data for Name: srcmt_tipo_actividad; Type: TABLE DATA; Schema: public; Owner: -
--

COPY "srcmt_tipo_actividad" ("codigo_tipo_actividad", "tipo_actividad") FROM stdin;
1	Comision
2	Parada
3	Desfile
4	Apoyo
5	Mantenimiento
6	Concentración
7	Seminario
8	Taller
9	Curso
10	Charla
\.


--
-- TOC entry 2057 (class 2606 OID 28890)
-- Dependencies: 186 186
-- Name: cedula_unica; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "srcmt_brigadistas_dado"
    ADD CONSTRAINT "cedula_unica" UNIQUE ("cedula_identidad");


--
-- TOC entry 2067 (class 2606 OID 28892)
-- Dependencies: 191 191
-- Name: cedula_unica_miliciano; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "srcmt_milicianos"
    ADD CONSTRAINT "cedula_unica_miliciano" UNIQUE ("cedula_identidad");


--
-- TOC entry 2055 (class 2606 OID 28894)
-- Dependencies: 184 184
-- Name: pk_actividades; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "srcmt_actividades_icm"
    ADD CONSTRAINT "pk_actividades" PRIMARY KEY ("codigo_actividad_icm");


--
-- TOC entry 2063 (class 2606 OID 28896)
-- Dependencies: 188 188 188 188
-- Name: pk_ciudad; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "srcmt_ciudad"
    ADD CONSTRAINT "pk_ciudad" PRIMARY KEY ("codigo_ciudad", "codigo_estado", "codigo_municipio");


--
-- TOC entry 2060 (class 2606 OID 28898)
-- Dependencies: 186 186
-- Name: pk_codigo_brigadista; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "srcmt_brigadistas_dado"
    ADD CONSTRAINT "pk_codigo_brigadista" PRIMARY KEY ("codigo_brigadista");


--
-- TOC entry 2065 (class 2606 OID 28900)
-- Dependencies: 189 189
-- Name: pk_codigo_estado; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "srcmt_estado"
    ADD CONSTRAINT "pk_codigo_estado" PRIMARY KEY ("codigo_estado");


--
-- TOC entry 2071 (class 2606 OID 28902)
-- Dependencies: 191 191
-- Name: pk_codigo_miliciano; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "srcmt_milicianos"
    ADD CONSTRAINT "pk_codigo_miliciano" PRIMARY KEY ("codigo_miliciano");


--
-- TOC entry 2074 (class 2606 OID 28904)
-- Dependencies: 192 192 192
-- Name: pk_codigo_municipio; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "srcmt_municipio"
    ADD CONSTRAINT "pk_codigo_municipio" PRIMARY KEY ("codigo_municipio", "codigo_estado");


--
-- TOC entry 2052 (class 2606 OID 28906)
-- Dependencies: 182 182
-- Name: pk_codigo_programa; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "srcmt_actividades_academicas"
    ADD CONSTRAINT "pk_codigo_programa" PRIMARY KEY ("codigo_actividad_academica");


--
-- TOC entry 2083 (class 2606 OID 28908)
-- Dependencies: 198 198
-- Name: pk_codigo_tipo_actividad; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "srcmt_tipo_actividad"
    ADD CONSTRAINT "pk_codigo_tipo_actividad" PRIMARY KEY ("codigo_tipo_actividad");


--
-- TOC entry 2037 (class 2606 OID 28910)
-- Dependencies: 174 174
-- Name: pk_id_actividad_academica_brigadista_dado; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "srcmt_actividad_academica_brigadista_dado"
    ADD CONSTRAINT "pk_id_actividad_academica_brigadista_dado" PRIMARY KEY ("id");


--
-- TOC entry 2040 (class 2606 OID 28912)
-- Dependencies: 176 176
-- Name: pk_id_actividad_academica_miliciano; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "srcmt_actividad_academica_miliciano"
    ADD CONSTRAINT "pk_id_actividad_academica_miliciano" PRIMARY KEY ("id");


--
-- TOC entry 2045 (class 2606 OID 28914)
-- Dependencies: 178 178
-- Name: pk_id_actividad_brigadista_dado; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "srcmt_actividad_icm_brigadista_dado"
    ADD CONSTRAINT "pk_id_actividad_brigadista_dado" PRIMARY KEY ("id");


--
-- TOC entry 2049 (class 2606 OID 28916)
-- Dependencies: 180 180
-- Name: pk_id_actividad_miliciano; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "srcmt_actividad_icm_miliciano"
    ADD CONSTRAINT "pk_id_actividad_miliciano" PRIMARY KEY ("id");


--
-- TOC entry 2079 (class 2606 OID 28918)
-- Dependencies: 194 194
-- Name: pk_id_pfg; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "srcmt_pfg"
    ADD CONSTRAINT "pk_id_pfg" PRIMARY KEY ("id_pfg");


--
-- TOC entry 2081 (class 2606 OID 28920)
-- Dependencies: 197 197
-- Name: pk_id_sedes; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "srcmt_sedes"
    ADD CONSTRAINT "pk_id_sedes" PRIMARY KEY ("id_sedes");


--
-- TOC entry 2077 (class 2606 OID 28922)
-- Dependencies: 193 193 193 193
-- Name: pk_parroquia; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "srcmt_parroquia"
    ADD CONSTRAINT "pk_parroquia" PRIMARY KEY ("codigo_parroquia", "codigo_estado", "codigo_municipio");


--
-- TOC entry 2011 (class 2606 OID 28924)
-- Dependencies: 161 161
-- Name: sf_guard_forgot_password_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "sf_guard_forgot_password"
    ADD CONSTRAINT "sf_guard_forgot_password_pkey" PRIMARY KEY ("id");


--
-- TOC entry 2013 (class 2606 OID 28926)
-- Dependencies: 163 163
-- Name: sf_guard_group_name_key; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "sf_guard_group"
    ADD CONSTRAINT "sf_guard_group_name_key" UNIQUE ("name");


--
-- TOC entry 2017 (class 2606 OID 28928)
-- Dependencies: 165 165 165
-- Name: sf_guard_group_permission_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "sf_guard_group_permission"
    ADD CONSTRAINT "sf_guard_group_permission_pkey" PRIMARY KEY ("group_id", "permission_id");


--
-- TOC entry 2015 (class 2606 OID 28930)
-- Dependencies: 163 163
-- Name: sf_guard_group_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "sf_guard_group"
    ADD CONSTRAINT "sf_guard_group_pkey" PRIMARY KEY ("id");


--
-- TOC entry 2019 (class 2606 OID 28932)
-- Dependencies: 166 166
-- Name: sf_guard_permission_name_key; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "sf_guard_permission"
    ADD CONSTRAINT "sf_guard_permission_name_key" UNIQUE ("name");


--
-- TOC entry 2021 (class 2606 OID 28934)
-- Dependencies: 166 166
-- Name: sf_guard_permission_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "sf_guard_permission"
    ADD CONSTRAINT "sf_guard_permission_pkey" PRIMARY KEY ("id");


--
-- TOC entry 2023 (class 2606 OID 28936)
-- Dependencies: 168 168
-- Name: sf_guard_remember_key_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "sf_guard_remember_key"
    ADD CONSTRAINT "sf_guard_remember_key_pkey" PRIMARY KEY ("id");


--
-- TOC entry 2026 (class 2606 OID 28938)
-- Dependencies: 170 170
-- Name: sf_guard_user_email_address_key; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "sf_guard_user"
    ADD CONSTRAINT "sf_guard_user_email_address_key" UNIQUE ("email_address");


--
-- TOC entry 2032 (class 2606 OID 28940)
-- Dependencies: 171 171 171
-- Name: sf_guard_user_group_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "sf_guard_user_group"
    ADD CONSTRAINT "sf_guard_user_group_pkey" PRIMARY KEY ("user_id", "group_id");


--
-- TOC entry 2034 (class 2606 OID 28942)
-- Dependencies: 173 173 173
-- Name: sf_guard_user_permission_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "sf_guard_user_permission"
    ADD CONSTRAINT "sf_guard_user_permission_pkey" PRIMARY KEY ("user_id", "permission_id");


--
-- TOC entry 2028 (class 2606 OID 28944)
-- Dependencies: 170 170
-- Name: sf_guard_user_pkey; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "sf_guard_user"
    ADD CONSTRAINT "sf_guard_user_pkey" PRIMARY KEY ("id");


--
-- TOC entry 2030 (class 2606 OID 28946)
-- Dependencies: 170 170
-- Name: sf_guard_user_username_key; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY "sf_guard_user"
    ADD CONSTRAINT "sf_guard_user_username_key" UNIQUE ("username");


--
-- TOC entry 2035 (class 1259 OID 28947)
-- Dependencies: 174
-- Name: fki_actividades_academicas_brigadistas_dado; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX "fki_actividades_academicas_brigadistas_dado" ON "srcmt_actividad_academica_brigadista_dado" USING "btree" ("codigo_actividad_academica");


--
-- TOC entry 2038 (class 1259 OID 28948)
-- Dependencies: 176
-- Name: fki_actividades_academicas_milicianos; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX "fki_actividades_academicas_milicianos" ON "srcmt_actividad_academica_miliciano" USING "btree" ("codigo_actividad_academica");


--
-- TOC entry 2050 (class 1259 OID 28949)
-- Dependencies: 182
-- Name: fki_actividades_academicas_tipo_actividad; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX "fki_actividades_academicas_tipo_actividad" ON "srcmt_actividades_academicas" USING "btree" ("codigo_tipo_actividad");


--
-- TOC entry 2041 (class 1259 OID 28950)
-- Dependencies: 178
-- Name: fki_actividades_brigadistas_dado; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX "fki_actividades_brigadistas_dado" ON "srcmt_actividad_icm_brigadista_dado" USING "btree" ("codigo_actividad");


--
-- TOC entry 2046 (class 1259 OID 28951)
-- Dependencies: 180
-- Name: fki_actividades_milicianos; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX "fki_actividades_milicianos" ON "srcmt_actividad_icm_miliciano" USING "btree" ("codigo_actividad");


--
-- TOC entry 2042 (class 1259 OID 28952)
-- Dependencies: 178
-- Name: fki_brigadista_dado_actividad_academica; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX "fki_brigadista_dado_actividad_academica" ON "srcmt_actividad_icm_brigadista_dado" USING "btree" ("codigo_brigadista");


--
-- TOC entry 2043 (class 1259 OID 28953)
-- Dependencies: 178
-- Name: fki_brigadista_dado_actividades; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX "fki_brigadista_dado_actividades" ON "srcmt_actividad_icm_brigadista_dado" USING "btree" ("codigo_brigadista");


--
-- TOC entry 2058 (class 1259 OID 28954)
-- Dependencies: 186
-- Name: fki_brigadista_sedes; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX "fki_brigadista_sedes" ON "srcmt_brigadistas_dado" USING "btree" ("sedes");


--
-- TOC entry 2061 (class 1259 OID 28955)
-- Dependencies: 188 188
-- Name: fki_ciudad_municipio; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX "fki_ciudad_municipio" ON "srcmt_ciudad" USING "btree" ("codigo_estado", "codigo_municipio");


--
-- TOC entry 2047 (class 1259 OID 28956)
-- Dependencies: 180
-- Name: fki_milicianos_actividades; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX "fki_milicianos_actividades" ON "srcmt_actividad_icm_miliciano" USING "btree" ("codigo_miliciano");


--
-- TOC entry 2068 (class 1259 OID 28957)
-- Dependencies: 191
-- Name: fki_milicianos_pfg; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX "fki_milicianos_pfg" ON "srcmt_milicianos" USING "btree" ("programa_formacion_grado");


--
-- TOC entry 2069 (class 1259 OID 28958)
-- Dependencies: 191
-- Name: fki_milicianos_sedes; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX "fki_milicianos_sedes" ON "srcmt_milicianos" USING "btree" ("sedes");


--
-- TOC entry 2072 (class 1259 OID 28959)
-- Dependencies: 192
-- Name: fki_municipio_estado; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX "fki_municipio_estado" ON "srcmt_municipio" USING "btree" ("codigo_estado");


--
-- TOC entry 2075 (class 1259 OID 28960)
-- Dependencies: 193 193
-- Name: fki_municipio_parroquia; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX "fki_municipio_parroquia" ON "srcmt_parroquia" USING "btree" ("codigo_municipio", "codigo_estado");


--
-- TOC entry 2053 (class 1259 OID 28961)
-- Dependencies: 184
-- Name: fki_tipo_actividad; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX "fki_tipo_actividad" ON "srcmt_actividades_icm" USING "btree" ("codigo_tipo_actividad");


--
-- TOC entry 2024 (class 1259 OID 28962)
-- Dependencies: 170
-- Name: is_active_idx; Type: INDEX; Schema: public; Owner: -; Tablespace: 
--

CREATE INDEX "is_active_idx" ON "sf_guard_user" USING "btree" ("is_active");


--
-- TOC entry 2098 (class 2606 OID 29154)
-- Dependencies: 2082 182 198
-- Name: fk_actividades_academicas_tipo_actividad; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "srcmt_actividades_academicas"
    ADD CONSTRAINT "fk_actividades_academicas_tipo_actividad" FOREIGN KEY ("codigo_tipo_actividad") REFERENCES "srcmt_tipo_actividad"("codigo_tipo_actividad");


--
-- TOC entry 2094 (class 2606 OID 29134)
-- Dependencies: 184 2054 178
-- Name: fk_actividades_brigadistas_dado; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "srcmt_actividad_icm_brigadista_dado"
    ADD CONSTRAINT "fk_actividades_brigadistas_dado" FOREIGN KEY ("codigo_actividad") REFERENCES "srcmt_actividades_icm"("codigo_actividad_icm");


--
-- TOC entry 2096 (class 2606 OID 29144)
-- Dependencies: 180 2054 184
-- Name: fk_actividades_milicianos; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "srcmt_actividad_icm_miliciano"
    ADD CONSTRAINT "fk_actividades_milicianos" FOREIGN KEY ("codigo_actividad") REFERENCES "srcmt_actividades_icm"("codigo_actividad_icm");


--
-- TOC entry 2095 (class 2606 OID 29139)
-- Dependencies: 2059 178 186
-- Name: fk_brigadista_dado_actividades; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "srcmt_actividad_icm_brigadista_dado"
    ADD CONSTRAINT "fk_brigadista_dado_actividades" FOREIGN KEY ("codigo_brigadista") REFERENCES "srcmt_brigadistas_dado"("codigo_brigadista");


--
-- TOC entry 2092 (class 2606 OID 29124)
-- Dependencies: 186 2059 174
-- Name: fk_brigadista_dado_actividades_academicas; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "srcmt_actividad_academica_brigadista_dado"
    ADD CONSTRAINT "fk_brigadista_dado_actividades_academicas" FOREIGN KEY ("codigo_brigadista") REFERENCES "srcmt_brigadistas_dado"("codigo_brigadista");


--
-- TOC entry 2100 (class 2606 OID 29164)
-- Dependencies: 186 2080 197
-- Name: fk_brigadista_sedes; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "srcmt_brigadistas_dado"
    ADD CONSTRAINT "fk_brigadista_sedes" FOREIGN KEY ("sedes") REFERENCES "srcmt_sedes"("id_sedes");


--
-- TOC entry 2101 (class 2606 OID 28993)
-- Dependencies: 2073 188 188 192 192
-- Name: fk_ciudad_municipio; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "srcmt_ciudad"
    ADD CONSTRAINT "fk_ciudad_municipio" FOREIGN KEY ("codigo_estado", "codigo_municipio") REFERENCES "srcmt_municipio"("codigo_estado", "codigo_municipio");


--
-- TOC entry 2097 (class 2606 OID 29149)
-- Dependencies: 180 2070 191
-- Name: fk_milicianos_actividades; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "srcmt_actividad_icm_miliciano"
    ADD CONSTRAINT "fk_milicianos_actividades" FOREIGN KEY ("codigo_miliciano") REFERENCES "srcmt_milicianos"("codigo_miliciano");


--
-- TOC entry 2093 (class 2606 OID 29129)
-- Dependencies: 191 2070 176
-- Name: fk_milicianos_actividades_academicas; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "srcmt_actividad_academica_miliciano"
    ADD CONSTRAINT "fk_milicianos_actividades_academicas" FOREIGN KEY ("codigo_miliciano") REFERENCES "srcmt_milicianos"("codigo_miliciano");


--
-- TOC entry 2102 (class 2606 OID 29169)
-- Dependencies: 2078 191 194
-- Name: fk_milicianos_pfg; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "srcmt_milicianos"
    ADD CONSTRAINT "fk_milicianos_pfg" FOREIGN KEY ("programa_formacion_grado") REFERENCES "srcmt_pfg"("id_pfg");


--
-- TOC entry 2103 (class 2606 OID 29174)
-- Dependencies: 191 197 2080
-- Name: fk_milicianos_sedes; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "srcmt_milicianos"
    ADD CONSTRAINT "fk_milicianos_sedes" FOREIGN KEY ("sedes") REFERENCES "srcmt_sedes"("id_sedes");


--
-- TOC entry 2104 (class 2606 OID 29018)
-- Dependencies: 192 189 2064
-- Name: fk_municipio_estado; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "srcmt_municipio"
    ADD CONSTRAINT "fk_municipio_estado" FOREIGN KEY ("codigo_estado") REFERENCES "srcmt_estado"("codigo_estado");


--
-- TOC entry 2105 (class 2606 OID 29023)
-- Dependencies: 192 192 193 193 2073
-- Name: fk_municipio_parroquia; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "srcmt_parroquia"
    ADD CONSTRAINT "fk_municipio_parroquia" FOREIGN KEY ("codigo_municipio", "codigo_estado") REFERENCES "srcmt_municipio"("codigo_municipio", "codigo_estado");


--
-- TOC entry 2099 (class 2606 OID 29159)
-- Dependencies: 184 2082 198
-- Name: fk_tipo_actividad; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "srcmt_actividades_icm"
    ADD CONSTRAINT "fk_tipo_actividad" FOREIGN KEY ("codigo_tipo_actividad") REFERENCES "srcmt_tipo_actividad"("codigo_tipo_actividad");


--
-- TOC entry 2084 (class 2606 OID 29084)
-- Dependencies: 2027 161 170
-- Name: sf_guard_forgot_password_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "sf_guard_forgot_password"
    ADD CONSTRAINT "sf_guard_forgot_password_user_id_sf_guard_user_id" FOREIGN KEY ("user_id") REFERENCES "sf_guard_user"("id") ON DELETE CASCADE;


--
-- TOC entry 2085 (class 2606 OID 29089)
-- Dependencies: 163 165 2014
-- Name: sf_guard_group_permission_group_id_sf_guard_group_id; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "sf_guard_group_permission"
    ADD CONSTRAINT "sf_guard_group_permission_group_id_sf_guard_group_id" FOREIGN KEY ("group_id") REFERENCES "sf_guard_group"("id") ON DELETE CASCADE;


--
-- TOC entry 2086 (class 2606 OID 29094)
-- Dependencies: 165 166 2020
-- Name: sf_guard_group_permission_permission_id_sf_guard_permission_id; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "sf_guard_group_permission"
    ADD CONSTRAINT "sf_guard_group_permission_permission_id_sf_guard_permission_id" FOREIGN KEY ("permission_id") REFERENCES "sf_guard_permission"("id") ON DELETE CASCADE;


--
-- TOC entry 2087 (class 2606 OID 29099)
-- Dependencies: 168 170 2027
-- Name: sf_guard_remember_key_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "sf_guard_remember_key"
    ADD CONSTRAINT "sf_guard_remember_key_user_id_sf_guard_user_id" FOREIGN KEY ("user_id") REFERENCES "sf_guard_user"("id") ON DELETE CASCADE;


--
-- TOC entry 2088 (class 2606 OID 29104)
-- Dependencies: 171 2014 163
-- Name: sf_guard_user_group_group_id_sf_guard_group_id; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "sf_guard_user_group"
    ADD CONSTRAINT "sf_guard_user_group_group_id_sf_guard_group_id" FOREIGN KEY ("group_id") REFERENCES "sf_guard_group"("id") ON DELETE CASCADE;


--
-- TOC entry 2089 (class 2606 OID 29109)
-- Dependencies: 171 2027 170
-- Name: sf_guard_user_group_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "sf_guard_user_group"
    ADD CONSTRAINT "sf_guard_user_group_user_id_sf_guard_user_id" FOREIGN KEY ("user_id") REFERENCES "sf_guard_user"("id") ON DELETE CASCADE;


--
-- TOC entry 2090 (class 2606 OID 29114)
-- Dependencies: 166 173 2020
-- Name: sf_guard_user_permission_permission_id_sf_guard_permission_id; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "sf_guard_user_permission"
    ADD CONSTRAINT "sf_guard_user_permission_permission_id_sf_guard_permission_id" FOREIGN KEY ("permission_id") REFERENCES "sf_guard_permission"("id") ON DELETE CASCADE;


--
-- TOC entry 2091 (class 2606 OID 29119)
-- Dependencies: 170 2027 173
-- Name: sf_guard_user_permission_user_id_sf_guard_user_id; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY "sf_guard_user_permission"
    ADD CONSTRAINT "sf_guard_user_permission_user_id_sf_guard_user_id" FOREIGN KEY ("user_id") REFERENCES "sf_guard_user"("id") ON DELETE CASCADE;


-- Completed on 2013-01-27 14:32:25

--
-- PostgreSQL database dump complete
--

