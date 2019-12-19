--
-- PostgreSQL database dump
--

-- Dumped from database version 11.5
-- Dumped by pg_dump version 12.0 (Ubuntu 12.0-2.pgdg18.04+1)

-- Started on 2019-12-18 23:53:55 PST

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 3864 (class 1262 OID 16401)
-- Name: not_pot_shop; Type: DATABASE; Schema: -; Owner: master
--

CREATE DATABASE not_pot_shop WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'en_US.UTF-8' LC_CTYPE = 'en_US.UTF-8';


ALTER DATABASE not_pot_shop OWNER TO master;

\connect not_pot_shop

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 206 (class 1255 OID 16424)
-- Name: uppercase_name(); Type: FUNCTION; Schema: public; Owner: cmanning
--

CREATE FUNCTION public.uppercase_name() RETURNS trigger
    LANGUAGE plpgsql
    AS $$BEGIN
NEW.first_name = UPPER(NEW.first_name);
New.last_name = UPPER(NEW.last_name);
RETURN NEW;
END;$$;


ALTER FUNCTION public.uppercase_name() OWNER TO cmanning;

SET default_tablespace = '';

--
-- TOC entry 202 (class 1259 OID 24651)
-- Name: address; Type: TABLE; Schema: public; Owner: cmanning
--

CREATE TABLE public.address (
    id integer NOT NULL,
    customer integer NOT NULL,
    city text NOT NULL,
    state text NOT NULL,
    street text NOT NULL,
    zip integer NOT NULL
);


ALTER TABLE public.address OWNER TO cmanning;

--
-- TOC entry 201 (class 1259 OID 24649)
-- Name: address_id_seq; Type: SEQUENCE; Schema: public; Owner: cmanning
--

CREATE SEQUENCE public.address_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.address_id_seq OWNER TO cmanning;

--
-- TOC entry 3866 (class 0 OID 0)
-- Dependencies: 201
-- Name: address_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: cmanning
--

ALTER SEQUENCE public.address_id_seq OWNED BY public.address.id;


--
-- TOC entry 197 (class 1259 OID 16407)
-- Name: customer; Type: TABLE; Schema: public; Owner: cmanning
--

CREATE TABLE public.customer (
    first_name text NOT NULL,
    middle_name text,
    last_name text NOT NULL,
    birthdate date NOT NULL,
    email text NOT NULL,
    phone_number text,
    id integer NOT NULL
);


ALTER TABLE public.customer OWNER TO cmanning;

--
-- TOC entry 196 (class 1259 OID 16405)
-- Name: customer_id_seq; Type: SEQUENCE; Schema: public; Owner: cmanning
--

CREATE SEQUENCE public.customer_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.customer_id_seq OWNER TO cmanning;

--
-- TOC entry 3867 (class 0 OID 0)
-- Dependencies: 196
-- Name: customer_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: cmanning
--

ALTER SEQUENCE public.customer_id_seq OWNED BY public.customer.id;


--
-- TOC entry 200 (class 1259 OID 24608)
-- Name: managers; Type: TABLE; Schema: public; Owner: cmanning
--

CREATE TABLE public.managers (
    username text NOT NULL,
    password text NOT NULL
);


ALTER TABLE public.managers OWNER TO cmanning;

--
-- TOC entry 204 (class 1259 OID 24667)
-- Name: ordered_product; Type: TABLE; Schema: public; Owner: cmanning
--

CREATE TABLE public.ordered_product (
    id integer NOT NULL,
    order_id integer NOT NULL,
    product_id integer NOT NULL,
    quantity integer NOT NULL
);


ALTER TABLE public.ordered_product OWNER TO cmanning;

--
-- TOC entry 205 (class 1259 OID 24678)
-- Name: most_popular_products; Type: VIEW; Schema: public; Owner: cmanning
--

