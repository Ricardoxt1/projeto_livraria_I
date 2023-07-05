-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Tempo de geração: 05/07/2023 às 13:06
-- Versão do servidor: 5.7.42
-- Versão do PHP: 8.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `library`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(2, 'J.R.R. Tolkien'),
(47, 'Stephen King'),
(48, 'Toshikazu Kawaguchi'),
(49, 'PERIC'),
(51, 'C.J. Tudor');

-- --------------------------------------------------------

--
-- Estrutura para tabela `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `titule` varchar(100) NOT NULL,
  `page` float NOT NULL,
  `realese_date` year(4) NOT NULL,
  `author_id` int(11) NOT NULL,
  `library_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `books`
--

INSERT INTO `books` (`id`, `titule`, `page`, `realese_date`, `author_id`, `library_id`, `publisher_id`) VALUES
(1, 'O Hobbit', 369, '1962', 2, 1, 4),
(5, 'As Duas Torres', 464, '1954', 2, 1, 6),
(6, 'A Sociedade do Anel', 604, '1954', 2, 1, 3),
(8, 'Trono de Vidro', 392, '2012', 2, 1, 20),
(9, 'Império de Tempestades', 841, '2016', 2, 1, 20),
(10, 'Corte de Espinhos e Rosas', 434, '2015', 2, 1, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `costumers`
--

CREATE TABLE `costumers` (
  `id` int(11) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone_number` varchar(14) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL DEFAULT 'example@example.com'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `costumers`
--

INSERT INTO `costumers` (`id`, `cpf`, `name`, `phone_number`, `address`, `email`) VALUES
(8, '89712369845', 'Fernanda F', '1499864512', 'Main ST 01', 'fernanda@gmail.com'),
(9, '3621235972', 'Guilherme Valério', '1498631235', 'Main ST 45', 'guilherme@gmail.com'),
(10, '8745631241', 'Hugo Silva', '14998743621', 'Main ST 02', 'hugo@gmail.com'),
(11, '123654789412', 'Nathan M', '1499874526', 'Main ST 03', 'nathan@gmail.com'),
(12, '59758163215', 'Rodrigo', '12334556576', 'Main ST 02', 'rodrigo@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pis` varchar(15) NOT NULL,
  `office` varchar(50) NOT NULL,
  `departament` varchar(50) NOT NULL,
  `library_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `employees`
--

INSERT INTO `employees` (`id`, `name`, `pis`, `office`, `departament`, `library_id`) VALUES
(2, 'Gabriela', '12564894632', 'Vendedor', 'Vendas', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `libraries`
--

CREATE TABLE `libraries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT 'Livraria Pedbot'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `libraries`
--

INSERT INTO `libraries` (`id`, `name`) VALUES
(1, 'Livraria Pedbot');

-- --------------------------------------------------------

--
-- Estrutura para tabela `publishers`
--

CREATE TABLE `publishers` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `publishers`
--

INSERT INTO `publishers` (`id`, `name`) VALUES
(3, 'Harper Collins'),
(4, 'Rocco'),
(6, 'Suma'),
(8, 'Gutenberg'),
(15, 'Formato'),
(17, 'Valentina'),
(18, 'Intrínseca'),
(20, 'Galera Record');

-- --------------------------------------------------------

--
-- Estrutura para tabela `rentals`
--

CREATE TABLE `rentals` (
  `id` int(11) NOT NULL,
  `rental` date NOT NULL,
  `delivery` date NOT NULL,
  `costumer_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `rentals`
--

INSERT INTO `rentals` (`id`, `rental`, `delivery`, `costumer_id`, `book_id`, `employee_id`) VALUES
(5, '2023-06-10', '2023-06-20', 9, 1, 2),
(6, '2023-07-12', '2023-07-14', 9, 5, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `library_id` (`library_id`),
  ADD KEY `publisher_id` (`publisher_id`);

--
-- Índices de tabela `costumers`
--
ALTER TABLE `costumers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- Índices de tabela `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pis` (`pis`),
  ADD KEY `library_id` (`library_id`);

--
-- Índices de tabela `libraries`
--
ALTER TABLE `libraries`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `costumer_id` (`costumer_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `costumers`
--
ALTER TABLE `costumers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `libraries`
--
ALTER TABLE `libraries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`library_id`) REFERENCES `libraries` (`id`),
  ADD CONSTRAINT `books_ibfk_3` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`);

--
-- Restrições para tabelas `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`library_id`) REFERENCES `libraries` (`id`);

--
-- Restrições para tabelas `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `rentals_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `rentals_ibfk_3` FOREIGN KEY (`costumer_id`) REFERENCES `costumers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
