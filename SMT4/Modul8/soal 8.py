#coba
class Stack():
    def __init__(self):
        self.items = []
    def isEmpty(self):
        return len(self)==0
    def __len__(self):
        return len(self.items)
    def peek(self):
        assert not self.isEmpty()
        return self.items[-1]
    def pop(self):
        assert not self.isEmpty()
        return self.items.pop()
    def push(self, data):
        return self.items.append(data)

def cetakBiner(d):
    f = Stack()
    if d  == 0: f.push(0);
    while d !=0:
        sisa = d%2
        d = d//2
        f.push(sisa)
    st = ""
    for i in range (len(f)):
        st = st + str(f.pop())
    return st
    

#Nomor 1

def cetakHexa(data):
    hx = Stack()
    hxlist = "0123456789ABCDEF"
    while data != 0:
        sisa = data%16
        data = data//16
        hx.push(hxlist[sisa])
    st=""
    for i in range(len(hx)):
        st = st + str(hx.pop())
    return st

cetakHexa(1000)

#Nomor 2

nilai = Stack()
for i in range(100):
    if i%3 == 0:
        nilai.push(i)
##print(nilai.items)

###Nomor 3

nilai = Stack()
for i in range(30):
    if i%3 == 0:
        nilai.push(i)
    elif i%4 == 0:
        nilai.pop()
##print(nilai.items)

###Nomor 4 Queue

class Queue(object):
    def __init__(self):
        self.qlist = []
    def isEmpty(self):
        return len(self)==0
    def __len__(self):
        return len(self.qlist)
    def enqueue(self,data):
        self.qlist.append(data)
    def dequeue(self):
        assert not self.isEmpty()
        return self.qlist.pop(0)
    def getFront(self):
        return self.qlist[-1]
    def getRear(self):
        return self.qlist[0]

a = Queue()
a.enqueue('aa')
a.enqueue('bb')
a.enqueue('cc')

print(a.qlist)
a.dequeue()
print(a.qlist)
##
##print(a.getFront())
##print(a.getRear())

#Nomor 4 PriorQueue

import heapq
class Prior(object):
    def __init__(self):
        self.qlist= []
    def __len__(self):
        return len(self.qlist)
    def isEmpty(self):
        return len(self)==0
    def enqueue(self, data, prior):
        heapq.heappush(self.qlist, (prior, data))
        self.qlist.sort()
    def dequeue(self):
        return self.qlist.pop(-1)
    def getFront(self):
        return self.qlist[-1]
    def getRear(self):
        return self.qlist[0]
    
a = Prior()

a.enqueue('aa', 5)
a.enqueue('bb', 1)
a.enqueue('cc', 2)

##print(a.qlist)

###Nomor 5

import heapq
class Prior(object):
    def __init__(self):
        self.qlist= []
    def __len__(self):
        return len(self.qlist)
    def isEmpty(self):
        return len(self)==0
    def enqueue(self, data, prior):
        heapq.heappush(self.qlist, (prior, data))
        self.qlist.sort()
    def dequeue(self):
        return self.qlist.pop(-1)
    
a = Prior()

a.enqueue('aa', 5)
a.enqueue('bb', 1)
a.enqueue('cc', 2)

##print(a.qlist)
##a.dequeue()
##print(a.qlist)
