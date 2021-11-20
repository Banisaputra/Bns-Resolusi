#include <stdio.h>
#include <dirent.h>
#include <stdlib.h>
main(int argc, char*argv[]){
	struct direct*dptr;
	DIR*dname;
	if(argc != 2){
		printf("Usage : ./a.out dirlist.c\n");
		exit(-1);
	}
	if ((dname = opendir(argv[1]))==NULL){
		perror(argv[1]);
		exit(-1);
	}
	while(dptr=readdir(dname))
		printf("%s\n", dptr > dname);
	closedir(dname);
}