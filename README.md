#  Aplicación Web de Gestión - CRUD

Una aplicación desarrollada en Laravel con la que crear, leer, modificar y eliminar instancias de una tabla en una base de datos. 

Haciendo uso de herramientas como DaisyUI, Talwind o SweetAlerts

---

## 1º Crear el proyecto 
Utilizando en la terminal:
```laravel new {nombre_del_proyecto}```

He seleccionado:
- breeze 
- Blade - para las pantallas
- PhpUnit - para las pruebas unitarias
- mySql - como gestor
Me dará un error porque no puede ejecutar las migraciones.
- Creo un fichero [./docker-compose.yaml](docker-compose.yaml)

* Después de esto compruebo si puedo acceder al sitio de laravel:
  - Primero: levanto el docker ```docker compose up -d```
  - Segundo: levando el servidor ```composer dev```

## 2º Hacer un diseño del sitio web
Para esta actividad se pueden usar herramientas como Figma, Balsamiq o draw.io

## 3º Crear Layout BASE del sitio web
Creamos el directorio `/resources/views/components/layouts`
Ahí crearemos nuestros layouts customizados:
- Plantilla base:
`layout.blade.php`
- Plantillas de componentes de la plantilla:
`footer.blade.php, header.blade.php, nav.blade.php...`
