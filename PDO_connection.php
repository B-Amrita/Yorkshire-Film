<?php
// A better method for implentation of this could be to have this file as a class rather than a standard PHP doc. 
// It would be loaded into every page that uses an autoloader, so we wouldn't have to include this page also.
// However, as we're using two different types of connection, this would cause a conflict with Gabby's current work.

    const DB_DSN = 'mysql:host=localhost;dbname=Yorkshire-Films';
    const DB_USER = 'root';
    const DB_PASS = '';
    
    try {
        $pdo = new PDO(DB_DSN, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    