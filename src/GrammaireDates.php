<?php
class GrammaireDates extends GrammaireDeChomsky
{
    public function __construct()
    {
        $this->regles[] = new Regle("PERIODE","DEBUT","FIN");

        $this->regles[] = new Regle("DEBUT","DEPUIS","DATE");
        $this->regles[] = new Regle("FIN","AU","DATE");

        $this->regles[] = new Regle("DATE","JOURS");
        $this->regles[] = new Regle("DATE","MOIS");
        $this->regles[] = new Regle("DATE","ANNEE");
        $this->regles[] = new Regle("DATE","JOURS_MOIS");

        $this->regles[] = new Regle("DATE","LE","JOURS");
        $this->regles[] = new Regle("DATE","LE","JOURS_MOIS");
        $this->regles[] = new Regle("DATE","LE","JOURS_MOIS_ANNEE");

        $this->regles[] = new Regle("JOURS_MOIS","JOURS","MOIS");
        $this->regles[] = new Regle("MOIS_ANNEE","MOIS","ANNEE");

        $this->regles[] = new Regle("JOURS_MOIS_ANNEE","JOURS_MOIS","ANNEE");
        $this->regles[] = new Regle("JOURS_MOIS_ANNEE","JOURS","MOIS_ANNEE");
    }
}
?>