CREATE VIEW public.most_popular_products WITH (security_barrier='false') AS
 SELECT ordered_product.product_id,
    ordered_product.quantity
   FROM public.ordered_product
  GROUP BY ordered_product.product_id, ordered_product.quantity
  ORDER BY (sum(ordered_product.quantity)) DESC;


ALTER TABLE public.most_popular_products OWNER TO cmanning;

--
-- TOC entry 203 (class 1259 OID 24665)
-- Name: ordered_product_id_seq; Type: SEQUENCE; Schema: public; Owner: cmanning
--

CREATE SEQUENCE public.ordered_product_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ordered_product_id_seq OWNER TO cmanning;

--
-- TOC entry 3868 (class 0 OID 0)
-- Dependencies: 203
-- Name: ordered_product_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: cmanning
--

ALTER SEQUENCE public.ordered_product_id_seq OWNED BY public.ordered_product.id;


--
-- TOC entry 199 (class 1259 OID 24599)
-- Name: product; Type: TABLE; Schema: public; Owner: cmanning
--

CREATE TABLE public.product (
    id integer NOT NULL,
    name text NOT NULL,
    price integer NOT NULL,
    description text NOT NULL,
    type text NOT NULL
);


ALTER TABLE public.product OWNER TO cmanning;

--
-- TOC entry 198 (class 1259 OID 24597)
-- Name: product_id_seq; Type: SEQUENCE; Schema: public; Owner: cmanning
--

CREATE SEQUENCE public.product_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.product_id_seq OWNER TO cmanning;

--
-- TOC entry 3869 (class 0 OID 0)
-- Dependencies: 198
-- Name: product_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: cmanning
--

ALTER SEQUENCE public.product_id_seq OWNED BY public.product.id;


--
-- TOC entry 3713 (class 2604 OID 24654)
-- Name: address id; Type: DEFAULT; Schema: public; Owner: cmanning
--

ALTER TABLE ONLY public.address ALTER COLUMN id SET DEFAULT nextval('public.address_id_seq'::regclass);


--
-- TOC entry 3711 (class 2604 OID 16410)
-- Name: customer id; Type: DEFAULT; Schema: public; Owner: cmanning
--

ALTER TABLE ONLY public.customer ALTER COLUMN id SET DEFAULT nextval('public.customer_id_seq'::regclass);


--
-- TOC entry 3714 (class 2604 OID 24670)
-- Name: ordered_product id; Type: DEFAULT; Schema: public; Owner: cmanning
--

ALTER TABLE ONLY public.ordered_product ALTER COLUMN id SET DEFAULT nextval('public.ordered_product_id_seq'::regclass);


--
-- TOC entry 3712 (class 2604 OID 24602)
-- Name: product id; Type: DEFAULT; Schema: public; Owner: cmanning
--

ALTER TABLE ONLY public.product ALTER COLUMN id SET DEFAULT nextval('public.product_id_seq'::regclass);


--
-- TOC entry 3856 (class 0 OID 24651)
-- Dependencies: 202
-- Data for Name: address; Type: TABLE DATA; Schema: public; Owner: cmanning
--

INSERT INTO public.address (id, customer, city, state, street, zip) VALUES (1, 1, 'Charleston', 'SC', '733 Ridge Oak Trail', 67146);
INSERT INTO public.address (id, customer, city, state, street, zip) VALUES (2, 2, 'Oklahoma City', 'OK', '818 Hooker Avenue', 45529);
INSERT INTO public.address (id, customer, city, state, street, zip) VALUES (3, 3, 'Durham', 'NC', '327 Roxbury Junction', 10833);
INSERT INTO public.address (id, customer, city, state, street, zip) VALUES (4, 4, 'Memphis', 'TN', '2464 Alpine Crossing', 14466);
INSERT INTO public.address (id, customer, city, state, street, zip) VALUES (5, 5, 'Peoria', 'IL', '311 Norway Maple Center', 30627);
INSERT INTO public.address (id, customer, city, state, street, zip) VALUES (6, 6, 'Sacramento', 'CA', '76 8th Point', 22021);
INSERT INTO public.address (id, customer, city, state, street, zip) VALUES (7, 7, 'Dallas', 'TX', '943 Pond Drive', 58869);
INSERT INTO public.address (id, customer, city, state, street, zip) VALUES (8, 8, 'Las Vegas', 'NV', '3675 Eagan Park', 35499);
INSERT INTO public.address (id, customer, city, state, street, zip) VALUES (9, 9, 'Washington', 'DC', '4 Shoshone Pass', 52812);
INSERT INTO public.address (id, customer, city, state, street, zip) VALUES (10, 10, 'Tyler', 'TX', '34318 Grayhawk Crossing', 26538);


