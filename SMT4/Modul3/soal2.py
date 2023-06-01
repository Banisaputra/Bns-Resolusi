def Nol(n, m=None):
    if(m==None):
        m = n
    print ("Matriks 0 dengan Ordo "+str(n)+"x"+str(m))
    print ([[0 for j in range(m)] for i in range (n)])

def Identitas(n):
    print("Matriks Identitas dengan Ordo "+str(n)+"x"+str(n))
    print([[1 if j==i else 0 for j in range(n)] for i in range(n)])
