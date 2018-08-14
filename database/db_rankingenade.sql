-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Versão do servidor: 5.6.24
-- PHP Version: 5.6.8

--
-- Database: `db_rankingenade`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunoavalia`
--

CREATE TABLE IF NOT EXISTS `alunoavalia` (
  `ano` char(4) COLLATE latin1_bin NOT NULL DEFAULT '2017' COMMENT 'Ano de Avaliacao do Aluno',
  `id` int(11) NOT NULL COMMENT 'Id do Aluno',
  `nome` varchar(100) COLLATE latin1_bin NOT NULL COMMENT 'Nome do Aluno',
  `notamedia` decimal(6,4) NOT NULL DEFAULT '0.0000' COMMENT 'Nota Media do Aluno',
  `instituicao_id` int(11) NOT NULL COMMENT 'Id da Instituicao',
  `curso_id` int(11) NOT NULL COMMENT 'Id do Curso'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin COMMENT='Tabela de Avaliacao dos Alunos do Curso da Instituicao';

--
-- Extraindo dados da tabela `alunoavalia`
--

INSERT INTO `alunoavalia` (`ano`, `id`, `nome`, `notamedia`, `instituicao_id`, `curso_id`) VALUES
('2018', 1, 'ALUNO 1', '8.5400', 1, 2),
('2017', 1, 'ALUNO 2', '4.5000', 5, 3),
('2017', 2, 'ALUNO 3', '6.5000', 1, 2),
('2017', 3, 'ALUNO 3', '5.0000', 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id` int(11) NOT NULL COMMENT 'Id do Curso',
  `nome` varchar(150) COLLATE latin1_bin NOT NULL COMMENT 'Nome do Curso'
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_bin COMMENT='Tabela de Cursos';

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id`, `nome`) VALUES
(1, 'CIÊNCIA DA COMPUTAÇÃO'),
(2, 'DIREITO'),
(3, 'FARMÁCIA'),
(4, 'MEDICINA'),
(5, 'PSICOLOGIA'),
(7, 'ENGENHARIA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursoavalia`
--

