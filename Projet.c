#include <stdio.h>
#include <string.h>
#include <conio.h>
#include <time.h>
#define paris 50
// ING 3 TDS02 THAVABALAN-GUERMOUCH-EL YOUSOUFI-JEBBARI

int lignes = 10;
int colonnes = 20;
int vies=3;

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
void sauvegarder(int plateau_de_jeu[][20], int position_snoopy[2], int lignes, int colonnes, int vies, double temps) {
    char mot_de_passe[paris];
    printf("Entrez le mot de passe pour sauvegarder : ");
    scanf("%s", mot_de_passe);
    if (strcmp(mot_de_passe, "votre_mot_de_passe_secret") != 0) {
        printf("Mot de passe incorrect. Sauvegarde annulée.\n");
        return;
    }
    FILE *fichier = fopen("sauvegarde.txt", "w");

    if (fichier == NULL) {
        printf("Erreur lors de l'ouverture du fichier de sauvegarde\n");
        return;
    }


    fprintf(fichier, "%d %d\n", lignes, colonnes);
    fprintf(fichier, "%d %d\n", position_snoopy[0], position_snoopy[1]);
    fprintf(fichier, "%d\n", vies);
    fprintf(fichier, "%.2f\n", temps);

    for (int l = 0; l < lignes; l++) {
        for (int c = 0; c < colonnes; c++) {
            fprintf(fichier, "%d ", plateau_de_jeu[l][c]);
        }
        fprintf(fichier, "\n");
    }

    fclose(fichier);
    printf("Sauvegarde réussie\n");
}

void charger(int plateau_de_jeu[][20], int *position_snoopy, int *lignes, int *colonnes, int *vies, double *temps) {
    FILE *fichier = fopen("sauvegarde.txt", "r");

    if (fichier == NULL) {
        printf("Aucune sauvegarde trouvée\n");
        return;
    }


    fscanf(fichier, "%d %d", lignes, colonnes);
    fscanf(fichier, "%d %d", &position_snoopy[0], &position_snoopy[1]);
    fscanf(fichier, "%d", vies);
    fscanf(fichier, "%lf", temps);

    for (int l = 0; l < *lignes; l++) {
        for (int c = 0; c < *colonnes; c++) {
            fscanf(fichier, "%d", &plateau_de_jeu[l][c]);
        }
    }

    fclose(fichier);

    printf("Sauvegarde chargée avec succès\n");
}
void affichage_terrain(int plateau_de_jeu[][20], int lignes, int colonnes){
    printf("\n\n");

    for(int l = 0; l != lignes; l ++) {
        for (int c = 0; c != colonnes; c++) {
            printf("%c", traduction_bloc(plateau_de_jeu[l][c]));
        }
        printf("\n");
    }
}

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




void **init_terrain_niveau_1(int plateau_de_jeu[][colonnes], int position_snoopy[2]) {

    plateau_de_jeu[0][0] = 9;
    plateau_de_jeu[0][colonnes - 1] = 9;
    plateau_de_jeu[lignes - 1][0] = 9;
    plateau_de_jeu[lignes - 1][colonnes - 1] = 9;

    int largeur = 3;

    for(int c = position_snoopy[1] - largeur ; c <= position_snoopy[1] + largeur  ; c++) {
        plateau_de_jeu[position_snoopy[0] + largeur][c] = 11;
        plateau_de_jeu[position_snoopy[0] - largeur][c] = 11;
    }

    for(int l = position_snoopy[0] - largeur ; l <= position_snoopy[0] + largeur  ; l++) {
        plateau_de_jeu[l][position_snoopy[1] + largeur] = 11;
        plateau_de_jeu[l][position_snoopy[1] - largeur] = 11;
    }

    plateau_de_jeu[position_snoopy[0] - 2][position_snoopy[1] + 2] = 2;

}

