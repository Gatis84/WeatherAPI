<?php
namespace App\Models;

class Weather
{
    private string $date;
    private float $temperature;
    private float $humidity;
    private string $condition;
    private string $iconPath;

    public function __construct(string $date, float $temperature, float $humidity, string $condition, string $iconPath )
    {
        $this->date = $date;
        $this->temperature = $temperature;
        $this->humidity = $humidity;
        $this->condition = $condition;
        $this->iconPath = $iconPath;
    }

    /**
     * @return string
     */
    public function getIconPath(): string
    {
        return $this->iconPath;
    }

    /**
     * @return string
     */
    public function getCondition(): string
    {
        return $this->condition;
    }

    /**
     * @return float
     */
    public function getTemperature(): float
    {
        return $this->temperature;
    }

    /**
     * @return float
     */
    public function getHumidity(): float
    {
        return $this->humidity;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    public function isCurrentHour(): bool
    {
        return date('H', strtotime($this->date)) === date('H');
    }
}