--
-- TOC entry 3851 (class 0 OID 16407)
-- Dependencies: 197
-- Data for Name: customer; Type: TABLE DATA; Schema: public; Owner: cmanning
--

INSERT INTO public.customer (first_name, middle_name, last_name, birthdate, email, phone_number, id) VALUES ('Micheal', NULL, 'De Nisco', '1996-01-19', 'kdenisco0@google.pl', NULL, 1);
INSERT INTO public.customer (first_name, middle_name, last_name, birthdate, email, phone_number, id) VALUES ('Rhianna', 'Nat', 'Carlsson', '1993-08-03', 'ncarlsson1@people.com.cn', '427-868-2694', 2);
INSERT INTO public.customer (first_name, middle_name, last_name, birthdate, email, phone_number, id) VALUES ('Humbert', 'Lindie', 'Gasperi', '2000-08-13', 'lgasperi2@cnn.com', '248-552-0606', 3);
INSERT INTO public.customer (first_name, middle_name, last_name, birthdate, email, phone_number, id) VALUES ('Adi', 'Felice', 'Pley', '1997-06-06', 'fpley3@chron.com', '445-672-9892', 4);
INSERT INTO public.customer (first_name, middle_name, last_name, birthdate, email, phone_number, id) VALUES ('Belicia', 'Clementia', 'Place', '1990-04-07', 'cplace4@tmall.com', '650-890-2968', 5);
INSERT INTO public.customer (first_name, middle_name, last_name, birthdate, email, phone_number, id) VALUES ('Darya', 'Faye', 'Mansel', '1997-08-09', 'fmansel5@behance.net', '378-132-1145', 6);
INSERT INTO public.customer (first_name, middle_name, last_name, birthdate, email, phone_number, id) VALUES ('Ara', 'Hurlee', 'McFee', '1991-07-17', 'hmcfee6@example.com', '759-584-9190', 7);
INSERT INTO public.customer (first_name, middle_name, last_name, birthdate, email, phone_number, id) VALUES ('Bili', 'Coralyn', 'Hands', '1992-06-23', 'chands7@over-blog.com', '832-194-2348', 8);
INSERT INTO public.customer (first_name, middle_name, last_name, birthdate, email, phone_number, id) VALUES ('Bondon', 'Lorilee', 'Bettanay', '1999-02-26', 'lbettanay8@wunderground.com', '252-445-2784', 9);
INSERT INTO public.customer (first_name, middle_name, last_name, birthdate, email, phone_number, id) VALUES ('Doralia', 'Fernando', 'Alcorn', '1991-07-21', 'falcorn9@wsj.com', '516-411-9307', 10);
INSERT INTO public.customer (first_name, middle_name, last_name, birthdate, email, phone_number, id) VALUES ('CHAD', 'a', 'MANNING', '1996-06-04', 'cmanning@csub.edu', '661-612-6120', 11);


--
-- TOC entry 3854 (class 0 OID 24608)
-- Dependencies: 200
-- Data for Name: managers; Type: TABLE DATA; Schema: public; Owner: cmanning
--

INSERT INTO public.managers (username, password) VALUES ('tpickles', 'tpickles');


