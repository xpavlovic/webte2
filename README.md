# webte2
Zaverecny projekt

1)

  Vytvoreny API ku Octave -subory api.php, index.php a .htaccess (config.php je zatial prazdny)

  API pouzitie: 
        
        LIETADLO
        VSTUP =
        
            Lietadlo + parameter(r): https://147.175.121.210:4629/final_p/api/scripts?scripts=lietadlo&parameter=1
        
        VYSTUP = Objekt obsahujuci data: T, X a Y (aktualny naklon lietadla x(:,3) a aktualny naklon zadnej klapky
        
        KYVADLO
        VSTUP =
        
            Kyvadlo + parameter(r): https://147.175.121.210:4629/final_p/api/scripts?scripts=kyvadlo&parameter=1
        
        VYSTUP = Objekt obsahujuci data: T, X a Y
        
        GULICKA
        VSTUP =
        
            Gulicka + parameter(r): https://147.175.121.210:4629/final_p/api/scripts?scripts=gulicka&parameter=1
        
        VYSTUP = Objekt obsahujuci data: T, X a Y
        
        TLMENIE
        VSTUP =
        
            Tlmenie + parameter(r): https://147.175.121.210:4629/final_p/api/scripts?scripts=tlmenie&parameter=1
        
        VYSTUP = Objekt obsahujuci data: T, X a Y
       


2)
TO DO:

Databáza (phpMyAdmin) a pripojenie v config.php

API kľúč - v config.php

Individualne ulohy:

Grafy a animacie

