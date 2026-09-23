# Clara Berardi — WordPress Theme

Tema de WordPress para el portfolio de Clara Berardi (Creative Lead). Los proyectos se manejan como un *Custom Post Type* `project` con campos distintos según el **tipo de proyecto** (Production / Brand Identity / Curation) usando **Advanced Custom Fields (ACF)**.

## ⚠️ Importante: dónde alojarlo

Esto usa **tema custom + plugin ACF**, que **NO funcionan en WordPress.com gratis** (ahí no se pueden subir temas ni instalar plugins). Necesitás una de estas dos opciones:

- **WordPress.org (recomendado):** el software gratuito, instalado en un hosting propio (o local con LocalWP). Tenés control total: subís el tema, instalás ACF y listo.
- **WordPress.com — plan Business o superior:** permite temas y plugins.

## Qué incluye

```
clara-berardi/
├── style.css                 → cabecera del tema
├── functions.php             → registra CPT "project", taxonomía "project_type", menús, ACF JSON
├── header.php / footer.php   → navbar + footer "Developed by divino divino"
├── front-page.php            → portada (hero + "Selected Work")
├── archive-project.php       → página "Work" con filtro por tipo
├── single-project.php        → detalle de cada proyecto (meta por tipo, video, galería, créditos)
├── page.php                  → páginas estáticas (Studio, Contact)
├── template-parts/project-card.php
├── assets/css/main.css       → estilos (tipografías Playfair Display / PP Neue Montreal)
├── assets/js/main.js         → menú móvil
├── assets/img/logo-dd.png    → logo de divino divino
└── acf-json/                 → 4 field groups de ACF (se importan solos)
```

## Instalación (paso a paso)

1. Instalá WordPress.org en tu hosting (o en local con [LocalWP](https://localwp.com/)).
2. Instalá el plugin gratuito **Advanced Custom Fields** (ACF).
3. Subí la carpeta `clara-berardi/` a `/wp-content/themes/` y activá el tema (Apariencia → Temas).
4. Los field groups se importan **automáticamente** desde `acf-json/` (por el filtro en `functions.php`). Si no aparecen: ACF → Field Groups → *Import* los 4 JSON de `acf-json/`.
5. Creá las páginas **Studio** y **Contact** (Páginas → Añadir nueva) y escribí el contenido.
6. Configurá el **menú** (Apariencia → Menús): Work → enlace al archivo de proyectos, Studio y Contact → sus páginas. Asignalo a la ubicación "Primary Menu".
7. Ajustes → Enlaces permanentes → "Nombre de la entrada".
8. Ajustes → Lectura → "Tu portada muestra: una página estática" (opcional, para usar `front-page.php`).

## Cómo agrega/edita Clara un proyecto

1. **Proyectos → Añadir nuevo.**
2. **Título** = nombre del trabajo (ej. "Copa Llena, Corazón Contento").
3. **Contenido** (editor) = descripción.
4. **Imagen destacada** = portada del proyecto.
5. **Etiquetas** = disciplinas (ej. "Creative Direction", "Branding") — se muestran como chips.
6. A la derecha, elegí el **Project Type** (Production / Brand Identity / Curation). Según el tipo, aparecen los campos correspondientes:
   - **Production:** Agency, Production Company (además de los compartidos).
   - **Brand Identity:** Agency, Production Company.
   - **Curation:** Event, Space, Curators, Artists.
7. Rellená los campos compartidos: Brand, Role, Year, Client, Video, Gallery, Credits.

Los campos por tipo se controlan con las **reglas de ubicación** de ACF (cada field group está asignado a la taxonomía `project_type` correspondiente).

## Mapeo del modelo de datos

| React (`projects.json`) | WordPress |
|---|---|
| `title` | Título del post |
| `description` | Contenido del editor |
| `cover` | Imagen destacada |
| `categories[]` | Etiquetas (`post_tag`) |
| `type` | Taxonomía `project_type` |
| `brand`, `role`, `year`, `client` | ACF compartido (text) |
| `video` | ACF compartido (file) |
| `images[]` | ACF compartido (gallery) |
| `credits[]` | ACF compartido (repeater anidado) |
| `agency`, `productionCompany` | ACF tipo Production / Identity |
| `event`, `space`, `curators[]`, `artists[]` | ACF tipo Curation |

## Importar los proyectos actuales

Los 9 proyectos del portfolio React están en `src/data/projects.json`. Para pasarlos a WordPress tenés dos caminos:

1. **Manual (rápido):** creá cada proyecto copiando el texto y subiendo las imágenes (están en `public/assets/projects/<slug>/`).
2. **Migración automática:** usá la estructura de `projects.json` + WP-CLI/script para crear posts con `wp_insert_post()` y guardar cada campo como meta de ACF (los campos ACF se guardan con `update_field( 'nombre', $valor, $post_id )`).

> Nota: ACF guarda los valores con sus nombres (`brand`, `role`, `credits`, etc.). El nombre de cada campo ACF coincide con las claves de `projects.json` para que la migración sea 1:1.

## Extras

- **Smooth scroll / GSAP:** el tema actual no incluye ScrollSmoother (para mantenerlo simple). Si lo querés, agregá GSAP + ScrollSmoother envolviendo el contenido en `#smooth-wrapper > #smooth-content` (como está en la versión React).
- **Contacto real:** reemplazá el email `hola@claraberardi.com` en `footer.php` y en la página Contact.