--
-- TOC entry 3858 (class 0 OID 24667)
-- Dependencies: 204
-- Data for Name: ordered_product; Type: TABLE DATA; Schema: public; Owner: cmanning
--

INSERT INTO public.ordered_product (id, order_id, product_id, quantity) VALUES (1, 2, 17, 1);
INSERT INTO public.ordered_product (id, order_id, product_id, quantity) VALUES (2, 3, 13, 2);
INSERT INTO public.ordered_product (id, order_id, product_id, quantity) VALUES (3, 1, 10, 3);
INSERT INTO public.ordered_product (id, order_id, product_id, quantity) VALUES (4, 3, 12, 1);
INSERT INTO public.ordered_product (id, order_id, product_id, quantity) VALUES (5, 1, 4, 3);


--
-- TOC entry 3853 (class 0 OID 24599)
-- Dependencies: 199
-- Data for Name: product; Type: TABLE DATA; Schema: public; Owner: cmanning
--

INSERT INTO public.product (id, name, price, description, type) VALUES (1, 'Ben Franklin Pre - Roll', 1199, 'a half gram preroll', 'smoke');
INSERT INTO public.product (id, name, price, description, type) VALUES (2, 'CBD FX Dabs', 3999, 'one gram of CBD wax', 'smoke');
INSERT INTO public.product (id, name, price, description, type) VALUES (3, 'Cherry Wine CBD Flower', 4499, 'Seven grams of CBD flower', 'smoke');
INSERT INTO public.product (id, name, price, description, type) VALUES (4, 'GuinessStout Pre - Roll', 1199, 'A one gram pre-rolled joint', 'smoke');
INSERT INTO public.product (id, name, price, description, type) VALUES (5, 'GuinessStout CBD Flower', 4499, 'Seven grams of CBD flower', 'smoke');
INSERT INTO public.product (id, name, price, description, type) VALUES (6, 'iHemp CBD Dabs', 3999, 'One gram of CBD wax', 'smoke');
INSERT INTO public.product (id, name, price, description, type) VALUES (7, 'Aderley Edge CBD Cola', 999, 'A CBD cola with 10mg per serving!', 'edible');
INSERT INTO public.product (id, name, price, description, type) VALUES (8, 'Chill Gummy Bears', 1499, 'Gummy Bears infused with CBD and Melatonin', 'edible');
INSERT INTO public.product (id, name, price, description, type) VALUES (9, 'Jolly Watermelon Slices', 2199, 'Sour watermelon slices', 'edible');
INSERT INTO public.product (id, name, price, description, type) VALUES (10, 'Kiva Chocolate Bar', 1299, 'A CBD infused chocolate bar', 'edible');
INSERT INTO public.product (id, name, price, description, type) VALUES (11, 'Punch Bar Chocolate', 1199, 'Dark chocolate cbd infused treat', 'edible');
INSERT INTO public.product (id, name, price, description, type) VALUES (12, 'Relax Gummy Frogs', 899, 'CBD infused gummy frogs', 'edible');
INSERT INTO public.product (id, name, price, description, type) VALUES (13, 'Aponi Elixer', 2999, 'A 500mg tincture by Aponi', 'drops');
INSERT INTO public.product (id, name, price, description, type) VALUES (14, 'Halo Hemp Oil', 9999, 'A 4500mg tincture by Halo', 'drops');
INSERT INTO public.product (id, name, price, description, type) VALUES (15, 'Ignite CBD Drops', 6999, 'A 1000mg ticture by Ignite', 'drops');
INSERT INTO public.product (id, name, price, description, type) VALUES (16, 'Koi Naturals', 1999, 'A 500mg tincture by Koi', 'drops');
INSERT INTO public.product (id, name, price, description, type) VALUES (17, 'Pappa and Barkley', 5999, 'A 450mg tincture by Pappa and Barkley', 'drops');
INSERT INTO public.product (id, name, price, description, type) VALUES (18, 'The Cure All Tincture', 4999, 'A 500mg tincture by CBD The Cure All', 'drops');


