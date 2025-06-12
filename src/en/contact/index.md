---
layout: page.njk
lang: en
title: Contact
description: Contact information for Ukrainian Catholic Holy Ghost Church
permalink: /en/contact/
---

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="text-center">
            <img src="{{ '/images/thb_V_Vitt.jpg' | url }}" alt="Fr. Volodymyr Vitt" class="img-thumbnail mb-3" style="max-width: 200px;">
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
                    <p class="mb-0">
                        <i class="bi bi-building me-2"></i>
                        <strong>{{ translations[lang].contact.administration }}:</strong> 
                        <a href="tel:+15149359732">514-935-9732</a>
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
                    Church Address
                </h4>
                <address class="mb-0">
                    <strong>Ukrainian Catholic Holy Ghost Church</strong><br>
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
                    <strong>Ukrainian Catholic Holy Ghost Church</strong><br>
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
                    Service Schedule
                </h4>
                <div class="schedule-info">
                    {{ lang | dynamicSchedule | safe }}
                </div>
            </div>
        </div>
    </div>
</div> 