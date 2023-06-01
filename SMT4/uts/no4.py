#4
from no3 import *
def cetakKulit(data, warna):
    for i in data:
        if i.kulit == warna:
            print(i.nama, "warna Kulit", i.kulit)
    return True

cetakKulit(listTmn, "Sawo Matang")
