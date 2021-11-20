package uas2;

public class InterfaceDemo implements Read{
	int halaman;
	public void Writing() {
		for(int i=0; i<4; i++) {
			if(i==0)
				System.out.println("Penulis Buku "+buku[i]+" adalah Putri");
			else if(i==2)
				System.out.println("Penulis Buku "+buku[i]+" adalah Doni");
			else
				System.out.println("Penulis Buku "+buku[i]+" adalah Anton");
		}
	}
	public int Reading() {
		return halaman;
	}
	void setBaca(int halaman) {
		this.halaman = halaman;
	}
	public static void main (String[] args) {
		InterfaceDemo id = new InterfaceDemo();
		id.setBaca(1042);
		id.Writing();
		System.out.println("= == = == = == =\n Semua Buku berjumlah "+id.Reading()+" Halaman");
		
	}

}
