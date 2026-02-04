---
layout: page.njk
lang: fr
title: Contact
description: Informations de contact pour l'église catholique ukrainienne Saint-Esprit
permalink: /fr/contact/
---

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="text-center">
            <img src="{{ '/images/thb_V_Vitt.jpg' | url }}" alt="Père Volodymyr Vitt" class="img-thumbnail mb-3" style="max-width: 200px;">
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ translations[lang].contact.priest }}</h3>
                <div class="contact-info">
                    <p class="mb-2">
                        <i class="bi bi-house-door me-2"></i>
                        <strong>{{ translations[lang].contact.residence }}:</strong> 7345 Churchill Verdun Qc
                    </p>
                    <p class="mb-2">
                        <i class="bi bi-telephone me-2"></i>
                        <strong>{{ translations[lang].contact.telephone }}:</strong> 
                        <a href="tel:+15147693804">514-769-3804</a>
                    </p>
                    <p class="mb-2">
                        <i class="bi bi-envelope me-2"></i>
                        <strong>{{ translations[lang].contact.email }}:</strong> 
                        <a href="mailto:v.vitt@hotmail.com">v.vitt@hotmail.com</a>
                    </p>
                    <p class="mb-2">
                        <i class="bi bi-building me-2"></i>
                        <strong>{{ translations[lang].contact.administration }}:</strong> 
                        <a href="tel:+15149359732">514-935-9732</a>
                    </p>
                    <p class="mb-0">
                        <i class="bi bi-envelope me-2"></i>
                        <strong>{{ translations[lang].contact.administrativeEmail }}:</strong> 
                        <a href="mailto:uchgc.montreal@hotmail.com">uchgc.montreal@hotmail.com</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <i class="bi bi-geo-alt me-2"></i>
                    Adresse de l'église
                </h4>
                <address class="mb-0">
                    <strong>L'église catholique ukrainienne Saint-Esprit</strong><br>
                    1795 Rue Grand Trunk<br>
                    Montréal, QC, H3K 1M1<br>
                    Canada
                </address>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <i class="bi bi-mailbox me-2"></i>
                    {{ translations[lang].contact.mailingAddress }}
                </h4>
                <address class="mb-0">
                    <strong>L'église catholique ukrainienne Saint-Esprit</strong><br>
                    1770 Rue Centre<br>
                    Montréal, QC, H3K 1H7<br>
                    Canada
                </address>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <i class="bi bi-clock me-2"></i>
                    Horaire des services
                </h4>
                <div class="schedule-info">
                    {{ lang | dynamicSchedule | safe }}
                </div>
            </div>
        </div>
    </div>
</div> 

<div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <i class="bi bi-shield-check me-2"></i>
                    La Politique de Sauvegarde Éparchiale
                </h4>
                <div class="mb-0">
                    La Politique de Sauvegarde Éparchiale de l'Éparchie Ukrainienne Catholique de Toronto et de l'Est du Canada est conçue pour garantir que toutes les allégations d'abus physiques et sexuels et d'autres inconduites soient traitées de manière responsable, transparente et avec tout le soin et l'attention nécessaires. Pour parler à quelqu'un d'une préoccupation, veuillez contacter votre Curé/Administrateur, Coordinateur/Coordinatrice Paroissiale des Soins f. Volodymyr Vitt: <a href="tel:514-769-3804">514-769-3804</a>, ou Natalka Haras: <a href="tel:514-378-7831">514 378-7831</a>, ou Coordinatrice Éparchiale des Soins, Annette Hrywna, par courriel: <a href="mailto:safeguarding@ucetec.org">safeguarding@ucetec.org</a>. Plus d'informations sont disponibles sur le site web de l'Éparchie: <a href="https://ucet.ca/safeguarding/">https://ucet.ca/safeguarding/</a>
                </div>
            </div>
        </div>
    </div>
</div> 