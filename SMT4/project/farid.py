import xlrd  # Pemanggilan modul xlrd
loc = ("data.xls")  # Pendefinisian nama file
# Membuka File Excel 
wb = xlrd.open_workbook(loc)
sheet = wb.sheet_by_index(0)

# Pembuat array untuk manipulasi data dari excel 
dataSet = []
for i in range(47):
    dataSet.append(sheet.cell_value(i+1, 1))

class Stack(object): # Pendefinisian kelas untuk stack dan fungsi-fungsinya

    def __init__(self): # pendefinisian stack berbentuk array kosong
        self.items = [] # pendefinisian stack berbentuk array kosong
    
    def __len__(self): # pendefinisian fungsi untuk return panjang dari array
        return len(self.items) # pendefinisian fungsi untuk return panjang dari array

    def pop(self): # pendefinisian fungsi pop
        return self.items.pop() # pendefinisian fungsi pop

    def push(self, data):
        if data not in self.items :
            print(' ### ' ,data , '  dimasukan kedalam List \n')
            self.items.append(data) # pendefinisian fungsi push     
        else :
            print('Data tempat ' , data, ' DATA SUDAH ADA ! \n')# pendefinisian fungsi push
            
#Fungsi driver#
# Melakukan push ke dalam Stack 
f = Stack() # pendefinisian Stack
for x in range(len(dataSet)): # perulangan untuk memasukkan data ke stack
    f.push(dataSet[x]) # perintah memasukkan data dari array ke stack

# Melakukan pop dari Stack 
print("Poped Data:\n") # tampilan
for x in range(len(f)): # Perulangan untuk mengeluarkan data dari stack
    print(f.pop()) # Perintah untuk mengeluarkan data satu persatu dari stack

