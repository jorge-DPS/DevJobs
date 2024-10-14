@php
    $classes = 'text-xs text-gray-600 hover:text-gray-900';
    // aqui lo qui -> $attributes->merge(['class' => $classes]; combina los atributos con las classes lo aplana como texto; los attributes son las varibles que se psan al componente/ en este caso href=
    // po que podrai ser de esta forma: $attributes->merge(['class' => $classes, 'href' => enlace]) }}; donde enlace seria la variable que se pasa al componente (x-link :enlace)
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
