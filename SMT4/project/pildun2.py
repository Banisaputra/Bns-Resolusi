import csv 
from texttable import Texttable

##MEMBUKA FILE CSV
data = open('pildun.csv','r')
read = csv.reader(data, delimiter=';')
pildun = []
for row in read:
    pildun.append(row)

print(pildun)
    
##SORTING BERDASARKAN HURUF ALFABET DARI KOLOM TEMPAT PERTANDINGAN
def sortTempat():
    for i in range(1,len(pildun)):
        value = pildun[i][1]
        swap = pildun[i]
        j = i-1
        while j >= 1 and pildun[j][1] > value:
            pildun[j+1] = pildun[j]
            j = j-1
        pildun[j+1] = swap

    tt = Texttable()
    tt.add_rows(pildun)
    print(tt.draw())
    
sortTempat()

##SORTING BERDASARKAN WAKTU PERTANDINGAN DARI AWAL
def sortWaktuAwal():
    for i in range(1,len(pildun)):
        value = pildun[i][2]
        swap = pildun[i]
        j = i-1
        while j >= 1 and pildun[j][2] > value:
            pildun[j+1] = pildun[j]
            j = j-1
        pildun[j+1] = swap

    tt = Texttable()
    tt.add_rows(pildun)
    print(tt.draw())

sortWaktuAwal()

##SORTING BERDASARKAN WAKTU PERTANDINGAN DARI AKHIR
def sortWaktuAwal():
    for i in range(1,len(pildun)):
        value = pildun[i][2]
        swap = pildun[i]
        j = i-1
        while j >= 1 and pildun[j][2] < value:
            pildun[j+1] = pildun[j]
            j = j-1
        pildun[j+1] = swap

    tt = Texttable()
    tt.add_rows(pildun)
    print(tt.draw())

sortWaktuAwal()
