from time import time as detak
from random import shuffle as kocok
from soal5 import *
from soal6 import *

k = []
for i in range(1,10001):
    k.append(i)
kocok(k)  
u_qck = k[:] ## -- Jangan lupa simbol [:]-nya!.
u_mrg = k[:] ## //
print("Penghitungan pengurutan dengan range ",len(k))
aw=detak();margeSort(u_mrg);ak=detak();print("merge: %g detik" %(ak-aw));
aw=detak();quickSort(u_qck);ak=detak();print("quick: %g detik" %(ak-aw));
