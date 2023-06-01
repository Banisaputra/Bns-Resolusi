
####INSERT
##from datetime import date, datetime, timedelta
##import mysql.connector
##
##cnx = mysql.connector.connect(user='root', database='perbankan')
##cursor = cnx.cursor()
##tanggal = datetime.now().date()
##tambah_transaksi=("INSERT INTO transaksi(id_nasabahFK,no_rekeningFK,jenis_transaksi,tanggal_transaksi,jumlah) VALUES(%s,%s,%s,%s,%s)")
##data_transaksi = ('28','134','debit',tanggal,'500000')
##cursor.execute(tambah_transaksi,data_transaksi)
##
##cnx.commit()
##cursor.close()
##cnx.close()



#### UPDATE
##import mysql.connector
##
##cnx = mysql.connector.connect(user='root', database='perbankan')
##cursor = cnx.cursor()
##update_transaksi=("UPDATE transaksi SET jumlah=1000000 WHERE id_nasabahFK=28")
##cursor.execute(update_transaksi)
##
##cnx.commit()
##print(cursor.rowcount,'record(s) affected')
##cursor.close()
##cnx.close()




####DELETE
##import mysql.connector
##
##cnx = mysql.connector.connect(user='root', database='perbankan')
##cursor = cnx.cursor()
##delete_transaksi=("DELETE FROM transaksi WHERE id_nasabahFK=28")
##cursor.execute(delete_transaksi)
##
##cnx.commit()
##print(cursor.rowcount, "record(s) deleted")
##cursor.close()
##cnx.close()



####MENAMPILKAN DI PYTHON
##import mysql.connector
##
##cnx = mysql.connector.connect(user='root', database='perbankan')
##cursor = cnx.cursor()
##cursor.execute("SELECT * FROM nasabah")
##
##myresult = cursor.fetchall()
##for x in myresult:
##    print(x)
##cursor.close()
##cnx.close()



####MENAMPILKAN Data nasabah yang melakukan transaksi antara bulan oktober sampai desember.
##import mysql.connector
##
##cnx = mysql.connector.connect(user='root', database='perbankan')
##cursor = cnx.cursor()
##cursor.execute("""SELECT * FROM nasabah
##               WHERE nasabah.id_nasabah IN (SELECT transaksi.id_nasabahFK
##               FROM transaksi WHERE tanggal_transaksi BETWEEN '2009-10-1' AND '2009-12-30')""")
##
##myresult = cursor.fetchall()
##for x in myresult:
##    print(x)
##cursor.close()
##cnx.close()


