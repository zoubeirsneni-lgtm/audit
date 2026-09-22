# RAPPORT BLOC 7bis — Déploiement du plugin BEBBA dans WAMP

**Date** : 2026-09-22
**Auteur** : OpenCode (BEBBA workflow)
**Dépôt source** : zoubeirsneni-lgtm/bhfsave (main)
**Commit source** : 591d72cd2a9cada2636220dd355eb62afd84af49
**Cible** : C:\wamp64\www\bebba_test\wp-content\plugins\bebba\

---

## Phase 1 — Vérification des chemins

| Élément | Résultat |
|---|---|
| `wp-config.php` | ✅ EXISTE : `C:\wamp64\www\bebba_test\wp-config.php` |
| `plugins\bebba\` | ✅ EXISTE |
| Contenu initial | `bebba.php` + `assets/css/menu.css` + `assets/js/menu.js` (3 fichiers) |
| Correctifs 1-3 | ❌ Non appliqués (version non corrigée) |
| Correctif 4 | ⚠️ Assets déjà en emplacement correct, mais contenu non corrigé |

**Aucun arrêt** — tous les chemins sont valides.

---

## Phase 2 — Sauvegarde

| Élément | Valeur |
|---|---|
| Emplacement | `C:\wamp64\www\bebba_test\wp-content\plugins\bebba-BACKUP-2026-09-22\` |
| Fichiers sauvegardés | 3 : `bebba.php`, `assets/css/menu.css`, `assets/js/menu.js` |
| Vérification | `find` + `wc -l` : 3 fichiers ✅ |

---

## Phase 3 — Récupération depuis GitHub

| Élément | Valeur |
|---|---|
| Dépôt cloné | `https://github.com/zoubeirsneni-lgtm/bhfsave.git` |
| Branche | `main` |
| SHA récupéré | `591d72cd2a9cada2636220dd355eb62afd84af49` ✅ |
| Arborescence source | 4 fichiers : `bebba.php`, `README.md`, `assets/css/menu.css`, `assets/js/menu.js` ✅ |

---

## Phase 4 — Déploiement

| Opération | Résultat |
|---|---|
| Vidage du dossier cible | ✅ Effectué |
| Copie des 4 fichiers | ✅ Effectuée |
| Nettoyage du dossier temporaire | ✅ Effectué |
| Arborescence déployée | 4 fichiers aux bons emplacements ✅ |

```
plugins\bebba\
├── bebba.php
├── README.md
└── assets\
    ├── css\
    │   └── menu.css
    └── js\
        └── menu.js
```

---

## Phase 5 — Vérification des correctifs

### Contrôle 1 — Frais de livraison

```bash
grep -n "delivery_fee" plugins\bebba\bebba.php
```

**Résultat** :
```
1140:        'delivery_fee'  => (float) get_option('bebba_delivery_fee', 2.50),
```

✅ **Correctif 1 appliqué** — plus aucune occurrence de `=> 0,`

---

### Contrôle 2 — Code mort

```bash
grep -c "updateCartUI" plugins\bebba\bebba.php
```

**Résultat** : `0`

✅ **Correctif 2 appliqué** — bloc `updateCartUI()` supprimé

---

### Contrôle 3 — Conversion numérique

```bash
grep -n "Number(config.delivery_fee)" plugins\bebba\assets\js\menu.js
```

**Résultat** :
```
16:  var deliveryFee = Number(config.delivery_fee);
```

```bash
grep -c "typeof config.delivery_fee" plugins\bebba\assets\js\menu.js
```

**Résultat** : `0`

✅ **Correctif 3 appliqué** — `Number()` au lieu de `typeof ... === 'number'`

---

### Contrôle 4 — Arborescence

```bash
find plugins\bebba\ -type f | sort
```

**Résultat** :
```
plugins\bebba\README.md
plugins\bebba\assets\css\menu.css
plugins\bebba\assets\js\menu.js
plugins\bebba\bebba.php
```

✅ **4 fichiers aux bons emplacements**

---

### Contrôle 5 — Syntaxe PHP

```
PHP non installé dans cet environnement — vérification non effectuée localement.
```

---

### Contrôle 6 — Nom du dossier

```
/mnt/c/wamp64/www/bebba_test/wp-content/plugins/bebba/bebba.php
```

✅ Le chemin se termine par `plugins\bebba\bebba.php`

---

### Contrôle 7 — Plugin actif

```
Plugin file present: YES
```

✅ Le fichier `bebba.php` est présent dans le répertoire du plugin

---

### Contrôle de fidélité

```bash
diff -r <source-github>/wordpress/plugins/bebba/ <cible-wamp>/plugins/bebba/
```

**Résultat** : `IDENTICAL`

✅ **Fichiers strictement identiques** — aucune modification parasite

---

## Phase 6 — Vérification fonctionnelle

| Test | Résultat |
|---|---|
| `http://localhost/bebba_test/` | HTTP 200 ✅ |
| `http://localhost/bebba_test/menu/` | HTTP 200 ✅ |
| `http://localhost/bebba_test/commande/` | HTTP 200 ✅ |
| `http://localhost/bebba_test/connexion-bebba/` | HTTP 200 ✅ |
| `menu.css` chargé | HTTP 200 ✅ |
| `menu.js` chargé | HTTP 200 ✅ |
| `delivery_fee` dans le code source | `"delivery_fee":"2.5"` ✅ |

**Note** : L'utilisateur doit faire **Ctrl + F5** dans son navigateur pour vider le cache.

---

## Fichiers créés / remplacés

| Fichier | Action |
|---|---|
| `plugins\bebba\bebba.php` | ✅ Remplacé (correctifs 1 & 2) |
| `plugins\bebba\assets\css\menu.css` | ✅ Remplacé (inchangé) |
| `plugins\bebba\assets\js\menu.js` | ✅ Remplacé (correctif 3) |
| `plugins\bebba\README.md` | ✅ Ajouté |

---

## Sauvegarde et rollback

**Sauvegarde** : `C:\wamp64\www\bebba_test\wp-content\plugins\bebba-BACKUP-2026-09-22\`

**Rollback** :
```batch
rmdir /s /q "C:\wamp64\www\bebba_test\wp-content\plugins\bebba"
xcopy "C:\wamp64\www\bebba_test\wp-content\plugins\bebba-BACKUP-2026-09-22" ^
      "C:\wamp64\www\bebba_test\wp-content\plugins\bebba" /E /I /Y
```

---

## Points hors périmètre

Aucun. Seul le dossier `plugins\bebba\` a été modifié. Aucun autre fichier WordPress n'a été touché.

---

## STOP

BLOC 7bis terminé. Déploiement réussi. Aucun commit, aucun push — opération locale uniquement.
