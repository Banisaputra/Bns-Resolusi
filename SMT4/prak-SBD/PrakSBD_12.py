import mysql.connector
import os

mydb = mysql.connector.connect(user='root', database = 'nasmoko')

def insert_data(mydb):
  jenis_mobil = input("Jenis Mobil : ")
  warna_mobil = input("Warna Mobil : ")
  tipe_mobil = input("Tipe Mobil : ")
  value = (jenis_mobil ,warna_mobil, tipe_mobil)
  cursor = mydb.cursor()
  sql = "INSERT INTO mobil(jenis_mobil, warna_mobil, tipe_mobil) VALUES (%s, %s, %s)"
  cursor.execute(sql, value)
  mydb.commit()
  print("{} data berhasil disimpan".format(cursor.rowcount))


def show_data(mydb):
  cursor = mydb.cursor()
  sql = "SELECT * FROM mobil"
  cursor.execute(sql)
  results = cursor.fetchall()
  
  if cursor.rowcount < 0:
    print("Tidak ada data")
  else:
    for data in results:
      print(data)

##
def update_data(mydb):
  cursor = mydb.cursor()
  show_data(mydb)
  member_id = input("pilih id member ")
  name = input("Nama baru: ")
  address = input("Alamat baru: ")

  sql = "UPDATE member SET nama_member=%s, alamat_member=%s WHERE id_member=%s"
  val = (name, address, member_id)
  cursor.execute(sql, val)
  mydb.commit()
  print("{} data berhasil diubah".format(cursor.rowcount))
##
##
def delete_data(mydb):
  cursor = mydb.cursor()
  show_data(mydb)
  member_id = input("pilih id member> ")
  sql = "DELETE FROM member WHERE id_member=%s"
  val = (member_id,)
  cursor.execute(sql, val)
  mydb.commit()
  print("{} data berhasil dihapus".format(cursor.rowcount))

##
def search_data(db):
  cursor = db.cursor()
  keyword = input("Kata kunci: ")
  sql = "SELECT * FROM customers WHERE name LIKE %s OR address LIKE %s"
  val = ("%{}%".format(keyword), "%{}%".format(keyword))
  cursor.execute(sql, val)
  results = cursor.fetchall()
  
  if cursor.rowcount < 0:
    print("Tidak ada data")
  else:
    for data in results:
      print(data)


def show_menu(mydb):
  print("=== Member Perpustakaan UMS ===")
  print("1. Insert Data")
  print("2. Tampilkan Data")
  print("3. Update Data")
  print("4. Hapus Data")
  print("0. Keluar")
  print("------------------")
  menu = input("Pilih menu> ")

  #clear screen
  os.system("clear")

  if menu == "1":
    insert_data(mydb)
  elif menu == "2":
    show_data(mydb)
  elif menu == "3":
    update_data(mydb)
  elif menu == "4":
    delete_data(mydb)
  elif menu == "0":
    exit()
  else:
    print("Menu salah!")


if __name__ == "__main__":
  while(True):
    print()
    show_menu(mydb)
