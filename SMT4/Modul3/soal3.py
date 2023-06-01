class Node:
    def __init__(self, data):
        self.data = data
        self.next = None
class LinkedList:
    def __init__(self):
        self.head = None
    def tambahDepan(self, new_data):
        new_node = Node(new_data)
        new_node.next = self.head
        self.head = new_node
    def tambahAkhir (self, data):
        if (self.head == None):
            self.head  = Node(data)
        else:
            current = self.head
            while (current.next != None):
                current = current.next
            current.next = Node(data)
        return self.head
    def tambah(self, data, post):
        node = Node(data)
        if not self.head:
            self.head = node
        elif post == 0:
            node.next = self.head
            self.head = node
        else:
            prev = None
            current = self.head
            current_post = 0
            while(current_post < post)and current.next:
                prev = current
                current = current.next
                current_post +=1
            prev.next = node
            node.next = current
        return self.head
    def hapus(self, posisi):
        if self.head == None:
            return
        temp = self.head
        if posisi == 0:
            self.head = temp.next
            temp = None
            return
        for i in range (posisi - 1):
            temp = temp.next
            if temp is None:
                break
            if temp is None:
                return
            if temp.next is None:
                return
        temp.next = None
        temp.next = next
    def cari(self,x):
        current = self.head
        while current != None:
            if current.data == x:
                print(x, "Apakah ada dalam data?")
                return True
            current = current.next
        print(x, "Apakah ada dalam data?")
        return False
    def display(self):
        current = self.head
        while current is not None:
            print(current.data, end = ' ')
            current = current.next

A = LinkedList()
A.tambahDepan(32)
A.tambahDepan(12)
A.tambahDepan(24)
A.tambahDepan(57)
A.tambahAkhir(18)
A.hapus(0)
A.tambah(3,5)
print(A.cari(12))
print(A.cari(13))
A.display()
