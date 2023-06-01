import pandas as pd

file = pd.ExcelFile('data.xlsx')
fd = file.parse(file.sheet_names[0])
list = fd.to_dict()
data = []
for indeks in range(0, len(list['No'])):  #Mengukur panjang kolom 
    kata = ''
    posisi = 0
    for i in list:
        posisi += 1
        kata += str(list[i][indeks])
        if posisi != 4:
            kata += '*'
    data.append(kata.split('*'))
##print(data)

class Queue(object):
    def __init__(self):
        self.qlist = []
    def __len__(self):
        return len(self.qlist)
    def enqueue(self,data):
        self.qlist.append(data)
    def dequeue(self):
        return self.qlist.pop(0)

a = Queue()
nt = len(data)
uniq = set()
while nt != 0:
    for x in data:
        if x[2] not in tuple(uniq):
            print (x[2], "===> telah ditambahkan\n")
            uniq.add(x[2])
            a.enqueue(x[2])
        else :
            print(x[2], "===> data sudah ada bossku :)\n")
        nt -=1

print("jumlah tempat pertandingan = ",len(a.qlist),"\ndaftar tempat pertandingan\n",a.qlist)
print('=== == '*8)
print("urutan tempat pertandingan")
for y in range(len(a.qlist)):
    print(a.dequeue())
print(a.qlist)
