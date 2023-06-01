#5
from no3 import *
def sortUmur(data):
    n = len(data)
    for i in range(1,n):
        value = data[i].umur
        pos = i
        while pos > 0 and value < data[pos-1].umur:
            v = data[pos]
            data[pos] = data[pos-1]
            data[pos-1] = v
            pos = pos-1

print("=== == Before Sorted == ===")
cetakList(listTmn)
print("=== == After Sorted == ===")
sortUmur(listTmn)
cetakList(listTmn)
