#3
class teman():
    def __init__(self, nama, umur, kulit):
        self.nama = nama
        self.umur = umur
        self.kulit = kulit
    def __str__(self):
        return str(self.nama)+", "+str(self.umur)+" th => "+str(self.kulit)
    
tmn1 = teman("Joko   ",20,"Sawo Matang")
tmn2 = teman("Bobi   ",22,"Kuning Langsat")
tmn3 = teman("Tina   ",21,"Putih")
tmn4 = teman("Riski  ",18,"Sawo Matang")
tmn5 = teman("Anton  ",17,"Kuning Langsat")
tmn6 = teman("Doni   ",23,"Putih")
tmn7 = teman("Riyan  ",16,"Kuning Langsat")
tmn8 = teman("Adit   ",24,"Sawo Matang")
tmn9 = teman("Arik   ",15,"Kuning Langsat")
tmn10 =teman("Gunawan",16,"Putih")

listTmn = [tmn1,tmn2,tmn3,tmn4,tmn5,tmn6,tmn7,tmn8,tmn9,tmn10]

def cetakList(self):
    for i in self:
        print(i)           
def ListNama(self):
    for i in self:
        print(i.nama)
def ListUmur(self):
    for i in self:
        print(i.umur)
def ListKulit(self):
    for i in self:
        print(i.kulit)

##print("=== == Daftar Teman == ===")
##cetakList(listTmn)
##print("=== == Daftar Nama == ===")
##ListNama(listTmn)
##print("=== == Daftar Umur == ===")
##ListUmur(listTmn)
##print("=== == Daftar Warna Kulit == ===")
##ListKulit(listTmn)