int deplacement_correcte(int position_snoopy[2], int plateau_de_jeu[][20]){

    if (plateau_de_jeu[position_snoopy[0]][position_snoopy[1]] == 2) {
        position_snoopy[1] += 2;
        return 1;
        }

    if (  plateau_de_jeu[position_snoopy[0]][position_snoopy[1]]  == 4){
        affichage_terrain(plateau_de_jeu, lignes, colonnes);
        printf("Snoopy ne peut pas avancer car il y'a un bloc invincible\n");
        return 0;
    }

    if ( position_snoopy[0] < 0 || position_snoopy[1] < 0 ||
         position_snoopy[1] > colonnes - 1 || position_snoopy[0] > lignes - 1 ){
        affichage_terrain(plateau_de_jeu, lignes, colonnes);
        printf("Vous sortez du terrain\n");
        return 0;
    }

    if (plateau_de_jeu[position_snoopy[0]][position_snoopy[1]] == 3 || plateau_de_jeu[position_snoopy[0]][position_snoopy[1]] == 8) {
        vies--;
        printf("Vous avez touché un bloc dangereux ! Vies restantes : %d\n", vies);
        return 0; }

    if ( plateau_de_jeu[position_snoopy[0]][position_snoopy[1]]  == 0){
        affichage_terrain(plateau_de_jeu, lignes, colonnes);
        return 1;
    }

    if ( plateau_de_jeu[position_snoopy[0]][position_snoopy[1]]  == 9) {
        plateau_de_jeu[position_snoopy[0]][position_snoopy[1]]  = 0;
        affichage_terrain(plateau_de_jeu, lignes, colonnes);
        printf("Vous avez ramasse un oiseau \n");
        return 1;
    }

}int duree_niveau = 120;


