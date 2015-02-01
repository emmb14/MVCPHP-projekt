Redovisning {#id1}
=====================



Kursmoment 01 - PHP-baserade och MVC-inspirerade ramverk {#id2}
---------------------

Då var det första kursmomentet klart. Det var mycket nytt att ta in så det tog ett tag att läsa allt men det har gått bra och jag har inte stött på några större problem.

Jag började med att läsa igenom alla artiklarna och kurslitteraturen. Artikeln om principer och filosofier för programmering var extra intressant och rolig att läsa och artikeln "PHP-baserade och MVC-inspirerade ramverk" behövde jag läsa två gånger plus göra anteckningar för att jag skulle förstå allt och få det att fastna.
Att jobba med ramverk är helt nytt för mig, men det verkar vara ett väldigt bra sätt att jobba när man gör webbplatser och webbapplikationer så jag ser fram emot att få lära mig mer om det.

Innan jag hade utfört det här kursmomentet så hade jag ingen aning om vad MVC var för något. Jag hade bara sett begreppet i olika jobbannonser (vilket var anledningen till att jag också sökte den här kursen). Nu när jag har läst om det och vet vad det är så tycker jag att det verkar vara ett väldigt bra sätt att jobba efter för att få en mer strukturerad kod. 
Begrepp som vyer, frontcontroller, namespace, routing m.m var också helt nya för mig och jag kände mig lite vilsen till en början men det släppte lite vart eftersom och jag tror jag har fått någorlunda kolla på det nu. 

Min utvecklingsmiljö består av en PC som har operativsystemet Windows 8.1. Om jag ska jobba lokalt på datorn använder jag Wamp som webbserver men oftast så jobbar jag direkt mot skolans server och då använder jag mig av Cyberduck för att koppla upp mig mot den. 
Som editor använder jag mig av Notepad++ och när jag behöver en ren ftp-klient så använder jag FileZilla.

Till en början så tyckte jag att det var ganska svårt att hänga med och göra dom ändringar som vi skulle göra Anax-MVC. Jag fick inte riktigt grepp om vad alla filer och mappar var till för och hur jag skulle använda dom men ju mer jag jobbade med det så släppte det och i slutet av kursmomentet så kände jag ändå att jag började få någorlunda koll på det. Så nu ser jag fram emot att få fortsätta jobba med Anax-MVC och få lite bättre koll på det, men framför allt att få utforska det lite mer och se vad man kan göra med det.


<hr />


Kursmoment 02 - Kontroller och modeller {#id2}
---------------------

Det här kursmomentet har varit lite kämpigt. Det blev en hel del detektivarbete innan jag förstod hur jag skulle göra för att bygga vidare på kommentarsystemet, t.ex. vilken kod som skulle ligga i vilken fil.  
Så man kan ju verkligen säga att uppgiftens syfte att jag skulle ”dyka in mer i Anax MVC” uppfylldes. Jämfört med Kmom01 så har jag nu en mycket bättre förståelse för hur Anax MVC är uppbyggt och vilka delar det består av men jag känner samtidigt att det finns mycket kvar att lära.

Att ladda ner och installera Composer gick bra. Jag hade dock lite svårt att förstå hur jag skulle använda Kommandoraden först och sedan hur jag skulle koppla upp mig mot studentservern. Men det löste sig snabbt tack vare forumet.
När jag väl hade fått ordning på inloggningen så flöt det på bra och det var otroligt smidigt att installera paketet med Kommentarssystemet med hjälp av det. 

Gällande Packagis så fanns tyvärr inte tiden att utforska det så mycket. Jag var tvungen att fokusera på att klara och lämna in kmom02 så jag inkluderade bara modulen phpmvc/coment. 
Men jag kan absolut tänka mig att använda det i framtiden så jag gjorde i alla fall några snabba sökningar på saker som skulle kunna bli aktuella, t.ex till en webshop, och det fanns en hel del paket där som kändes lockande att läsa mer om. Så det ska jag utforska lite mer när jag får tillfälle. 

Alla nya begrepp har varit lite svåra att få in och jag vet inte riktigt om allt har fastnat än. Vid ett tillfälle under kursmomentet så var jag så förvirrad av alla begrepp att jag fick lov att rita av flödesschemat och ha det bredvid mig hela tiden för att hänga med och förstå vilken kod som skulle ligga i vilken fil. Det var till stor hjälp.

Jag har inte hittat någon direkt svaghet med phpmvc/comment men att lägga till funktionalitet för redigering och borttagning av enskilda kommentarer samt styla det kan man ju säga var en typ av förbättring.

Med dom här kunskaperna i bagaget ska det nu bli intressant att få fortsätta med Kmom03. Jag tor och hoppas att jag nu har fått en så pass bra förståelse för Anax MVC så att det kursmomentet inte blir lika svårt. Men vi får väll se...

<hr />

Kursmoment 03 - Bygg ett eget tema {#id2}
---------------------
Det här kursmomentet har varit väldigt roligt. 
Jag har länge velat lära mig mer om responsiv layout och lite mer mobile-first-tänk så jag blev väldigt glad när jag såg att vi skulle gå in på det här. 

Ett problem som jag stötte på under kursmomentet var när jag la till typography.less från Lydia. Men genom att kommentera bort rad för rad i koden så lyckades jag till sist lista ut att det var variablerna för storlekarna på rubrikerna som det var något fel med. 
Jag hade tidigare läst att LESS är lite striktare än CSS så jag tänkte att det säkert berodde på ett litet ”syntax-fel” och provade en massa ändringar. Till sist löste jag det genom att lägga till ett mellanrum mellan värdet och enheten em så att det blev så här:

@fontSizeH1: 2.375 em;

istället för så här: 

@fontSizeH1: 2.375em;

Det här var första gången som jag kom i kontakt med CSS-ramverk. Alla tre ramverken som vi fick bekanta oss med kändes väldigt användbara men jag fastnade lite extra för Font Awesome för att det var så enkelt att använda och hade ett så stort urval av ikoner som passar till dom flesta projekten. Jag tycker visserligen att det är ganska kul att jobba i Photoshop och göra sånt själv men oftast är tiden väldigt begränsad och vill man då bara ha en enkel ikon så är det ju perfekt att använda Font Awesome. 
Normalize verkade ju nästan lite för bra för att vara sant. Framför allt eftersom det fixar vanliga buggar i webbläsarna. Det känns som att det kommer att bli en standard att alltid ha med Normalize i kommande projekt.

Ofta när jag har skrivit CSS-kod tidigare så har jag känt att jag ofta får upprepa samma kod och att jag ibland får lägga till onödiga div-ar för att få saker att lägga sig som jag vill. Nu beror nog detta mycket på att jag än så länge inte har så jättemycket erfarenhet av CSS men med hjälp av LESS och Semantic.gs så kan man få en mycket ”snyggare” kod. 

Det jag tyckte bäst om med LESS var att det gav mig möjligheten att jobba med variabler, för det är något som jag har saknat tidigare. Det är ju t.ex. väldigt smidigt att lägga en färgkod i en variabel som man sedan använder lite här och var på en webbplats. Kommer man sedan på att det inte blev så snyggt med den färgen så behöver jag bara byta färgkod på ett ställe. 

Angående lessphp så vet jag inte hur andra kompilatorer fungerar så jag har inget att jämföra med men jag tyckte det fungerade bra.

Med hjälp av Semantic.gs var det väldigt smidigt att dela upp innehållet i kolumner och lägga div:ar bredvid varandra. Det är annars en sådan sak som jag tycker har varit lite svårt att få till.

Gridbaserad layout har jag försökt mig på tidigare men jag har aldrig riktigt förstått hur jag ska använda den, det gör jag nu. Fast det var svårt att få texten att ligga på dom horisontella linjerna. Först var dom inte ens i närheten av att ligga på linjerna men så la jag in en line-height i bodyn och då fick jag det att stämma någorlunda, iaf på sidorna Typografi och regioner. På sidan Tema-exempel så förstör ikonerna från Font Awesome det.

Tanken med mitt tema var att man skulle kunna använda det i en one-page-design som man ser mycket av just nu. Jag hade en bild i huvudet på hur jag ville att det skulle se ut men jag fick förenkla det ganska mycket då tiden inte riktigt fanns att få det som jag ville. Så det blev ett väldigt enkelt och avskalat tema.

Jag gjorde inte extrauppgiften.

Mitt tema kan du titta på här: http://www.student.bth.se/~emmb14/phpmvc/kmom03/webroot/theme.php/tema

<hr />

Kursmoment 04 - Databasdrivna modeller{#id2}
---------------------
Så var äntligen det här kursmomentet färdigt. Jag stötte på en del problem så det har tagit många fler timmar än vad det var beräknat att genomföra övningarna och uppgifterna.

När jag skulle installera CForm med Composer så fungerade det inte, jag provade med alla möjliga eventuella lösningar men till sist fick jag ta hjälp i forumet. Det visade sig till sist att felet låg i att jag hade lagt in flera ”require” i composer.json och när jag gjorde om det så att det istället bara var en require där så fungerade det.

Jag hade först lite svårt att förstå var jag skulle lägga alla routes, detta framgick inte riktigt i övningarna så jag gjorde först så som vi (eller i alla fall jag) har gjort i tidigare kursmoment och la dom i frontkontrollern. Jag insåg dock att det inte var rätt och satt länge och klurade på hur jag skulle göra. Tack vare en gammal tråd i forumet så fick jag till detta till slut.

Formulärhanteringen som vi har jobbat med i det här kursmomentet tycker jag har varit väldigt smidigt och lätt att jobba med. Framför allt så gillade jag valideringen.

Jag hade lite svårt att hänga med i hur den här databashanteringen fungerar och det känns fortfarande lite luddigt så just nu måste jag säga att jag föredrar traditionell SQL. Men får jag möjligheten att jobba lite mer med det så jag blir lite mer varm i kläderna så kan det säkert ändras. 

Jag har väll egentligen bara följt instruktionerna i övningarna och uppgifterna och inte gjort några speciella vägval.
Något som jag var nära på att strunta i var att lägga över formulären och alla tillhörande callbacks i egna klasser då jag stötte på problem med det och först inte hade en aning om hur jag skulle lösa det. Dessutom kände jag mig väldigt tidspressad. Men precis när jag var på väg att ge upp så fick jag en idé som jag provade och då fungerade det. Att lägga över all den koden i egna klasser sparade många rader i kontrollerna och gjorde dom mycket lättare att jobba med så jag är glad att jag fick det att fungera till sist.

När jag skulle implementera kommentarer i databasen så skapade jag modellen Comment precis som vi gjorde modellen User. Till skillnad mot modellen User, som jag valde att ha helt tom så har jag i modellen Comment lagt in en metod som jag tror bara kommer att passa att användas till kommentarshanteringen. Sedan utgick jag från min gamla commentController och ändrade bara koden i varje metod så att dom använde basklassen och jobbade mot databasen istället för sessionen. I en del metoder kunde jag kopiera koden från UsersController och bara göra några små ändringar, men ibland krävdes det lite mer. Framför allt var det lite knivigt att få till det så att kommentarerna som t.ex. tillhör sidan Me bara visas på den sidan men det löste sig till sist.
När det gäller kommentarerna så finns det några saker som jag skulle vilja ”snygga till” för att göra det mer användarvänligt men jag kände att det inte var rätt att lägga tid på det i den här uppgiften, och framför allt inte när jag har hamnat så pass mycket efter.

Jag har inte gjort extrauppgiften.

<hr />

Kursmoment 05 - Bygg ut ramverket
---------------------
Jag valde att göra en modul för att spara och visa flash-meddelanden via sessionen. Inspirationen till den modulen fick jag från dom förslag som fanns i artikeln ”Bygg ut ditt Anax MVC med en egen modul och publicera via Packagist”. 
Jag har några gånger under kursen saknat ett sätt att skriva ut meddelanden så därför kändes det rätt att göra en sådan här modul. Sedan kändes det dessutom som en enkel modul att koda vilket kändes bra efter förra kursmomentet som tog väldigt lång tid att genomföra.

Jag började med att göra själva filstrukturen för modulen och då tittade jag på hur modulerna för CDatabase och CForm var uppbyggda. Sedan återanvände jag en del av koden från filen CommentsInSession i modulen Comment som vi jobbade med i kmom02. Så man kan väll säga att CommentsInSession var min kodbas.

Att utveckla modulen och integrera den i mitt ramverk flöt på bra utan några större problem. Jag ville snygga till meddelandena lite så jag la in passande ikoner från Font Awesome. Min tanke är dock att användaren ska kunna välja om man vill ha dessa så om man inte laddar hem filerna för Font Awesome så ska meddelandena fungera och skrivas ut snyggt ändå.

Det som tog lite tid var när jag skulle ladda upp modulen på GitHub. Jag hade inte använt GitHub tidigare mer än till att hämta AnaxMVC och tidigare moduler så jag visste först inte hur jag skulle göra för att ladda upp modulen där. Instruktionerna på GitHub var inte så tydliga heller.
När jag väl hade fått ordning på GitHub så var det inga problem med att publicera modulen på Packagist.

När modulen låg uppe på GitHub och Packagist gjorde jag en ny installation av Anax MVC. Sedan provade jag att installera modulen där med hjälp av Composer. Jag blev tvungen att göra några justeringar för att få det att fungera som det ska men i det stora hela så tycker jag att det gick bra att få modulen att fungera med AnaxMVC.
Eftersom det är en ganska enkel modul så var det inte heller så svårt att skriva dokumentationen till den.

Jag valde att inte göra extra-uppgiften.


GitHub: https://github.com/emmb14/CMessage

Packagist: https://packagist.org/packages/isa/cmessage 

<hr />

Kursmoment 06 - Verktyg och CI
---------------------
Så var kmom06 färdigt. Dom här teknikerna var helt nya för mig så det har varit mycket nytt att ta in.

Det började lite trögt med en del problem med att installera PHPunit lokalt på datorn (Windows). 
Jag känner mig fortfarande inte riktigt hemma med att jobba med kommandon och har lite svårt att hänga med i sådana övningar. 
Jag bad om hjälp i forumet och det visade sig till slut att jag var tvungen att lägga till en sökväg i datorns PATH vilket var något som jag aldrig hade hört talas om tidigare men tack och lov för att Google finns. 

Nästa problem kom när jag skulle testa att använda PHPunit. Men tack vare snabb hjälp på forumet löste det sig efter att ha laddat hem Git och bytt ut ett kommando i övningen som inte fungerade i windows.
När det sedan var dags att börja skriva testfall gick det förvånansvärt bra. Men CMessage är ju en väldigt enkel modul så det var ju kanske inte så konstigt. Efter att ha kommenterat bort onödig kod i autoloadern fick jag 100% code coverage.

Att integrera med Travis och Scrutinizer gick bra. Det var väldigt smidigt och det kändes nästan som att det skötte sig själv.

Förutom att det var lite krångligt att installera PHPunit så tycker jag att alla verktygen var väldigt bra och jag kan tänka mig att det är verktyg som absolut är nödvändiga om man jobbar med stora projekt. Även om det säkert är något som lätt glöms bort eller hoppas över när deadline närmar sig alldeles för fort. Jag kommer i alla fall att fortsätta att använda dom.

Jag gillade framför allt Scrutinizer. Där fick jag en bra överblick över vad som kunde förbättras och konkreta tips på hur jag skulle göra det. Min code quality på 9.41% kändes helt ok så jag nöjde mig med det just nu.

Jag valde att inte göra extrauppgiften.


* Redovisning på me-sida: http://www.student.bth.se/~emmb14/phpmvc/kmom06/webroot/index.php/redovisning 
* GitHub: https://github.com/emmb14/CMessage 
* Travis: https://travis-ci.org/emmb14/CMessage 
* Scrutinizer https://scrutinizer-ci.com/g/emmb14/CMessage/


