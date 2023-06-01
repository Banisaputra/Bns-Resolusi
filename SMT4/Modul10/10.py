##
##import time
##import random
##def jumlahkan_cara_1(n):
##    hasilnya = 0
##    for i in range (1, n+1):
##        hasilnya = hasilnya + i
##    return hasilnya
##
##def jumlahkan_cara_2(n):
##    return (n*(n+1))/2
##
##for i in range(5):
##    awal = time.time()
##    h = jumlahkan_cara_2(100000)
##    akhir = time.time()
##    print("Jumlah adalah %d, memerlukan %9.8f detik"%(h,akhir-awal))
######

##    
##import time
##import random
##def insertionsort(n):
##    for i in range(1, len(n)):
##        nilai = n[i]
##        m = i
##        while m>0 and nilai<n[m-1]:
##            n[m]=n[m-1]
##            m -=1
##        n[m] = nilai
##        
##print("=== == === Average Case === == ===")
##for i in range (5):
##    L = list(range(3000))
##    random.shuffle(L)
##    awal = time.time()
##    U = insertionsort(L)
##    akhir = time.time()
##    print("Mengurutkan %d bilangan, memerlukan waktu %8.7f detik" %(len(L),akhir))
##
##print("=== == === Worst Case === == ===")
##for i in range (5):
##    L = list(range(3000))
##    awal = time.time()
##    U = insertionsort(L)
##    akhir = time.time()
##    print("Mengurutkan %d bilangan, memerlukan waktu %8.7f detik" %(len(L),akhir))
##
##print("=== == === Best Case === == ===")
##for i in range(5):
##    L = list(range(3000))
##    awal = time.time()
##    U = insertionsort(L)
##    akhir = time.time()
##    print("Mengurutkan %d bilangan, memerlukan waktu %8.7f detik" %(len(L),akhir))
######

##
##from timeit import timeit
##print(timeit('sqrt(2)','from math import sqrt',number = 10000))
##print(timeit('1+2'))
##print(timeit('sin (pi/3)', setup = 'from math import sin,pi'))
##print(timeit('sin (1.047)', setup = 'from math import sin'))
##
####

##
##import timeit
##import matplotlib.pyplot as plt
##def kalangBersusuh(n):
##    for i in range(n):
##        for j in range(n):
##            i+j
##
##def ujiKalangBersusuh(n):
##    ls = []
##    jangkauan = range(1, n+1)
##    ready = "from __main__ import kalangBersusuh"
##    for i in jangkauan:
##        t = timeit.timeit("kalangBersusuh("+str(i)+")", setup=ready, number=1)
##        ls.append(t)
##    return ls
##
##n =100
##LS = ujiKalangBersusuh(n)
##plt.plot(LS)
##skala = 7700000
##plt.plot([x*x/skala for x in range (1, n+1)])
##plt.show()
##
######

##
##from timeit import timeit
##import random
##def jumlahkan_cara_1(n):
##    hasilnya = 0
##    for i in range(1,n+1):
##        hasilnya += i
##    return hasilnya
##
##def jumlahkan_cara_2(n):
##    return (n*(n+1))/2
##
##def insertionsort(a):
##    for i in range(1, len(a)):
##        nilai = a[i]
##        b = i
##        while b > 0 and nilai < a[b - 1]:
##            a[b] = a[b-1]
##            b -=1
##        a[b] = nilai
##
##x = 1000
##y = [3, 4, 2, 1, 2, 5, 9, 3]
##def jml1():
##    jumlahkan_cara_1(x)
##def jml2():
##    jumlahkan_cara_2(x)
##def inst():
##    insertionsort(y)
##
##if __name__ == '__main__':
##    import timeit
##    print("=== == === Jumlahkan cara 1 timeit === == ===")
##    print(timeit.timeit("jml1()",setup = "from __main__ import jml1"))
##    print("=== == === Jumlahkan cara 2 timeit === == ===")
##    print(timeit.timeit("jml2()",setup = "from __main__ import jml2"))
##    print("=== == === Insertion Sort timeit === == ===")
##    print(timeit.timeit("inst()",setup = "from __main__ import inst"))
##
######



##
##import timeit
##import matplotlib.pyplot as plt
##def soal_tiga(n):
##    test = 0
##    for i in range(n):
##        for j in range(n):
##            test = test+i*j
##
##def uji_soal_tiga(n):
##    ls = []
##    jangkauan = range(1, n+1)
##    ready = "from __main__ import soal_tiga"
##    for i in jangkauan:
##        t = timeit.timeit("soal_tiga("+str(i)+")", setup=ready, number=1)
##        ls.append(t)
##    return ls
##
##n =10
##LS = uji_soal_tiga(n)
##plt.plot(LS)
##skala = 7700000
##plt.plot([x*x/skala for x in range (1, n+1)])
##plt.show()
######

