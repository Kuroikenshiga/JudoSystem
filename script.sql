create table categoria(
    id_categoria serial unique,
    classe varchar(30),
    genero varchar(30),
    peso varchar(20),
    primary key(id_categoria,classe,genero,peso)

);
create table usuario(
	id_usuario serial,
	nome varchar(30),
	email varchar(30) unique,
	senha varchar(45),
	primary key(id_usuario),
    categoria_fk int,
    foreign key(categoria_fk) references categoria(id_categoria)
);

create table academia(
	id_academia serial,
	numero_contato varchar(15) unique,
	nome varchar(30),
	estado varchar(30),
	cidade varchar(30),
	bairro varchar(30),
	logradouro varchar(30),
	complemento varchar(45),
	usuario_fk int,
	
	foreign key(usuario_fk) references usuario(id_usuario),
	primary key(id_academia)
);
create table atleta(
	id_atleta serial primary key,
	nome varchar(45),
	faixa varchar(15),
	genero varchar(40),
	data_nascimento date,
	pontuacao decimal(2,1),
	academia_fk int,
	foreign key(academia_fk) references academia(id_academia)
);
create table competicao(
    id_competicao serial unique,
    nome varchar(45),
    data_competicao date,
    estado varchar(45),
    cidade varchar(45),
    bairro varchar(45),
    complemento varchar(45),
    logradouro varchar(45),
    primary key(cidade,bairro,complemento,id_competicao)
);
create table inscricao(
    id_inscricao serial unique,
    atleta_fk int,
    competicao_fk int,
    categoria_fk int,
    primary key(atleta_fk,competicao_fk,categoria_fk,id_inscricao),
    data_inscricao date,
    hora_inscricao time,
    foreign key(atleta_fk) references atleta(id_atleta),
    foreign key(competicao_fk) references competicao(id_competicao),
    foreign key(categoria_fk) references categoria(id_categoria)

);
create table lutas(
    id_lutas serial primary key,
    tempo varchar(4),
    hansoku_make boolean,
    ganhou boolean,
    goldenScore varchar(4),
    atleta_fk int,
    categoria_fk int,
    foreign key(atleta_fk) references atleta(id_atleta),
    foreign key (categoria_fk) references categoria(id_categoria)

);
create table lutadores(
    id_lutadores serial primary key,
    wazari_1 varchar(30),
    wazari_2 varchar(30),
    ippon varchar(30),
    tecnica_ne_waza varchar(30),
    tecnica decimal(2,1),
    forca decimal(2,1),
    condicionamento_fisico decimal(2,1),
    lutador_casa boolean,
    falta_lutador int,
    luta_fk int,
	oponente int,
    foreign key(luta_fk) references lutas(id_lutas),
    foreign key(oponente) references lutadores(id_lutadores)
);

create table podio(
    id_podio serial primary key,
    lugar_1 int,
    lugar_2 int,
    lugar_3 int,
    lugar_3_2 int,
    pontuacao_1 decimal(2,1),
    pontuacao_2 decimal(2,1),
    pontuacao_3 decimal(2,1),
    pontuacao_3_2 decimal(2,1),
    competicao_fk int,
    categoria_fk int,
    foreign key(lugar_1) references atleta(id_atleta),
    foreign key(lugar_2) references atleta(id_atleta),
    foreign key(lugar_3) references atleta(id_atleta),
    foreign key(lugar_3_2) references atleta(id_atleta),
    foreign key(competicao_fk) references competicao(id_competicao),
    foreign key(categoria_fk) references categoria(id_categoria) 
);



