--
-- TOC entry 3870 (class 0 OID 0)
-- Dependencies: 201
-- Name: address_id_seq; Type: SEQUENCE SET; Schema: public; Owner: cmanning
--

SELECT pg_catalog.setval('public.address_id_seq', 1, false);


--
-- TOC entry 3871 (class 0 OID 0)
-- Dependencies: 196
-- Name: customer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: cmanning
--

SELECT pg_catalog.setval('public.customer_id_seq', 7, true);


--
-- TOC entry 3872 (class 0 OID 0)
-- Dependencies: 203
-- Name: ordered_product_id_seq; Type: SEQUENCE SET; Schema: public; Owner: cmanning
--

SELECT pg_catalog.setval('public.ordered_product_id_seq', 1, false);


--
-- TOC entry 3873 (class 0 OID 0)
-- Dependencies: 198
-- Name: product_id_seq; Type: SEQUENCE SET; Schema: public; Owner: cmanning
--

SELECT pg_catalog.setval('public.product_id_seq', 18, true);


--
-- TOC entry 3720 (class 2606 OID 24615)
-- Name: managers Managers_pkey; Type: CONSTRAINT; Schema: public; Owner: cmanning
--

ALTER TABLE ONLY public.managers
    ADD CONSTRAINT "Managers_pkey" PRIMARY KEY (username);


--
-- TOC entry 3722 (class 2606 OID 24659)
-- Name: address address_pkey; Type: CONSTRAINT; Schema: public; Owner: cmanning
--

ALTER TABLE ONLY public.address
    ADD CONSTRAINT address_pkey PRIMARY KEY (id);


--
-- TOC entry 3716 (class 2606 OID 16415)
-- Name: customer customer_pkey; Type: CONSTRAINT; Schema: public; Owner: cmanning
--

ALTER TABLE ONLY public.customer
    ADD CONSTRAINT customer_pkey PRIMARY KEY (id);


--
-- TOC entry 3724 (class 2606 OID 24672)
-- Name: ordered_product ordered_product_pkey; Type: CONSTRAINT; Schema: public; Owner: cmanning
--

ALTER TABLE ONLY public.ordered_product
    ADD CONSTRAINT ordered_product_pkey PRIMARY KEY (id);


--
-- TOC entry 3718 (class 2606 OID 24607)
-- Name: product product_pkey; Type: CONSTRAINT; Schema: public; Owner: cmanning
--

ALTER TABLE ONLY public.product
    ADD CONSTRAINT product_pkey PRIMARY KEY (id);


--
-- TOC entry 3727 (class 2620 OID 16427)
-- Name: customer toUpper; Type: TRIGGER; Schema: public; Owner: cmanning
--

CREATE TRIGGER "toUpper" BEFORE INSERT OR UPDATE OF first_name, last_name ON public.customer FOR EACH ROW EXECUTE PROCEDURE public.uppercase_name();


--
-- TOC entry 3725 (class 2606 OID 24660)
-- Name: address customer_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: cmanning
--

ALTER TABLE ONLY public.address
    ADD CONSTRAINT customer_id_fk FOREIGN KEY (customer) REFERENCES public.customer(id);


--
-- TOC entry 3726 (class 2606 OID 24673)
-- Name: ordered_product product_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: cmanning
--

ALTER TABLE ONLY public.ordered_product
    ADD CONSTRAINT product_id_fk FOREIGN KEY (product_id) REFERENCES public.product(id);


--
-- TOC entry 3865 (class 0 OID 0)
-- Dependencies: 3
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: master
--

REVOKE ALL ON SCHEMA public FROM rdsadmin;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO master;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2019-12-18 23:54:07 PST

--
-- PostgreSQL database dump complete
--