CREATE TABLE IF NOT EXISTS `cursoavalia` (
  `ano` char(4) COLLATE latin1_bin NOT NULL DEFAULT '2017' COMMENT 'Ano de Avaliacao do Curso',
  `instituicao_id` int(11) NOT NULL COMMENT 'Id da Instituicao',
  `curso_id` int(11) NOT NULL COMMENT 'Id do Curso',
  `nota` decimal(6,4) NOT NULL DEFAULT '0.0000'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin COMMENT='Tabela de Avaliacao dos Cursos da Instituicao';

--
-- Extraindo dados da tabela `cursoavalia`
--

INSERT INTO `cursoavalia` (`ano`, `instituicao_id`, `curso_id`, `nota`) VALUES
('2017', 3, 2, '5.6000'),
('2017', 1, 1, '9.0000'),
('2017', 11, 2, '8.0000'),
('2017', 4, 1, '6.9000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicao`
--

CREATE TABLE IF NOT EXISTS `instituicao` (
  `id` int(11) NOT NULL COMMENT 'Id da Instituicao',
  `nome` varchar(100) COLLATE latin1_bin NOT NULL COMMENT 'Nome da Instituicao',
  `sigla` varchar(10) COLLATE latin1_bin NOT NULL COMMENT 'Sigla da Instituicao',
  `tipo` char(1) COLLATE latin1_bin NOT NULL DEFAULT 'F' COMMENT 'Tipo da Instituicao: F-Faculdade | U-Universidade',
  `uf_id` int(11) NOT NULL COMMENT 'Id da UF'
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_bin COMMENT='Tabela de Instituições';

--
-- Extraindo dados da tabela `instituicao`
--

INSERT INTO `instituicao` (`id`, `nome`, `sigla`, `tipo`, `uf_id`) VALUES
(1, 'PONTIFICIA UNIVERSIDADE CATOLICA DE MINAS GERAIS', 'PUC-MG', 'U', 1),
(2, 'UNI-BH', 'UNI-BH', 'U', 1),
(3, 'FACULDADE MILTON CAMPOS', 'MIL CAMPOS', 'F', 1),
(4, 'PONTIFICIA UNIVERSIDADE CATOLICA DO RIO DE JANEIRO', 'PUC-RJ', 'U', 2),
(5, 'FACULDADE ESTÁCIO DE SÁ', 'ESTÁCIO', 'F', 2),
(6, 'UNIVERSIDADE DE CAMPINAS', 'UNICAMP', 'U', 3),
(7, 'UNIVERSIDADE FEDERAL DE MINAS GERAIS', 'UFMG', 'U', 1),
(8, 'UNIVERSIDADE FEDERAL DE SÃO PAULO', 'USP', 'U', 3),
(9, 'UNIVERSIDADE FEDERAL DO RIO DE JANEIRO', 'UFRJ', 'U', 2),
(10, 'UNIVERSIDADE DE ALFENAS', 'UNIFENAS', 'U', 1),
(11, 'UNIVERSIDADE NEWTON PAIVA', 'NEWTON', 'U', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicaoavalia`
--

CREATE TABLE IF NOT EXISTS `instituicaoavalia` (
  `ano` char(4) COLLATE latin1_bin NOT NULL DEFAULT '2017' COMMENT 'Ano da Avaliacao',
  `instituicao_id` int(11) NOT NULL COMMENT 'Id da Instituicao',
  `notageral` decimal(6,4) NOT NULL COMMENT 'Nota Geral da Instituicao'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin COMMENT='Tabela de Avaliacao das Instituicoes';

--
-- Extraindo dados da tabela `instituicaoavalia`
--

INSERT INTO `instituicaoavalia` (`ano`, `instituicao_id`, `notageral`) VALUES
('2017', 5, '6.5000'),
('2017', 1, '8.9000'),
('2017', 11, '7.8000'),
('2017', 8, '9.7000'),
('2017', 3, '6.5000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `uf`
--

CREATE TABLE IF NOT EXISTS `uf` (
  `id` int(11) NOT NULL COMMENT 'Id da UF',
  `nome` varchar(20) COLLATE latin1_bin NOT NULL COMMENT 'Nome da UF',
  `sigla` char(2) COLLATE latin1_bin NOT NULL COMMENT 'Sigla da UF'
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 COLLATE=latin1_bin COMMENT='Tabela de Unidade Federativa';

--
-- Extraindo dados da tabela `uf`
--

INSERT INTO `uf` (`id`, `nome`, `sigla`) VALUES
(1, 'MINAS GERAIS', 'MG'),
(2, 'RIO DE JANEIRO', 'RJ'),
(3, 'SÃO PAULO', 'SP'),
(4, 'AMAZONAS', 'AM'),
(5, 'ALAGOAS', 'AL'),
(6, 'PARANÁ', 'PR'),
(7, 'PARÁ', 'PA'),
(8, 'RIO GRANDE DO SUL', 'RS'),
(9, 'RIO GRANDE DO NORTE', 'RN'),
(10, 'SANTA CATARINA', 'SC'),
(11, 'ESPÍRITO SANTO', 'ES'),
(12, 'BAHIA', 'BA'),
(13, 'DISTRITO FEDERAL', 'DF'),
(14, 'MATO GROSSO', 'MT'),
(15, 'MATO GROSSO DO SUL', 'MS'),
(16, 'PIAUÍ', 'PI'),
(17, 'PERNAMBUCO', 'PE'),
(18, 'ACRE', 'AC'),
(19, 'CEARÁ', 'CE'),
(20, 'MARANHÃO', 'MA'),
(21, 'PARAÍBA', 'PB'),
(22, 'SERGIPE', 'SE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunoavalia`
--
ALTER TABLE `alunoavalia`
  ADD PRIMARY KEY (`ano`,`id`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cursoavalia`
--
ALTER TABLE `cursoavalia`
  ADD PRIMARY KEY (`ano`,`instituicao_id`,`curso_id`);

--
-- Indexes for table `instituicao`
--
ALTER TABLE `instituicao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instituicaoavalia`
--
ALTER TABLE `instituicaoavalia`
  ADD PRIMARY KEY (`instituicao_id`,`ano`);

--
-- Indexes for table `uf`
--
ALTER TABLE `uf`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunoavalia`
--
ALTER TABLE `alunoavalia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id do Aluno';
--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id do Curso',AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `instituicao`
--
ALTER TABLE `instituicao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id da Instituicao',AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `uf`
--
ALTER TABLE `uf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id da UF',AUTO_INCREMENT=23;
