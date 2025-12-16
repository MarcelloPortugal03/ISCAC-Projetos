<?php


namespace Config;

class Database
{
    /**
     * Instância singleton
     *
     * @var Database|null
     */
    private static ?Database $instance = null;

    /**
     * Objeto PDO
     *
     * @var \PDO
     */
    private \PDO $pdo;

    /**
     * Construtor privado (singleton)
     */
    private function __construct()
    {
        
        $dbHost = getenv('DB_HOST') ?: '127.0.0.1';
        $dbName = getenv('DB_NAME') ?: 'iscac_burguer';
        $dbUser = getenv('DB_USER') ?: 'root';
        $dbPass = getenv('DB_PASS') ?: '';
        $dbCharset = 'utf8mb4';

        $dsn = "mysql:host={$dbHost};dbname={$dbName};charset={$dbCharset}";

        $options = [
            \PDO::ATTR_ERRMODE              => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new \PDO($dsn, $dbUser, $dbPass, $options);
        } catch (\PDOException $e) {
            
            throw new \Exception('Falha na conexão com a base de dados: ' . $e->getMessage());
        }
    }

    /**
     * Retorna a instância singleton da classe Database
     *
     * @return Database
     */
    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Retorna o objeto PDO para executar queries.
     *
     * @return \PDO
     */
    public function getConnection(): \PDO
    {
        return $this->pdo;
    }

    // Evita clonagem/serialização da instância singleton
    private function __clone() {}
    public function __wakeup() {}
}