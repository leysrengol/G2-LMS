<?php

function createEmployee(string $title, string $description) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into employees (title, description) values (:title, :description)");
    $statement->execute([
        ':title' => $title,
        ':description' => $description
    ]);

    return $statement->rowCount() > 0;
}

function getEmployee(int $id) : array
{
    global $connection;
    $statement = $connection->prepare("select * from employees where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

function getEmployees() : array
{
    global $connection;
    $statement = $connection->prepare("select * from employees");
    $statement->execute();
    return $statement->fetchAll();
}

function updateEmployee(string $title, string $description, int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("update employees set title = :title, description = :description where id = :id");
    $statement->execute([
        ':title' => $title,
        ':description' => $description,
        ':id' => $id

    ]);

    return $statement->rowCount() > 0;
}

function deleteEmployee(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from employees where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}