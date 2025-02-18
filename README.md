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

# 14º CREAR, ELIMINAR Y MODIFICAR

Todos estos procesos tienen una estructura similar; agregar un poco de código a los métodos que se generan automáticamente gracias a Laravel, crear un archivo blade para la acción, añadirle código e interconectarlo con la aplicación mediante rutas.

## CREAR

Creo dentro de `~/views/miembros` un nuevo fichero `create.blade.php`
Dentro le aplicamos el layout y estructuramos el formulario.

En los parámetros del formulario, hacemos que su acción sea redirigir a **miembros.store**:
```
        <form action=" {{route('miembros.store')}}" method="post">
```
Dentro del formulario separo en un div cada campo, siguiendo una estructura como esta de ejemplo:
```
     <div>
        <x-input-label for="nombre" value="old('Nombre')" />
        <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" required autofocus autocomplete="username" />
    </div>
```

*Nota:* Es importante recordar las id y nombres, por lo que es recomendable usar nombres significativos.

Y modifico el método create y el método store en el controlador: 
```
public function create()
    {
        return view('miembros.create'); 
    }
```

```
public function store(StoremiembroRequest $request)
    {
        $datos = $request->input();
        $miembro = new Miembro($datos);
        $miembro->save();
        return redirect()->route('miembros.index');
    }
```

si la fecha da problemas como fue mi caso, mejor prevenimos en dolores de cabeza:
```
    public function store(StoremiembroRequest $request)
{
    $datos = $request->input();

    if (!isset($datos['fecha_entrada'])) {
        $datos['fecha_entrada'] = now()->toDateString(); 
    }

    $miembro = new Miembro($datos);
    $miembro->save();
    session()->flash('mensaje', "$miembro->nombre es ahora miembro del culto" );

    return redirect()->route('miembros.index');
}

```

Modifico en `/app/http/Request/StroemiembroRequest.php` el método authorize de false a true.

y añado al modelo `Miembro.php` 
```
public $fillable = ['nombre','cod','fecha_entrada','rango'];
```
para permitir inserciones en masa.


En `storemiembroRequest.php` añado normas para los datos de los miembros:
```
 public function rules()
    {
        return [
            'nombre' => 'required|string|max:255',
            'cod' => 'required|string|max:255|unique:miembros,cod',
            'fecha_entrada' => 'nullable|date',
            'rango' => 'required|integer|between:1,5',
        ];
    }
```

Adicionalmente puedo crear un método messages como este:
```
 public function messages(): array {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.string' => 'El nombre debe ser una cadena',
            'name.max' => 'El nombre no puede exceder los 255 caracteres',
            'cod.required' => 'El código es obligatorio',
            'cod.number' => 'El código debe ser un número',
            'fecha_entrada.required' => 'La fecha de entrada es obligatoria',
            'rango.required' => 'El rango es obligatorio',
            'rango.number' => 'El rango debe ser un número',
            'rango.max' => 'El rango no puede exceder los 5 valores'
        ];
    }
```
que lo genera automáticamente visual studio con la extensión de laravel y ayuda a saber que problema estás teniendo a la hora de insertar un nuevo usuario.
En este caso habrá que añadir debajo de cada campo en el formulario:
```
@error('nombre')
    <div class="text-sm text-red-600">
        {{$message}}
    </div>
@enderror
```

## ELIMINAR

Para eliminar se llama al método destroy del controlador (Desde ek formulario, tal que así):
```
action="{{ route('miembros.destroy', $fila->id) }}" 
```

Y añadimos código al método del controlador:
```
public function destroy(miembro $miembro)
    {
        $miembro->delete();
        session()->flash("mensaje", "El miembro $miembro->nombre ha sido eliminado");
        return redirect()->route('miembros.index');
    }
```

## EDITAR

Añado al index este fragmento de código por cada tupla para tener un botón de editar asociado a cada miembro
```
<td>
    <a href="{{route("miembros.edit", $fila->id)}}">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hover:text-blue-600 size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
    </svg>
    </a>
</td>
```

y en el controlador `MiembroController.php` devuelvo la view de `edit.blade.php`

Dicha vista deberá ser un formulario para modificar los parámetros de un miembro existente.

Aprovecho que estoy en el controlador para modificar el método update:
```
    public function update(UpdatemiembroRequest $request, miembro $miembro)
    {
        $miembro->update($request->input());
        session()->flash("mensaje","El miembro $miembro->nombre ha sido modificado");
        return redirect()->route('miembros.index');
    }
```

