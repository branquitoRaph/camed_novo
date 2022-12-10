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
    nomeFarmacia varchar(150),
    preco decimal(10,2),
    dataFarmacia date,
    medicamentoFarmacia varchar(150)
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
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('11', 'Paracetamol', '20.01', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('12', 'Aspirina', '65.22', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('13', 'Ibuprofeno', '31.98', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('14', 'Dipirona', '38.15', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('15', 'Tylenol', '32.34', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('16', 'Novalgina', '252.87', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('17', 'Alivium', '79.78', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('18', 'Loratadina', '74.83', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('19', 'Cetirizina', '51.87', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('20', 'Hixizine', '55.88', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('21', 'Pseudoefedrina', '70.14', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('22', 'Budesonida', '59.36', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('23', 'Rilan', '46.12', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('24', 'Pimecrolimo', '1344.15', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('25', 'Tacrolimo', '1759.35', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('26', 'Elidel', '403.26', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('27', 'Prednisolona', '33.06', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('28', 'Sumatriptano', '56.95', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('29', 'Mesilato de Diidroergotamina', '86.39', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('30', 'Naramig', '12.28', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('31', 'Zomig', '67.01', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('32', 'Sonridor', '70.87', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('33', 'Cefalium', '26.37', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('34', 'Torsilax', '145.56', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('35', 'Miorrelax', '73.74', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('36', 'Dorflex', '166.88', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('37', 'Salonpas', '15.58', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('38', 'Advil', '31.91', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('39', 'Buscopan', '19.61', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('40', 'Duspatal', '191.92', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('41', 'Maiorad', '35.69', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('42', 'Mesalazina', '1674.12', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('43', 'Profenid', '72.23', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('44', 'Rifaximina', '599.90', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('45', 'Carverol', '32.62', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('46', 'Dimenidrinato', '232.01', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('47', 'Difenidramina', '20.64', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('48', 'Meclizina', '47.51', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('49', 'Levodopa', '78.01', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('50', 'Bromocriptina', '149.19', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('51', 'Escopolamina', '389.23', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('52', 'Granisetrona', '1436.75', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('53', 'Palonosetrona', '502.36', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('54', 'Racecadotrila', '35.00', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('55', 'Enterogermina', '13.82', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('56', 'Bifilac', '112.99', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('57', 'Bidrilac', '99.90', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('58', 'Floratil', '38.95', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('59', 'Tiorfan', '50.73', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('60', 'Clortalidona', '68.14', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('61', 'Indapamida', '98.21', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('62', 'Furosemida', '23.41', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('63', 'Moxonidina', '110.65', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('64', 'Guanabenzo', '73.15', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('65', 'Prazosina', '98.45', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('66', 'Doxazosina', '57.83', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('67', 'Minoxidil', '169.84', 1);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('68', 'Valsartana', '63.94', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('69', 'Eno', '108.44', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('70', 'Estomazil', '13.29', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('71', 'Epocler', '207.48', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('72', 'Pantoprazol', '48.19', 0);
INSERT INTO MEDICAMENTO (idMedicamento, nomeMedicamento, PMVC, necessarioReceita) VALUES ('73', 'Nizatidina', '36.57', 0);
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
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('1','11');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('1','12');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('1','13');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('1','14');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('1','15');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('1','16');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('1','17');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('2','18');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('2','19');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('2','20');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('2','21');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('2','22');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('2','23');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('2','24');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('2','25');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('2','26');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('2','27');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('3','28');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('3','29');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('3','30');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('3','31');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('3','32');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('3','33');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('4','34');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('4','35');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('4','36');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('4','37');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('4','38');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('5','39');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('5','40');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('5','41');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('5','42');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('5','43');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('6','44');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('6','45');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('7','46');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('7','47');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('7','48');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('7','49');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('7','50');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('7','51');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('7','52');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('7','53');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('8','54');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('8','55');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('8','56');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('8','57');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('8','58');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('8','59');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('9','60');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('9','61');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('9','62');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('9','63');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('9','64');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('9','65');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('9','66');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('9','67');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('9','68');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('10','69');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('10','70');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('10','71');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('10','72');
INSERT INTO SINTOMA_MEDICAMENTO(FK_SINTOMA_idSintoma, FK_MEDICAMENTO_idMedicamento) VALUES ('10','73');
