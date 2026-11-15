<?php

namespace App\Models;

use Framework\Core\Model;

class Book extends Model
{
    public ?int $id = null;
    public ?int $owner_id = null;
    public ?int $genre_id = null;
    public string $title = '';
    public ?string $isbn = null;
    public ?int $year = null;
    public ?string $description = null;
    public ?string $image = null;
    public ?string $created_at = null;

    /**
     * Vráti ID autorov priradených ku knihe (vzťah M:N cez book_authors).
     *
     * @return int[]
     */
    public function getAuthorIds(): array
    {
        if ($this->id === null) {
            return [];
        }

        $rows = self::executeRawSQL(
            'SELECT `author_id` FROM `book_authors` WHERE `book_id` = ?',
            [$this->id]
        );

        return array_map(static fn(array $row): int => (int)$row['author_id'], $rows);
    }

    /**
     * Prepíše väzby knihy na autorov podľa zoznamu ID.
     *
     * @param int[]|string[] $authorIds
     */
    public function setAuthors(array $authorIds): void
    {
        if ($this->id === null) {
            return;
        }

        self::executeRawSQL('DELETE FROM `book_authors` WHERE `book_id` = ?', [$this->id]);

        $ids = array_unique(array_filter(array_map('intval', $authorIds)));
        foreach ($ids as $authorId) {
            self::executeRawSQL(
                'INSERT INTO `book_authors` (`book_id`, `author_id`) VALUES (?, ?)',
                [$this->id, $authorId]
            );
        }
    }

    /**
     * Mapa ID knihy na zoznam mien jej autorov. Jeden dotaz pre celý zoznam kníh.
     *
     * @return array<int, string[]>
     */
    public static function getAuthorNamesByBook(): array
    {
        $rows = self::executeRawSQL(
            'SELECT ba.`book_id`, a.`first_name`, a.`last_name`
               FROM `book_authors` ba
               JOIN `authors` a ON a.`id` = ba.`author_id`
           ORDER BY a.`last_name`, a.`first_name`'
        );

        $map = [];
        foreach ($rows as $row) {
            $map[(int)$row['book_id']][] = trim($row['first_name'] . ' ' . $row['last_name']);
        }

        return $map;
    }

    /**
     * Mapa ID autora na počet jeho kníh.
     *
     * @return array<int, int>
     */
    public static function getBookCountByAuthor(): array
    {
        $rows = self::executeRawSQL(
            'SELECT `author_id`, COUNT(*) AS `total` FROM `book_authors` GROUP BY `author_id`'
        );

        $map = [];
        foreach ($rows as $row) {
            $map[(int)$row['author_id']] = (int)$row['total'];
        }

        return $map;
    }

    /**
     * ID kníh, ktoré sú práve požičané.
     *
     * @return int[]
     */
    public static function getBorrowedBookIds(): array
    {
        $rows = self::executeRawSQL(
            "SELECT DISTINCT `book_id` FROM `loans` WHERE `status` = 'borrowed'"
        );

        return array_map(static fn(array $row): int => (int)$row['book_id'], $rows);
    }
}
