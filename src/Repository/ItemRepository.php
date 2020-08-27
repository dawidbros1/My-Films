<?php

namespace App\Repository;

use App\Model\Model;

class ItemRepository extends Model
{

    public static function createItemsByData($data)
    {
        if ($data != null) {
            $items[] = new \App\Model\Item;

            foreach ($data as $key => $simpleDataItem) {
                $item = new \App\Model\Item;
                $item->setId($simpleDataItem['id']);
                $item->setTitle($simpleDataItem['title']);
                $item->setRate($simpleDataItem['rate']);
                $item->setDescription($simpleDataItem['description']);
                $item->setImage_src($simpleDataItem['image_src']);
                $item->setAuthor_id($simpleDataItem['author_id']);
                $items[$key] = $item;
            }

            return $items;
        }

        return null;
    }

    public static function getAllItemsForCurrentUserByRating($rate)
    {
        global $currentUser;

        $db = self::getConnection();
        $sql = "SELECT * FROM items WHERE author_id = :author_id AND rate = :rate";
        $statement = $db->prepare($sql);
        $statement->bindValue(':author_id', $currentUser->getId(), \PDO::PARAM_INT);
        $statement->bindValue(':rate', $rate, \PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll();
        $items = self::createItemsByData($result);
        return $items;
    }

    public static function getItemById($id)
    {
        $db = self::getConnection();
        $sql = "SELECT * FROM items WHERE id = :id";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetchAll();
        $item = self::createItemsByData($result);
        return $item[0];
    }

    public static function checkIfItIsMyItemById($id)
    {
        global $currentUser;

        $db = self::getConnection();
        $sql = "SELECT * FROM items WHERE id = :id AND author_id = :author_id";
        $statement = $db->prepare($sql);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->bindValue(':author_id', $currentUser->getId(), \PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch();

        if ($result != null) {
            return true;
        } else {
            return false;
        }
    }

    public static function deleteItemById($id)
    {
        $db = self::getConnection();
        $sql = 'DELETE FROM items WHERE id = :id';
        $statement = $db->prepare($sql);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }

    public static function save($item)
    {
        $db = self::getConnection();

        if ($item->getId() !== null) {
            $statement = $db->prepare('UPDATE items SET 
                title = :title,
                rate = :rate,
                description = :description,
                image_src = :image_src,
                author_id = :author_id
                WHERE id = :id');
            $statement->bindValue(':id', $item->getId(), \PDO::PARAM_INT);
        } else {
            $statement = $db->prepare('INSERT INTO items VALUES (NULL,:title,:rate,:description,:image_src, :author_id)');
        }

        $statement->bindValue(':title', $item->getTitle(), \PDO::PARAM_STR);
        $statement->bindValue(':rate', $item->getRate(), \PDO::PARAM_STR);
        $statement->bindValue(':description', $item->getDescription(), \PDO::PARAM_STR);
        $statement->bindValue(':image_src', $item->getImage_src(), \PDO::PARAM_STR);
        $statement->bindValue(':author_id', $item->getAuthor_id(), \PDO::PARAM_INT);

        $statement->execute();
    }
}
