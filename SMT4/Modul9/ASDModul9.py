class simpulbiner(object):
    def __init__(self, data):
        self.data=data
        self.kiri=None
        self.kanan=None

    def __str__(self):
        return str(self.data)

A=simpulbiner('Ambarawa')
B=simpulbiner('Bantul')
C=simpulbiner('Cimahi')
D=simpulbiner('Denpasar')
E=simpulbiner('Enrekang')
H=simpulbiner('Halmahera Timur')


A.kiri=B; A.kanan=C
B.kiri=D; B.kanan=E
D.kiri=H; 
##
##6
def size(node):
    if node is None: 
        return 0
    else: 
        return (size(node.kiri)+ 1 + size(node.kanan)) 

##print('Ukuran dari Binary Tree ini adalah', size(A))

#####7
def tinggipohon(a): 
    if a is None: 
        return 0 ;  
  
    else : 
        kirtinggi = tinggipohon(a.kiri) 
        kantinggi = tinggipohon(a.kanan) 
  
        if (kirtinggi > kantinggi): 
            return kirtinggi+1
        else: 
            return kantinggi+1
        
##print("Tinggi max Binnary Tree ini adalah",tinggipohon(A))

#####8
datalist=[A.data, B.data, C.data, D.data, E.data, H.data]
level=[]

def preorder(sub):
    if sub is not None:
        print(sub.data)
        preorder(sub.kiri)
        preorder(sub.kanan)
        
def inorder(sub):
    if sub is not None:
        inorder(sub.kiri)
        print(sub.data)
        inorder(sub.kanan)

def postorder(sub):
    if sub is not None:
        postorder(sub.kiri)
        postorder(sub.kanan)
        print(sub.data)
def traverse(root):
    lvlist=[]
    current_level = [root]
    lv=0
    while current_level:
        next_level = list()
        for n in current_level:
            if n.kiri:
                next_level.append(n.kiri)
                level.append(lv+1)
            if n.kanan:
                next_level.append(n.kanan)
                level.append(lv+1)
            current_level = next_level
            
        lv+=1
        lvlist.append(lv)
    return lvlist


def cetak(root):
    traverse(A)
    print(root.data, ', Level 0')
    for i in range(len(level)):
          print(datalist[i+1], ', Level', level[i])
cetak(A)
print("-----*****preorder*****-----")
preorder(A)
print("-----*****inorder*****-----")
inorder(A)
print("-----*****postorder*****-----")
postorder(A)
