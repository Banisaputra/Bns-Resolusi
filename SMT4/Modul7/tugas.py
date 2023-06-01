import re

##f = open ('test.txt','r', encoding='latin1')
##r = f.read()
##f.close()
##pola = r'\sme\w+'
##e = re.findall(pola, r)
##print(e)

##f = open ('test.txt','r', encoding='latin1')
##r = f.read()
##f.close()
##pola = r'di\w+'
##e = re.findall(pola, r)
##print(e)

##f = open ('test.txt','r', encoding='latin1')
##r = f.read()
##f.close()
##pola = r'di\s\w+'
##e = re.findall(pola, r)
##print(e)


f = open ('KEI.html','r', encoding='latin1')
r = f.read()
f.close()
pola = r'(\w+)</a></td>'
e = re.findall(pola, r)
print(e)
print ("-- --- --- --")
##pola2 = r'(\w+)</a></td>\n<td>(\d.\d+)'
##tp = re.findall(pola2, r)
##print(e)
##print ("-- --- --- --")
##tt = [(t[0], float(t[1]))for t in tp]
##print (tt)


