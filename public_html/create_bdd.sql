create table professeur (
    prof_num int AUTO_INCREMENT primary key,
    prof_mdp char(50), 
    prof_login char(50),
    prof_nom varchar(255),
    prof_prenom varchar(255));

create table type ( 
    tp_code int primary key,
    tp_libelle varchar(255));

create table etat (
    et_code int primary key,
    et_libelle varchar(255));

create table entreprise (
    ent_num int AUTO_INCREMENT primary key,
    ent_nom varchar(255),
    ent_adresse varchar(255),
    ent_mail varchar(255),
    ent_tel char(50),
    ent_nom_correspondant varchar(255),
    ent_ville varchar(255),
    ent_codepostal char(50),
    tp_code int,
    et_code int,
    CONSTRAINT fk_et_code foreign key (et_code) REFERENCES etat(et_code),
    CONSTRAINT fk_tp_code foreign key (tp_code) REFERENCES type(tp_code));

create table proposition_stage (
    prop_num int AUTO_INCREMENT  primary key, 
    ent_num int,
    et_code int,
    prop_intitule varchar(255),
    prop_description varchar(255),
    prop_competence_recherche varchar(255),
    CONSTRAINT fk_ent_num foreign key (ent_num) REFERENCES entreprise(ent_num),
    CONSTRAINT fk_et_code2 foreign key (et_code) REFERENCES etat(et_code));
    
    



