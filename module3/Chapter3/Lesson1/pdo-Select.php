<?php

try {
    $pdo = new PDO('mysql:localhost=localhost;dbname=personal_finance', 'root', '');

//echo 'connected';

    $rows = $pdo->query('SELECT transaction_id, name, category FROM transactions', PDO::FETCH_ASSOC);

}catch (PDOException $exception) {
    error_log($exception->getMessage());
    die('something went wrong. Please try again later,');
}
/*
$email = 'pdo@gmail.com';


$stm = $pdo->prepare(<<<SQL
   SELECT 
   users(user_id, full_name,FROM users WHERE email = :emal   
SQL);


//$stm ->bindParam(':email', $email);

$stm->execute([
    ':email => $email'
]);

$row = $stm->fetch(PDO::FETCH_ASSOC);

echo <<<HTML
ID: {$row['user_id']}<br>
Name: {$row['full_name']}<br>
HTML;
*/

class User {
    private int $id;
    private string $name;

    private int $isActive;
    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function id(): int {
        return $this->id;
    }

    /**
     * @return string
     */
    public function Name(): string
    {
        return $this->name;
    }
    public function sayHello(): void {
        echo 'Hello, my name is ' . $this->name() . PHP_EOL;
    }
    public function __toString()
    {
        $isActiveDescription = $this->isActive == 1 ? 'active' : 'deactivated';
      return "ID: $this->>id, Name: $this->>name, $isActiveDescription" . PHP_EOL;
    }
}

// PDO::FETCH_OBJ

$stm = $pdo->query(<<<SQL
      SELECT user_id AS id, full_name AS fullName FROM users --WHERE email = :email
SQL
);

/** @var User[] $users */
$users = [];  //empty array

while ($row = $stm->fetch(PDO::FETCH_OBJ)) {
      $users[] = new User($row->id, $row->fullName);
}

/*
 //Flat list
$list = [
    new User(0, 'Luis')
    new User(0, 'Hammed')
        new User(0, 'Raul')
            new User(0, 'Aladin')
];

foreach ($List as $user) {
    $user->sayHello();
}
*/
foreach ($users as $user) {
    $user->sayHello();
}

/*
// PDO::FETCH_CLASS

$stm = $pdo->query(<<<SQL
      SELECT user_id AS id, full_name AS name, is_active AS isActive FROM users --WHERE email = :email
SQL
);

$stm->setFetchMode(PDO::FETCH_CLASS, User::class);

while ($row = $stm->fetch()) {
    echo $row;

}
*/