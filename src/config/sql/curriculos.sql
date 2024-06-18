CREATE DATABASE curriculos;

USE curriculos;

CREATE TABLE curriculos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    cargo_desejado VARCHAR(255) NOT NULL,
    escolaridade VARCHAR(255) NOT NULL,
    observacoes TEXT,
    arquivo VARCHAR(255) NOT NULL,
    data_envio DATETIME NOT NULL,
    ip VARCHAR(45) NOT NULL
);

-- Inserindo um índice único no campo email para evitar duplicações de e-mails na tabela.
CREATE UNIQUE INDEX idx_email ON curriculos(email(191));
