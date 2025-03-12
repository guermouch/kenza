void deplacement_snoopy(int position_snoopy[2], int terrain[][20],int lignes, int colonnes){
    int input = getch();
    if (input == 'd' ||  input == 'D') {
        position_snoopy[1] += 1;
    }

    if (input == 's'||  input == 'S') {
        position_snoopy[0] += 1;
    }

    if (input == 'q' ||  input == 'Q') {
        position_snoopy[1] -=1;
    }

    if (input == 'z' ||  input == 'Z') {
        position_snoopy[0] -=  1;
    }

    if (input == 'X' ||  input == 'x') {
        input = 0;
        while (input != 'X' &&  input != 'x')

            input = getch();
    }
    }

