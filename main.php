<?php
//Думаю что сеттеры в dto не очень
//Также надеюсь что серелизация не нужна
require_once __DIR__ . '/vendor/autoload.php';

$Tariff_types = [
    1 => new TariffType(1,'актуальный'),
    2 => new TariffType(2,'архивный'),
    3 => new TariffType(3,'системный'),
];

$tariff_json = '{
  "id": 1,
  "name": "Номер #1",
  "cost": 31041,
  "workDateTo": {
    "date": "2000-03-09 00:00:00.000000",
    "timezone_type": 3,
    "timezone": "UTC"
  },
  "speed": 200,
  "tariffType": {
    "id": 1,
    "name": "актуальный"
  }
}';

$tariff1  = new Tariff(1, 'Номер #1', '31041', new DateTime('09.03.2000'), 200, $Tariff_types[1]);
$tariff2 = Tariff::fromJson($tariff_json);
print($tariff1 . $tariff2);