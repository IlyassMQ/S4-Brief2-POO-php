
# Unity Care Clinic – Backoffice V2

## 🏥 Contexte du projet
Suite au succès des versions précédentes de **Unity Care Clinic**, cette version V2 vise à étendre le backoffice pour couvrir l’ensemble du parcours patient : prise de rendez-vous, consultations et prescriptions médicales.  

Cette version introduit un **système d’authentification multi-rôles** (Admin, Doctor, Patient) avec des interfaces et fonctionnalités adaptées à chaque rôle. Le projet garantit la sécurité, la traçabilité des actions et la protection contre les attaques web courantes.

---

## 🎯 Objectifs principaux

- Implémenter un système d'authentification web avec `$_SESSION`.
- Mettre en place un contrôle d’accès basé sur les rôles (RBAC).
- Gérer les rendez-vous médicaux (CRUD).
- Gérer les prescriptions et les médicaments.
- Sécuriser l’application contre XSS et CSRF.
- Fournir des statistiques enrichies pour le dashboard.
- Consolider l’architecture orientée objet existante.



## ⚡ Fonctionnalités

### 1. Système d’authentification
- Connexion via email et mot de passe.
- Déconnexion.
- Redirection automatique si l’utilisateur tente d’accéder à une page non autorisée.

### 2. Gestion des sessions
- Maintien de l’état de connexion via `$_SESSION`.
- Vérification d’authentification et de rôle sur chaque page protégée.


### 4. Gestion des rendez-vous
- Classe `Appointment` avec opérations CRUD.
- Chaque rendez-vous a :  
  - Date  
  - Heure  
  - Médecin  
  - Patient  
  - Motif  
  - Statut (`scheduled`, `done`, `cancelled`)

### 5. Gestion des prescriptions
- Classes `Medication` et `Prescription`.
- Une prescription lie un médecin, un patient et un médicament avec des instructions de dosage.

### 6. Sécurité web
- **XSS** : toutes les sorties dynamiques sont échappées.  
- **SQL Injection** : utilisation de requêtes préparées PDO.  
- **CSRF** : protection sur tous les formulaires via token.  
- Mots de passe : hashage avec `password_hash()`, vérification avec `password_verify()`.

### 7. Statistiques enrichies
- Rendez-vous : par statut, par médecin, évolution mensuelle.  
- Prescriptions : médicaments les plus prescrits.

### 8. Bonus – Système de réservation intelligent
- Affiche uniquement les créneaux disponibles du médecin sélectionné.  
- Horaires par défaut : 09:00-17:00, créneaux de 30 minutes.  
- Mise à jour dynamique via AJAX.

### 9. Bonus – Router / Controller
- Système de routing simple avec controllers pour centraliser la logique métier.

---

## 📌 User Stories

**Authentification :**
- US01 : Connexion par email + mot de passe.
- US02 : Déconnexion.
- US03 : Redirection si accès non autorisé.

**Rendez-vous :**
- US04 : Patient peut prendre un rendez-vous.  
- US05 : Doctor peut voir ses rendez-vous.  
- US06 : Patient / Doctor peut annuler ses rendez-vous.  
- US07 : Doctor peut marquer un rendez-vous comme effectué.

**Prescriptions :**
- US08 : Doctor peut créer une prescription pour un patient.  
- US09 : Patient peut voir l’historique de ses prescriptions.

**Administration :**
- US10 : Admin peut gérer les médicaments.  
- US11 : Admin peut filtrer tous les rendez-vous.

**Sécurité :**
- US12 : Protection XSS et CSRF sur tous les formulaires.







