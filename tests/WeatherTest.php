<?php
test('weather model', function () {
    $weather = new \App\Models\Weather(
        '2022-07-23 12:00',
        23.5,
        80.7,
        "cloudy",
    "//cdn.weatherapi.com/weather/64x64/night/116.png"
    );

    expect($weather->getDate())->toEqual('2022-07-23 12:00');
    expect($weather->getTemperature())->toEqual(23.5);
    expect($weather->getHumidity())->toEqual(80.7);
    expect($weather->getCondition())->toEqual("cloudy");
    expect($weather->getIconPath())->toEqual('//cdn.weatherapi.com/weather/64x64/night/116.png');

});
