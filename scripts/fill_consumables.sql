set FOREIGN_KEY_CHECKS = 0;

ALTER table consumables
    AUTO_INCREMENT = 1;

INSERT INTO consumables (id, name, price)
VALUES ('1', 'Моторное масло', 3000.50),
       ('2', 'Фильтр масляный', 800.75),
       ('3', 'Фильтр воздушный', 500.25),
       ('4', 'Фильтр топливный', 600.20),
       ('5', 'Тормозная жидкость', 1200.00),
       ('6', 'Антифриз', 900.50),
       ('7', 'Жидкость гидроусилителя', 700.80),
       ('8', 'Присадка в бензин', 400.00),
       ('9', 'Присадка в масло', 500.00),
       ('10', 'Присадка в охлаждающую жидкость', 600.00),
       ('11', 'Аккумулятор', 5000.00),
       ('12', 'Свечи зажигания', 300.75),
       ('13', 'Тормозные колодки (задние)', 2000.00),
       ('14', 'Тормозные колодки (передние)', 2500.00),
       ('15', 'Тормозные диски (задние)', 3500.00),
       ('16', 'Тормозные диски (передние)', 4000.00),
       ('17', 'Масло в коробку передач', 1500.00),
       ('18', 'Прокладка картера', 200.50),
       ('19', 'Прокладка головки блока', 300.00),
       ('20', 'Подшипники передние (комплект)', 4500.00),
       ('21', 'Подшипники задние (комплект)', 5500.00),
       ('22', 'Шланги тормозные (передние)', 800.50),
       ('23', 'Шланги тормозные (задние)', 700.00),
       ('24', 'Полировочный состав', 1000.00),
       ('25', 'Щетки стеклоочистителя (передние)', 1200.50),
       ('26', 'Щетки стеклоочистителя (задние)', 1000.50),
       ('27', 'Лампа передняя (габарит)', 300.00),
       ('28', 'Лампа передняя (ближний свет)', 400.00),
       ('29', 'Лампа передняя (дальний свет)', 500.00),
       ('30', 'Лампа задняя (стоп-сигнал)', 300.50),
       ('31', 'Лампа задняя (габарит)', 300.00),
       ('32', 'Лампа задняя (поворотник)', 300.50),
       ('33', 'Подшипники передние (левый)', 2200.50),
       ('34', 'Подшипники передние (правый)', 2200.50),
       ('35', 'Подшипники задние (левый)', 2700.50),
       ('36', 'Подшипники задние (правый)', 2700.50),
       ('37', 'Шрус (левый)', 3000.00),
       ('38', 'Шрус (правый)', 3000.00),
       ('39', 'Ремень генератора', 800.00),
       ('40', 'Ремень кондиционера', 900.00),
       ('41', 'Ремень насоса ГУР', 700.00),
       ('42', 'Топливный насос', 3500.00),
       ('43', 'Радиатор', 5000.00),
       ('44', 'Регулятор давления топлива', 2500.00),
       ('45', 'Катушка зажигания', 1500.00),
       ('46', 'Датчик температуры', 1200.00),
       ('47', 'Датчик давления масла', 1000.00),
       ('48', 'Фильтр салона', 700.00),
       ('49', 'Прокладка выпускного коллектора', 500.00),
       ('50', 'Прокладка впускного коллектора', 500.00);

set FOREIGN_KEY_CHECKS = 1;
