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
