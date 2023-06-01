import re

##s='sebuah contoh kata :teh!!'
##cocok = re.findall(r'kata :\w\w\w', s)
##if cocok:
##	print('menemukan', cocok)
##else:
##	print('tidak ditemukan')
##
##cocok = re.findall(r'eee', 'teeeh')
##print (cocok)
##cocok = re.findall(r'ehs', 'teeeh')
##print (cocok)
##cocok = re.findall(r'..h', 'teeeh')
##print (cocok)
##cocok = re.findall(r'\d\d\d', 't123h di 2019 bulan 02')
##print (cocok)


##cocok = re.findall(r'te+', 'ghdteeeh')
##print (cocok)
##cocok = re.findall(r'e+', 'teeeheeee')
##print (cocok)
##polanya = r'\d\s*\d\s*\d'
##cocok = re.findall(polanya, 'xx1 2  3xx')
##print (cocok)
##cocok = re.findall(polanya, 'xx12  3xx')
##print(cocok)
##cocok = re.findall(polanya, 'xx123xx')
##print (cocok)
##
##cocok = re.findall(r'^k\w+', 'mejakursi')
##print (cocok)
##cocok = re.findall(r'k[\w\s]+', 'mejakursi tamu saya')
##print (cocok)

##
##s = 'Alamatku adalah dita-b@google.com mas'
##cocok = re.findall(r'\w+@\w+', s)
##print(cocok[0])
##
##cocok = re.findall(r'[\w.-]+@[\w.-]+', s)
##print (cocok[0])
##

##s = 'Alamatku adalah dita-b@google.com mas'
##pola = r'[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+'
##cocok = re.findall(pola, s)
##print(cocok[0])


##s = 'Alamatku adalah dita-b@google.com mas'
##cocok = re.findall(r'([\w.-]+)@([\w.-]+)', s) 
##print (cocok) 
##print (cocok[0][0])
##print (cocok[0][1])

##s = 'Alamatku sri@google.com serta joko@abc.com ok bro. atau don@email.com'
##pola = r'[\w\.-]+@[\w\.-]+'
##e = re.findall(pola, s)
##print(e)

##pola = r'([\w\.-]+)@([\w\.-]+)'
##e = re.findall(pola, s)
##print(e)
##for tup in e:
##    print('user', tup[0], 'dengan host:', tup[1])

f = open ('test.txt','r', encoding='latin1')
teks = f.read()
f.close()
p = r'sia'
string = re.findall(p, teks)
print(string)



