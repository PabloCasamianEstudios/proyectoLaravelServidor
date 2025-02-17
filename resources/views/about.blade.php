<x-layouts.layout title="ABOUT">

    <div class="bg-yellow-300 min-h-screen flex justify-center items-center p-10">
        <div class="bg-white shadow-lg rounded-2xl p-8 max-w-3xl w-full">
            <h1 class="text-3xl font-bold text-center text-indigo-700 mb-6">Bienvenido al Club Secreto Secretoso</h1>

            <div class="text-lg text-gray-700">
                <p class="mb-4">
                    <span class="font-semibold text-indigo-600">El Club Secreto Secretoso</span> es el club más secreto y secretoso de todos. Si encontraste este lugar, felicidades, eres parte de un selecto grupo de individuos elegidos. Pero antes de que sigas, recuerda:
                </p>

                <ul class="list-disc pl-6 mb-4">
                    <li><span class="font-semibold text-indigo-600">No hablarás de este club con nadie.</span> Lo que sucede aquí, queda aquí.</li>
                    <li><span class="font-semibold text-indigo-600">Nadie es más secreto que el Club Secreto Secretoso.</span> Lo que nos define es nuestra capacidad de mantener el misterio.</li>
                    <li><span class="font-semibold text-indigo-600">Solo los más intrépidos se han unido a nosotros.</span> Este es un lugar donde la curiosidad no tiene límites, pero la discreción es primordial.</li>
                </ul>

                <p class="mb-4">
                    Nuestro club ha existido desde tiempos remotos, sus orígenes son tan antiguos que nadie recuerda cómo empezó. Los detalles siguen siendo un misterio, pero lo que sabemos es que es <strong>más secreto que un secreto en una caja fuerte subterránea, guardado por un dragón invisible.</strong>
                </p>

                <p class="mb-4">
                    Si estás aquí, es porque eres digno de ser parte de esta organización tan exclusiva. Los miembros del Club Secreto Secretoso no son solo cualquier persona. Somos un grupo selecto de personas comprometidas con la discreción, la aventura y, por supuesto, el misterio.
                </p>

                <p class="mb-4">
                    Si estás listo para unirte, recuerda, el primer paso es <strong>no contarle a nadie</strong> que has encontrado nuestro club. El segundo paso... bueno, eso te lo revelaremos en su momento.
                </p>

                <p class="mb-4">
                    ¡Bienvenido a lo más secreto, misterioso y secreto del mundo! Que el misterio te acompañe.
                </p>

                <div class="text-center mt-6">
                    <a href="{{ route('miembros.create') }}" class="text-indigo-600 font-semibold text-lg hover:underline">Unirte al Club Secreto Secretoso</a>
                </div>
            </div>
        </div>
    </div>

</x-layouts.layout>
