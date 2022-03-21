class Pesan(object):
    """
    Sebuah class bernama Pesan.
    Untuk memahami konsep Class dan Object.
    """
    def __init__(self, sebuahString):
        self.teks = sebuahString
    def cetakIni(self):
        print(self.teks)
    def cetakPakaiHurufKapital(self):
        print(str.upper(self.teks))
    def cetakPakaiHurufKecil(self):
        print(str.lower(self.teks))
    def jumKar(self):
        return len(self.teks)
    def cetakJumlahKarakterku(self):
        print("Kalimatku mempunyai",len(self.teks),"karakter.")
    def perbarui(self,stringBaru):
        self.teks = stringBaru

        
    def apakahTerkandung(self, kata):
        if str(kata) in self.teks:
            return True
        else:
            return False

    def hitungKonsonan(self):
        vokal = "aioueAIUEO"
        jml = 0
        for i in self.teks:
            if i not in vokal and i !=" ":
                jml += 1
        return jml

    def hitungVokal(self):
        vokal = "aiuoeAIUEO"
        jml = 0
        for i in self.teks:
            if i in vokal and i != " ":
                jml += 1
        return jml
