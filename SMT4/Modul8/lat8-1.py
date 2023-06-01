#latihan 8.3

class Stack:
    def __init__(self):
        self.items = []

    def isEmpty(self):
        return len(self) == 0
    
    def __len__(self):
        return len(self.items)

    def peek(self):
        assert not self.isEmpty()
        return self.items[-1]

    def pop(self):
        assert not self.isEmpty()
        return self.items.pop()

    def push(self, data):
        self.items.append(data)

class StackLL:
    def __init__(self):
        self.top = None
        self.size = 0

    def isEmpty(self):
        return self.top is None

    def __len__(self):
        return self.size
    
    def peek(self):
        assert not self.isEmpty()
        return self.top.item

    def pop(self):
        assert not self.isEmpty()
        node = self.top
        self.top = self.top.next
        self.size -= 1
        return node.item

    def push(self):
        self.top = _StackNode(data, self.top)
        self.size += 1

class _StackNode:
    def __init__(self, data, link):
        self.item = data
        self.next = link

##PROMPT = "Masukkan bilangan positif (0 untuk mengakhiri) : "
##myStack = Stack()
##value = int(input(PROMPT))
##while value > 0:
##    myStack.push(value)
##    value = int(input(PROMPT))
##while not myStack.isEmpty():
##    value = myStack.pop()
##    print(value)

###latihan 8.4
    
def cetakBiner(d):
    f = Stack()
    if d==0: f.push(0);
    while d !=0:
        sisa = d%2
        d = d//2
        f.push(sisa)
    st = ""
    for i in range(len(f)):
        st = st + str(f.pop())
    return st

##print(cetakBiner(11))
##print(cetakBiner(53))
##

#####latihan 8.6

class Queue(object):
    def __init__(self):
        self.qlist = []
    
    def isEmpty(self):
        return len(self) == 0
    
    def __len__(self):
        return len(self.qlist)
    
    def enqueue(self, data):
        self.qlist.append(data)

    def dequeue(self):
        assert not self.isEmpty(), "Antrian sedang kosong"
        return self.qlist.pop(0)

Q = Queue()
Q.enqueue(28)
Q.enqueue(19)
Q.enqueue(45)
Q.enqueue(13)
Q.enqueue(7)
print(Q.qlist)
Q.dequeue()
##Q.dequeue()
##Q.dequeue()
##Q.dequeue()
##Q.dequeue()
print(Q.qlist)
##Q.enqueue(98)
##Q.enqueue(54)
##Q.dequeue()
##print(Q.qlist)
##
#####latihan 8.7

class PriorityQueue(object):

    def __init__(self):
        self.qlist = []

    def __len__(self):
        return len(self.qlist)
    
    def isEmpty(self):
        return len(self) == 0
    
    def enqueue(self, data, priority):
        entry = _PriorityQEntry(data, priority)
        self.qlist.append(entry)
    
    def dequeue(self):
        pass


class _PriorityQEntry(object):
    
    def __init__(self, data, priority):
         self.item = data
         self.priority = priority
    def __str__(self):
        return 'Item: {}\nPriority: {}'.format(self.item, self.priority)

S = PriorityQueue()
S.enqueue('Jeruk', 4)
S.enqueue('Tomat', 2)
S.enqueue('Mangga', 0)
S.enqueue('Duku', 5)
S.enqueue('Papaya', 2)
for i in S.qlist:
    print(i)
S.dequeue()
S.dequeue()
S.dequeue()
for i in S.qlist:
    print(i)

