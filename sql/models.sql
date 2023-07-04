CREATE DATABASE bdbiblioteca;

use bdbiblioteca;

CREATE TABLE pedidos_emprestimos(
id_pedidos INT AUTO_INCREMENT PRIMARY KEY,
nome_cliente VARCHAR(200),
livro VARCHAR(200),
data_emprestimo DATE
);
