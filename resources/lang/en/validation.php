<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'El campo de :attribute debe ser aceptado.',
    'accepted_if' => 'El campo de :attribute debe ser aceptado cuando el campo de :other tenga el valor de :value.',
    'active_url' => 'El valor de :attribute no es una URL válida.',
    'after' => 'El valor de :attribute debe ser una fecha posterior al :date.',
    'after_or_equal' => 'El valor de :attribute debe ser una fecha posterior o igual al :date.',
    'alpha' => 'El valor de :attribute sólo puede contener letras.',
    'alpha_dash' => 'El valor de :attribute sólo puede contener letras, números, guiones y guiones bajos.',
    'alpha_num' => 'El valor de :attribute sólo puede contener letras y números.',
    'array' => 'El valor de :attribute debe ser un array.',
    'before' => 'El valor de :attribute debe ser una fecha anterior al :date.',
    'before_or_equal' => 'El valor de :attribute debe ser una fecha anterior o igual al :date.',
    'between' => [
        'numeric' => 'El valor de :attribute debe estar entre :min y :max.',
        'file' => ':attribute debe pesar entre :min y :max kilobytes.',
        'string' => 'El valor de :attribute debe tener entre :min y :max caracteres.',
        'array' => ':attribute debe contener entre :min y :max elementos.',
    ],
    'boolean' => 'El campo de :attribute debe ser verdadero o falso.',
    'confirmed' => 'La confirmación de :attribute no coincide.',
    'current_password' => 'La contraseña es incorrecta.',
    'date' => 'El valor de :attribute no es una fecha válida.',
    'date_equals' => 'El valor de :attribute debe ser una fecha igual al :date.',
    'date_format' => 'El valor de :attribute no coincide con el formato :format.',
    'declined' => 'El campo de :attribute debe ser rechazado.',
    'declined_if' => 'El campo de :attribute debe ser rechazado cuando el campo de :other tenga el valor de :value.',
    'different' => 'Los valores de :attribute y :other deben ser diferentes.',
    'digits' => 'El valor de :attribute debe tener :digits dígitos.',
    'digits_between' => 'El valor de :attribute debe tener entre :min y :max dígitos.',
    'dimensions' => ':La imagen de attribute tiene dimensiones inválidas.',
    'distinct' => 'El campo de :attribute tiene un valor duplicado.',
    'email' => 'El valor de :attribute debe ser un correo electrónico válido.',
    'ends_with' => 'El valor de :attribute debe terminar con lo siguiente: :values.',
    'enum' => 'El valor de :attribute seleccionado no es válido.',
    'exists' => 'El valor de :attribute seleccionado no es válido.',
    'file' => 'El campo de :attribute debe contener un archivo.',
    'filled' => 'El campo de :attribute debe contener un valor.',
    'gt' => [
        'numeric' => 'El valor de :attribute debe ser mayor que :value.',
        'file' => 'El tamaño de :attribute debe ser mayor que :value kilobytes.',
        'string' => 'El valor de :attribute debe tener más de :value caracteres.',
        'array' => ':attribute debe tener más de :value elementos.',
    ],
    'gte' => [
        'numeric' => 'El valor de :attribute debe ser mayor o igual que :value.',
        'file' => 'El tamaño de :attribute debe ser mayor o igual que :value kilobytes.',
        'string' => 'El valor de :attribute debe tener :value caracteres o más.',
        'array' => ':attribute debe tener :value elementos o más.',
    ],
    'image' => ':attribute debe ser una imagen.',
    'in' => 'El valor de :attribute seleccionado no es válido.',
    'in_array' => 'El campo de :attribute no existe en :other.',
    'integer' => 'El valor de :attribute debe ser un número entero.',
    'ip' => 'El valor de :attribute debe ser una dirección IP válida.',
    'ipv4' => 'El valor de :attribute debe ser una dirección IPv4 válida.',
    'ipv6' => 'El valor de :attribute debe ser una dirección IPv6 válida.',
    'json' => 'El valor de :attribute debe ser una cadena JSON válida.',
    'lt' => [
        'numeric' => 'El valor de :attribute debe ser menor que :value.',
        'file' => ':attribute debe pesar menos de :value kilobytes.',
        'string' => 'El valor de :attribute debe tener menos de :value caracteres.',
        'array' => ':attribute debe tener menos de :value elementos.',
    ],
    'lte' => [
        'numeric' => 'El valor de :attribute debe ser menor o igual que :value.',
        'file' => ':attribute debe pesar :value kilobytes o menos.',
        'string' => 'El valor de :attribute debe tener :value caracteres o menos.',
        'array' => ':attribute no puede tener más de :value elementos.',
    ],
    'mac_address' => 'El valor de :attribute debe ser una dirección MAC válida.',
    'max' => [
        'numeric' => 'El valor de :attribute no puede ser mayor que :max.',
        'file' => ':attribute no puede pesar más de :max kilobytes.',
        'string' => 'El valor de :attribute no puede tener más de :max caracteres.',
        'array' => ':attribute no puede tener más de :max elementos.',
    ],
    'mimes' => ':attribute debe ser un archivo de tipo: :values.',
    'mimetypes' => ':attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'numeric' => 'El valor de :attribute debe ser al menos :min.',
        'file' => ':attribute debe pesar :min kilobytes como mínimo.',
        'string' => 'El valor de :attribute debe tener al menos :min caracteres.',
        'array' => ':attribute debe tener como mínimo :min elementos.',
    ],
    'multiple_of' => 'El valor de :attribute debe ser un múltiplo de :value.',
    'not_in' => 'El valor de :attribute seleccionado no es válido.',
    'not_regex' => 'El formato de :attribute no es válido.',
    'numeric' => ':attribute debe ser un número.',
    'password' => 'La contraseña es incorrecta.',
    'present' => 'El campo de :attribute debe estar presente.',
    'prohibited' => 'Está prohibido rellenar el campo de :attribute.',
    'prohibited_if' => 'Está prohibido rellenar el campo de :attribute cuando el campo de :other tiene el valor de :value.',
    'prohibited_unless' => 'Está prohibido rellenar el campo de :attribute a no ser que el valor de :other sea :values.',
    'prohibits' => 'El campo de :attribute prohíbe que :other esté presente.',
    'regex' => 'El formato de :attribute no es válido.',
    'required' => 'El campo de :attribute es obligatorio.',
    'required_array_keys' => 'El campo de :attribute debe contener entradas para: :values.',
    'required_if' => 'El campo de :attribute es obligatorio cuando :other tiene el valor de :value.',
    'required_unless' => 'El campo de :attribute es obligatorio a no ser que :other tenga el valor de :values.',
    'required_with' => 'El campo de :attribute es obligatorio cuando el valor de :values está presente.',
    'required_with_all' => 'El campo de :attribute es obligatorio cuando los valores de :values están presentes.',
    'required_without' => 'El campo de :attribute es obligatorio cuando el valor de :values no está presente.',
    'required_without_all' => 'El campo de :attribute es obligatorio cuando ninguno de los valores de :values están presentes.',
    'same' => 'El valor de :attribute y :other deben coincidir.',
    'size' => [
        'numeric' => 'El valor de :attribute debe ser :size.',
        'file' => ':attribute debe pesar :size kilobytes.',
        'string' => 'El valor de :attribute debe tener :size caracteres.',
        'array' => ':attribute debe contener :size elementos.',
    ],
    'starts_with' => 'El valor de :attribute debe empezar al menos con: :values.',
    'string' => 'El valor de :attribute debe ser una cadena.',
    'timezone' => 'El valor de :attribute debe ser una zona horaria válida.',
    'unique' => 'El valor de :attribute ya está en uso.',
    'uploaded' => 'No se ha podido actualizar el valor de :attribute.',
    'url' => 'El valor de :attribute debe ser una URL válida.',
    'uuid' => 'El valor de :attribute debe ser una UUID válida.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
