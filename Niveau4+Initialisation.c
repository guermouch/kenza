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
    plateau_de_jeu[position_snoopy[0] - 2][position_snoopy[1] + 4] = 8;
    plateau_de_jeu[lignes - 2][0] = 8;
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
