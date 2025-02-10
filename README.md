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

### INTRODUCIR DENTRO del LAYOUT los otros LAYOUTS [header, nav, footer...]
Para ello, dentro del body los llamamos así: 
`<x-layouts.{nombre_del_layout} />`

## 4º Crear páginas
Creamos dentro de `/resources/views` las páginas de nuestro sitio.

> [!IMPORTANT]  
> RODEAMOS el código que vayamos a meter en el sitio con: 
> ```<x-layouts.layout> . . . </x-layouts.layout>```

De este modo tomará el formato del layout.

> [!NOTE]  
>  Para que se muestre TODO el contenido dentro de dichas páginas, 
> hay que utilizar `{{$slot}}` dentro del layout, para que se inyecte dinámicamente el contenido.

Posteriormente, es DE VITAL IMPORTANCIA, añadir la ruta del nuevo sitio al fichero *`web.php`*
disponible en la ruta: `routes/web.php`

Ahí añadiremos las nuevas rutas:
**Ejemplo:**
```
Route::get('/', function () {
return view('index');
});
```

## 5º Añadir imágenes

Para añadir imágenes:
- Primero creamos una carpeta `images` dentro del directorio public.
- Después añadimos ahí las imágenes
- Finalmente las llamamos desde nuestro: Creando una etiqueta html de tipo img. Y añadíendo en el atributo src='' --> `{{"images/[nombredelaimagen.png|.jpg]"}}`

## 6º @auth y @guess
Ambas etiquetas tienen una función y utilidad parecida.
**@auth** se utiliza para enmarcar un segmento del código que solo estará disponible para usuarios AUTENTICADOS.
Se marca el final con **@endauth**

**@guest** se utiliza para remarcar un segmento del código SOLO VISIBLE para usuarios __NO__ AUTENTICADOS.
Su final se detalla con **@endguest**

## 7º Cargar los estilos

Instalamos DaisyUI utilizando: `npm i -D daisyui@latest`

Añadimos al head de `/resources/views/components/layouts/layout.blade.php`:
```
@vite(["resources/css/app.css"])
```
y para concluir, modificamos `tailwind.config.js`
La sección plugins debería quedar así:
```
plugins: [
require('@tailwindcss/forms'),
require("daisyui")
],
```

> [!TIP]
> Utilizar los presets de daisyui.com


# 8 
