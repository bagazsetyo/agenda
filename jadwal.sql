PGDMP     ;        
        	    y            jadwal    14.0    14.0 )               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    16394    jadwal    DATABASE     j   CREATE DATABASE jadwal WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'English_United States.1252';
    DROP DATABASE jadwal;
                bagas123    false            �            1259    16464    failed_jobs    TABLE     �   CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap    bagas123    false            �            1259    16463    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public          bagas123    false    214                       0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public          bagas123    false    213            �            1259    16446 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    bagas123    false            �            1259    16445    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          bagas123    false    210                       0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          bagas123    false    209            �            1259    16474 	   tb_agenda    TABLE     �   CREATE TABLE public.tb_agenda (
    id bigint NOT NULL,
    judul character varying(255) NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.tb_agenda;
       public         heap    bagas123    false            �            1259    16473    tb_agenda_id_seq    SEQUENCE     y   CREATE SEQUENCE public.tb_agenda_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.tb_agenda_id_seq;
       public          bagas123    false    216                        0    0    tb_agenda_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.tb_agenda_id_seq OWNED BY public.tb_agenda.id;
          public          bagas123    false    215            �            1259    16481    tb_detail_agenda    TABLE     �  CREATE TABLE public.tb_detail_agenda (
    id bigint NOT NULL,
    agenda_id bigint NOT NULL,
    judul character varying(255) NOT NULL,
    start character varying(255) NOT NULL,
    "end" character varying(255) NOT NULL,
    detail text NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 $   DROP TABLE public.tb_detail_agenda;
       public         heap    bagas123    false            �            1259    16480    tb_detail_agenda_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tb_detail_agenda_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.tb_detail_agenda_id_seq;
       public          bagas123    false    218            !           0    0    tb_detail_agenda_id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.tb_detail_agenda_id_seq OWNED BY public.tb_detail_agenda.id;
          public          bagas123    false    217            �            1259    16453    users    TABLE     x  CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.users;
       public         heap    bagas123    false            �            1259    16452    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          bagas123    false    212            "           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          bagas123    false    211            r           2604    16467    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public          bagas123    false    214    213    214            p           2604    16449    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          bagas123    false    210    209    210            t           2604    16477    tb_agenda id    DEFAULT     l   ALTER TABLE ONLY public.tb_agenda ALTER COLUMN id SET DEFAULT nextval('public.tb_agenda_id_seq'::regclass);
 ;   ALTER TABLE public.tb_agenda ALTER COLUMN id DROP DEFAULT;
       public          bagas123    false    215    216    216            u           2604    16484    tb_detail_agenda id    DEFAULT     z   ALTER TABLE ONLY public.tb_detail_agenda ALTER COLUMN id SET DEFAULT nextval('public.tb_detail_agenda_id_seq'::regclass);
 B   ALTER TABLE public.tb_detail_agenda ALTER COLUMN id DROP DEFAULT;
       public          bagas123    false    217    218    218            q           2604    16456    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          bagas123    false    211    212    212                      0    16464    failed_jobs 
   TABLE DATA           [   COPY public.failed_jobs (id, connection, queue, payload, exception, failed_at) FROM stdin;
    public          bagas123    false    214   �.                 0    16446 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          bagas123    false    210   �.                 0    16474 	   tb_agenda 
   TABLE DATA           R   COPY public.tb_agenda (id, judul, deleted_at, created_at, updated_at) FROM stdin;
    public          bagas123    false    216   {/                 0    16481    tb_detail_agenda 
   TABLE DATA           z   COPY public.tb_detail_agenda (id, agenda_id, judul, start, "end", detail, deleted_at, created_at, updated_at) FROM stdin;
    public          bagas123    false    218   �/                 0    16453    users 
   TABLE DATA           u   COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
    public          bagas123    false    212   �0       #           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public          bagas123    false    213            $           0    0    migrations_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.migrations_id_seq', 4, true);
          public          bagas123    false    209            %           0    0    tb_agenda_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.tb_agenda_id_seq', 5, true);
          public          bagas123    false    215            &           0    0    tb_detail_agenda_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.tb_detail_agenda_id_seq', 5, true);
          public          bagas123    false    217            '           0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 1, false);
          public          bagas123    false    211            }           2606    16472    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public            bagas123    false    214            w           2606    16451    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            bagas123    false    210                       2606    16479    tb_agenda tb_agenda_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.tb_agenda
    ADD CONSTRAINT tb_agenda_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.tb_agenda DROP CONSTRAINT tb_agenda_pkey;
       public            bagas123    false    216            �           2606    16488 &   tb_detail_agenda tb_detail_agenda_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.tb_detail_agenda
    ADD CONSTRAINT tb_detail_agenda_pkey PRIMARY KEY (id);
 P   ALTER TABLE ONLY public.tb_detail_agenda DROP CONSTRAINT tb_detail_agenda_pkey;
       public            bagas123    false    218            y           2606    16462    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public            bagas123    false    212            {           2606    16460    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            bagas123    false    212            �           2606    16489 3   tb_detail_agenda tb_detail_agenda_agenda_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.tb_detail_agenda
    ADD CONSTRAINT tb_detail_agenda_agenda_id_foreign FOREIGN KEY (agenda_id) REFERENCES public.tb_agenda(id) ON DELETE CASCADE;
 ]   ALTER TABLE ONLY public.tb_detail_agenda DROP CONSTRAINT tb_detail_agenda_agenda_id_foreign;
       public          bagas123    false    3199    218    216                  x������ � �         r   x�]�K�0�usd;ѻT9� ��Jmz�&H��z3�F�����i6,�M3���vRa���	>�=XB?Ɲ���J^}�?�#�e��'�D�p�\�w��sn�9         s   x�m�A
� @ѵs
/P8�"x�N�F(h�L��B�f���Q=��PӨ�vh:�]�&X/5�ft�b��$BGR����u���w�
S��~���Ke�b0�mk�>����������@�         �   x�m�M
�0FדS�)��X�J)]��X�M@��k���x3<�����>�e��G�*�ʜ�qjz)�P]X���fu�o�<+��JP7S�Y�G�	�[������%e��K�Fn�)8&H=Gji3Zeq�kZ�hZ�	~��@o��7t�m��9'v�c�:	!�x_=            x������ � �     