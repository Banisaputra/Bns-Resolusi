#2
#2a
matrik1 = [2,3]
matrik2 = [[3,4,5],[2,3,4]]
def kalikanMatrik(matrik1, matrik2):
    hasil = []
    jumlah = 0
    for indek in range(len(matrik2[0])):
        for i in range(len(matrik1)):
            jumlah += matrik1[i]*matrik2[i][indek]
        hasil.append(jumlah)
        jumlah = 0
    return hasil
def cetak(self):
    for i in self:
        print(i)
print("soal 2a")
print(matrik1, "=> matrik 1x2")
print(matrik2, "=> matrik 2x3")
print("dikalikan menjadi")
print(kalikanMatrik(matrik1, matrik2), "=> matrik 1x3")
print("=== == "*6)
##2b
def buatIdentitas(n):
    matrik = [[1 if y==x else 0 for y in range(n)] for x in range(n)]
    return cetak(matrik)
print("soal 2b")
print("Membuat Matrik identitas 7x7")
buatIdentitas(7)
