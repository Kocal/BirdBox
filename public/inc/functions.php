<?php
date_default_timezone_set('UTC');

/**
 * Traduit le nom des mois et des jours en français
 * @param string $date Date en anglais
 * @return La date traduite en français
 */
function date_en_francais($date) {

    $mois = [
        'long' => [
            'January' => 'Janvier',
            'February' => 'Février',
            'March' => 'Mars',
            'April' => 'Avril',
            'May' => 'Mai',
            'June' => 'Juin',
            'July' => 'Juillet',
            'August' => 'Août',
            'September' => 'Septembre',
            'October' => 'Octobre',
            'November' => 'Novembre',
            'December' => 'Décembre'
        ],

        'court' => [
            'Jan' => 'Jan',
            'Feb' => 'Fév',
            'Mar' => 'Mar',
            'Apr' => 'Avr',
            'May' => 'Mai',
            'Jun' => 'Jui',
            'Jul' => 'Jui',
            'Aug' => 'Aoû',
            'Sep' => 'Sep',
            'Oct' => 'Oct',
            'Nov' => 'Nov',
            'Dec' => 'Déc'
        ]
    ];

    $jours = [
        'long' => [
            'Monday' => 'Lundi',
            'Tuesday' => 'Mardi',
            'Wednesday' => 'Mercredi',
            'Thursday' => 'Jeudi',
            'Friday' => 'Vendredi',
            'Saturday' => 'Samedi',
            'Sunday' => 'Dimanche'
        ],

        'court' => [
            'Mon' => 'Lun',
            'Tue' => 'Mar',
            'Wed' => 'Mer',
            'Thu' => 'Jeu',
            'Fri' => 'Ven',
            'Sat' => 'Sam',
            'Sun' => 'Dim'
        ]
    ];


    foreach ($mois as $taille) {
        foreach ($taille as $anglais => $francais) {
            $date = preg_replace('/' . $anglais . '/', $francais, $date);
        }
    }

    foreach ($jours as $taille) {
        foreach ($taille as $anglais => $francais) {
            $date = preg_replace('/' . $anglais . '/', $francais, $date);
        }
    }

    return $date;
}


function parse_heure($heure) {
    list($heures, $minutes, $secondes) = explode('-', $heure);

    return date('g:i:s A', strtotime($heures . ':' . $minutes . ':' . $secondes));
}

function parse_date($date) {
    return date('l, j F Y', strtotime($date));
}
