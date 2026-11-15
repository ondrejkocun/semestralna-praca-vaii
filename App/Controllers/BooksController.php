<?php

namespace App\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\User;
use Framework\Core\BaseController;
use Framework\Http\HttpException;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class BooksController extends BaseController
{
    public function authorize(Request $request, string $action): bool
    {
        return true;
    }

    public function index(Request $request): Response
    {
        return $this->html([
            'books' => Book::getAll(orderBy: '`title`'),
            'genres' => $this->mapById(Genre::getAll()),
            'owners' => $this->mapById(User::getAll()),
            'authorsByBook' => Book::getAuthorNamesByBook(),
            'borrowedIds' => Book::getBorrowedBookIds(),
        ]);
    }

    public function create(Request $request): Response
    {
        $book = new Book();
        $selectedAuthors = [];
        $error = null;

        if ($request->isPost()) {
            $selectedAuthors = $this->postedAuthorIds($request);
            $error = $this->fill($book, $request);

            if ($error === null) {
                $book->created_at = date('Y-m-d H:i:s');
                $book->save();
                $book->setAuthors($selectedAuthors);
                return $this->redirect($this->url('books.index'));
            }
        }

        return $this->html($this->formData($book, $selectedAuthors, $error));
    }

    public function edit(Request $request): Response
    {
        $book = Book::getOne($request->get('id'));

        if ($book === null) {
            throw new HttpException(404, 'Kniha sa nenašla.');
        }

        $selectedAuthors = $book->getAuthorIds();
        $error = null;

        if ($request->isPost()) {
            $selectedAuthors = $this->postedAuthorIds($request);
            $error = $this->fill($book, $request);

            if ($error === null) {
                $book->save();
                $book->setAuthors($selectedAuthors);
                return $this->redirect($this->url('books.index'));
            }
        }

        return $this->html($this->formData($book, $selectedAuthors, $error));
    }

    public function delete(Request $request): Response
    {
        $book = Book::getOne($request->post('id'));

        if ($book !== null) {
            $book->delete();
        }

        return $this->redirect($this->url('books.index'));
    }

    /**
     * Spoločné dáta pre formuláre create a edit.
     */
    private function formData(Book $book, array $selectedAuthors, ?string $error): array
    {
        return [
            'book' => $book,
            'error' => $error,
            'selectedAuthors' => $selectedAuthors,
            'allAuthors' => Author::getAll(orderBy: '`last_name`, `first_name`'),
            'genres' => Genre::getAll(orderBy: '`name`'),
            'owners' => User::getAll(orderBy: '`name`'),
        ];
    }

    /**
     * @return int[]
     */
    private function postedAuthorIds(Request $request): array
    {
        $ids = $request->post('author_ids');

        if (!is_array($ids)) {
            return [];
        }

        return array_values(array_unique(array_filter(array_map('intval', $ids))));
    }

    /**
     * Naplní model z formulára a skontroluje vstupy. Vráti chybovú hlášku alebo null.
     */
    private function fill(Book $book, Request $request): ?string
    {
        $book->title = trim((string)$request->post('title'));
        $book->isbn = trim((string)$request->post('isbn')) ?: null;
        $book->description = trim((string)$request->post('description')) ?: null;

        $year = trim((string)$request->post('year'));
        $book->year = $year === '' ? null : (int)$year;

        $genreId = trim((string)$request->post('genre_id'));
        $book->genre_id = $genreId === '' ? null : (int)$genreId;

        $ownerId = trim((string)$request->post('owner_id'));
        $book->owner_id = $ownerId === '' ? null : (int)$ownerId;

        if ($book->title === '') {
            return 'Názov knihy je povinný.';
        }

        if (mb_strlen($book->title) > 200) {
            return 'Názov môže mať najviac 200 znakov.';
        }

        if ($book->owner_id === null) {
            return 'Vyberte vlastníka knihy.';
        }

        if ($book->isbn !== null && mb_strlen($book->isbn) > 17) {
            return 'ISBN môže mať najviac 17 znakov.';
        }

        if ($book->year !== null && ($book->year < 1400 || $book->year > 2100)) {
            return 'Rok vydania musí byť v rozmedzí 1400 až 2100.';
        }

        return null;
    }

    /**
     * Pretvorí zoznam modelov na mapu id => model.
     */
    private function mapById(array $models): array
    {
        $map = [];
        foreach ($models as $model) {
            $map[(int)$model->id] = $model;
        }
        return $map;
    }
}
