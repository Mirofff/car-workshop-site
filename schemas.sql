use `car-workshop`;

create table if not exists workshops
(
    uuid       UUID PRIMARY KEY NOT NULL DEFAULT UUID(),

    address    TEXT             NOT NULL,
    comment    TEXT             NOT NULL,

    created_at DATETIME         NOT NULL,
    updated_at DATETIME         NOT NULL
);

create table if not exists users
(
    uuid           UUID PRIMARY KEY   NOT NULL DEFAULT UUID(),

    email          VARCHAR(45) UNIQUE NOT NULL,
    password       CHAR(60)           NOT NULL,
    remember_token CHAR(100),
    first_name     VARCHAR(45)        NOT NULL,
    second_name    VARCHAR(45),
    last_name      VARCHAR(45)        NOT NULL,

    created_at     DATETIME           NOT NULL,
    updated_at     DATETIME           NOT NULL,
    is_active      boolean            not null default true
);

create table if not exists stuff
(
    user_uuid     UUID PRIMARY KEY NOT NULL,

    workshop_uuid UUID             NOT NULL,

    FOREIGN KEY (workshop_uuid) REFERENCES workshops (uuid),
    FOREIGN KEY (user_uuid) REFERENCES users (uuid)
);

create table if not exists marks
(
    id   INT PRIMARY KEY NOT NULL AUTO_INCREMENT,

    name varchar(45)     NOT NULL
);

create table if not exists models
(
    id      MEDIUMINT PRIMARY KEY NOT NULL AUTO_INCREMENT,

    name    varchar(45)           NOT NULL,
    type    ENUM ('bike', 'car'),
    year    YEAR,

    mark_id INT                   NOT NULL,
    FOREIGN KEY (mark_id) REFERENCES marks (id)
);

create table if not exists vehicles
(
    uuid               UUID PRIMARY KEY NOT NULL DEFAULT UUID(),

    registration_plate VARCHAR(20)      NOT NULL,

    created_at         DATETIME         NOT NULL,
    updated_at         DATETIME         NOT NULL,

    model_id           MEDIUMINT        NOT NULL,
    workshop_uuid      UUID             NOT NULL,
    user_uuid          UUID             NOT NULL,

    is_active          boolean          not null default true,

    FOREIGN KEY (model_id) REFERENCES models (id),
    FOREIGN KEY (workshop_uuid) REFERENCES workshops (uuid),
    FOREIGN KEY (user_uuid) REFERENCES users (uuid)
);

create table if not exists requests
(
    uuid         UUID PRIMARY KEY NOT NULL DEFAULT UUID(),

    datetime     DATETIME         NOT NULL,
    comment      TEXT             NOT NULL,

    created_at   DATETIME         NOT NULL,
    updated_at   DATETIME         NOT NULL,

    user_uuid    UUID             NOT NULL,
    FOREIGN KEY (user_uuid) REFERENCES users (uuid),
    vehicle_uuid UUID             NOT NULL,
    FOREIGN KEY (vehicle_uuid) REFERENCES vehicles (uuid)
);

create table if not exists statements
(
    uuid         UUID PRIMARY KEY                  NOT NULL DEFAULT UUID(),

    created_at   DATETIME                          NOT NULL,
    updated_at   DATETIME                          NOT NULL,
    status       ENUM ('complete', 'not_complete') NOT NULL,

    request_uuid UUID                              NOT NULL,
    user_uuid    UUID                              NOT NULL,
    vehicle_uuid UUID                              NOT NULL,
    is_active    boolean                           not null default true,

    FOREIGN KEY (user_uuid) REFERENCES users (uuid),
    FOREIGN KEY (vehicle_uuid) REFERENCES vehicles (uuid),
    FOREIGN KEY (request_uuid) REFERENCES requests (uuid)
);

create table if not exists consumables
(
    uuid       UUID PRIMARY KEY NOT NULL DEFAULT UUID(),

    created_at DATETIME         NOT NULL,
    updated_at DATETIME         NOT NULL
);

create table if not exists used_consumables
(
    uuid            UUID PRIMARY KEY NOT NULL DEFAULT UUID(),

    created_at      DATETIME         NOT NULL,
    updated_at      DATETIME         NOT NULL,

    statement_uuid      UUID             NOT NULL,
    FOREIGN KEY (statement_uuid) REFERENCES statements (uuid),
    consumable_uuid UUID             NOT NULL,
    FOREIGN KEY (consumable_uuid) REFERENCES consumables (uuid)
);

create table if not exists services
(
    uuid       UUID PRIMARY KEY NOT NULL DEFAULT UUID(),

    created_at DATETIME         NOT NULL,
    updated_at DATETIME         NOT NULL
);

create table if not exists used_services
(
    uuid         UUID PRIMARY KEY NOT NULL DEFAULT UUID(),

    created_at   DATETIME         NOT NULL,
    updated_at   DATETIME         NOT NULL,

    statement_uuid   UUID             NOT NULL,
    FOREIGN KEY (statement_uuid) REFERENCES statements (uuid),
    service_uuid UUID             NOT NULL,
    FOREIGN KEY (service_uuid) REFERENCES services (uuid)
);


DELIMITER //
CREATE OR REPLACE TRIGGER statement_deactivate_trigger
    BEFORE UPDATE
    ON users
    FOR EACH ROW
BEGIN
    IF OLD.is_active != NEW.is_active THEN
        update statements set statements.is_active = false where user_uuid = old.uuid;
        update vehicles set vehicles.is_active = false where user_uuid = old.uuid;
    END IF;
END;
//
DELIMITER ;
