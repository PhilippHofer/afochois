<?php

class WordTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('words')->delete();
        $id = Group::where('name', '=', 'Megacities')->firstOrFail()->id;
        /* Megacities */
        Word::create(array(
            'english' => 'agglomeration',
            'german' => 'Ballungsraum',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'public transport',
            'german' => 'öffentliche Verkehrsmittel',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'city dweller',
            'german' => 'Städter',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'real estate',
            'german' => 'Immobilien',
            'group_id' => $id
        ));

        $id = Group::where('name', '=', 'House, mouse ...')->firstOrFail()->id;
        /* House, mouse ... */
        Word::create(array(
            'english' => 'house',
            'german' => 'Haus',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'mouse',
            'german' => 'Maus',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'louse',
            'german' => 'Laus',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'ostrich',
            'german' => 'Strauß',
            'group_id' => $id
        ));

        $id = Group::where('name', '=', 'Last year')->firstOrFail()->id;
        Word::create(array(
            'english' => 'monotonous',
            'german' => 'monoton',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'varried',
            'german' => 'abwechslungsreich',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to do a task',
            'german' => 'eine Aufgabe erfüllen',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to do a job',
            'german' => 'eine Arbeit machen',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to do a good job',
            'german' => 'gute Arbeit leisten',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to make a good job of it',
            'german' => 'eine gute Arbeit machen',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to do a duty',
            'german' => 'eine Pflicht erfüllen',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to do your work',
            'german' => 'deine Arbeit machen',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'fire fighter',
            'german' => 'Feuerwehrmann',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'bar tender',
            'german' => 'Barkeeper',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'vet',
            'german' => 'Tierarzt',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'nurse',
            'german' => 'Krankenschwester',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'teacher',
            'german' => 'Lehrer',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'electrician',
            'german' => 'Elektriker',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'mechanic',
            'german' => 'Mechaniker',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'IT specialist',
            'german' => 'IT Spezialist',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'foreman',
            'german' => 'Polier',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'police officer',
            'german' => 'Polizist',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'pilot',
            'german' => 'Pilot',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'secretary',
            'german' => 'Sekretär',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'scientist',
            'german' => 'Wissenschaftler',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'civil servant',
            'german' => 'Zivildiener',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'pharmaist',
            'german' => 'Apotheker',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'cleaning staff',
            'german' => 'Reinigungskraft',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'flight attendant',
            'german' => 'Flugbegleiter',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'musician',
            'german' => 'Musiker',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'soldier',
            'german' => 'Soldat',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'artist',
            'german' => 'Künstler',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'doctor',
            'german' => 'Arzt',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'gardener',
            'german' => 'Gärtner',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'shop assistant',
            'german' => 'Verkäufer',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'chef',
            'german' => 'Küchenchef',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'waiter',
            'german' => 'Kellner',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'line manager',
            'german' => 'Manager',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'site manager',
            'german' => 'Bauleiter',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'mechatronics engineer',
            'german' => 'Mechatroniker',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'web designer',
            'german' => 'Webdesigner',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'lawyer',
            'german' => 'Anwalt',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'architekt',
            'german' => 'Architekt',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'hairdresser',
            'german' => 'Firsör',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'Do you work indoors?/Do you work indoors',
            'german' => 'Arbeitest du drinnen?/Arbeitest du drinnen',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'Do you wear safety clothes?/Do you wear safety clothes',
            'german' => 'Trägst du sicherheitskleidung?/Trägst du sicherheitskleidung',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'Do you have to work at the weekend?/Do you have to work at the weekend',
            'german' => 'Musst du auch am Wochenende arbeiten?/Musst du auch am Wochenende arbeiten',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'Do you work in an office?/Do you work in an office',
            'german' => 'Arbeitest du im Büro?/Arbeitest du im Büro',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to be a fast learner',
            'german' => 'ein schneller Lerner sein',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to be creative',
            'german' => 'kreativ sein',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to be a team player',
            'german' => 'sich im Team einfügen können',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to be a good communicator',
            'german' => 'ein guter Sprecher sein',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to be a good negotiator',
            'german' => 'ein guter Verhändler sein',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to be a quick to understand',
            'german' => 'schnell zu verstehen',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to be confident',
            'german' => 'selbstbewusst sein',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to be preparted to travel',
            'german' => 'bereit sein zu reisen',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to be ambitious',
            'german' => 'ehrgeizig sein',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to be determined',
            'german' => 'entschlossen sein',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to be capalle of independent work',
            'german' => 'zu eigenständiger Arbeit fähig sein',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to be patient',
            'german' => 'geduldig sein',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to be decisive',
            'german' => 'ausschlaggebend sein',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to be reliable',
            'german' => 'zuverlässig sein',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to be fluent in English',
            'german' => 'flüssig Englisch sprechen können',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to be highly motivated',
            'german' => 'hochmotiviert sein',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to have good computer skills',
            'german' => 'gute Computerkenntnisse haben',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to be flexible',
            'german' => 'flexibel sein',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'to be good at leading groups',
            'german' => 'Gruppen gut führen können',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'I am convinced that',
            'german' => 'Ich bin überzeugt, dass',
            'group_id' => $id
        ));
        Word::create(array(
            'english' => 'I really feel that',
            'german' => 'Ich fühle wirklich, dass',
            'group_id' => $id
        ));

	}

}
