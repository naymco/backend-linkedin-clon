CREATE DATABASE IF NOT EXISTS linkedin_clon;
USE linkedin_clon;

CREATE TABLE IF NOT EXISTS users
(
    id              int(255) auto_increment not null,
    user_profile_id int(255),
    role            varchar(20) NULL ,
    name            varchar(100),
    surname         varchar(200) NULL ,
    email           varchar(255) unique,
    address         varchar(255) NULL ,
    zip_code        int(10) NULL ,
    province        varchar(20) NULL ,
    country         varchar(20) NULL ,
    phone           int(10) NULL ,
    password        varchar(255),
    image           varchar(255) NULL ,
    create_at       datetime,
    update_at       datetime,
    CONSTRAINT pk_users PRIMARY KEY (id)


) ENGINE = InnoDB;
#

CREATE TABLE IF NOT EXISTS user_profile
(
    id                     int(255) auto_increment not null,
    user_id                int(255),
    about_me               text,
    work_experience        text,
    education              text,
    skills_and_validations text,
    interests              text,
    created_at             datetime,
    updated_at             datetime,
    CONSTRAINT pk_users_profile PRIMARY KEY (id),
    CONSTRAINT fk_users_profile_users FOREIGN KEY (user_id) REFERENCES users (id)
) ENGINE = innoDB;


CREATE TABLE IF NOT EXISTS company
(
    id         int(255) auto_increment not null,
    name       varchar(255),
    about_us   text,
    image      varchar(255),
    cif        varchar(255),
    email      varchar(255),
    webpage    varchar(255),
    address    varchar(255),
    zip_code   int(10),
    province   varchar(30),
    country    varchar(30),
    phone      int(10),
    created_at datetime,
    updated_at datetime,
    CONSTRAINT pk_company PRIMARY KEY (id)
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS company_profile
(
    id         int(255) auto_increment not null,
    company_id int(255),
    image_id   int(255),
    comment_id int(255),
    offer_id   int(255),
    like_id    int(255),
    title      varchar(255),
    post       text,
    created_at datetime,
    updated_at datetime,
    CONSTRAINT pk_company_profile PRIMARY KEY (id),
    CONSTRAINT fk_company_profile_company FOREIGN KEY (company_id) REFERENCES company (id),
    CONSTRAINT fk_company_profile_image FOREIGN KEY (image_id) REFERENCES images (id),
    CONSTRAINT fk_company_profile_like FOREIGN KEY (like_id) REFERENCES likes (id),
    CONSTRAINT fk_company_profile_comment FOREIGN KEY (comment_id) REFERENCES comments (id),
    CONSTRAINT fk_company_profile_offer FOREIGN KEY (offer_id) REFERENCES company_offer (id)
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS company_offer
(
    id          int(255) auto_increment not null,
    user_id     int(255),
    company_id  int(255),
    job_offer   varchar(255),
    description text,
    created_at  datetime,
    updated_at  datetime,
    CONSTRAINT pk_company_offer PRIMARY KEY (id),
    CONSTRAINT fk_company_offer_users FOREIGN KEY (user_id) REFERENCES users (id),
    CONSTRAINT fk_company_offer_company FOREIGN KEY (company_id) REFERENCES company (id)
) ENGINE = InnoDB;

# INSERT INTO company_offer VALUES (NULL, NULL, 1, 'Oferta para SuperHeroe', 'Se busca heroe para salvar a gatito', CURTIME(), CURTIME());

CREATE TABLE IF NOT EXISTS state_add
(
    id                 int(255) auto_increment not null,
    user_id            int(255),
    company_id         int(255),
    checking_state_add varchar(20),
    success_state_add  varchar(20),
    rejected_state_add varchar(20),
    created_at         datetime,
    updated_at         datetime,
    CONSTRAINT pk_state_add PRIMARY KEY (id),
    CONSTRAINT fk_company_state_users FOREIGN KEY (user_id) REFERENCES users (id),
    CONSTRAINT fk_company_state_company FOREIGN KEY (company_id) REFERENCES company (id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS images
(
    id          int(255) auto_increment not null,
    user_id     int(255),
    company_id  int(255),
    image_path  varchar(255),
    description text,
    created_at  datetime,
    updated_at  datetime,
    CONSTRAINT pk_images PRIMARY KEY (id),
    CONSTRAINT fk_images_users FOREIGN KEY (user_id) REFERENCES users (id),
    CONSTRAINT fk_images_company FOREIGN KEY (company_id) REFERENCES company (id)
) ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS likes
(
    id         int(255) auto_increment not null,
    user_id    int(255),
    company_id int(255),
    image_id   int(255),
    create_at  datetime,
    updated_at datetime,
    CONSTRAINT pk_likes PRIMARY KEY (id),
    CONSTRAINT fk_likes_users FOREIGN KEY (user_id) REFERENCES users (id),
    CONSTRAINT fk_likes_company FOREIGN KEY (company_id) REFERENCES company (id),
    CONSTRAINT fk_likes_images FOREIGN KEY (image_id) REFERENCES images (id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS comments
(
    id         int(255) auto_increment not null,
    user_id    int(255),
    image_id   int(255),
    company_id int(255),
    content    text,
    created_at datetime,
    updated_at datetime,
    CONSTRAINT pk_comments PRIMARY KEY (id),
    CONSTRAINT fk_comments_user FOREIGN KEY (user_id) REFERENCES users (id),
    CONSTRAINT fk_comments_company FOREIGN KEY (company_id) REFERENCES company (id),
    CONSTRAINT fk_comments_image FOREIGN KEY (image_id) REFERENCES images (id)
) ENGINE = InnoDB;

