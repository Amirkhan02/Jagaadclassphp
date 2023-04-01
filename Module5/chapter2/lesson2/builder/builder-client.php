<?php

$car = (new CarBuilder)

    ->createVehicle()
    ->addDoors()
    ->addEngine()
    ->getVehicle();

$creditCard = (new creditCardBuilder)
    ->createCreditCard()
    ->addNumber($number)
    ->addName($name)
    ->addInstallments(4)
    ->addExternalService($service)
    ->gerCreditCard();

