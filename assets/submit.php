<?php

$data = $_POST;
$validationResult = validateForm($data);
if ($validationResult === true) {
    echo 'Данные успешно сохранены';
} else {
    echo 'Ошибка валидации: ' . $validationResult;
}

?>

<?php

function validateForm($data)
{
    if (empty($data['name'])) {
        return 'Имя не может быть пустым';
    }
    if (strlen($data['name']) < 2) {
        return 'Имя должно быть длиной не менее 2 символов';
    }

    if (empty($data['email'])) {
        return 'Email не может быть пустым';
    }
    if (strlen($data['email']) < 5) {
        return 'Email должен быть длиной не менее 5 символов';
    }
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        return 'Некорректный формат email';
    }

    if (empty($data['phone'])) {
        return 'Номер телефона не может быть пустым';
    }
    if (strlen($data['phone']) != 11) {
        return 'Некорректный формат номера телефона';
    }
    return true;
}

?>