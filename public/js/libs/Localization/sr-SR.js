/// <reference path="../Src/knockout.validation.js" />

/************************************************
* This is an example localization page. All of these
* messages are the default messages for ko.validation
* 
* Currently ko.validation only does a single parameter replacement
* on your message (indicated by the {0}).
*
* The parameter that you provide in your validation extender
* is what is passed to your message to do the {0} replacement.
*
* eg: myProperty.extend({ minLength: 5 });
* ... will provide a message of "Please enter at least 5 characters"
* when validated
*
* This message replacement obviously only works with primitives
* such as numbers and strings. We do not stringify complex objects 
* or anything like that currently.
*/

ko.validation.localize({
    required: 'Obavezno polje.',
    min: 'Molimo Vas unesite broj veći ili jednak {0}.',
    max: 'Molimo Vas unesite broj manji ili jednak {0}.',
    minLength: 'Unesite najmanje {0} i više znakova.',
    maxLength: 'Maksimalna dužina je {0} znakova.',
    pattern: 'Uneta vrednost nije pravilnog formata.',
    step: 'The value must increment by {0}',
    email: 'Neispravna email adresa.',
    date: 'Neispravan datum.',
    dateISO: 'Please enter a proper date',
    number: 'Uneta vrednost nije validan broj.',
    digit: 'Uneta vrednost nije validan broj.',
    phoneUS: 'Please specify a valid phone number',
    equal: 'Values must equal',
    notEqual: 'Please choose another value.',
    unique: 'Uneta vrednost nije jedinstvena.',
    //Custom validation messages.
    checked: 'Checkbox mora biti chekiran.',
    name: "Neispravan unos. Polje može sadržati slova i specijalne karaktere (,.'-)",
    numbersOnly: 'Neispravan unos. Polje može sadržati samo brojeve.',
    companyName: "Neispravan unos. Naziv firme moze sadržati slova, brojeve i specijalne karaktere (,.'-)",
    passwordMustEqual: "Neispravno ponovljena lozinka.",
    password: "Neispravan unos. Minimum je 6 karaktera. Lozinka može sadrzati velika i mala slova, brojeve i specijalne karaktere(,.'-+~!@#%^&)",
    amount: "Neispravan iznos. Iznos mora biti broj. Koristi tačku(.) kao separator decimalnih brojeva."
});