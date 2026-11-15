<?php

namespace App\Models;

use Framework\Core\Model;

class User extends Model
{
    public ?int $id = null;
    public string $name = '';
    public string $email = '';
    public string $password_hash = '';
    public string $role = 'user';
    public ?string $created_at = null;
}
