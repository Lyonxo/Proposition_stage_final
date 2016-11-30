INSERT INTO `type`(`tp_code`, `tp_libelle`) VALUES 
(1,"grande surface"),
 (2,"Association a but non lucratif"),
 (3,"Association"),
 (4,"SSI"),
 (5,"FAI (fournisseur d'acces internet)"),
 (6,"entreprise"),
 (7,"école"),
 (8,"collège"),
 (9,"lycée"),
 (10,"fac"),
 (12,"mairie"),
 (13,"autre");

 INSERT INTO `professeur`(`prof_num`, `prof_mdp`, `prof_login`, `prof_nom`, `prof_prenom`) VALUES 
 ("","mdpfichet","cfichet","fichet","claude"),
 ("","mdpcastillo","jcccastillo","castillo","jean-christophe"),
 ("","mdpbouchereau","bbouchereau","bouchereau","bretrrand");

INSERT INTO `etat`(`et_code`, `et_libelle`) VALUES 
 ('0','en attente de validation'),
 ('1','valider'),
 ('2','refusé');