void niveau_1() {
    int const lignes = 10;
    int const colonnes = 20;
    int win = 0;

    int position_snoopy[2] = {lignes / 2, colonnes / 2};
    int sauvegarde_position_snoopy[2] = {lignes / 2, colonnes / 2};

    int plateau_de_jeu[10][20] = {0};
    init_terrain_niveau_1(plateau_de_jeu, position_snoopy);
    plateau_de_jeu[position_snoopy[0]][position_snoopy[1]] = 7;

    clock_t debut_niveau = clock();


    while (win != 1 && vies>0) {
        affichage_terrain(plateau_de_jeu, lignes, colonnes);
        sauvegarde_position_snoopy[0] = position_snoopy[0];
        sauvegarde_position_snoopy[1] = position_snoopy[1];
        deplacement_snoopy(position_snoopy, plateau_de_jeu, lignes, colonnes);


        if (deplacement_correcte(position_snoopy, plateau_de_jeu) == 1) {
            plateau_de_jeu[sauvegarde_position_snoopy[0]][sauvegarde_position_snoopy[1]] = 0;
        } else {
            position_snoopy[0] = sauvegarde_position_snoopy[0];
            position_snoopy[1] = sauvegarde_position_snoopy[1];
        }


        plateau_de_jeu[position_snoopy[0]][position_snoopy[1]] = 7;

        if ((plateau_de_jeu[0][0] == 0) &&
            (plateau_de_jeu[0][colonnes - 1] == 0) &&
            (plateau_de_jeu[lignes - 1][0] == 0) &&
            (plateau_de_jeu[lignes - 1][colonnes - 1] == 0)) {
            affichage_terrain(plateau_de_jeu, lignes, colonnes);
            printf("Bravo! Vous avez gagne");
            clock_t fin_niveau = clock();
            double temps_niveau = ((double)(fin_niveau - debut_niveau)) / CLOCKS_PER_SEC;
            int score_niveau_1 = (int)(temps_niveau * 100);
            printf("Score du niveau 1 : %d\n", score_niveau_1);
            printf("Nombre de vies restantes : %d\n",vies );
            win = 1;
        }
    }
}
void **init_terrain_niveau_2(int plateau_de_jeu[][colonnes], int position_snoopy[2]) {

    plateau_de_jeu[0][0] = 9;
    plateau_de_jeu[0][colonnes - 1] = 9;
    plateau_de_jeu[lignes - 1][0] = 9;
    plateau_de_jeu[lignes - 1][colonnes - 1] = 9;
    plateau_de_jeu[position_snoopy[0] - 1][position_snoopy[1] - 2] = 8;
    plateau_de_jeu[position_snoopy[0] + 1][position_snoopy[1] + 2] = 8;

    position_snoopy[0] = lignes / 2;
    position_snoopy[1] = colonnes / 2;

    int largeur = 3;

    for(int c = position_snoopy[1] - largeur ; c <= position_snoopy[1] + largeur  ; c++) {
        plateau_de_jeu[position_snoopy[0] + largeur][c] = 11;
        plateau_de_jeu[position_snoopy[0] - largeur][c] = 11;
    }

    for(int l = position_snoopy[0] - largeur ; l <= position_snoopy[0] + largeur  ; l++) {
        plateau_de_jeu[l][position_snoopy[1] + largeur] = 11;
        plateau_de_jeu[l][position_snoopy[1] - largeur] = 11;
    }

    plateau_de_jeu[position_snoopy[0] - 2][position_snoopy[1] + 2] = 2;
    plateau_de_jeu[position_snoopy[0] - 1][position_snoopy[1]] = 8;
    plateau_de_jeu[position_snoopy[0] + 1][position_snoopy[1] + 4] = 8;
    plateau_de_jeu[position_snoopy[0] - 2][position_snoopy[1] - 2] = 8;
    plateau_de_jeu[position_snoopy[0] - 1][position_snoopy[1] + 4] = 8;

}
void niveau_2() {
    int const lignes = 10;
    int const colonnes = 20;
    int win = 0;

    int position_snoopy[2] = {lignes / 2, colonnes / 2};
    int sauvegarde_position_snoopy[2] = {lignes / 2, colonnes / 2};

    int plateau_de_jeu[10][20] = {0};
    init_terrain_niveau_2(plateau_de_jeu, position_snoopy);
    plateau_de_jeu[position_snoopy[0]][position_snoopy[1]] = 8;
    clock_t debut_niveau = clock();



    while (win != 1) {
        affichage_terrain(plateau_de_jeu, lignes, colonnes);
        sauvegarde_position_snoopy[0] = position_snoopy[0];
        sauvegarde_position_snoopy[1] = position_snoopy[1];
        deplacement_snoopy(position_snoopy, plateau_de_jeu, lignes, colonnes);

        if (deplacement_correcte(position_snoopy, plateau_de_jeu) == 1) {
            plateau_de_jeu[sauvegarde_position_snoopy[0]][sauvegarde_position_snoopy[1]] = 0;
        } else {
            position_snoopy[0] = sauvegarde_position_snoopy[0];
            position_snoopy[1] = sauvegarde_position_snoopy[1];
        }


        plateau_de_jeu[position_snoopy[0]][position_snoopy[1]] = 7;

        if ((plateau_de_jeu[0][0] == 0) &&
            (plateau_de_jeu[0][colonnes - 1] == 0) &&
            (plateau_de_jeu[lignes - 1][0] == 0) &&
            (plateau_de_jeu[lignes - 1][colonnes - 1] == 0)
           ) {
            affichage_terrain(plateau_de_jeu, lignes, colonnes);
            printf("Vous avez gagne le niveau 2\n");
            clock_t fin_niveau = clock();
            double temps_niveau = ((double)(fin_niveau - debut_niveau)) / CLOCKS_PER_SEC;
            int score_niveau_2 = (int)(temps_niveau * 100);
            printf("Score du niveau 2 : %d\n", score_niveau_2);
            win = 1;
        }
    }
}
void **init_terrain_niveau_3(int plateau_de_jeu[][colonnes], int position_snoopy[2]) {

    plateau_de_jeu[0][0] = 9;
    plateau_de_jeu[0][colonnes - 1] = 9;
    plateau_de_jeu[lignes - 1][0] = 9;
    plateau_de_jeu[lignes - 1][colonnes - 1] = 9;


    int largeur = 3;

    for(int c = position_snoopy[1] - largeur ; c <= position_snoopy[1] + largeur  ; c++) {
        plateau_de_jeu[position_snoopy[0] + largeur][c] = 11;
        plateau_de_jeu[position_snoopy[0] - largeur][c] = 11;
    }

    for(int l = position_snoopy[0] - largeur ; l <= position_snoopy[0] + largeur  ; l++) {
        plateau_de_jeu[l][position_snoopy[1] + largeur] = 11;
        plateau_de_jeu[l][position_snoopy[1] - largeur] = 11;
    }
    plateau_de_jeu[position_snoopy[0] - 2][position_snoopy[1] + 2] = 8;
    plateau_de_jeu[position_snoopy[0] - 1][position_snoopy[1] + 2] = 2;
    plateau_de_jeu[position_snoopy[0] + 2][position_snoopy[1] + 2] = 8;
    plateau_de_jeu[lignes - 2][0] = 8;
    plateau_de_jeu[lignes - 2][colonnes - 2] = 4;
    plateau_de_jeu[lignes - 3][colonnes - 3] = 8;
    plateau_de_jeu[1][1] = 8;


}

