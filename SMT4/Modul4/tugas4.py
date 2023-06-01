from lat2 import *
def sakuTerkecil(kelompok):
    batasSaku = 250000
    d = []
    for i in kelompok:
        if i.uangSaku < batasSaku:
            d.append((i.nama, i.uangSaku))
    for i in d:
        print(i)

