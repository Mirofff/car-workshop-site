set FOREIGN_KEY_CHECKS = 0;

DELETE
FROM services;

ALTER table services
    AUTO_INCREMENT = 1;

-- Вставляем данные в таблицу services
INSERT INTO services (uuid, name, price)
VALUES ('1', 'Замена масла и фильтра', 5000.00),
       ('2', 'Замена тормозных колодок (задних)', 8000.00),
       ('3', 'Замена тормозных колодок (передних)', 10000.00),
       ('4', 'Замена тормозных дисков (задних)', 12000.00),
       ('5', 'Замена тормозных дисков (передних)', 14000.00),
       ('6', 'Замена масла в коробке передач', 6000.00),
       ('7', 'Замена фильтра воздушного', 2000.00),
       ('8', 'Замена фильтра топливного', 2500.00),
       ('9', 'Замена фильтра салона', 3000.00),
       ('10', 'Замена антифриза', 4000.00),
       ('11', 'Диагностика двигателя', 5000.00),
       ('12', 'Диагностика подвески', 4000.00),
       ('13', 'Замена аккумулятора', 7000.00),
       ('14', 'Замена свечей зажигания', 3000.00),
       ('15', 'Ремонт стеклоочистителей', 2000.00),
       ('16', 'Ремонт гидроусилителя', 5000.00),
       ('17', 'Замена ремня генератора', 3500.00),
       ('18', 'Замена ремня кондиционера', 4000.00),
       ('19', 'Замена ремня насоса ГУР', 3000.00),
       ('20', 'Замена шрусов', 10000.00),
       ('21', 'Замена топливного насоса', 9000.00),
       ('22', 'Замена радиатора', 8000.00),
       ('23', 'Замена регулятора давления топлива', 6000.00),
       ('24', 'Замена катушек зажигания', 4000.00),
       ('25', 'Замена датчика температуры', 3000.00),
       ('26', 'Замена датчика давления масла', 2500.00),
       ('27', 'Полировка кузова', 12000.00),
       ('28', 'Химчистка салона', 8000.00),
       ('29', 'Замена колеса', 1000.00),
       ('30', 'Диагностика электрики', 6000.00),
       ('31', 'Ремонт стартера', 7000.00),
       ('32', 'Ремонт генератора', 8000.00),
       ('33', 'Замена лампы переднего габарита', 500.00),
       ('34', 'Замена лампы переднего ближнего света', 800.00),
       ('35', 'Замена лампы переднего дальнего света', 1000.00),
       ('36', 'Замена лампы заднего стоп-сигнала', 500.00),
       ('37', 'Замена лампы заднего габарита', 500.00),
       ('38', 'Замена лампы заднего поворотника', 700.00),
       ('39', 'Ремонт выхлопной системы', 10000.00),
       ('40', 'Замена стекла (переднего)', 15000.00),
       ('41', 'Замена стекла (заднего)', 20000.00),
       ('42', 'Ремонт кузова', 15000.00),
       ('43', 'Замена переднего бампера', 18000.00),
       ('44', 'Замена заднего бампера', 20000.00),
       ('45', 'Покраска деталей кузова', 25000.00),
       ('46', 'Ремонт электрических стеклоподъемников', 8000.00),
       ('47', 'Ремонт кондиционера', 12000.00),
       ('48', 'Диагностика тормозной системы', 4000.00),
       ('49', 'Диагностика системы охлаждения', 4000.00),
       ('50', 'Диагностика системы выпуска отработавших газов', 4000.00);


set FOREIGN_KEY_CHECKS = 1;