void niveau_3() {
    int const lignes = 10;
    int const colonnes = 20;
    int win = 0;

    int position_snoopy[2] = {lignes / 2, colonnes / 2};
    int sauvegarde_position_snoopy[2] = {lignes / 2, colonnes / 2};

    int plateau_de_jeu[10][20] = {0};
    init_terrain_niveau_3(plateau_de_jeu, position_snoopy);
    plateau_de_jeu[position_snoopy[0]][position_snoopy[1]] = 8;
    clock_t debut_niveau = clock();



    while (win != 1) {
        affichage_terrain(plateau_de_jeu, lignes, colonnes);
        sauvegarde_position_snoopy[0] = position_snoopy[0];
        sauvegarde_position_snoopy[1] = position_snoopy[1];
        deplacement_snoopy(position_snoopy, plateau_de_jeu, lignes, colonnes);

        if (deplacement_correcte(position_snoopy, plateau_de_jeu) == 1) {
            plateau_de_jeu[sauvegarde_position_snoopy[0]][sauvegarde_position_snoopy[1]] = 0;
        } else {
            position_snoopy[0] = sauvegarde_position_snoopy[0];
            position_snoopy[1] = sauvegarde_position_snoopy[1];
        }



        plateau_de_jeu[position_snoopy[0]][position_snoopy[1]] = 7;

        if ((plateau_de_jeu[0][0] == 0) &&
            (plateau_de_jeu[0][colonnes - 1] == 0) &&
            (plateau_de_jeu[lignes - 1][0] == 0) &&
            (plateau_de_jeu[lignes - 1][colonnes - 1] == 0)
                ) {
            affichage_terrain(plateau_de_jeu, lignes, colonnes);
            printf("Vous avez gagne le niveau 3\n");
            clock_t fin_niveau = clock();
            double temps_niveau = ((double)(fin_niveau - debut_niveau)) / CLOCKS_PER_SEC;

            int score_niveau_3 = (int)(temps_niveau * 100);
            printf("Score du niveau 3 : %d\n", score_niveau_3);
            win = 1;
        }
    }
}
void **init_terrain_niveau_4(int plateau_de_jeu[][colonnes], int position_snoopy[2]) {

    plateau_de_jeu[0][0] = 9;
    plateau_de_jeu[0][colonnes - 1] = 9;
    plateau_de_jeu[lignes - 1][0] = 9;
    plateau_de_jeu[lignes - 1][colonnes - 1] = 9;


    int largeur = 3;

    for(int c = position_snoopy[1] - largeur ; c <= position_snoopy[1] + largeur  ; c++) {
        plateau_de_jeu[position_snoopy[0] + largeur][c] = 11;
        plateau_de_jeu[position_snoopy[0] - largeur][c] = 11;
    }

    for(int l = position_snoopy[0] - largeur ; l <= position_snoopy[0] + largeur  ; l++) {
        plateau_de_jeu[l][position_snoopy[1] + largeur] = 11;
        plateau_de_jeu[l][position_snoopy[1] - largeur] = 11;
    }
    plateau_de_jeu[lignes - 2][colonnes - 2] = 4;
    plateau_de_jeu[0][0] = 4;
    plateau_de_jeu[position_snoopy[0] - 2][position_snoopy[1] + 2] = 3;
    plateau_de_jeu[position_snoopy[0] - 1][position_snoopy[1] + 2] = 2;
    plateau_de_jeu[position_snoopy[0] - 3][position_snoopy[1] - 2] = 2;
    plateau_de_jeu[position_snoopy[0] - 3][position_snoopy[1] + 2] = 2;
    plateau_de_jeu[position_snoopy[0] + 2][position_snoopy[1] + 2] = 8;
    plateau_de_jeu[position_snoopy[0] - 2][position_snoopy[1] + 4] = 8;
    plateau_de_jeu[position_snoopy[0] + 2][position_snoopy[1] + 5] = 8;
    plateau_de_jeu[position_snoopy[0]][position_snoopy[1] + 1] = 4;


}
void niveau_4() {
    int const lignes = 10;
    int const colonnes = 20;
    int win = 0;

    int position_snoopy[2] = {lignes / 2, colonnes / 2};
    int sauvegarde_position_snoopy[2] = {lignes / 2, colonnes / 2};
    int plateau_de_jeu[10][20] = {0};
    init_terrain_niveau_4(plateau_de_jeu, position_snoopy);
    plateau_de_jeu[position_snoopy[0]][position_snoopy[1]] = 8;
    clock_t debut_niveau = clock();



    while (win != 1) {
        affichage_terrain(plateau_de_jeu, lignes, colonnes);
        sauvegarde_position_snoopy[0] = position_snoopy[0];
        sauvegarde_position_snoopy[1] = position_snoopy[1];
        deplacement_snoopy(position_snoopy, plateau_de_jeu, lignes, colonnes);

        if (deplacement_correcte(position_snoopy, plateau_de_jeu) == 1) {
            plateau_de_jeu[sauvegarde_position_snoopy[0]][sauvegarde_position_snoopy[1]] = 0;
        } else {
            position_snoopy[0] = sauvegarde_position_snoopy[0];
            position_snoopy[1] = sauvegarde_position_snoopy[1];
        }

        plateau_de_jeu[position_snoopy[0]][position_snoopy[1]] = 7;

        if ((plateau_de_jeu[0][0] == 0) &&
            (plateau_de_jeu[0][colonnes - 1] == 0) &&
            (plateau_de_jeu[lignes - 1][0] == 0) &&
            (plateau_de_jeu[lignes - 1][colonnes - 1] == 0)
            ) {
            affichage_terrain(plateau_de_jeu, lignes, colonnes);
            printf("Bravo!Vous avez gagne le niveau 4\n");
            clock_t fin_niveau = clock();
            double temps_niveau = ((double)(fin_niveau - debut_niveau)) / CLOCKS_PER_SEC;


            int score_niveau_4 = (int)(temps_niveau * 100);
            printf("Score du niveau 4 : %d\n", score_niveau_4);
            win = 1;
        }
    }
}
int main() {

    int a;
    printf("\n"
           "1. Regles du jeu \n"
           "2. Lancer un nouveau jeu a partir du niveau 1\n"
           "3. Charger une partie\n"
           "4. Lancer directement un niveau via son mot de passe\n"
           "5. Scores\n"
           "6. Quitter\n"
           "Votre choix est ?\n");
    do {
        scanf("%d", &a);
        switch(a) {
            case 1 :
                printf(" Les regles du jeu sont:\n");
                printf("Tu es Snoopy et tu dois recuperer 4 oiseaux aux 4 coins du niveau en un temps imparti\n");
                break;
            case 2 :
                printf("Commencons le jeu \n");
                break;
            case 3 :
                printf("Quelle partie vous voulez ? \n");
                break;
            case 4 :
                printf("Veuillez entrer votre mot de passe pour recuperer votre niveau\n");
                break;
            case 5 :
                printf("Votre score est \n");
                break;
            case 6:
                printf("A bientot ...\n");
                break;
            default:
                printf("Veuillez rentrer votre choix\n");
                scanf("%d", &a);
        }

    } while (a>5 && a<1);




    printf("Debut du jeu\n");

    printf("Voulez-vous charger une partie sauvegardee ? (O/N) ");
    char choix_chargement = getch();
    int plateau_de_jeu[10][20] = {0};
    int position_snoopy[2] = {lignes / 2, colonnes / 2};
    int vies=3;
    int score_niveau_1;
    int score_niveau_2;
    int score_niveau_3;
    int score_niveau_4;
   int scorefinal;
    clock_t debut_niveau_1 = clock();
    niveau_1();
    clock_t fin_niveau_1 = clock();
    double temps_niveau_1 = ((double)(fin_niveau_1 - debut_niveau_1)) /
    printf("Tu passes au niveau 2\n");
    printf("Temps du niveau 1 : %.2f secondes\n", temps_niveau_1);
    sauvegarder(plateau_de_jeu,position_snoopy,lignes,colonnes,vies,temps_niveau_1);
    clock_t debut_niveau_2 = clock();
    niveau_2();
    clock_t fin_niveau_2 = clock();
    double temps_niveau_2 = ((double)(fin_niveau_2 - debut_niveau_2)) / CLOCKS_PER_SEC;
    printf("Temps du niveau 2 : %.2f secondes\n", temps_niveau_2);
    sauvegarder(plateau_de_jeu,position_snoopy,lignes,colonnes,vies,temps_niveau_2);
    clock_t debut_niveau_3 = clock();
    printf("Niveau 3\n");
    niveau_3();
    clock_t fin_niveau_3 = clock();
    double temps_niveau_3 = ((double)(fin_niveau_3 - debut_niveau_3)) / CLOCKS_PER_SEC;
    printf("Temps du niveau 3 : %.2f secondes\n", temps_niveau_3);
    sauvegarder(plateau_de_jeu,position_snoopy,lignes,colonnes,vies,temps_niveau_3);
    clock_t debut_niveau_4 = clock();
    printf("Niveau 4 : Le dernier\n");
    niveau_4();
    clock_t fin_niveau_4 = clock();
    double temps_niveau_4 = ((double)(fin_niveau_4 - debut_niveau_4)) / CLOCKS_PER_SEC;
    printf("Temps du niveau 4 : %.2f secondes\n", temps_niveau_4);
    double temps_total = temps_niveau_1 + temps_niveau_2 + temps_niveau_3 + temps_niveau_4;
    printf("Temps total de jeu : %.2f secondes\n", temps_total);
    scorefinal=score_niveau_1+score_niveau_2+score_niveau_3+score_niveau_4;
    sauvegarder(plateau_de_jeu,position_snoopy,lignes,colonnes,vies,temps_niveau_1);
    return 0;
}

