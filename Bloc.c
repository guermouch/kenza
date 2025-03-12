char traduction_bloc(int number) {
    if (number == 0) {return ' ';}
    if (number == 1) {return 0x01;}
    if (number == 2) {return 0x1A;}
    if (number == 3) {return 0x05;}
    if (number == 4) {return 0x0F;}
    if (number == 5) {return 0x1E;}
    if (number == 6) {return 0x16;}
    if (number == 7) {return 0x01;}
    if (number == 8) {return 0x0B;}
    if (number == 9) {return 0x0E;}
    if (number == 10) {return 0x7F;}
    if (number == 11) {return 0xB2;}
    printf("Caractere inconnu");
    return 'E';
}
