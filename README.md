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

Para las páginas de mi sitio que estén más orientadas a su temática principal; añadir, eliminar, modificar o leer miembros del club,
crearé una carpeta llamada *'miembros'*. 


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

Otra forma en una sola línea sería:
``
Route::view('/about', 'about')->name('about');
``
Entendiendo que aquí, /about es la sección de la URL, about el sitio, y name, como queramos llamarlo desde la función **{{route(NOMBRE_DE_LA_RUTA)}}**

* ### LLAMAR A LAS RUTAS:

Para llamar a las rutas desde el html, lo que hay que haces es poner: `{{route('nombre_de_la_ruta')}}`

__Ejemplo:__
```
href="{{route('news')}}
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

*EXTRA:* **@csrf** sirve dentro de los formularios para verificar que el usuario está autenticado.

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


# 8º Implementar Login y Register a nuestro Layout

Primero vamos a hacer que al registrarse o iniciar sesion, los usuarios accedan a mi sitio web.

En `/app/Http/Controllers/Auth/AuthenticatedSessionController.php`
Modificamos esta línea *return redirect()->intended(route('RUTA_A_LA_QUE_NOS_ENVIA', absolute: false));* método __store__
y añadimos nuestro sitio. En mi caso *'home'*


En `/app/Http/Controllers/Auth/RegisteredUserController.php`
Modificamos esta línea *return redirect()->intended(route('RUTA_A_LA_QUE_NOS_ENVIA', absolute: false));* método __store__
y añadimos nuestro sitio. En mi caso *'home'*

### Darle nuestro formato:
Vamos a
`/resources/vies/auth/login.blade.php`

y metemos todo lo que hay en nuestra estructura de layout:
```
<x-layouts.layout title="LOGIN">
    <div class="flex flex-row justify-center items-center min-h-full bg-gray-300">
        <div class="bg-white rounded-2xl p-5">
```
*Nota:* Los divs son únicamente estéticos.


Y repetimos **EXACTAMENTE** lo mismo pero con la ruta:
`/resources/vies/auth/register.blade.php`

# 9º Estilos customizados
Si queremos añadir nuestros estilos propios, como clases por ejemplo,
podemos ir al fichero `/resources/css/app.css`

y añadir de esta forma los estilos propios, debajo de los componentes de tailwind, de esta forma:
```
@tailwind base;
@tailwind components;
@tailwind utilities;
.header {
    @apply h-15v bg-header
    flex flex-row justify-between px-3 items-center
}
```
Vayamos por partes:
* @apply

Puedes crear dentro de `themes` en `tailwind.config.js` especificaciones para usar en tus estilos.
Aquí un ejemplo:
`
theme: {
extend: {
fontFamily: {
sans: ['Figtree', ...defaultTheme.fontFamily.sans],
},

            height:{
                "10v":"10vh",
                "15v":"15vh",
                "65v":"65vh"
            },

            colors: {

                "header":"#003459",
                "nav":"#00A7E1",
                "main":"#FFFFFF",
                "footer":"#00171F"
            },
        },
    },
`


* Elementos de Tailwind

Puedes usar las clases preestablecidas es Tailwind: `flex flex-row justify-between px-3 items-center`

* CSS a lo bruto

Puedes añadir CSS como si la tecnología fuese una mera sugerencia para ti.

# 10º Crear modelos del CRUD
Para empezar usamos en la terminal el comando: 
```
php artisan make:model miembro -a
```
y se genera el modelo automáticamente.

Y añado en 'web.php' la nueva ruta con el controlador que acabo de generar.
```Route::resources('miembros', MiembroController::class);```

> [!WARNING]
> NO OLVIDARSE DE IMPORTAR EL CONTROLADOR DENTRO DE `web.php` o perderás tiempo.


- Si todo esto fue bien, ya debería de ser posible acceder a: `http://127.0.0.1:8000/miembros`

# 11º Crear TABLA

Al crear el controlador se habrá generado en `/database/migrations/` un fichero
terminado en el nombre del controlador que creamos, en este caso *"miembros"*

Dentro de las migrations de esta tabla introducimos los datos que queramos en esta:
```
 public function up(): void
    {
        Schema::create('miembros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('cod')->unique();
            $table->date('fecha_entrada');
            $table->integer('rango');
            $table->timestamps();
        });
    }
```

* ## Dar atributos al MODELO 
- En mi caso "miembro"
Dentro de `/app/Models/[nombre.php]`

En este caso queda así:
```
class miembro extends Model{
    /** @use HasFactory<\Database\Factories\MiembroFactory> */
    use HasFactory;
    protected $table = 'miembros';
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    protected $timestamp = false;
}
```

# 12º Factories y Seeders

Por defecto en `/database/factories` y en `/database/seeders` se generan los correspondientes
ficheros, **GRACIAS A LOS PASOS PREVIOS**


- En el seeder determinaremos cuantas instancias van a generarse dentro de la tabla:
```
public function run(): void
    {
        Miembro::factory()->count(20)->create();
    }
```

yo voy a generar 20 de momento.

y en el **DatabaseSeeder.php** añadimos el nuevo seeder:
```
public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        // ESTO DE AQUÍ ABAJO
        $this->call([
            MiembroSeeder::class,
        ]);
    }
```

- En la factory de "miembro" (en `/database/factories/MiembroFactory.php`) voy a establecer los datos que quiero que genere:
```
 public function definition(): array
    {
        return [
            "nombre"=>$this->faker->name(),
            "cod"=>$this->faker->unique()->numberBetween(0,666),
            "fecha_entrada"=>$this->faker->date(),
            "rango"=>$this->faker->numberBetween(1,5)
        ];
    }
```


Y utilizamos `php artisan db:seed` o `php artisan migrate:refresh --seed`
para generarlas.

* Si queremos que cada vez que ejecutemos el comando se añadan "x" usuarios más, en lugar de reemplazar los que ya hay, quitamos este trozo de código de la *DatabaseSeeder.php*

```
User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
```


# 13º PUNTOS DE RUPTURA TAILWIND

Sirven para que dependiendo del tamaño se aplique un estilo u otro. 

```
sm -> min
md -> 768 px
lg  -> 1024px
xl -> 1280px
2xl -> 1536px
```

_Ejemplo_:
```
class="md:hidden m:h-15v m:flex-row"
```

Modificamos el método index del controlador de nuestro modelo:
```	
public function index()
   {
       $campos = Schema::getColumnListing('miembros');
       $exclude=['created_at','updated_at'];
       $campos = array_diff($campos, $exclude);
       $filas = Miembro::select($campos)->get();
       return view('miembros.index', compact('filas','campos'));
   }
```

# 14º 


