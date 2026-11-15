<?php

namespace App\Controllers;

use App\Models\Author;
use App\Models\Book;
use Framework\Core\BaseController;
use Framework\Http\HttpException;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class AuthorsController extends BaseController
{
    public function authorize(Request $request, string $action): bool
    {
        return true;
    }

    public function index(Request $request): Response
    {
        return $this->html([
            'authors' => Author::getAll(orderBy: '`last_name`, `first_name`'),
            'bookCounts' => Book::getBookCountByAuthor(),
        ]);
    }

    public function create(Request $request): Response
    {
        $author = new Author();
        $error = null;

        if ($request->isPost()) {
            $author->setFromRequest($request);
            $error = $this->validate($author);

            if ($error === null) {
                $author->save();
                return $this->redirect($this->url('authors.index'));
            }
        }

        return $this->html(['author' => $author, 'error' => $error]);
    }

    public function edit(Request $request): Response
    {
        $author = Author::getOne($request->get('id'));

        if ($author === null) {
            throw new HttpException(404, 'Autor sa nenašiel.');
        }

        $error = null;

        if ($request->isPost()) {
            $author->setFromRequest($request);
            $error = $this->validate($author);

            if ($error === null) {
                $author->save();
                return $this->redirect($this->url('authors.index'));
            }
        }

        return $this->html(['author' => $author, 'error' => $error]);
    }

    public function delete(Request $request): Response
    {
        $author = Author::getOne($request->post('id'));

        if ($author !== null) {
            $author->delete();
        }

        return $this->redirect($this->url('authors.index'));
    }

    private function validate(Author $author): ?string
    {
        $author->first_name = trim($author->first_name);
        $author->last_name = trim($author->last_name);
        $author->nationality = trim((string)$author->nationality) ?: null;

        if ($author->first_name === '' || $author->last_name === '') {
            return 'Meno aj priezvisko sú povinné.';
        }

        if (mb_strlen($author->first_name) > 100 || mb_strlen($author->last_name) > 100) {
            return 'Meno a priezvisko môžu mať najviac 100 znakov.';
        }

        return null;
    }
}
