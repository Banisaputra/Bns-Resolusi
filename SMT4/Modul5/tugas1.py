from swap import *
from routine_min import *
def sortMhs(grub):
    n = len(grub)
    for i in range(1, n):
        nilai = grub[i].NIM
        pos = i
        while pos > 0 and nilai < grub[pos - 1].NIM:
            swap(grub,pos,pos-1)
            pos = pos - 1
           
def cetakList(self):
        for i in self:
            print(i)


class MhsTIF(object): # perhatikan class induknya: Mahasiswa
    """Class MhsTIF yang dibangun dari class Mahasiswa"""
    def __init__(self,nama,NIM,kota,us):
        """Metode inisiasi ini menutupi metode inisiasi di class Manusia."""
        self.nama = nama
        self.NIM = NIM
        self.kotaTinggal = kota
        self.uangSaku = us
    def __str__(self):
        s = self.nama + ", NIM " + str(self.NIM) \
            + ". Tinggal di " + self.kotaTinggal \
            + ". Uang saku Rp " + str(self.uangSaku) \
            + " tiap minggunya."
        return s
    

c0 = MhsTIF("Ika    ", 10, "Sukoharjo  ", 240000)
c1 = MhsTIF("Budi   ", 51, "Sragen     ", 230000)
c2 = MhsTIF("Ahmad  ", 2,  "Surakarta  ", 250000)
c3 = MhsTIF("Chandra", 18, "Sukoharjo  ", 235000)
c4 = MhsTIF("Eka    ", 4,  "Boyolali   ", 230000)
c5 = MhsTIF("Fandi  ", 31, "Salatiga   ", 250000)
c6 = MhsTIF("Deni   ", 13, "Klaten     ", 245000)
c7 = MhsTIF("Galuh  ", 5,  "Wonogiri   ", 245000)
c8 = MhsTIF("Janto  ", 23, "Klaten     ", 245000)
c9 = MhsTIF("Hasan  ", 64, "Karanganyar", 270000)
c10 =MhsTIF("Khalid ", 29, "Purwodadi  ", 265000)

Daftar = [c0,c1,c2,c3,c4,c5,c6,c7,c8,c9,c10]


