#include <time.h>
int duree_niveau = 120;
clock_t debut_niveau = clock();
clock_t fin_niveau = clock();
double temps_niveau = ((double)(fin_niveau - debut_niveau)) / CLOCKS_PER_SEC;
int score_niveau_1 = (int)(temps_niveau * 100);
clock_t debut_niveau = clock();
clock_t fin_niveau = clock();
double temps_niveau = ((double)(fin_niveau - debut_niveau)) / CLOCKS_PER_SEC;
int score_niveau_2 = (int)(temps_niveau * 100);
clock_t debut_niveau = clock();
clock_t fin_niveau = clock();
double temps_niveau = ((double)(fin_niveau - debut_niveau)) / CLOCKS_PER_SEC;
int score_niveau_3 = (int)(temps_niveau * 100);
clock_t debut_niveau = clock();
clock_t fin_niveau = clock();
double temps_niveau = ((double)(fin_niveau - debut_niveau)) / CLOCKS_PER_SEC;
int score_niveau_4 = (int)(temps_niveau * 100);
clock_t debut_niveau = clock();
clock_t fin_niveau = clock();
double temps_niveau = ((double)(fin_niveau - debut_niveau)) / CLOCKS_PER_SEC;
int main() {
    clock_t fin_niveau_1 = clock();
    clock_t fin_niveau_2 = clock();
    clock_t fin_niveau_3 = clock();
    clock_t fin_niveau_4 = clock();
    double temps_total = temps_niveau_1 + temps_niveau_2 + temps_niveau_3 + temps_niveau_4;
    return 0;
}
