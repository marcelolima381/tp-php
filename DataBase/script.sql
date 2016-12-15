DROP DATABASE IF EXISTS jobfinder;
CREATE DATABASE IF NOT EXISTS jobfinder
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

use jobfinder;

DROP TABLE IF EXISTS credentials;
CREATE TABLE IF NOT EXISTS credentials(

  credencial VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL,

  CONSTRAINT pk_credentials PRIMARY KEY (credencial)

)DEFAULT charset = utf8;

DROP TABLE IF EXISTS login_map;
CREATE TABLE IF NOT EXISTS login_map(

  id INT NOT NULL,
  type ENUM('user','company','job') NOT NULL,
  email VARCHAR(100) NOT NULL,

  CONSTRAINT pk_login_map PRIMARY KEY (email)

)DEFAULT charset = utf8;


DROP TABLE IF EXISTS empresa;
CREATE TABLE IF NOT EXISTS empresa(

  id INT NOT NULL AUTO_INCREMENT,

  name VARCHAR(45) NOT NULL,
  email VARCHAR(45) NOT NULL,
  profile_text TEXT,
  location VARCHAR(45),
  phone VARCHAR(45),

  CONSTRAINT pk_empresa PRIMARY KEY(id)

)DEFAULT charset = utf8;

DROP TABLE IF EXISTS usuario;
CREATE TABLE IF NOT EXISTS usuario(

  id INT NOT NULL AUTO_INCREMENT,

  name VARCHAR(45) NOT NULL,
  birth_day DATE,
  email VARCHAR(45) NOT NULL,
  phone VARCHAR(45),
  profile_text TEXT,

  CONSTRAINT pk_usuario PRIMARY KEY(id)

)DEFAULT charset = utf8;

DROP TABLE IF EXISTS vaga;
CREATE TABLE IF NOT EXISTS vaga(

  id INT NOT NULL AUTO_INCREMENT,
  empresa_id INT NOT NULL,

  name VARCHAR(45) NOT NULL,
  profile_text TEXT NOT NULL,
  salary VARCHAR(45) NOT NULL,
  requirements VARCHAR(45) NOT NULL,
  work_load VARCHAR(45) NOT NULL,

  CONSTRAINT pk_vaga PRIMARY KEY(id),
  CONSTRAINT fk_vaga_empresa FOREIGN KEY(empresa_id)
  REFERENCES empresa(id)
  ON DELETE CASCADE

)DEFAULT charset = utf8;

DROP TABLE IF EXISTS usuario_tem_vaga;
CREATE TABLE IF NOT EXISTS usuario_tem_vaga(

  usuario_id INT NOT NULL,
  vaga_id INT NOT NULL,
  empresa_id INT NOT NULL,

  CONSTRAINT pk_usuario_tem_vaga PRIMARY KEY(usuario_id,vaga_id,empresa_id),
  CONSTRAINT fk_usuario_tem_vaga_usuario FOREIGN KEY(usuario_id)
  REFERENCES usuario(id)
  ON DELETE CASCADE,
  CONSTRAINT fk_usuario_tem_vaga_vaga FOREIGN KEY(vaga_id)
  REFERENCES vaga(id)
  ON DELETE CASCADE,
  CONSTRAINT fk_usuario_tem_vaga_empresa FOREIGN KEY(empresa_id)
  REFERENCES empresa(id)
  ON DELETE CASCADE

)DEFAULT charset = utf8;

DROP TABLE IF EXISTS area;
CREATE TABLE IF NOT EXISTS area(

  id INT NOT NULL AUTO_INCREMENT,
  empresa_id INT NOT NULL,

  name VARCHAR(45) NOT NULL,
  description TEXT NOT NULL,

  CONSTRAINT pk_area PRIMARY KEY(id),
  CONSTRAINT fk_area_empresa FOREIGN KEY(empresa_id)
  REFERENCES empresa(id)
  ON DELETE CASCADE

)DEFAULT charset = utf8;

DROP TABLE IF EXISTS graduation;
CREATE TABLE IF NOT EXISTS graduation(

  id INT NOT NULL AUTO_INCREMENT,
  usuario_id INT NOT NULL,

  description TEXT NOT NULL,
  year DATE NOT NULL,

  CONSTRAINT pk_graduation PRIMARY KEY(id),
  CONSTRAINT fk_graduation_usuario FOREIGN KEY(usuario_id)
  REFERENCES usuario(id)
  ON DELETE CASCADE

)DEFAULT charset = utf8;

DROP TABLE IF EXISTS contribution;
CREATE TABLE IF NOT EXISTS contribution(

  id INT NOT NULL AUTO_INCREMENT,
  usuario_id INT NOT NULL,

  description TEXT NOT NULL,

  CONSTRAINT pk_contribution PRIMARY KEY(id),
  CONSTRAINT fk_contribution_usuario FOREIGN KEY(usuario_id)
  REFERENCES usuario(id)
  ON DELETE CASCADE

)DEFAULT charset = utf8;

DROP TABLE IF EXISTS experience;
CREATE TABLE IF NOT EXISTS experience(

  id INT NOT NULL AUTO_INCREMENT,
  usuario_id INT NOT NULL,

  description TEXT NOT NULL,
  year DATE NOT NULL,

  CONSTRAINT pk_experience PRIMARY KEY(id),
  CONSTRAINT fk_experience_usuario FOREIGN KEY(usuario_id)
  REFERENCES usuario(id)
  ON DELETE CASCADE

)DEFAULT charset = utf8;

DROP TABLE IF EXISTS skill;
CREATE TABLE IF NOT EXISTS skill(

  id INT NOT NULL AUTO_INCREMENT,
  usuario_id INT NOT NULL,

  description TEXT NOT NULL,
  value INT NOT NULL,

  CONSTRAINT pk_skill PRIMARY KEY(id),
  CONSTRAINT fk_skill_usuario FOREIGN KEY(usuario_id)
  REFERENCES usuario(id)
  ON DELETE CASCADE

)DEFAULT charset = utf8;

DROP TABLE IF EXISTS languages;
CREATE TABLE IF NOT EXISTS languages(

  id INT NOT NULL AUTO_INCREMENT,
  usuario_id INT NOT NULL,

  description TEXT NOT NULL,
  value INT NOT NULL,

  CONSTRAINT pk_languages PRIMARY KEY(id),
  CONSTRAINT fk_languages_usuario FOREIGN KEY(usuario_id)
  REFERENCES usuario(id)
  ON DELETE CASCADE

)DEFAULT charset = utf8;
