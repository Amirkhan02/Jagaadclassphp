<?php

require_once __DIR__ . '/../boot.php';

$sql = file_get_contents(__DIR__ . '/db.sql');

$pdo = \PdoApp\Database\PdoConnectionFactory::make();

$pdo->beginTransaction();

$faker = Faker\Factory::create();

$stm = $pdo->prepare('INSERT INTO authors VALUES (?, ?, ?)');

try {

    $stm->execute([$faker->uuid, $faker->name, $faker->country]);

    $stm->execute([$faker->uuid, $faker->name, $faker->country]);

    $stm->execute([$faker->uuid, $faker->name, $faker->country]);

    throw new \Exception('something went wrong');

    $stm->execute([$faker->uuid, $faker->name, $faker->country]);

    $pdo->commit();

} catch (Exception $e) {
    $stm->execute([$faker->uuid, $faker->name, $faker->country]);

    $pdo->rollBack();

    $stm->execute([$faker->uuid, $faker->name, $faker->country]);

}
echo 'executed';