<?php

namespace App\Models;

use Framework\Core\Model;

class Author extends Model
{
    public ?int $id = null;
    public string $first_name = '';
    public string $last_name = '';
    public ?string $nationality = null;

    public function getFullName(): string
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }
}
