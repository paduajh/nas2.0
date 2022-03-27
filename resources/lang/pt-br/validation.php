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

    'accepted'             => 'O campo :attribute deve ser aceito.',
    'active_url'           => 'O campo :attribute n�o � uma URL v�lida.',
    'after'                => 'O campo :attribute deve ser uma data posterior a :date.',
    'after_or_equal'       => 'O campo :attribute deve ser uma data posterior ou igual a :date.',
    'alpha'                => 'O campo :attribute s� pode conter letras.',
    'alpha_dash'           => 'O campo :attribute s� pode conter letras, n�meros e tra�os.',
    'alpha_num'            => 'O campo :attribute s� pode conter letras e n�meros.',
    'array'                => 'O campo :attribute deve ser uma matriz.',
    'before'               => 'O campo :attribute deve ser uma data anterior :date.',
    'before_or_equal'      => 'O campo :attribute deve ser uma data anterior ou igual a :date.',
    'between'              => [
        'numeric' => 'O campo :attribute deve ser entre :min e :max.',
        'file'    => 'O campo :attribute deve ser entre :min e :max kilobytes.',
        'string'  => 'O campo :attribute deve ser entre :min e :max caracteres.',
        'array'   => 'O campo :attribute deve ter entre :min e :max itens.',
    ],
    'boolean'              => 'O campo :attribute deve ser verdadeiro ou falso.',
    'confirmed'            => 'O campo :attribute de confirma��o n�o confere.',
    'date'                 => 'O campo :attribute n�o � uma data v�lida.',
    'date_equals'          => 'O campo :attribute deve ser uma data igual a :date.',
    'date_format'          => 'O campo :attribute n�o corresponde ao formato :format.',
    'different'            => 'Os campos :attribute e :other devem ser diferentes.',
    'digits'               => 'O campo :attribute deve ter :digits d�gitos.',
    'digits_between'       => 'O campo :attribute deve ter entre :min e :max d�gitos.',
    'dimensions'           => 'O campo :attribute tem dimens�es de imagem inv�lidas.',
    'distinct'             => 'O campo :attribute campo tem um valor duplicado.',
    'email'                => 'O campo :attribute deve ser um endere�o de e-mail v�lido.',
    'ends_with'            => 'O campo :attribute deve terminar com um dos seguintes: :values',
    'exists'               => 'O campo :attribute selecionado � inv�lido.',
    'file'                 => 'O campo :attribute deve ser um arquivo.',
    'filled'               => 'O campo :attribute deve ter um valor.',
    'gt' => [
        'numeric' => 'O campo :attribute deve ser maior que :value.',
        'file'    => 'O campo :attribute deve ser maior que :value kilobytes.',
        'string'  => 'O campo :attribute deve ser maior que :value caracteres.',
        'array'   => 'O campo :attribute deve conter mais de :value itens.',
    ],
    'gte' => [
        'numeric' => 'O campo :attribute deve ser maior ou igual a :value.',
        'file'    => 'O campo :attribute deve ser maior ou igual a :value kilobytes.',
        'string'  => 'O campo :attribute deve ser maior ou igual a :value caracteres.',
        'array'   => 'O campo :attribute deve conter :value itens ou mais.',
    ],
    'image'                => 'O campo :attribute deve ser uma imagem.',
    'in'                   => 'O campo :attribute selecionado � inv�lido.',
    'in_array'             => 'O campo :attribute n�o existe em :other.',
    'integer'              => 'O campo :attribute deve ser um n�mero inteiro.',
    'ip'                   => 'O campo :attribute deve ser um endere�o de IP v�lido.',
    'ipv4'                 => 'O campo :attribute deve ser um endere�o IPv4 v�lido.',
    'ipv6'                 => 'O campo :attribute deve ser um endere�o IPv6 v�lido.',
    'json'                 => 'O campo :attribute deve ser uma string JSON v�lida.',
    'lt' => [
        'numeric' => 'O campo :attribute deve ser menor que :value.',
        'file'    => 'O campo :attribute deve ser menor que :value kilobytes.',
        'string'  => 'O campo :attribute deve ser menor que :value caracteres.',
        'array'   => 'O campo :attribute deve conter menos de :value itens.',
    ],
    'lte' => [
        'numeric' => 'O campo :attribute deve ser menor ou igual a :value.',
        'file'    => 'O campo :attribute deve ser menor ou igual a :value kilobytes.',
        'string'  => 'O campo :attribute deve ser menor ou igual a :value caracteres.',
        'array'   => 'O campo :attribute n�o deve conter mais que :value itens.',
    ],
    'max' => [
        'numeric' => 'O campo :attribute n�o pode ser superior a :max.',
        'file'    => 'O campo :attribute n�o pode ser superior a :max kilobytes.',
        'string'  => 'O campo :attribute n�o pode ser superior a :max caracteres.',
        'array'   => 'O campo :attribute n�o pode ter mais do que :max itens.',
    ],
    'mimes'                => 'O campo :attribute deve ser um arquivo do tipo: :values.',
    'mimetypes'            => 'O campo :attribute deve ser um arquivo do tipo: :values.',
    'min' => [
        'numeric' => 'O campo :attribute deve ser pelo menos :min.',
        'file'    => 'O campo :attribute deve ter pelo menos :min kilobytes.',
        'string'  => 'O campo :attribute deve ter pelo menos :min caracteres.',
        'array'   => 'O campo :attribute deve ter pelo menos :min itens.',
    ],
    'not_in'               => 'O campo :attribute selecionado � inv�lido.',
    'multiple_of'          => 'O campo :attribute deve ser um m�ltiplo de :value.',
    'not_regex'            => 'O campo :attribute possui um formato inv�lido.',
    'numeric'              => 'O campo :attribute deve ser um n�mero.',
    'password'             => 'A senha est� incorreta.',
    'present'              => 'O campo :attribute deve estar presente.',
    'regex'                => 'O campo :attribute tem um formato inv�lido.',
    'required'             => 'O campo :attribute � obrigat�rio.',
    'required_if'          => 'O campo :attribute � obrigat�rio quando :other for :value.',
    'required_unless'      => 'O campo :attribute � obrigat�rio exceto quando :other for :values.',
    'required_with'        => 'O campo :attribute � obrigat�rio quando :values est� presente.',
    'required_with_all'    => 'O campo :attribute � obrigat�rio quando :values est� presente.',
    'required_without'     => 'O campo :attribute � obrigat�rio quando :values n�o est� presente.',
    'required_without_all' => 'O campo :attribute � obrigat�rio quando nenhum dos :values est�o presentes.',
    'prohibited'           => 'O campo :attribute � proibido.',
    'prohibited_if'        => 'O campo :attribute � proibido quando :other for :value.',
    'prohibited_unless'    => 'O campo :attribute � proibido exceto quando :other for :values.',
    'same'                 => 'Os campos :attribute e :other devem corresponder.',
    'size'                 => [
        'numeric' => 'O campo :attribute deve ser :size.',
        'file'    => 'O campo :attribute deve ser :size kilobytes.',
        'string'  => 'O campo :attribute deve ser :size caracteres.',
        'array'   => 'O campo :attribute deve conter :size itens.',
    ],
    'starts_with'          => 'O campo :attribute deve come�ar com um dos seguintes valores: :values',
    'string'               => 'O campo :attribute deve ser uma string.',
    'timezone'             => 'O campo :attribute deve ser uma zona v�lida.',
    'unique'               => 'O campo :attribute j� est� sendo utilizado.',
    'uploaded'             => 'Ocorreu uma falha no upload do campo :attribute.',
    'url'                  => 'O campo :attribute tem um formato inv�lido.',
    'uuid' => 'O campo :attribute deve ser um UUID v�lido.',

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

    'attributes' => [
        'address'   => 'endere�o',
        'age'       => 'idade',
        'body'      => 'conte�do',
        'cell'      => 'celular',
        'city'      => 'cidade',
        'country'   => 'pa�s',
        'date'      => 'data',
        'day'       => 'dia',
        'excerpt'   => 'resumo',
        'first_name'=> 'primeiro nome',
        'gender'    => 'g�nero',
        'hour'      => 'hora',
        'last_name' => 'sobrenome',
        'message'   => 'mensagem',
        'minute'    => 'minuto',
        'mobile'    => 'celular',
        'month'     => 'm�s',
        'name'      => 'nome',
        'neighborhood' => 'bairro',
        'number'    => 'n�mero',
        'password'  => 'senha',
        'phone'     => 'telefone',
        'second'    => 'segundo',
        'sex'       => 'sexo',
        'state'     => 'estado',
        'street'    => 'rua',
        'subject'   => 'assunto',
        'text'      => 'texto',
        'time'      => 'hora',
        'title'     => 't�tulo',
        'username'  => 'usu�rio',
        'year'      => 'ano',
        'description' => 'descri��o',
        'password_confirmation' => 'confirma��o da senha',
        'current_password' => 'senha atual',
    ],

];
