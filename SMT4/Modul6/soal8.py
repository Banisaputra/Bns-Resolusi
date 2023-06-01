class Node():
    def __init__(self,data,next=None,prev=None):
        self.data = data
        self.next = next
        self.prev = prev
class linked():
    def __init__(self,head = None):
        self.head = head
    def tambahList(self, data):
        node = Node(data)
        if self.head == None:
            self.head == node
        else:
            asli = self.head
            while asli.next != None:
                asli = asli.next
        asli.next = node
    def tambahSort(self, data):
        node = Node(data)
        asli = self.head
        prev = None
        while asli is not None and asli.data < data:
            prev = asli
            asli = asli.next
        if prev == None:
            self.head = node
        else:
            prev.next = node
        node.next = asli
    def cetakList(self):
        asli = self.head
        while asli != None:
            print("%d"%asli.data),
            asli = asli.next

    def margeSort(self,list1,list2):
        if list1 is None:
            return list2
        if list2 is None:
            return list1
        if list1.data < list2.data:
            temp = list1
            temp.next = self.margeSort(list1.next, list2)
        else:
            temp = list2
            temp.next = self.margeSort(list1, list2.next)
        return temp


x1 = linked()
x1.tambahSort(32)
x1.tambahSort(19)
x1.tambahSort(87)
x1.tambahSort(56)
x1.tambahSort(12)
x1.tambahSort(22)
print("List1 :")
x1.cetakList()
x2 = linked()
x2.tambahSort(32)
x2.tambahSort(19)
x2.tambahSort(87)
x2.tambahSort(56)
print("List2 :")
x2.cetakList()
hasil_akhir = linked()
hasil_akhir.head = hasil_akhir.margeSort(x1.head, x2.head)
print("Hasil Marge Sort")
hasil_akhir.cetakList()

