<?php


readonly class Tariff implements BasicInterfaceDto
{
    // or use $vars[] if we want one for all
    public int $id;
    public string $name;
    public int $cost; // В копейках
    public DateTime $workDateTo;
    public int $speed;
    public TariffType $tariffType;


    public function __construct(int $id, string $name,int $cost,DateTime $workDateTo,int $speed,TariffType $tariffType)
    {
        $this->id = $id;
        $this->name = $name;
        $this->cost = $cost;
        $this->workDateTo = $workDateTo;
        $this->speed = $speed;
        $this->tariffType = $tariffType;
    }
    static function fromJson($json): Tariff
    {
        $data = json_decode($json, true);
        return new Tariff(
            $data['id'],
            $data['name'],
            $data['cost'],
            new DateTime($data['workDateTo']['date']),
            $data['speed'],
            TariffType::fromJson(json_encode($data['tariffType']))
        );
    }

    public function getJson(): string
    {
        return json_encode($this->getArray());
    }

    public function __toString(): string
    {
        return  'id: ' . strval($this->id) .
            ' Название: ' . strval($this->name).
            ' Дата окончания: ' . strval($this->workDateTo->format('Y-m-d')) .
            ' Цена ' .  strval($this->cost/100) .
            ' Скорость: ' . strval($this->speed/8388608)  .
            ' Тип тарифа: ' . $this->tariffType;
    }


    public function getArray(): array
    {
        return[
            'id' => $this->id,
            'name' => $this->name,
            'cost' => $this->cost,
            'workDateTo' => $this->workDateTo,
            'speed' => $this->speed,
            'tariffType' => $this->tariffType->getArray(),
        ];
    }
}