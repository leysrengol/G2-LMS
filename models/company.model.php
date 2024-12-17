<?php

function createcompany(string $title, string $description) : bool
{
    global $connection;
    $statement = $connection->prepare("insert into companies (title, description) values (:title, :description)");
    $statement->execute([
        ':title' => $title,
        ':description' => $description

    ]);

    return $statement->rowCount() > 0;
}

function getcompany(int $id) : array
{
    global $connection;
    $statement = $connection->prepare("select * from companies where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->fetch();
}

function getcompanys() : array
{
    global $connection;
    $statement = $connection->prepare("select * from companies");
    $statement->execute();
    return $statement->fetchAll();
}

function updatecompany(string $title, string $description, int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("update companies set title = :title, description = :description where id = :id");
    $statement->execute([
        ':title' => $title,
        ':description' => $description,
        ':id' => $id

    ]);

    return $statement->rowCount() > 0;
}

function deletecompany(int $id) : bool
{
    global $connection;
    $statement = $connection->prepare("delete from companies where id = :id");
    $statement->execute([':id' => $id]);
    return $statement->rowCount() > 0;
}