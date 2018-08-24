# Tara

Met Tara kun je op een leuke manier je vergaderruimtes beheren. In vier dagen tijd hebben we bij [Studio September](https://studioseptember.nl) met een team van vier deze webapplicatie gerealiseerd. Tara draait op iPad mini's die bij onze vergaderruimtes hangen en geven de afspraken van die dag weer. Is de ruimte vrij? Dan kan je deze reserveren, voor een tijd die je zelf kan kiezen. Is de ruimte bezet, dan geeft Tara weer welke meeting er plaatsvindt. Kijk voor meer informatie op [de Tara website](https://tara.studioseptember.nl/).

## Getest op

- iPad mini in landscape modus met [Frameless app](https://itunes.apple.com/us/app/frameless-a-full-screen-web-browser/id933580264?mt=8)

## Benodigdheden

Voor het opzetten van je eigen Tara is enige webdevelopment kennis vereist. Tara maakt gebruik van Google Calendar en daarom heb je een Google service account nodig. Hieronder lees je hoe je dat maakt en de credentials kan verkrijgen om verbinding met jouw Google Calendar te maken.

De iPad heeft een case van bamboe, lasergesneden naar eigen ontwerp. Het Illustrator bestand kun je [hier](https://studioseptember.nl/app/uploads/2018/08/Tara_Snijmodel.ai_.zip) downloaden.


## Installeren

Clone deze repo en draai

```
composer install
npm install
npm run dev
```

Hernoem `.env.example` naar `.env` en voer vervolgens het `php artisan key:generate` commando uit om een key te genereren.

Maak vervolgens een Google service account. Volg hiervoor de [installatieinstructies](https://github.com/spatie/laravel-google-calendar#how-to-obtain-the-credentials-to-communicate-with-google-calendar) van het [Spatie Google Calendar package](https://github.com/spatie/laravel-google-calendar).

Download het `client_secrets.json` bestand en zet het in: `storage/app/google-calendar/`

Voeg in `/config` een bestand toe `google.calendar-rooms.php` met de volgende inhoud (pas het aan naar het aantal kamers):

```php
<?php

return [
    'rooms' => [
        'kamernaam' => [
            'id' => 'id van agenda',
            'label' => 'Kamer label'
        ],
    ],
];
```

Het id van een agenda is te vinden op de Calendar Details tab van een agenda in Google Calendar. Deze informatie is ook te vinden in de [installatieinstructies](https://github.com/spatie/laravel-google-calendar#how-to-obtain-the-credentials-to-communicate-with-google-calendar) van het [Spatie Google Calendar package](https://github.com/spatie/laravel-google-calendar).

Nu kun je in een browser naar de url van de app gaan en de kamer selecteren die je wilt zien.

## Gemaakt met

* [Laravel](https://laravel.com/) - PHP framework
* [Spatie Google Calendar package](https://github.com/spatie/laravel-google-calendar) - Voor integratie met Google Calender

## License

This project is licensed under the [MIT license](https://opensource.org/licenses/MIT)
