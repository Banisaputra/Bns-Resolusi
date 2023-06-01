from time import time as detak
from random import shuffle as kocok
from modulSort import *

k = []
for i in range(1,6001):
    k.append(i)
kocok(k)
u_bub = k[:] ## \\
u_sel = k[:] ## -- Jangan lupa simbol [:]-nya!.
u_ins = k[:] ## --
u_qck = k[:] ## --
u_mrg = k[:] ## //
print("Penghitungan pengurutan dengan range ",len(k))
aw=detak();bubbleSort(u_bub);ak=detak();print("bubble: %g detik" %(ak-aw));
aw=detak();selectionSort(u_sel);ak=detak();print("selection: %g detik" %(ak-aw));
aw=detak();insertionSort(u_ins);ak=detak();print("insertion: %g detik" % (ak-aw));
aw=detak();margeSort(u_mrg);ak=detak();print("merge: %g detik" %(ak-aw));
aw=detak();quickSort(u_qck);ak=detak();print("quick: %g detik" %(ak-aw));
