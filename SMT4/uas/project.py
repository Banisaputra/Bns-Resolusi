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
for x in data:
    a.enqueue(x[2])
print(a.qlist)
print('=== == '*8)
while (len(a.qlist)) != 0:
    for y in a.qlist:
        a.dequeue()
        print(y)
print(a.qlist)








































