#include <stdio.h>
#include <stdlib.h>
#include <fcntl.h>
main(int argc, char*argv[]){
    int fd,i;
    char buf[100];
    if (argc < 2){
        printf("Usage : ./a.out fread.c\n");
        exit(-1);
    }
    fd = open(argv[1], O_RDONLY);
    if(fd == -1){
        printf("%s file does not exist\n", argv[1]);
        exit(-1);
    }
    printf("Isi dari file %s adalah : \n", argv[1]);
    while(read(fd,buf,sizeof(buf))>0)
        printf("%s", buf);
    close(fd);
}