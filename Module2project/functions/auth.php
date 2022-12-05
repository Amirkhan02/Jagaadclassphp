<?php



function login(string $email, string $password): bool

{
   logout();

    $mysqli = connect();
$sql = 'SELECT fullname, password FROM students WHERE email = ?';

$stmt = $mysqli->prepare($sql);
$stmt->bind_param('s', $email);
$stmt->execute();

$result = $stmt->get_result();

$student = $result->fetch_assoc();



$isValid =  $student && password_verify($password, $student['password']);
if ($isValid) {
    $_SESSION['logged_in'] = true;
    $_SESSION['logged_in'] = $student['fullname'];
}
 return $isValid;
}
function isAuthenticated(): bool
{
    return isset($_SERVER['logged_in'])
    && $_SESSION['looged'] == true;
}

function isAuthenticatedStudent(): ?string
{
    if (isset($_SESSION['logged_student'])) {
    return $_SESSION['logged_student'];
} else {
    return null;
}
}

function logout(): void {

unset(
    $_SESSION['logged_in'], 
    $_SESSION['logged_student'] 
); 
}
