/*Deletando as tabelas*/
/*Apaga o que tiver criado*/
DROP DATABASE IF EXISTS camed;

/* Cria a base de dados company */
CREATE DATABASE camed;

/*Utiliza a base de dados criada */
USE camed;

/*Criando as tabelas (banco de dados)*/

CREATE TABLE MEDICAMENTO (
    idMedicamento integer PRIMARY KEY AUTO_INCREMENT,
    nomeMedicamento varchar(150),
    PMVC decimal(10,2),
    necessarioReceita BIT,
    descriBula varchar(200)
);

CREATE TABLE SINTOMA (
    idSintoma integer PRIMARY KEY AUTO_INCREMENT,
    nomeSintoma varchar(150)
);

CREATE TABLE USUARIO (
    idUsuario integer PRIMARY KEY AUTO_INCREMENT,
    nomeUsuario varchar(150),
    senha varchar(150),
    dataNascimento date,
    sobrenomeUsuario varchar(150),
    emailUsuario varchar(150)
);

CREATE TABLE ENDERECO (
    idEndereco integer PRIMARY KEY AUTO_INCREMENT,
    cep varchar(150),
    descriLogradouro varchar(500),
    numero integer,
    complemento varchar(500),
    bairro varchar(500),
    municipio varchar(500),
    estado varchar(500),
    FK_USUARIO_idUsuario integer,
    FK_FARMACIA_idFarmacia integer
);

CREATE TABLE MENSAGEM (
    idMensagem integer PRIMARY KEY AUTO_INCREMENT,
    descriMensagem varchar(500),
    descriCategoria varchar(500),
    emailContato varchar(150),
    FK_USUARIO_idUsuario integer
);

CREATE TABLE FARMACIA (
    idFarmacia integer PRIMARY KEY AUTO_INCREMENT,
    nomeFarmacia varchar(150)
);

CREATE TABLE SINTOMA_MEDICAMENTO (
    FK_SINTOMA_idSintoma integer,
    FK_MEDICAMENTO_idMedicamento integer
);

CREATE TABLE SINTOMA_USUARIO (
    FK_SINTOMA_idSintoma integer,
    FK_USUARIO_idUsuario integer,
    dataSintoma date
);

CREATE TABLE MEDICAMENTO_FARMACIA (
    FK_FARMACIA_idFarmacia integer,
    FK_MEDICAMENTO_idMedicamento integer,
    preco decimal(10.2)
);
 
ALTER TABLE ENDERECO ADD CONSTRAINT FK_ENDERECO_2
    FOREIGN KEY (FK_USUARIO_idUsuario)
    REFERENCES USUARIO (idUsuario)
    ON DELETE RESTRICT;
 
ALTER TABLE ENDERECO ADD CONSTRAINT FK_ENDERECO_3
    FOREIGN KEY (FK_FARMACIA_idFarmacia)
    REFERENCES FARMACIA (idFarmacia)
    ON DELETE RESTRICT;
 
ALTER TABLE MENSAGEM ADD CONSTRAINT FK_MENSAGEM_2
    FOREIGN KEY (FK_USUARIO_idUsuario)
    REFERENCES USUARIO (idUsuario)
    ON DELETE CASCADE;
 
ALTER TABLE SINTOMA_MEDICAMENTO ADD CONSTRAINT FK_SINTOMA_MEDICAMENTO_1
    FOREIGN KEY (FK_SINTOMA_idSintoma)
    REFERENCES SINTOMA (idSintoma)
    ON DELETE RESTRICT;
 
ALTER TABLE SINTOMA_MEDICAMENTO ADD CONSTRAINT FK_SINTOMA_MEDICAMENTO_2
    FOREIGN KEY (FK_MEDICAMENTO_idMedicamento)
    REFERENCES MEDICAMENTO (idMedicamento)
    ON DELETE RESTRICT;
 
ALTER TABLE SINTOMA_USUARIO ADD CONSTRAINT FK_SINTOMA_USUARIO_1
    FOREIGN KEY (FK_SINTOMA_idSintoma)
    REFERENCES SINTOMA (idSintoma)
    ON DELETE SET NULL;
 
ALTER TABLE SINTOMA_USUARIO ADD CONSTRAINT FK_SINTOMA_USUARIO_2
    FOREIGN KEY (FK_USUARIO_idUsuario)
    REFERENCES USUARIO (idUsuario)
    ON DELETE SET NULL;
 
ALTER TABLE MEDICAMENTO_FARMACIA ADD CONSTRAINT FK_MEDICAMENTO_FARMACIA_1
    FOREIGN KEY (FK_FARMACIA_idFarmacia)
    REFERENCES FARMACIA (idFarmacia)
    ON DELETE RESTRICT;
 
ALTER TABLE MEDICAMENTO_FARMACIA ADD CONSTRAINT FK_MEDICAMENTO_FARMACIA_2
    FOREIGN KEY (FK_MEDICAMENTO_idMedicamento)
    REFERENCES MEDICAMENTO (idMedicamento)
    ON DELETE RESTRICT;

/*Inserindo os dados*/

INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('1', 'Algy-Flanderil', '19.26', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('2', 'Sumax', '75.87', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('3', 'Simeticona', '12.36', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('4', 'Paco', '93.06', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('5', 'Cimetidina', '12.9', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('6', 'Omeprazol', '31.68', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('7', 'Vonau', '43.15', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('8', 'Losartana', '43.78', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('9', 'Loperamida', '18.9', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('10', 'Cloridrato de Fexofenadina', '15.74', 0);
INSERT INTO SINTOMA (idSintoma, nomeSintoma) VALUES ('1', 'Febre'); 
INSERT INTO SINTOMA (idSintoma, nomeSintoma) VALUES ('2', 'Alergia'); 
INSERT INTO SINTOMA (idSintoma, nomeSintoma) VALUES ('3', 'Dor de Cabeça'); 
INSERT INTO SINTOMA (idSintoma, nomeSintoma) VALUES ('4', 'Dores Musculares'); 
INSERT INTO SINTOMA (idSintoma, nomeSintoma) VALUES ('5', 'Dores Intestinais');
INSERT INTO SINTOMA (idSintoma, nomeSintoma) VALUES ('6', 'Gases'); 
INSERT INTO SINTOMA (idSintoma, nomeSintoma) VALUES ('7', 'Vômito'); 
INSERT INTO SINTOMA (idSintoma, nomeSintoma) VALUES ('8', 'Diarréia'); 
INSERT INTO SINTOMA (idSintoma, nomeSintoma) VALUES ('9', 'Pressão'); 
INSERT INTO SINTOMA (idSintoma, nomeSintoma) VALUES ('10', 'Azia'); 
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('1','1');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('2','10');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('3','2');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('4','4');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('5','6');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('6','3');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('7','7');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('8','9');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('9','8');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('10','5');
