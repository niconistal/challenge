# Gone! Challenge

### Introduction

This challenge consists in creating a simple project using Symfony PHP­based framework for backend and JavaScript for templating.

### Objective

This system aims to provide Gone! operators a lightweight tool which they’ll use for checking boxes and products information and change their status based in real­life events.

### Definition

The user starts by creating a box and adding products to it. Gone! later makes an offer for that box. The user can accept or decline that offer.
If the offer is declined, the flow ends there. If it's accepted, a pickup has to be scheduled. Once accepted, the offer is locked and cannot be changed later. After being picked up, the box is in transit until is later delivered to the warehouse, where the flow ends.
It could happen that the pickup could not be completed. In that case, a new pickup must be scheduled.

### API

* This API is how the frontend will require data asynchronously to the backend.
* Must be RESTful and is up to the challenger what endpoints need to be created to fulfill
the challenge objectives.
* Database structure is up to the challenger to design.
* Database engine/service is decided by the challenger, but it should be simple for us to
connect later when testing the project.

### Frontend

UI must be developed in JavaScript, using Angular.js or Backbone.js as a framework and Bootstrap for templating following single page application structure.