**EDIT.BLADE.PHP**

Usaremos un formulario con este "esqueleto" al que posteriormente implementaremos cada campo.
```
<form action="{{route("miembros.update", $miembro->id)}}" method="POST">
            @method('PUT')
            @csrf
       </form>
```
1- El formulario pasará el ID del miembro como parámetro de ruta, generando una URL con la acción de actualización
2- `@method('PUT')` Sirve para actualizar un recurso de la base de datos
3- `@csrf` ya lo mencioné antes, es para que solo los usuarios autenticados puedan acceder.


Cada campo seguirá esta estructura:
```
<div>
   <x-input-label for="nombre" value="Nombre"/>
   <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
   value="{{ $miembro->nombre}}"/>
   @error("nombre")
   <div class="text-sm text-red-600">
       {{$message}}
   </div>
   @enderror
</div>
```

Casi un paralelismo del `create.blade.php`, lo interesante es: `value="{{ $miembro->nombre}}`
De este modo el valor por defecto del campo serán los valores anteriores de los atributos del miembro seleccionado.


> [!WARNING]
> IMPORTANTE IR A `/app/Http/Request/Updatemiembro.php` y hacr que el método `authorize()` sea true
> O perderás tiempo y pelo.

# 15º MOSTRAR MENSAJES

Para esto necesitaremos **sweetalerts**

Para instalarlo ejecutamos:
```
npm install sweetalert --save
```

y lo importamos en el fichero `/resources/js/app.js`
```
import swal from 'sweetalert';
```

y actualizamos el vite de nuestro layout:
```
    @vite(["resources/css/app.css", "resources/js/app.js"])
```

Añadir donde queramos los mensajes:
```
   @if (session("mensaje"))

    <div>
        <div class="alert alert-success">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 shrink-0 stroke-current"
                fill="none"
                viewBox="0 0 24 24">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{session("mensaje")}}</span>
        </div>
    </div>
    </div>
```
en mi caso index.blade.php dentro de **miembros**

y `    session()->flash('mensaje', "$miembro->nombre es ahora miembro del culto" );` dentro del método store 



# 16º LENGUAJES DENTRO DEL SITIO

Lo primero, instalar lo necesario:
```
sudo apt install php-bcmath
```
_*Este dió problemas en clase, y mejor prevenir que curar._

```
composer require laravel-lang/lang
```

De ahí hacemos:
```
php artisan lang:publish
```
esto creará la carpeta lang

y
```
php artisan lang:add es
```
para añadir los idiomas que queramos.


---
Una vez hecho todo esto, vamos a configurar lo necesario, lo primero necesitaremos un fichero de configuración `/config/languages.php`
Dentro meteteremos un array asociativo para los lenguajes, utilizaré este de ejemplo para los principales idiomas que me interesan:
```
return [
   "es"=>[
       "name"=>"Español",
       "flag"=>"🇪🇸"
   ],
   "fr"=>[
       "name"=>"Françe",
       "flag"=>"🇫🇷"
   ],
   "en"=>[
       "name"=>"English",
       "flag"=>"🇬🇧"
   ]
]
```

Creo el layout que usaré para idiomas en `/resources/views/components/layouts`

Esta será su estructura:
```
<x-dropdown>
    <x-slot name="trigger">
        <div class=" text-white text-2xl bg-gray-900 p-4">
            <span class="flex flex-row space-x-2">
                {{config("languages")[App::getLocale()]['name']}}
                {{config("languages")[App::getLocale()]['flag']}}
            </span>
        </div>
    </x-slot>
    <x-slot name="content">
        @foreach(config("languages") as $code =>$lang)
            <span class="flex flex-row space-x-2 hover:cursor-pointer ">
              <a href="{{route('language',$code)}}" class ="hover:bg-gray-300 ">
                  {{$lang['name']}}
                  {{$lang['flag']}}
                </a>
            </span>

        @endforeach

    </x-slot>


</x-dropdown>
```
1- `x-dropdown` es un componente laravel para crear desplegables
2- `Slot trigger` es el contenido que se muestra inicialmente antes de hacer click en el desplegable
* `{{ config("languages")[App::getLocale()]['name'] }}` pilla del fichero config que creamos el nombre
3- `Slot content` será lo que hay dentro del desplegable
* con el for each recorre todos los idiomas para que se muestren uno por uno

