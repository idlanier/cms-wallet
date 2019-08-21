CREATE SEQUENCE public.wallet_seq
    INCREMENT 1
    START 1
    MINVALUE 1
    MAXVALUE 9223372036854775807
    CACHE 1;

CREATE TABLE public.m_wallet
(
    wallet_id bigint NOT NULL DEFAULT nextval('wallet_seq'::regclass),
    wallet_name character varying(100),
    wallet_ref character varying(100),
    wallet_desc text,
    wallet_status_id bigint,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT wallet_pkey PRIMARY KEY (wallet_id)
)
WITH (
    OIDS = FALSE
);

CREATE SEQUENCE public.wallet_status_seq
    INCREMENT 1
    START 1
    MINVALUE 1
    MAXVALUE 9223372036854775807
    CACHE 1;

CREATE TABLE public.m_wallet_status
(
    wallet_status_id bigint NOT NULL DEFAULT nextval('wallet_status_seq'::regclass),
    wallet_status_name character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT wallet_status_pkey PRIMARY KEY (wallet_status_id)
)
WITH (
    OIDS = FALSE
);

CREATE SEQUENCE public.ctgr_seq
    INCREMENT 1
    START 1
    MINVALUE 1
    MAXVALUE 9223372036854775807
    CACHE 1;

CREATE TABLE public.m_ctgr
(
    ctgr_id bigint NOT NULL DEFAULT nextval('ctgr_seq'::regclass),
    ctgr_name character varying(100),
    ctgr_desc text,
    ctgr_status_id bigint,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT ctgr_pkey PRIMARY KEY (ctgr_id)
)
WITH (
    OIDS = FALSE
);

CREATE SEQUENCE public.ctgr_status_seq
    INCREMENT 1
    START 1
    MINVALUE 1
    MAXVALUE 9223372036854775807
    CACHE 1;

CREATE TABLE public.m_ctgr_status
(
    ctgr_status_id bigint NOT NULL DEFAULT nextval('ctgr_status_seq'::regclass),
    ctgr_status_name character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT ctgr_status_pkey PRIMARY KEY (ctgr_status_id)
)
WITH (
    OIDS = FALSE
);

CREATE SEQUENCE public.trx_wallet_seq
    INCREMENT 1
    START 1
    MINVALUE 1
    MAXVALUE 9223372036854775807
    CACHE 1;

CREATE TABLE public.trx_wallet
(
    trx_wallet_id bigint NOT NULL DEFAULT nextval('trx_wallet_seq'::regclass),
    trx_wallet_code character varying(50),
    trx_wallet_desc text,
    trx_wallet_date character varying(8),
    trx_wallet_amount bigint,
    wallet_id bigint,
    ctgr_id bigint,
    trx_status_id bigint,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT trx_wallet_pkey PRIMARY KEY (trx_wallet_id)
)
WITH (
    OIDS = FALSE
);

CREATE SEQUENCE public.trx_status_seq
    INCREMENT 1
    START 1
    MINVALUE 1
    MAXVALUE 9223372036854775807
    CACHE 1;

CREATE TABLE public.trx_status
(
    trx_status_id bigint NOT NULL DEFAULT nextval('trx_status_seq'::regclass),
    trx_status_name character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT trx_status_pkey PRIMARY KEY (trx_status_id)
)
WITH (
    OIDS = FALSE
);

CREATE OR REPLACE FUNCTION f_gen_autonum(character varying, character varying)
  RETURNS character varying AS
$BODY$
DECLARE
    pPrefix        	ALIAS FOR $1;
    pDataType    	ALIAS FOR $2;
    vFirstCounter   bigint;
    vLengthAutonum  bigint;
    vLastCounter    bigint;
    vReturnText     character varying;
    
BEGIN
    vFirstCounter := 1;

    PERFORM 1 FROM pleaf_autonum_datatype WHERE datatype=pDatatype FOR UPDATE;

    IF NOT EXISTS( SELECT 1 FROM pleaf_autonum_datatype_reset_value WHERE datatype=pDataType AND prefix = pPrefix LIMIT 1) THEN
    
    INSERT INTO pleaf_autonum_datatype_reset_value(datatype,prefix,last_counter)
    VALUES(pDataType,pPrefix,vFirstCounter);
    ELSE
    UPDATE pleaf_autonum_datatype_reset_value
    SET last_counter = last_counter+1
    WHERE datatype=pDataType AND prefix = pPrefix;
    END IF;

    SELECT leading_zero INTO vLengthAutonum FROM pleaf_autonum_datatype WHERE datatype=pDatatype;

    SELECT last_counter INTO vLastCounter FROM pleaf_autonum_datatype_reset_value WHERE datatype=pDatatype AND prefix=pPrefix;

    IF vLengthAutonum <> 0 THEN
    SELECT pPrefix||lpad((vLastCounter::text),(vLengthAutonum::integer),'0') INTO vReturnText;
    ELSE
    SELECT pPrefix||vLastCounter::text INTO vReturnText;
   END IF;
    
    RETURN vReturnText;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;


CREATE TABLE public.pleaf_autonum_datatype_reset_value
(
    datatype character varying(100) COLLATE pg_catalog."default",
    prefix character varying(50) COLLATE pg_catalog."default",
    last_counter bigint
)
WITH (
    OIDS = FALSE
)

CREATE TABLE public.pleaf_autonum_datatype
(
    datatype character varying(100) COLLATE pg_catalog."default",
    leading_zero bigint
)
WITH (
    OIDS = FALSE
)