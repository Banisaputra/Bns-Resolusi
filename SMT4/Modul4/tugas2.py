from lat2 import *
def sakuKecil(data):
    kecil = data[0]
    for i in range(len(data)):
        if data[i].uangSaku < kecil.uangSaku:
            kecil = data[i]
    k = str(kecil.nama)+" uang saku "+str(kecil.uangSaku)
    return k
