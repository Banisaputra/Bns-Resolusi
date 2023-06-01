from lat2 import *
def sakuTerkecil(n):
    baru = n[0].uangSaku
    list = []
    for i in range(len(n)):
        if(n[i].uangSaku == baru):
            list.append(n[i].nama)
        elif(n[i].uangSaku < baru):
            baru = n[i].uangSaku
            list = []
            list.append(n[i].nama)
    return list
