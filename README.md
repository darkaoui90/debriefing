# 📚 TP 1h30 — Gestion des Étudiants et des Notes (PHP & PDO)

---

## ⏱️ Durée
**1 heure 30 minutes**

---

## 🎯 Objectifs pédagogiques
À la fin de ce TP, vous serez capables de :

- Utiliser **PHP procédural**
- Se connecter à une base de données avec **PDO**
- Récupérer et afficher des données dynamiquement
- Calculer des statistiques simples (moyenne, min, max)
- Structurer un mini-projet PHP

---

## 🧠 Contexte
Vous devez développer une application web permettant de gérer :

- Une **liste d’étudiants**
- Les **notes** associées à chaque étudiant
- Des **statistiques académiques**

L’interface graphique est fournie via **Bootstrap 5**.  
Votre mission est de remplacer le contenu statique par du **code PHP dynamique**.

---

## ✅ Checklist (Debriefing TP)

- [ ] Inclure le fichier `database.php`
- [ ] Obtenir une connexion PDO fonctionnelle
- [ ] Récupérer et afficher la liste des étudiants
- [ ] Afficher : ID, Nom, Email, Classe
- [ ] Afficher le nombre de notes par étudiant
- [ ] Calculer la moyenne des notes
- [ ] Afficher la note minimale et maximale
- [ ] Afficher un message `success` ou `error` via l’URL

---

## 🗂️ Structure du projet attendue

```bash
gestion-ecole/
│
├── index.php
├── database.php
│
├── etudiants/
│   ├── ajouter_etudiant.php
│   └── supprimer_etudiant.php
│
├── notes/
│   └── ajouter_note.php
│
└── README.md
