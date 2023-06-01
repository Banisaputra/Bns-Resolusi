class Link(object):
    def __init__(self, nama, next=None):
        self.data = nama
        self.next = next
def cari(x,y):
    if y ==1:
        print(x.data)
    elif y ==2:
        print(x.next.data)
    elif y ==3:
        print(x.next.next.data)
    elif y ==4:
        print(x.next.next.next.data)
    else:
        print("invalid data")

a = Link(12)
b = Link(23)
c = Link(65)
d = Link(11)
a.next = b
b.next = c
c.next = d
print("Head adalah a, cari(a,(urutan data yang dicari))")
