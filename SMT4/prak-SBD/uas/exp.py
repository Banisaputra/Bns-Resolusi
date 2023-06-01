##import mysql.connector
##
##con = mysql.connector.connect(user="root", db="rumah_sehat_L200190151")
##dbcursor=con.cursor()
##sql_dokter = "INSERT INTO dokter(id_dokter,nama_dokter,alamat,spesialis)VALUES(%s,%s,%s,%s)"
##data_dokter = [(101,'Azizah Fatma','Bandung','Umum'),
##               (102,'Febrian Kusuma','Klaten','Paru-paru'),
##               (103,'Adul Jaini','Surakarta','THT'),
##               (104,'Yunita Nugraha','Madiun','Bedah'),
##               (105,'Alana Susanto','Magetan','Umum'),
##               (106,'Susi Panandi','Bandung','Jantung'),
##               (107,'Andita Pras','Klaten','THT'),
##               (108,'Fajar Nugroho','Surakarta','Jantung'),
##               (109,'Danirmala ara','Madiun','Anak'),
##               (1010,'Clara Santi','Surakarta','Kulit'),
##               (1011,'Bani Syahputra','Ngawi','Mata'),
##               (1012,'Alyaa Salsabilla','Batang','Umum'),
##               (1013,'Hanyfah Rizqi','Madiun','Umum'),
##               (1014,'Indra Nurfarida','Magetan','Jantung'),
##               (1015,'Claire','Jakarta','Penyakit dalam'),
##               (1016,'Ersa Fatmawati','Wonogiri','Mata'),
##               (1017,'Fernando','Surakarta','Umum'),
##               (1018,'Anindita','Wonogiri','Anak'),
##               (1019,'Fernii Suda','Ngawi','Kulit'),
##               (1020,'Cinta Dila','Sukabumi','Saraf'),
##               (1021,'Amira','Surabaya','Umum')]
##for val in data_dokter:
##        dbcursor.execute(sql_dokter,val)
##        con.commit()
##print("input data Success")
##
##import mysql.connector
##
##con = mysql.connector.connect(user="root", db="rumah_sehat_L200190151")
##dbcursor=con.cursor()
##sql_obat = "INSERT INTO obat(no_obat,nama_obat,jenis_obat,harga_obat,id_dokter)VALUES(%s,%s,%s,%s,%s)"
##data_obat = [(121,'Amoxicillin','Tablet',35000,102),
##        (122,'Rohto Cool','Tetes',14000,104),
##        (123,'Angiotensin-converting enzyme (ACE)','Tablet',150000,103),
##        (124,'Alleron','Tablet',20000,1011),
##        (125,'Mertigo','Tablet',40000,1012),
##        (126,'Angiotensin-converting enzyme (ACE)','Tablet',150000,109),
##        (127,'Ibuprofen','Tablet',25000,107),
##        (128,'FLUIMUCIL ADULT 200MG ZAK','Tablet',60000, 101),
##        (129,'Epinefrin','Tablet',100000,1017),
##        (1210,'Dopamin','Tablet',20000,1020),
##        (1211,'Triprolidine','Tablet',25000,1019),
##        (1212,'Psidii Sirup','Sirup',70000,1016),
##        (1213,'DETOPAR DE NATURE','Tablet',295000,1018),
##        (1214,'ACE Inhibitor','Tablet',15000,1015),
##        (1215,'Ciprofloxacin','Tablet',25000,106)]
##for val in data_obat:
##        dbcursor.execute(sql_obat,val)
##        con.commit()
##print("input data Success")
##
##
##import mysql.connector
##
##con = mysql.connector.connect(user="root", db="rumah_sehat_L200190151")
##dbcursor=con.cursor()
##sql_pasien = "INSERT INTO pasien(no_pasien,nama_pasien,alamat,tanggal_lahir,id_dokter,no_obat) VALUES(%s,%s,%s,%s,%s,%s)"
##data_pasien = [(1101,'Fernanda Mona','Sukabumi','1967-06-22',1012,121),
##               (1102,'Monalisa Septi','Cimahi','1976-07-23',101,125),
##               (1103,'Rany Indra','Bandung','1998-09-31',105,126),
##               (1104,'Septiyarani','Bogor','1978-10-1',108,1212),
##               (1105,'Berlin Rizki','Makassar','1977-11-5',1010,1210),
##               (1106,'Permatasari Nina','Surakarta','1998-08-9',105,129),
##               (1107,'Dinda Amania','Madiun','1999-07-8',103,122),
##               (1108,'Amaliata ','Surakarta','1999-08-7',109,124),
##               (1109,'Ulfa Anggun','Cimahi','2000-05-23',1017,127),
##               (1110,'Fefy Kustania','Batang','2001-01-1',1020,128),
##               (1111,'Ilyas Raihan','Cimahi','1995-06-15',1021,1213),
##               (1112,'Nadhip Rafid','Bogor','2016-08-17',106,1211),
##               (1113,'Arafid','Surakarta','1989-05-5',102,1214),
##               (1114,'Ika Wulandari','Madiun','1977-09-21',1019,128),
##               (1115,'Olivia Ananta','Bogor','1977-11-5',1015,129)]
##for val in data_pasien:
##        dbcursor.execute(sql_pasien,val)
##        con.commit()
##print("input data Success")
##
##import mysql.connector
##
##con = mysql.connector.connect(user="root", db="rumah_sehat_L200190151")
##dbcursor=con.cursor()
##
##sql_konsul = "INSERT INTO konsultasi(keluhan,gejala,solusi,id_dokter,no_pasien,no_obat)VALUES(%s,%s,%s,%s,%s,%s)"
##data_konsul = [("pusing-pusing","sering pingsan","istirahat yang cukup",103,1101,126),
##        ("gatal-gatal","kulit memerah","hidarkan dari debu",105,1112,124),
##        ("badan kurang enak","pegal-pegal","kurangi konsumsi gula",108,1102,1210),
##        ("mata sulit melihat","mata memerah","kompres dengan air hangat",1010,1109,128),
##        ("buat makan sakit","suara serak","kurangi minum es",106,1110,1213),
##        ("nyeri sendi","susah bergerak","perbaiki pola tidur",1021,1111,1212),
##        ("sakit gigi","ngilu","makan makanan halus",1019,1113,1211),
##        ("suka pingsan","berkunang-kunang","istirahat yang cukup",1012,1103,121),
##        ("lidah kelu","makan tidak enak","terapi lidah",1018,1104,1210),
##        ("hidung tersumbat","sulit tidur","minum yang hangat_hangat",104,1105,125),
##        ("pendengaran terganggu","sakit telinga","bersihkan kotoran telinga",102,1114,1215),
##        ("kaki bengkak","nyeri sendi","istirahat yang cukup",1010,1115,127),
##        ("sesak nafas","sulit bernafas","kurangi aktifitas berat",1017,1106,123),
##        ("kurang nafsu makan","makan tidak habis","minum vitamin",1015,1108,129),
##        ("kedinginan","menggigil","gunakan pakaian yang hangat",1013,1107,128)]
##for val in data_konsul:
##        dbcursor.execute(sql_konsul,val)
##        con.commit()
##print("input data Success")
