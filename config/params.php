<?php

return [
    'bsVersion' => '5.x', // this will set globally `bsVersion` to Bootstrap 5.x for all Krajee Extensions
    'adminEmail'  => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName'  => 'Example.com mailer',
    'countries' => [
        'MEX' => 'MÉXICO',
        'USA' => 'ESTADOS UNIDOS DE AMÉRICA',
        'CAN' => 'CANADÁ'
    ],
    'states' => [
        "MEX" => [
            "AGUASCALIENTES"      => "AGUASCALIENTES",
            "BAJA CALIFORNIA"     => "BAJA CALIFORNIA",
            "BAJA CALIFORNIA SUR" => "BAJA CALIFORNIA SUR",
            "CAMPECHE"            => "CAMPECHE",
            "CHIAPAS"             => "CHIAPAS",
            "CHIHUAHUA"           => "CHIHUAHUA",
            "COAHUILA"            => "COAHUILA",
            "COLIMA"              => "COLIMA",
            "CIUDAD DE MÉXICO"    => "CIUDAD DE MÉXICO",
            "DURANGO"             => "DURANGO",
            "GUANAJUATO"          => "GUANAJUATO",
            "GUERRERO"            => "GUERRERO",
            "HIDALGO"             => "HIDALGO",
            "JALISCO"             => "JALISCO",
            "ESTADO DE MÉXICO"    => "ESTADO DE MÉXICO",
            "MICHOACÁN"           => "MICHOACÁN",
            "MORELOS"             => "MORELOS",
            "NAYARIT"             => "NAYARIT",
            "NUEVO LEÓN"          => "NUEVO LEÓN",
            "OAXACA"              => "OAXACA",
            "PUEBLA"              => "PUEBLA",
            "QUERÉTARO "          => "QUERÉTARO ",
            "QUINTANA ROO"        => "QUINTANA ROO",
            "SAN LUIS POTOSÍ"     => "SAN LUIS POTOSÍ",
            "SINALOA"             => "SINALOA",
            "SONORA"              => "SONORA",
            "TABASCO"             => "TABASCO",
            "TAMAULIPAS"          => "TAMAULIPAS",
            "TLAXCALA"            => "TLAXCALA",
            "VERACRUZ"            => "VERACRUZ",
            "YUCATÁN"             => "YUCATÁN",
            "ZACATECAS"           => "ZACATECAS"
        ],
        "USA" => [
            "ALABAMA"             => "ALABAMA",
            "ALASKA"              => "ALASKA",
            "ARIZONA"             => "ARIZONA",
            "ARKANSAS"            => "ARKANSAS",
            "CALIFORNIA"          => "CALIFORNIA",
            "CAROLINA DEL NORTE"  => "CAROLINA DEL NORTE",
            "CAROLINA DEL SUR"    => "CAROLINA DEL SUR",
            "COLORADO"            => "COLORADO",
            "CONNECTICUT"         => "CONNECTICUT",
            "DAKOTA DEL NORTE"    => "DAKOTA DEL NORTE",
            "DAKOTA DEL SUR"      => "DAKOTA DEL SUR",
            "DELAWARE"            => "DELAWARE",
            "FLORIDA"             => "FLORIDA",
            "GEORGIA"             => "GEORGIA",
            "HAWÁI"               => "HAWÁI",
            "IDAHO"               => "IDAHO",
            "ILLINOIS"            => "ILLINOIS",
            "INDIANA"             => "INDIANA",
            "IOWA"                => "IOWA",
            "KANSAS"              => "KANSAS",
            "KENTUCKY"            => "KENTUCKY",
            "LUISIANA"            => "LUISIANA",
            "MAINE"               => "MAINE",
            "MARYLAND"            => "MARYLAND",
            "MASSACHUSETTS"       => "MASSACHUSETTS",
            "MÍCHIGAN"            => "MÍCHIGAN",
            "MINNESOTA"           => "MINNESOTA",
            "MISISIPI"            => "MISISIPI",
            "MISURI"              => "MISURI",
            "MONTANA"             => "MONTANA",
            "NEBRASKA"            => "NEBRASKA",
            "NEVADA"              => "NEVADA",
            "NUEVA JERSEY"        => "NUEVA JERSEY",
            "NUEVA YORK"          => "NUEVA YORK",
            "NUEVO HAMPSHIRE"     => "NUEVO HAMPSHIRE",
            "NUEVO MÉXICO"        => "NUEVO MÉXICO",
            "OHIO"                => "OHIO",
            "OKLAHOMA"            => "OKLAHOMA",
            "OREGÓN"              => "OREGÓN",
            "PENSILVANIA"         => "PENSILVANIA",
            "RHODE ISLAND"        => "RHODE ISLAND",
            "TENNESSEE"           => "TENNESSEE",
            "TEXAS"               => "TEXAS",
            "UTAH"                => "UTAH",
            "VERMONT"             => "VERMONT",
            "VIRGINIA"            => "VIRGINIA",
            "VIRGINIA OCCIDENTAL" => "VIRGINIA OCCIDENTAL",
            "WASHINGTON"          => "WASHINGTON",
            "WISCONSIN"           => "WISCONSIN",
            "WYOMING"             => "WYOMING",
            "ONTARIO"             => "ONTARIO"
        ],
        "CAN" => [
            "QUEBEC"                    => "QUEBEC",
            "NUEVA ESCOCIA"             => "NUEVA ESCOCIA",
            "NUEVO BRUNSWICK"           => "NUEVO BRUNSWICK",
            "MANITOBA"                  => "MANITOBA",
            "COLUMBIA BRITÁNICA"        => "COLUMBIA BRITÁNICA",
            "ISLA DEL PRÍNCIPE EDUARDO" => "ISLA DEL PRÍNCIPE EDUARDO",
            "SASKATCHEWAN"              => "SASKATCHEWAN",
            "ALBERTA"                   => "ALBERTA",
            "TERRANOVA Y LABRADOR"      => "TERRANOVA Y LABRADOR",
            "TERRITORIOS DEL NOROESTE"  => "TERRITORIOS DEL NOROESTE",
            "YUKÓN"                     => "YUKÓN",
            "NUNAVUT"                   => "NUNAVUT"
        ]
    ],
    'uso_cfdi_moral' => [
        "G01" => "G01 - Adquisición de mercancias",
        "G02" => "G02 - Devoluciones, descuentos o bonificaciones",
        "G03" => "G03 - Gastos en general",
        "I01" => "I01 - Construcciones",
        "I02" => "I02 - Mobilario y equipo de oficina por inversiones",
        "I03" => "I03 - Equipo de transporte",
        "I04" => "I04 - Equipo de computo y accesorios",
        "I05" => "I05 - Dados, troqueles, moldes, matrices y herramental",
        "I06" => "I06 - Comunicaciones telefónicas",
        "I07" => "I07 - Comunicaciones satelitales",
        "I08" => "I08 - Otra maquinaria y equipo",
        "S01" => "S01 - Sin efectos fiscales",
        "CP01" => "CP01 - Pagos"
    ],
    'uso_cfdi_fisica' => [
        "G01"  => "G01 - Adquisición de mercancias",
        "G02"  => "G02 - Devoluciones, descuentos o bonificaciones",
        "G03"  => "G03 - Gastos en general",
        "I01"  => "I01 - Construcciones",
        "I02"  => "I02 - Mobilario y equipo de oficina por inversiones",
        "I03"  => "I03 - Equipo de transporte",
        "I04"  => "I04 - Equipo de computo y accesorios",
        "I05"  => "I05 - Dados, troqueles, moldes, matrices y herramental",
        "I06"  => "I06 - Comunicaciones telefónicas",
        "I07"  => "I07 - Comunicaciones satelitales",
        "I08"  => "I08 - Otra maquinaria y equipo",
        "D01"  => "D01 - Honorarios médicos, dentales y gastos hospitalarios",
        "D02"  => "D02 - Gastos médicos por incapacidad o discapacidad",
        "D03"  => "D03 - Gastos funerales.",
        "D04"  => "D04 - Donativos",
        "D05"  => "D05 - Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación)",
        "D06"  => "D06 - Aportaciones voluntarias al SAR",
        "D07"  => "D07 - Primas por seguros de gastos médicos",
        "D08"  => "D08 - Gastos de transportación escolar obligatoria",
        "D09"  => "D09 - Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones",
        "D10"  => "D10 - Pagos por servicios educativos (colegiaturas)",
        "S01"  => "S01 - Sin efectos fiscales",
        "CP01" => "CP01 - Pagos",
        "CN01" => "CN01 - Nómina"
    ],
    'regimen_fiscal_fisica' => [
        "605" => "605 - Sueldos y Salarios e Ingresos Asimilados a Salarios",
        "606" => "606 - Arrendamiento",
        "607" => "607 - Régimen de Enajenación o Adquisición de Bienes",
        "608" => "608 - Demás ingresos",
        "610" => "610 - Residentes en el Extranjero sin Establecimiento Permanente en México",
        "611" => "611 - Ingresos por Dividendos (socios y accionistas)",
        "612" => "612 - Personas Físicas con Actividades Empresariales y Profesionales",
        "614" => "614 - Ingresos por intereses",
        "615" => "615 - Régimen de los ingresos por obtención de premios",
        "616" => "616 - Sin obligaciones fiscales",
        "621" => "621 - Incorporación Fiscal",
        "625" => "625 - Régimen de las Actividades Empresariales con ingresos a través de Plataformas Tecnológicas",
        "626" => "626 - Régimen Simplificado de Confianza"
    ],
    'regimen_fiscal_moral' => [
        "601" => "601 - General de Ley Personas Morales",
        "603" => "603 - Personas Morales con Fines no Lucrativos",
        "610" => "610 - Residentes en el Extranjero sin Establecimiento Permanente en México",
        "620" => "620 - Sociedades Cooperativas de Producción que optan por diferir sus ingresos",
        "622" => "622 - Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras",
        "623" => "623 - Opcional para Grupos de Sociedades",
        "624" => "624 - Coordinados",
        "626" => "626 - Régimen Simplificado de Confianza"
    ],
    'regimen_fiscal_generico'=> [
        "601" => "601 - General de Ley Personas Morales",
        "603" => "603 - Personas Morales con Fines no Lucrativos",
        "605" => "605 - Sueldos y Salarios e Ingresos Asimilados a Salarios",
        "606" => "606 - Arrendamiento",
        "607" => "607 - Régimen de Enajenación o Adquisición de Bienes",
        "608" => "608 - Demás ingresos",
        "610" => "610 - Residentes en el Extranjero sin Establecimiento Permanente en México",
        "611" => "611 - Ingresos por Dividendos (socios y accionistas)",
        "612" => "612 - Personas Físicas con Actividades Empresariales y Profesionales",
        "614" => "614 - Ingresos por intereses",
        "615" => "615 - Régimen de los ingresos por obtención de premios",
        "616" => "616 - Sin obligaciones fiscales",
        "620" => "620 - Sociedades Cooperativas de Producción que optan por diferir sus ingresos",
        "621" => "621 - Incorporación Fiscal",
        "622" => "622 - Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras",
        "623" => "623 - Opcional para Grupos de Sociedades",
        "624" => "624 - Coordinados",
        "625" => "625 - Régimen de las Actividades Empresariales con ingresos a través de Plataformas Tecnológicas",
        "626" => "626 - Régimen Simplificado de Confianza"
    ],
    'uso_cfdi_generico' => [
        "G01" => "G01 - Adquisición de mercancías.",
        "G02" => "G02 - Devoluciones, descuentos o bonificaciones.",
        "G03" => "G03 - Gastos en general.",
        "I01" => "I01 - Construcciones.",
        "I02" => "I02 - Mobiliario y equipo de oficina por inversiones.",
        "I03" => "I03 - Equipo de transporte.",
        "I04" => "I04 - Equipo de computo y accesorios.",
        "I05" => "I05 - Dados, troqueles, moldes, matrices y herramental.",
        "I06" => "I06 - Comunicaciones telefónicas.",
        "I07" => "I07 - Comunicaciones satelitales.",
        "I08" => "I08 - Otra maquinaria y equipo.",
        "D01" => "D01 - Honorarios médicos, dentales y gastos hospitalarios.",
        "D02" => "D02 - Gastos médicos por incapacidad o discapacidad.",
        "D03" => "D03 - Gastos funerales.",
        "D04" => "D04 - Donativos.",
        "D05" => "D05 - Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación).",
        "D06" => "D06 - Aportaciones voluntarias al SAR.",
        "D07" => "D07 - Primas por seguros de gastos médicos.",
        "D08" => "D08 - Gastos de transportación escolar obligatoria.",
        "D09" => "D09 - Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones.",
        "D10" => "D10 - Pagos por servicios educativos (colegiaturas).",
        "S01" => "S01 - Sin efectos fiscales.  ",
        "CP01" => "CP01 - Pagos",
        "CN01" => "CN01 - Nómina"
    ],
    'forma_pago' => [
        "01" => "01 - Efectivo",
        "02" => "02 - Cheque nominativo",
        "03" => "03 - Transferencia electrónica de fondos",
        "04" => "04 - Tarjeta de crédito",
        "05" => "05 - Monedero electrónico",
        "06" => "06 - Dinero electrónico",
        "08" => "08 - Vales de despensa",
        "12" => "12 - Dación en pago",
        "13" => "13 - Pago por subrogación",
        "14" => "14 - Pago por consignación",
        "15" => "15 - Condonación",
        "17" => "17 - Compensación",
        "23" => "23 - Novación",
        "24" => "24 - Confusión",
        "25" => "25 - Remisión de deuda",
        "26" => "26 - Prescripción o caducidad",
        "27" => "27 - A satisfacción del acreedor",
        "28" => "28 - Tarjeta de débito",
        "29" => "29 - Tarjeta de servicios",
        "30" => "30 - Aplicación de anticipos",
        "31" => "31 - Intermediario pagos",
        "99" => "99 - Por definir",
        "NA" => "N/A"
    ],
    'headers_import_customers' => [
        "Nombre o Razón Social",
        "Nombre Comercial",
        "RFC",
        "Uso CFDI",
        "Régimen Fiscal",
        "Forma de Pago",
        "Calle",
        "NoExterior",
        "NoInterior",
        "Colonia",
        "Municipio",
        "Ciudad",
        "Referencia",
        "Estado",
        "País",
        "Código Postal",
        "Teléfono",
        "Correo Electrónico"
    ],
];
