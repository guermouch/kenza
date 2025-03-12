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