##
##import timeit
##import matplotlib.pyplot as plt
##def soal_tiga(n):
##    test = 0
##    for i in range(n):
##        for j in range(i):
##            test = test+i*j
##
##def uji_soal_tiga(n):
##    ls = []
##    jangkauan = range(1, n+1)
##    ready = "from __main__ import soal_tiga"
##    for i in jangkauan:
##        t = timeit.timeit("soal_tiga("+str(i)+")", setup=ready, number=1)
##        ls.append(t)
##    return ls
##
##n =10
##LS = uji_soal_tiga(n)
##plt.plot(LS)
##skala = 7700000
##plt.plot([x*x/skala for x in range (1, n+1)])
##plt.show()
######


##
##import timeit
##import matplotlib.pyplot as plt
##def soal_tiga(n):
##    test = 0
##    for i in range(n):
##        test +=1
##    for j in range(n):
##        test -=15
##
##def uji_soal_tiga(n):
##    ls = []
##    jangkauan = range(1, n+1)
##    ready = "from __main__ import soal_tiga"
##    for i in jangkauan:
##        t = timeit.timeit("soal_tiga("+str(i)+")", setup=ready, number=1)
##        ls.append(t)
##    return ls
##
##n =10
##LS = uji_soal_tiga(n)
##plt.plot(LS)
##skala = 7700000
##plt.plot([x*x/skala for x in range (1, n+1)])
##plt.show()
######


##
##import timeit
##import matplotlib.pyplot as plt
##def soal_tiga(n):
##    i = n
##    while i > 0:
##        k= 2+2
##        i = i//2
##        
##def uji_soal_tiga(n):
##    ls = []
##    jangkauan = range(1, n+1)
##    ready = "from __main__ import soal_tiga"
##    for i in jangkauan:
##        t = timeit.timeit("soal_tiga("+str(i)+")", setup=ready, number=1)
##        ls.append(t)
##    return ls
##
##n =10
##LS = uji_soal_tiga(n)
##plt.plot(LS)
##skala = 7700000
##plt.plot([x*x/skala for x in range (1, n+1)])
##plt.show()
######

##
##import timeit
##import matplotlib.pyplot as plt
##def soal_tiga(n):
##    for i in range(n):
##        for j in range(n):
##            for k in range(n):
##                m = i+j+k+2019
##                
##def uji_soal_tiga(n):
##    ls = []
##    jangkauan = range(1, n+1)
##    ready = "from __main__ import soal_tiga"
##    for i in jangkauan:
##        t = timeit.timeit("soal_tiga("+str(i)+")", setup=ready, number=1)
##        ls.append(t)
##    return ls
##
##n =10
##LS = uji_soal_tiga(n)
##plt.plot(LS)
##skala = 7700000
##plt.plot([x*x/skala for x in range (1, n+1)])
##plt.show()
######

##
##import timeit
##import matplotlib.pyplot as plt
##def soal_tiga(n):
##    for i in range(n):
##        for j in range(i):
##            for k in range(j):
##                m = i+j+k+2019
##                
##def uji_soal_tiga(n):
##    ls = []
##    jangkauan = range(1, n+1)
##    ready = "from __main__ import soal_tiga"
##    for i in jangkauan:
##        t = timeit.timeit("soal_tiga("+str(i)+")", setup=ready, number=1)
##        ls.append(t)
##    return ls
##
##n =10
##LS = uji_soal_tiga(n)
##plt.plot(LS)
##skala = 7700000
##plt.plot([x*x/skala for x in range (1, n+1)])
##plt.show()
######

##
##import timeit
##import matplotlib.pyplot as plt
##def soal_tiga(n):
##    for i in range(n):
##        if i % 3==0:
##            for j in range(n//2):
##                j+=j
##        elif i % 2==0:
##            for j in range(5):
##                j+=j
##        else:
##            for j in range(n):
##                j+=j
##                
##def uji_soal_tiga(n):
##    ls = []
##    jangkauan = range(1, n+1)
##    ready = "from __main__ import soal_tiga"
##    for i in jangkauan:
##        t = timeit.timeit("soal_tiga("+str(i)+")", setup=ready, number=1)
##        ls.append(t)
##    return ls
##
##n =10
##LS = uji_soal_tiga(n)
##plt.plot(LS)
##skala = 7700000
##plt.plot([x*x/skala for x in range (1, n+1)])
##plt.show()
######












