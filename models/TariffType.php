<?php

readonly class TariffType implements BasicInterfaceDto
{
    public int $id;
    public string $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
    static function fromJson($json): TariffType
    {
        $data = json_decode($json, true);
        return new TariffType($data['id'], $data['name']);
    }
    public function getJson(): string
    {
        return json_encode([
            'id' => $this->id,
            'name' => $this->name,
        ]);
    }

    public function __toString(): string
    {
        return  'id: ' . strval($this->id) . ' name:  ' .  strval($this->name);
    }

    public function getArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}