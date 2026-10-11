SET NAMES utf8mb4;

-- Ukážkové účty: admin@bookshare.sk / admin123, ostatní / heslo123
INSERT INTO users (id, name, email, password_hash, role) VALUES
    (1, 'Správca', 'admin@bookshare.sk', '$2y$10$u4vO1CzdNm98ewd55ABO8OH6xFoeluiuw0/AmZ2Yz730Cp.Ccy0Sa', 'admin'),
    (2, 'Jana Nováková', 'jana@bookshare.sk', '$2y$10$o/2h69nbt6Z3mi5pLMJEie/kFi1dV9GSoejMTJV0ziqluFI99C3SW', 'user'),
    (3, 'Peter Horváth', 'peter@bookshare.sk', '$2y$10$o/2h69nbt6Z3mi5pLMJEie/kFi1dV9GSoejMTJV0ziqluFI99C3SW', 'user');

INSERT INTO genres (id, name) VALUES
    (1, 'Informatika'),
    (2, 'Matematika'),
    (3, 'Beletria'),
    (4, 'Sci-fi a fantasy'),
    (5, 'Ekonómia');

INSERT INTO authors (id, first_name, last_name) VALUES
    (1, 'Robert C.', 'Martin'),
    (2, 'Erich', 'Gamma'),
    (3, 'Richard', 'Helm'),
    (4, 'Ralph', 'Johnson'),
    (5, 'John', 'Vlissides'),
    (6, 'George', 'Orwell'),
    (7, 'J. R. R.', 'Tolkien'),
    (8, 'Thomas H.', 'Cormen'),
    (9, 'Daniel', 'Kahneman');

INSERT INTO books (id, owner_id, genre_id, title, isbn, year, description) VALUES
    (1, 2, 1, 'Čistý kód', '978-80-251-2285-3', 2009, 'Príručka agilného softvérového remesla. Mierne opotrebovaná väzba.'),
    (2, 2, 1, 'Design Patterns', '978-0-201-63361-0', 1994, 'Klasická kniha o návrhových vzoroch v objektovom programovaní.'),
    (3, 3, 3, '1984', '978-80-8061-791-2', 2015, 'Dystopický román, slovenský preklad.'),
    (4, 3, 4, 'Hobit', '978-80-556-0147-2', 2012, 'Ilustrované vydanie, vo veľmi dobrom stave.'),
    (5, 3, 1, 'Introduction to Algorithms', '978-0-262-03384-8', 2009, 'Tretie vydanie, v angličtine.'),
    (6, 1, 5, 'Myslenie rýchle a pomalé', '978-80-551-3526-0', 2013, 'O tom, ako sa rozhodujeme.'),
    (7, 2, 4, 'Spoločenstvo prsteňa', '978-80-556-0145-8', 2012, 'Prvý diel trilógie Pán prsteňov.');

INSERT INTO book_authors (book_id, author_id) VALUES
    (1, 1),
    (2, 2), (2, 3), (2, 4), (2, 5),
    (3, 6),
    (4, 7),
    (5, 8),
    (6, 9),
    (7, 7);

INSERT INTO loans (user_id, book_id, status, created_at, borrowed_at, returned_at) VALUES
    (3, 1, 'returned', '2026-09-01 10:00:00', '2026-09-03 15:00:00', '2026-09-20 12:00:00'),
    (3, 2, 'borrowed', '2026-10-01 09:30:00', '2026-10-02 14:00:00', NULL),
    (2, 4, 'pending', '2026-10-08 18:20:00', NULL, NULL),
    (2, 5, 'approved', '2026-10-06 11:00:00', NULL, NULL),
    (1, 3, 'rejected', '2026-09-15 08:45:00', NULL, NULL);
