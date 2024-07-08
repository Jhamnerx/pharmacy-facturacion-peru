<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* invoice2.1.xml.twig */
class __TwigTemplate_afd471f48445aeaa4f9ab97858edb7ce extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        $___internal_parse_0_ = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 2
            yield "<?xml version=\"1.0\" encoding=\"utf-8\"?>
<Invoice xmlns=\"urn:oasis:names:specification:ubl:schema:xsd:Invoice-2\" xmlns:cac=\"urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2\" xmlns:cbc=\"urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2\" xmlns:ds=\"http://www.w3.org/2000/09/xmldsig#\" xmlns:ext=\"urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2\">
    <ext:UBLExtensions>
        <ext:UBLExtension>
            <ext:ExtensionContent/>
        </ext:UBLExtension>
    </ext:UBLExtensions>
    ";
            // line 9
            $context["emp"] = CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "company", [], "any", false, false, false, 9);
            // line 10
            yield "    <cbc:UBLVersionID>2.1</cbc:UBLVersionID>
    <cbc:CustomizationID>2.0</cbc:CustomizationID>
    <cbc:ID>";
            // line 12
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "serie", [], "any", false, false, false, 12);
            yield "-";
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "correlativo", [], "any", false, false, false, 12);
            yield "</cbc:ID>
    <cbc:IssueDate>";
            // line 13
            yield $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "fechaEmision", [], "any", false, false, false, 13), "Y-m-d");
            yield "</cbc:IssueDate>
    <cbc:IssueTime>";
            // line 14
            yield $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "fechaEmision", [], "any", false, false, false, 14), "H:i:s");
            yield "</cbc:IssueTime>
    ";
            // line 15
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "fecVencimiento", [], "any", false, false, false, 15)) {
                // line 16
                yield "    <cbc:DueDate>";
                yield $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "fecVencimiento", [], "any", false, false, false, 16), "Y-m-d");
                yield "</cbc:DueDate>
    ";
            }
            // line 18
            yield "    <cbc:InvoiceTypeCode listID=\"";
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoOperacion", [], "any", false, false, false, 18);
            yield "\">";
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoDoc", [], "any", false, false, false, 18);
            yield "</cbc:InvoiceTypeCode>
    ";
            // line 19
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "legends", [], "any", false, false, false, 19));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["leg"]) {
                // line 20
                yield "    <cbc:Note languageLocaleID=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["leg"] ?? null), "code", [], "any", false, false, false, 20);
                yield "\"><![CDATA[";
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["leg"] ?? null), "value", [], "any", false, false, false, 20);
                yield "]]></cbc:Note>
    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['leg'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            yield "    ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "observacion", [], "any", false, false, false, 22)) {
                // line 23
                yield "    <cbc:Note><![CDATA[";
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "observacion", [], "any", false, false, false, 23);
                yield "]]></cbc:Note>
    ";
            }
            // line 25
            yield "    <cbc:DocumentCurrencyCode>";
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 25);
            yield "</cbc:DocumentCurrencyCode>
    ";
            // line 26
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "compra", [], "any", false, false, false, 26)) {
                // line 27
                yield "    <cac:OrderReference>
        <cbc:ID>";
                // line 28
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "compra", [], "any", false, false, false, 28);
                yield "</cbc:ID>
    </cac:OrderReference>
    ";
            }
            // line 31
            yield "    ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "guias", [], "any", false, false, false, 31)) {
                // line 32
                yield "    ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "guias", [], "any", false, false, false, 32));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["guia"]) {
                    // line 33
                    yield "    <cac:DespatchDocumentReference>
        <cbc:ID>";
                    // line 34
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["guia"] ?? null), "nroDoc", [], "any", false, false, false, 34);
                    yield "</cbc:ID>
        <cbc:DocumentTypeCode>";
                    // line 35
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["guia"] ?? null), "tipoDoc", [], "any", false, false, false, 35);
                    yield "</cbc:DocumentTypeCode>
    </cac:DespatchDocumentReference>
    ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['guia'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 38
                yield "    ";
            }
            // line 39
            yield "    ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "relDocs", [], "any", false, false, false, 39)) {
                // line 40
                yield "    ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "relDocs", [], "any", false, false, false, 40));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["rel"]) {
                    // line 41
                    yield "    <cac:AdditionalDocumentReference>
        <cbc:ID>";
                    // line 42
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["rel"] ?? null), "nroDoc", [], "any", false, false, false, 42);
                    yield "</cbc:ID>
        <cbc:DocumentTypeCode>";
                    // line 43
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["rel"] ?? null), "tipoDoc", [], "any", false, false, false, 43);
                    yield "</cbc:DocumentTypeCode>
    </cac:AdditionalDocumentReference>
    ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rel'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 46
                yield "    ";
            }
            // line 47
            yield "    ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "anticipos", [], "any", false, false, false, 47)) {
                // line 48
                yield "    ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "anticipos", [], "any", false, false, false, 48));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["ant"]) {
                    // line 49
                    yield "    <cac:AdditionalDocumentReference>
        <cbc:ID>";
                    // line 50
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["ant"] ?? null), "nroDocRel", [], "any", false, false, false, 50);
                    yield "</cbc:ID>
        <cbc:DocumentTypeCode>";
                    // line 51
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["ant"] ?? null), "tipoDocRel", [], "any", false, false, false, 51);
                    yield "</cbc:DocumentTypeCode>
        <cbc:DocumentStatusCode>";
                    // line 52
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["loop"] ?? null), "index", [], "any", false, false, false, 52);
                    yield "</cbc:DocumentStatusCode>
        <cac:IssuerParty>
            <cac:PartyIdentification>
                <cbc:ID schemeID=\"6\">";
                    // line 55
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["emp"] ?? null), "ruc", [], "any", false, false, false, 55);
                    yield "</cbc:ID>
            </cac:PartyIdentification>
        </cac:IssuerParty>
    </cac:AdditionalDocumentReference>
    ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ant'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 60
                yield "    ";
            }
            // line 61
            yield "    <cac:Signature>
        <cbc:ID>";
            // line 62
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["emp"] ?? null), "ruc", [], "any", false, false, false, 62);
            yield "</cbc:ID>
        <cac:SignatoryParty>
            <cac:PartyIdentification>
                <cbc:ID>";
            // line 65
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["emp"] ?? null), "ruc", [], "any", false, false, false, 65);
            yield "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyName>
                <cbc:Name><![CDATA[";
            // line 68
            yield Twig\Extension\EscaperExtension::raw(CoreExtension::getAttribute($this->env, $this->source, ($context["emp"] ?? null), "razonSocial", [], "any", false, false, false, 68));
            yield "]]></cbc:Name>
            </cac:PartyName>
        </cac:SignatoryParty>
        <cac:DigitalSignatureAttachment>
            <cac:ExternalReference>
                <cbc:URI>#GREENTER-SIGN</cbc:URI>
            </cac:ExternalReference>
        </cac:DigitalSignatureAttachment>
    </cac:Signature>
    <cac:AccountingSupplierParty>
        <cac:Party>
            <cac:PartyIdentification>
                <cbc:ID schemeID=\"6\">";
            // line 80
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["emp"] ?? null), "ruc", [], "any", false, false, false, 80);
            yield "</cbc:ID>
            </cac:PartyIdentification>
\t\t\t";
            // line 82
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["emp"] ?? null), "nombreComercial", [], "any", false, false, false, 82)) {
                // line 83
                yield "            <cac:PartyName>
                <cbc:Name><![CDATA[";
                // line 84
                yield Twig\Extension\EscaperExtension::raw(CoreExtension::getAttribute($this->env, $this->source, ($context["emp"] ?? null), "nombreComercial", [], "any", false, false, false, 84));
                yield "]]></cbc:Name>
            </cac:PartyName>
\t\t\t";
            }
            // line 87
            yield "            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[";
            // line 88
            yield Twig\Extension\EscaperExtension::raw(CoreExtension::getAttribute($this->env, $this->source, ($context["emp"] ?? null), "razonSocial", [], "any", false, false, false, 88));
            yield "]]></cbc:RegistrationName>
                ";
            // line 89
            $context["addr"] = CoreExtension::getAttribute($this->env, $this->source, ($context["emp"] ?? null), "address", [], "any", false, false, false, 89);
            // line 90
            yield "                <cac:RegistrationAddress>
                    <cbc:ID>";
            // line 91
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "ubigueo", [], "any", false, false, false, 91);
            yield "</cbc:ID>
                    <cbc:AddressTypeCode>";
            // line 92
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "codLocal", [], "any", false, false, false, 92);
            yield "</cbc:AddressTypeCode>
                    ";
            // line 93
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "urbanizacion", [], "any", false, false, false, 93)) {
                // line 94
                yield "                    <cbc:CitySubdivisionName>";
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "urbanizacion", [], "any", false, false, false, 94);
                yield "</cbc:CitySubdivisionName>
                    ";
            }
            // line 96
            yield "                    <cbc:CityName>";
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "provincia", [], "any", false, false, false, 96);
            yield "</cbc:CityName>
                    <cbc:CountrySubentity>";
            // line 97
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "departamento", [], "any", false, false, false, 97);
            yield "</cbc:CountrySubentity>
                    <cbc:District>";
            // line 98
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "distrito", [], "any", false, false, false, 98);
            yield "</cbc:District>
                    <cac:AddressLine>
                        <cbc:Line><![CDATA[";
            // line 100
            yield Twig\Extension\EscaperExtension::raw(CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "direccion", [], "any", false, false, false, 100));
            yield "]]></cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode>";
            // line 103
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "codigoPais", [], "any", false, false, false, 103);
            yield "</cbc:IdentificationCode>
                    </cac:Country>
                </cac:RegistrationAddress>
            </cac:PartyLegalEntity>
            ";
            // line 107
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["emp"] ?? null), "email", [], "any", false, false, false, 107) || CoreExtension::getAttribute($this->env, $this->source, ($context["emp"] ?? null), "telephone", [], "any", false, false, false, 107))) {
                // line 108
                yield "            <cac:Contact>
                ";
                // line 109
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["emp"] ?? null), "telephone", [], "any", false, false, false, 109)) {
                    // line 110
                    yield "                <cbc:Telephone>";
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["emp"] ?? null), "telephone", [], "any", false, false, false, 110);
                    yield "</cbc:Telephone>
                ";
                }
                // line 112
                yield "                ";
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["emp"] ?? null), "email", [], "any", false, false, false, 112)) {
                    // line 113
                    yield "                <cbc:ElectronicMail>";
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["emp"] ?? null), "email", [], "any", false, false, false, 113);
                    yield "</cbc:ElectronicMail>
                ";
                }
                // line 115
                yield "            </cac:Contact>
            ";
            }
            // line 117
            yield "        </cac:Party>
    </cac:AccountingSupplierParty>
    ";
            // line 119
            $context["client"] = CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "client", [], "any", false, false, false, 119);
            // line 120
            yield "    <cac:AccountingCustomerParty>
        <cac:Party>
            <cac:PartyIdentification>
                <cbc:ID schemeID=\"";
            // line 123
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "tipoDoc", [], "any", false, false, false, 123);
            yield "\">";
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "numDoc", [], "any", false, false, false, 123);
            yield "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[";
            // line 126
            yield Twig\Extension\EscaperExtension::raw(CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "rznSocial", [], "any", false, false, false, 126));
            yield "]]></cbc:RegistrationName>
                ";
            // line 127
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "address", [], "any", false, false, false, 127)) {
                // line 128
                yield "                ";
                $context["addr"] = CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "address", [], "any", false, false, false, 128);
                // line 129
                yield "                <cac:RegistrationAddress>
                    ";
                // line 130
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "ubigueo", [], "any", false, false, false, 130)) {
                    // line 131
                    yield "                    <cbc:ID>";
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "ubigueo", [], "any", false, false, false, 131);
                    yield "</cbc:ID>
                    ";
                }
                // line 133
                yield "                    <cac:AddressLine>
                        <cbc:Line><![CDATA[";
                // line 134
                yield Twig\Extension\EscaperExtension::raw(CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "direccion", [], "any", false, false, false, 134));
                yield "]]></cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode>";
                // line 137
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "codigoPais", [], "any", false, false, false, 137);
                yield "</cbc:IdentificationCode>
                    </cac:Country>
                </cac:RegistrationAddress>
                ";
            }
            // line 141
            yield "            </cac:PartyLegalEntity>
            ";
            // line 142
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "email", [], "any", false, false, false, 142) || CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "telephone", [], "any", false, false, false, 142))) {
                // line 143
                yield "            <cac:Contact>
                ";
                // line 144
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "telephone", [], "any", false, false, false, 144)) {
                    // line 145
                    yield "                <cbc:Telephone>";
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "telephone", [], "any", false, false, false, 145);
                    yield "</cbc:Telephone>
                ";
                }
                // line 147
                yield "                ";
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "email", [], "any", false, false, false, 147)) {
                    // line 148
                    yield "                <cbc:ElectronicMail>";
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["client"] ?? null), "email", [], "any", false, false, false, 148);
                    yield "</cbc:ElectronicMail>
                ";
                }
                // line 150
                yield "            </cac:Contact>
            ";
            }
            // line 152
            yield "        </cac:Party>
    </cac:AccountingCustomerParty>
    ";
            // line 154
            $context["seller"] = CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "seller", [], "any", false, false, false, 154);
            // line 155
            yield "    ";
            if (($context["seller"] ?? null)) {
                // line 156
                yield "    <cac:SellerSupplierParty>
        <cac:Party>
            <cac:PartyIdentification>
                <cbc:ID schemeID=\"";
                // line 159
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["seller"] ?? null), "tipoDoc", [], "any", false, false, false, 159);
                yield "\">";
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["seller"] ?? null), "numDoc", [], "any", false, false, false, 159);
                yield "</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[";
                // line 162
                yield Twig\Extension\EscaperExtension::raw(CoreExtension::getAttribute($this->env, $this->source, ($context["seller"] ?? null), "rznSocial", [], "any", false, false, false, 162));
                yield "]]></cbc:RegistrationName>
                ";
                // line 163
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["seller"] ?? null), "address", [], "any", false, false, false, 163)) {
                    // line 164
                    yield "                ";
                    $context["addr"] = CoreExtension::getAttribute($this->env, $this->source, ($context["seller"] ?? null), "address", [], "any", false, false, false, 164);
                    // line 165
                    yield "                <cac:RegistrationAddress>
                    ";
                    // line 166
                    if (CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "ubigueo", [], "any", false, false, false, 166)) {
                        // line 167
                        yield "                    <cbc:ID>";
                        yield CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "ubigueo", [], "any", false, false, false, 167);
                        yield "</cbc:ID>
                    ";
                    }
                    // line 169
                    yield "                    <cac:AddressLine>
                        <cbc:Line><![CDATA[";
                    // line 170
                    yield Twig\Extension\EscaperExtension::raw(CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "direccion", [], "any", false, false, false, 170));
                    yield "]]></cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode>";
                    // line 173
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "codigoPais", [], "any", false, false, false, 173);
                    yield "</cbc:IdentificationCode>
                    </cac:Country>
                </cac:RegistrationAddress>
                ";
                }
                // line 177
                yield "            </cac:PartyLegalEntity>
            ";
                // line 178
                if ((CoreExtension::getAttribute($this->env, $this->source, ($context["seller"] ?? null), "email", [], "any", false, false, false, 178) || CoreExtension::getAttribute($this->env, $this->source, ($context["seller"] ?? null), "telephone", [], "any", false, false, false, 178))) {
                    // line 179
                    yield "            <cac:Contact>
                ";
                    // line 180
                    if (CoreExtension::getAttribute($this->env, $this->source, ($context["seller"] ?? null), "telephone", [], "any", false, false, false, 180)) {
                        // line 181
                        yield "                <cbc:Telephone>";
                        yield CoreExtension::getAttribute($this->env, $this->source, ($context["seller"] ?? null), "telephone", [], "any", false, false, false, 181);
                        yield "</cbc:Telephone>
                ";
                    }
                    // line 183
                    yield "                ";
                    if (CoreExtension::getAttribute($this->env, $this->source, ($context["seller"] ?? null), "email", [], "any", false, false, false, 183)) {
                        // line 184
                        yield "                <cbc:ElectronicMail>";
                        yield CoreExtension::getAttribute($this->env, $this->source, ($context["seller"] ?? null), "email", [], "any", false, false, false, 184);
                        yield "</cbc:ElectronicMail>
                ";
                    }
                    // line 186
                    yield "            </cac:Contact>
            ";
                }
                // line 188
                yield "        </cac:Party>
    </cac:SellerSupplierParty>
    ";
            }
            // line 191
            yield "    ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "direccionEntrega", [], "any", false, false, false, 191)) {
                // line 192
                yield "        ";
                $context["addr"] = CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "direccionEntrega", [], "any", false, false, false, 192);
                // line 193
                yield "        <cac:Delivery>
            <cac:DeliveryLocation>
                <cac:Address>
                    <cbc:ID>";
                // line 196
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "ubigueo", [], "any", false, false, false, 196);
                yield "</cbc:ID>
                    ";
                // line 197
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "urbanizacion", [], "any", false, false, false, 197)) {
                    // line 198
                    yield "                    <cbc:CitySubdivisionName>";
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "urbanizacion", [], "any", false, false, false, 198);
                    yield "</cbc:CitySubdivisionName>
                    ";
                }
                // line 200
                yield "                    <cbc:CityName>";
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "provincia", [], "any", false, false, false, 200);
                yield "</cbc:CityName>
                    <cbc:CountrySubentity>";
                // line 201
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "departamento", [], "any", false, false, false, 201);
                yield "</cbc:CountrySubentity>
                    <cbc:District>";
                // line 202
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "distrito", [], "any", false, false, false, 202);
                yield "</cbc:District>
                    <cac:AddressLine>
                        <cbc:Line><![CDATA[";
                // line 204
                yield Twig\Extension\EscaperExtension::raw(CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "direccion", [], "any", false, false, false, 204));
                yield "]]></cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode listID=\"ISO 3166-1\" listAgencyName=\"United Nations Economic Commission for Europe\" listName=\"Country\">";
                // line 207
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["addr"] ?? null), "codigoPais", [], "any", false, false, false, 207);
                yield "</cbc:IdentificationCode>
                    </cac:Country>
                </cac:Address>
            </cac:DeliveryLocation>
        </cac:Delivery>
    ";
            }
            // line 213
            yield "    ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "detraccion", [], "any", false, false, false, 213)) {
                // line 214
                yield "    ";
                $context["detr"] = CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "detraccion", [], "any", false, false, false, 214);
                // line 215
                yield "    <cac:PaymentMeans>
        <cbc:ID>Detraccion</cbc:ID>
        <cbc:PaymentMeansCode>";
                // line 217
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["detr"] ?? null), "codMedioPago", [], "any", false, false, false, 217);
                yield "</cbc:PaymentMeansCode>
        <cac:PayeeFinancialAccount>
            <cbc:ID>";
                // line 219
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["detr"] ?? null), "ctaBanco", [], "any", false, false, false, 219);
                yield "</cbc:ID>
        </cac:PayeeFinancialAccount>
    </cac:PaymentMeans>
    <cac:PaymentTerms>
        <cbc:ID>Detraccion</cbc:ID>
        <cbc:PaymentMeansID>";
                // line 224
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["detr"] ?? null), "codBienDetraccion", [], "any", false, false, false, 224);
                yield "</cbc:PaymentMeansID>
        <cbc:PaymentPercent>";
                // line 225
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["detr"] ?? null), "percent", [], "any", false, false, false, 225);
                yield "</cbc:PaymentPercent>
        <cbc:Amount currencyID=\"PEN\">";
                // line 226
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["detr"] ?? null), "mount", [], "any", false, false, false, 226));
                yield "</cbc:Amount>
    </cac:PaymentTerms>
    ";
            }
            // line 229
            yield "    ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "perception", [], "any", false, false, false, 229)) {
                // line 230
                yield "    <cac:PaymentTerms>
        <cbc:ID>Percepcion</cbc:ID>
        <cbc:Amount currencyID=\"PEN\">";
                // line 232
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "perception", [], "any", false, false, false, 232), "mtoTotal", [], "any", false, false, false, 232));
                yield "</cbc:Amount>
    </cac:PaymentTerms>
    ";
            }
            // line 235
            yield "    ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "formaPago", [], "any", false, false, false, 235)) {
                // line 236
                yield "    <cac:PaymentTerms>
        <cbc:ID>FormaPago</cbc:ID>
        <cbc:PaymentMeansID>";
                // line 238
                yield CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "formaPago", [], "any", false, false, false, 238), "tipo", [], "any", false, false, false, 238);
                yield "</cbc:PaymentMeansID>
        ";
                // line 239
                if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "formaPago", [], "any", false, false, false, 239), "monto", [], "any", false, false, false, 239)) {
                    // line 240
                    yield "        <cbc:Amount currencyID=\"";
                    yield ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "formaPago", [], "any", false, true, false, 240), "moneda", [], "any", true, true, false, 240)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "formaPago", [], "any", false, true, false, 240), "moneda", [], "any", false, false, false, 240), CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 240))) : (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 240)));
                    yield "\">";
                    yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "formaPago", [], "any", false, false, false, 240), "monto", [], "any", false, false, false, 240));
                    yield "</cbc:Amount>
        ";
                }
                // line 242
                yield "    </cac:PaymentTerms>
    ";
            }
            // line 244
            yield "    ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "cuotas", [], "any", false, false, false, 244)) {
                // line 245
                yield "    ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "cuotas", [], "any", false, false, false, 245));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["cuota"]) {
                    // line 246
                    yield "    <cac:PaymentTerms>
        <cbc:ID>FormaPago</cbc:ID>
        <cbc:PaymentMeansID>Cuota";
                    // line 248
                    yield Twig\Extension\CoreExtension::sprintf("%03d", CoreExtension::getAttribute($this->env, $this->source, ($context["loop"] ?? null), "index", [], "any", false, false, false, 248));
                    yield "</cbc:PaymentMeansID>
        <cbc:Amount currencyID=\"";
                    // line 249
                    yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["cuota"] ?? null), "moneda", [], "any", true, true, false, 249)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, ($context["cuota"] ?? null), "moneda", [], "any", false, false, false, 249), CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 249))) : (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 249)));
                    yield "\">";
                    yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["cuota"] ?? null), "monto", [], "any", false, false, false, 249));
                    yield "</cbc:Amount>
        <cbc:PaymentDueDate>";
                    // line 250
                    yield $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, ($context["cuota"] ?? null), "fechaPago", [], "any", false, false, false, 250), "Y-m-d");
                    yield "</cbc:PaymentDueDate>
    </cac:PaymentTerms>
    ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cuota'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 253
                yield "    ";
            }
            // line 254
            yield "    ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "anticipos", [], "any", false, false, false, 254)) {
                // line 255
                yield "    ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "anticipos", [], "any", false, false, false, 255));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["ant"]) {
                    // line 256
                    yield "    <cac:PrepaidPayment>
        <cbc:ID>";
                    // line 257
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["loop"] ?? null), "index", [], "any", false, false, false, 257);
                    yield "</cbc:ID>
        <cbc:PaidAmount currencyID=\"";
                    // line 258
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 258);
                    yield "\">";
                    yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["ant"] ?? null), "total", [], "any", false, false, false, 258));
                    yield "</cbc:PaidAmount>
    </cac:PrepaidPayment>
    ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ant'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 261
                yield "    ";
            }
            // line 262
            yield "    ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "cargos", [], "any", false, false, false, 262)) {
                // line 263
                yield "    ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "cargos", [], "any", false, false, false, 263));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["cargo"]) {
                    // line 264
                    yield "    <cac:AllowanceCharge>
        <cbc:ChargeIndicator>true</cbc:ChargeIndicator>
        <cbc:AllowanceChargeReasonCode>";
                    // line 266
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["cargo"] ?? null), "codTipo", [], "any", false, false, false, 266);
                    yield "</cbc:AllowanceChargeReasonCode>
        <cbc:MultiplierFactorNumeric>";
                    // line 267
                    yield $this->env->getFilter('n_format_limit')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["cargo"] ?? null), "factor", [], "any", false, false, false, 267), 5);
                    yield "</cbc:MultiplierFactorNumeric>
        <cbc:Amount currencyID=\"";
                    // line 268
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 268);
                    yield "\">";
                    yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["cargo"] ?? null), "monto", [], "any", false, false, false, 268));
                    yield "</cbc:Amount>
        <cbc:BaseAmount currencyID=\"";
                    // line 269
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 269);
                    yield "\">";
                    yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["cargo"] ?? null), "montoBase", [], "any", false, false, false, 269));
                    yield "</cbc:BaseAmount>
    </cac:AllowanceCharge>
    ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cargo'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 272
                yield "    ";
            }
            // line 273
            yield "    ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "descuentos", [], "any", false, false, false, 273)) {
                // line 274
                yield "    ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "descuentos", [], "any", false, false, false, 274));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["desc"]) {
                    // line 275
                    yield "    <cac:AllowanceCharge>
        <cbc:ChargeIndicator>false</cbc:ChargeIndicator>
        <cbc:AllowanceChargeReasonCode>";
                    // line 277
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["desc"] ?? null), "codTipo", [], "any", false, false, false, 277);
                    yield "</cbc:AllowanceChargeReasonCode>
        ";
                    // line 278
                    if ( !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["desc"] ?? null), "factor", [], "any", false, false, false, 278))) {
                        // line 279
                        yield "        <cbc:MultiplierFactorNumeric>";
                        yield $this->env->getFilter('n_format_limit')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["desc"] ?? null), "factor", [], "any", false, false, false, 279), 5);
                        yield "</cbc:MultiplierFactorNumeric>
        ";
                    }
                    // line 281
                    yield "        <cbc:Amount currencyID=\"";
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 281);
                    yield "\">";
                    yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["desc"] ?? null), "monto", [], "any", false, false, false, 281));
                    yield "</cbc:Amount>
        <cbc:BaseAmount currencyID=\"";
                    // line 282
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 282);
                    yield "\">";
                    yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["desc"] ?? null), "montoBase", [], "any", false, false, false, 282));
                    yield "</cbc:BaseAmount>
    </cac:AllowanceCharge>
    ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['desc'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 285
                yield "    ";
            }
            // line 286
            yield "    ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "perception", [], "any", false, false, false, 286)) {
                // line 287
                yield "    ";
                $context["perc"] = CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "perception", [], "any", false, false, false, 287);
                // line 288
                yield "    <cac:AllowanceCharge>
        <cbc:ChargeIndicator>true</cbc:ChargeIndicator>
        <cbc:AllowanceChargeReasonCode>";
                // line 290
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["perc"] ?? null), "codReg", [], "any", false, false, false, 290);
                yield "</cbc:AllowanceChargeReasonCode>
        <cbc:MultiplierFactorNumeric>";
                // line 291
                yield $this->env->getFilter('n_format_limit')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["perc"] ?? null), "porcentaje", [], "any", false, false, false, 291), 5);
                yield "</cbc:MultiplierFactorNumeric>
        <cbc:Amount currencyID=\"PEN\">";
                // line 292
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["perc"] ?? null), "mto", [], "any", false, false, false, 292));
                yield "</cbc:Amount>
        <cbc:BaseAmount currencyID=\"PEN\">";
                // line 293
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["perc"] ?? null), "mtoBase", [], "any", false, false, false, 293));
                yield "</cbc:BaseAmount>
    </cac:AllowanceCharge>
    ";
            }
            // line 296
            yield "    <cac:TaxTotal>
        <cbc:TaxAmount currencyID=\"";
            // line 297
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 297);
            yield "\">";
            yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "totalImpuestos", [], "any", false, false, false, 297));
            yield "</cbc:TaxAmount>
        ";
            // line 298
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "mtoISC", [], "any", false, false, false, 298)) {
                // line 299
                yield "        <cac:TaxSubtotal>
            <cbc:TaxableAmount currencyID=\"";
                // line 300
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 300);
                yield "\">";
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "mtoBaseIsc", [], "any", false, false, false, 300));
                yield "</cbc:TaxableAmount>
            <cbc:TaxAmount currencyID=\"";
                // line 301
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 301);
                yield "\">";
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "mtoISC", [], "any", false, false, false, 301));
                yield "</cbc:TaxAmount>
            <cac:TaxCategory>
                <cac:TaxScheme>
                    <cbc:ID>2000</cbc:ID>
                    <cbc:Name>ISC</cbc:Name>
                    <cbc:TaxTypeCode>EXC</cbc:TaxTypeCode>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
        ";
            }
            // line 311
            yield "        ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOperGravadas", [], "any", false, false, false, 311)) {
                // line 312
                yield "        <cac:TaxSubtotal>
            <cbc:TaxableAmount currencyID=\"";
                // line 313
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 313);
                yield "\">";
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOperGravadas", [], "any", false, false, false, 313));
                yield "</cbc:TaxableAmount>
            <cbc:TaxAmount currencyID=\"";
                // line 314
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 314);
                yield "\">";
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "mtoIGV", [], "any", false, false, false, 314));
                yield "</cbc:TaxAmount>
            <cac:TaxCategory>
                <cac:TaxScheme>
                    <cbc:ID>1000</cbc:ID>
                    <cbc:Name>IGV</cbc:Name>
                    <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
        ";
            }
            // line 324
            yield "        ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOperInafectas", [], "any", false, false, false, 324)) {
                // line 325
                yield "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
                // line 326
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 326);
                yield "\">";
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOperInafectas", [], "any", false, false, false, 326));
                yield "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
                // line 327
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 327);
                yield "\">0</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9998</cbc:ID>
                        <cbc:Name>INA</cbc:Name>
                        <cbc:TaxTypeCode>FRE</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
            }
            // line 337
            yield "        ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOperExoneradas", [], "any", false, false, false, 337)) {
                // line 338
                yield "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
                // line 339
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 339);
                yield "\">";
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOperExoneradas", [], "any", false, false, false, 339));
                yield "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
                // line 340
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 340);
                yield "\">0</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9997</cbc:ID>
                        <cbc:Name>EXO</cbc:Name>
                        <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
            }
            // line 350
            yield "        ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOperGratuitas", [], "any", false, false, false, 350)) {
                // line 351
                yield "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
                // line 352
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 352);
                yield "\">";
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOperGratuitas", [], "any", false, false, false, 352));
                yield "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
                // line 353
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 353);
                yield "\">";
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "mtoIGVGratuitas", [], "any", false, false, false, 353));
                yield "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9996</cbc:ID>
                        <cbc:Name>GRA</cbc:Name>
                        <cbc:TaxTypeCode>FRE</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
            }
            // line 363
            yield "        ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOperExportacion", [], "any", false, false, false, 363)) {
                // line 364
                yield "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
                // line 365
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 365);
                yield "\">";
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOperExportacion", [], "any", false, false, false, 365));
                yield "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
                // line 366
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 366);
                yield "\">0</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9995</cbc:ID>
                        <cbc:Name>EXP</cbc:Name>
                        <cbc:TaxTypeCode>FRE</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
            }
            // line 376
            yield "        ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "mtoIvap", [], "any", false, false, false, 376)) {
                // line 377
                yield "        <cac:TaxSubtotal>
            <cbc:TaxableAmount currencyID=\"";
                // line 378
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 378);
                yield "\">";
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "mtoBaseIvap", [], "any", false, false, false, 378));
                yield "</cbc:TaxableAmount>
            <cbc:TaxAmount currencyID=\"";
                // line 379
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 379);
                yield "\">";
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "mtoIvap", [], "any", false, false, false, 379));
                yield "</cbc:TaxAmount>
            <cac:TaxCategory>
                <cac:TaxScheme>
                    <cbc:ID>1016</cbc:ID>
                    <cbc:Name>IVAP</cbc:Name>
                    <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
        ";
            }
            // line 389
            yield "        ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOtrosTributos", [], "any", false, false, false, 389)) {
                // line 390
                yield "        <cac:TaxSubtotal>
            <cbc:TaxableAmount currencyID=\"";
                // line 391
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 391);
                yield "\">";
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "mtoBaseOth", [], "any", false, false, false, 391));
                yield "</cbc:TaxableAmount>
            <cbc:TaxAmount currencyID=\"";
                // line 392
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 392);
                yield "\">";
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "mtoOtrosTributos", [], "any", false, false, false, 392));
                yield "</cbc:TaxAmount>
            <cac:TaxCategory>
                <cac:TaxScheme>
                    <cbc:ID>9999</cbc:ID>
                    <cbc:Name>OTROS</cbc:Name>
                    <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
        ";
            }
            // line 402
            yield "        ";
            if (CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "icbper", [], "any", false, false, false, 402)) {
                // line 403
                yield "            <cac:TaxSubtotal>
                <cbc:TaxAmount currencyID=\"";
                // line 404
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 404);
                yield "\">";
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "icbper", [], "any", false, false, false, 404));
                yield "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>7152</cbc:ID>
                        <cbc:Name>ICBPER</cbc:Name>
                        <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        ";
            }
            // line 414
            yield "    </cac:TaxTotal>
    <cac:LegalMonetaryTotal>
        <cbc:LineExtensionAmount currencyID=\"";
            // line 416
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 416);
            yield "\">";
            yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "valorVenta", [], "any", false, false, false, 416));
            yield "</cbc:LineExtensionAmount>
        ";
            // line 417
            if ( !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "subTotal", [], "any", false, false, false, 417))) {
                // line 418
                yield "        <cbc:TaxInclusiveAmount currencyID=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 418);
                yield "\">";
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "subTotal", [], "any", false, false, false, 418));
                yield "</cbc:TaxInclusiveAmount>
        ";
            }
            // line 420
            yield "        ";
            if ( !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "sumOtrosDescuentos", [], "any", false, false, false, 420))) {
                // line 421
                yield "        <cbc:AllowanceTotalAmount currencyID=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 421);
                yield "\">";
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "sumOtrosDescuentos", [], "any", false, false, false, 421));
                yield "</cbc:AllowanceTotalAmount>
        ";
            }
            // line 423
            yield "        ";
            if ( !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "sumOtrosCargos", [], "any", false, false, false, 423))) {
                // line 424
                yield "        <cbc:ChargeTotalAmount currencyID=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 424);
                yield "\">";
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "sumOtrosCargos", [], "any", false, false, false, 424));
                yield "</cbc:ChargeTotalAmount>
        ";
            }
            // line 426
            yield "        ";
            if ( !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "totalAnticipos", [], "any", false, false, false, 426))) {
                // line 427
                yield "        <cbc:PrepaidAmount currencyID=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 427);
                yield "\">";
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "totalAnticipos", [], "any", false, false, false, 427));
                yield "</cbc:PrepaidAmount>
        ";
            }
            // line 429
            yield "        ";
            if ( !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "redondeo", [], "any", false, false, false, 429))) {
                // line 430
                yield "        <cbc:PayableRoundingAmount currencyID=\"";
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 430);
                yield "\">";
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "redondeo", [], "any", false, false, false, 430));
                yield "</cbc:PayableRoundingAmount>
        ";
            }
            // line 432
            yield "        <cbc:PayableAmount currencyID=\"";
            yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 432);
            yield "\">";
            yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "mtoImpVenta", [], "any", false, false, false, 432));
            yield "</cbc:PayableAmount>
    </cac:LegalMonetaryTotal>
    ";
            // line 434
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "details", [], "any", false, false, false, 434));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["detail"]) {
                // line 435
                yield "    <cac:InvoiceLine>
        <cbc:ID>";
                // line 436
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["loop"] ?? null), "index", [], "any", false, false, false, 436);
                yield "</cbc:ID>
        <cbc:InvoicedQuantity unitCode=\"";
                // line 437
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "unidad", [], "any", false, false, false, 437);
                yield "\">";
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "cantidad", [], "any", false, false, false, 437);
                yield "</cbc:InvoicedQuantity>
        <cbc:LineExtensionAmount currencyID=\"";
                // line 438
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 438);
                yield "\">";
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "mtoValorVenta", [], "any", false, false, false, 438));
                yield "</cbc:LineExtensionAmount>
        <cac:PricingReference>
            ";
                // line 440
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "mtoValorGratuito", [], "any", false, false, false, 440)) {
                    // line 441
                    yield "            <cac:AlternativeConditionPrice>
                <cbc:PriceAmount currencyID=\"";
                    // line 442
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 442);
                    yield "\">";
                    yield $this->env->getFilter('n_format_limit')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "mtoValorGratuito", [], "any", false, false, false, 442), 10);
                    yield "</cbc:PriceAmount>
                <cbc:PriceTypeCode>02</cbc:PriceTypeCode>
            </cac:AlternativeConditionPrice>
            ";
                } else {
                    // line 446
                    yield "            <cac:AlternativeConditionPrice>
                <cbc:PriceAmount currencyID=\"";
                    // line 447
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 447);
                    yield "\">";
                    yield $this->env->getFilter('n_format_limit')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "mtoPrecioUnitario", [], "any", false, false, false, 447), 10);
                    yield "</cbc:PriceAmount>
                <cbc:PriceTypeCode>01</cbc:PriceTypeCode>
            </cac:AlternativeConditionPrice>
            ";
                }
                // line 451
                yield "        </cac:PricingReference>
        ";
                // line 452
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "cargos", [], "any", false, false, false, 452)) {
                    // line 453
                    yield "        ";
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "cargos", [], "any", false, false, false, 453));
                    $context['loop'] = [
                      'parent' => $context['_parent'],
                      'index0' => 0,
                      'index'  => 1,
                      'first'  => true,
                    ];
                    if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                        $length = count($context['_seq']);
                        $context['loop']['revindex0'] = $length - 1;
                        $context['loop']['revindex'] = $length;
                        $context['loop']['length'] = $length;
                        $context['loop']['last'] = 1 === $length;
                    }
                    foreach ($context['_seq'] as $context["_key"] => $context["cargo"]) {
                        // line 454
                        yield "        <cac:AllowanceCharge>
            <cbc:ChargeIndicator>true</cbc:ChargeIndicator>
            <cbc:AllowanceChargeReasonCode>";
                        // line 456
                        yield CoreExtension::getAttribute($this->env, $this->source, ($context["cargo"] ?? null), "codTipo", [], "any", false, false, false, 456);
                        yield "</cbc:AllowanceChargeReasonCode>
            <cbc:MultiplierFactorNumeric>";
                        // line 457
                        yield $this->env->getFilter('n_format_limit')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["cargo"] ?? null), "factor", [], "any", false, false, false, 457), 5);
                        yield "</cbc:MultiplierFactorNumeric>
            <cbc:Amount currencyID=\"";
                        // line 458
                        yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 458);
                        yield "\">";
                        yield CoreExtension::getAttribute($this->env, $this->source, ($context["cargo"] ?? null), "monto", [], "any", false, false, false, 458);
                        yield "</cbc:Amount>
            <cbc:BaseAmount currencyID=\"";
                        // line 459
                        yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 459);
                        yield "\">";
                        yield CoreExtension::getAttribute($this->env, $this->source, ($context["cargo"] ?? null), "montoBase", [], "any", false, false, false, 459);
                        yield "</cbc:BaseAmount>
        </cac:AllowanceCharge>
        ";
                        ++$context['loop']['index0'];
                        ++$context['loop']['index'];
                        $context['loop']['first'] = false;
                        if (isset($context['loop']['length'])) {
                            --$context['loop']['revindex0'];
                            --$context['loop']['revindex'];
                            $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cargo'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 462
                    yield "        ";
                }
                // line 463
                yield "        ";
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "descuentos", [], "any", false, false, false, 463)) {
                    // line 464
                    yield "        ";
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "descuentos", [], "any", false, false, false, 464));
                    $context['loop'] = [
                      'parent' => $context['_parent'],
                      'index0' => 0,
                      'index'  => 1,
                      'first'  => true,
                    ];
                    if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                        $length = count($context['_seq']);
                        $context['loop']['revindex0'] = $length - 1;
                        $context['loop']['revindex'] = $length;
                        $context['loop']['length'] = $length;
                        $context['loop']['last'] = 1 === $length;
                    }
                    foreach ($context['_seq'] as $context["_key"] => $context["desc"]) {
                        // line 465
                        yield "        <cac:AllowanceCharge>
            <cbc:ChargeIndicator>false</cbc:ChargeIndicator>
            <cbc:AllowanceChargeReasonCode>";
                        // line 467
                        yield CoreExtension::getAttribute($this->env, $this->source, ($context["desc"] ?? null), "codTipo", [], "any", false, false, false, 467);
                        yield "</cbc:AllowanceChargeReasonCode>
            <cbc:MultiplierFactorNumeric>";
                        // line 468
                        yield $this->env->getFilter('n_format_limit')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["desc"] ?? null), "factor", [], "any", false, false, false, 468), 5);
                        yield "</cbc:MultiplierFactorNumeric>
            <cbc:Amount currencyID=\"";
                        // line 469
                        yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 469);
                        yield "\">";
                        yield CoreExtension::getAttribute($this->env, $this->source, ($context["desc"] ?? null), "monto", [], "any", false, false, false, 469);
                        yield "</cbc:Amount>
            <cbc:BaseAmount currencyID=\"";
                        // line 470
                        yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 470);
                        yield "\">";
                        yield CoreExtension::getAttribute($this->env, $this->source, ($context["desc"] ?? null), "montoBase", [], "any", false, false, false, 470);
                        yield "</cbc:BaseAmount>
        </cac:AllowanceCharge>
        ";
                        ++$context['loop']['index0'];
                        ++$context['loop']['index'];
                        $context['loop']['first'] = false;
                        if (isset($context['loop']['length'])) {
                            --$context['loop']['revindex0'];
                            --$context['loop']['revindex'];
                            $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['desc'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 473
                    yield "        ";
                }
                // line 474
                yield "        <cac:TaxTotal>
            <cbc:TaxAmount currencyID=\"";
                // line 475
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 475);
                yield "\">";
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "totalImpuestos", [], "any", false, false, false, 475));
                yield "</cbc:TaxAmount>
            ";
                // line 476
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "isc", [], "any", false, false, false, 476)) {
                    // line 477
                    yield "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
                    // line 478
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 478);
                    yield "\">";
                    yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "mtoBaseIsc", [], "any", false, false, false, 478));
                    yield "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
                    // line 479
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 479);
                    yield "\">";
                    yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "isc", [], "any", false, false, false, 479));
                    yield "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:Percent>";
                    // line 481
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "porcentajeIsc", [], "any", false, false, false, 481);
                    yield "</cbc:Percent>
                    <cbc:TierRange>";
                    // line 482
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "tipSisIsc", [], "any", false, false, false, 482);
                    yield "</cbc:TierRange>
                    <cac:TaxScheme>
                        <cbc:ID>2000</cbc:ID>
                        <cbc:Name>ISC</cbc:Name>
                        <cbc:TaxTypeCode>EXC</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
            ";
                }
                // line 491
                yield "            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"";
                // line 492
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 492);
                yield "\">";
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "mtoBaseIgv", [], "any", false, false, false, 492));
                yield "</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"";
                // line 493
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 493);
                yield "\">";
                yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "igv", [], "any", false, false, false, 493));
                yield "</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:Percent>";
                // line 495
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "porcentajeIgv", [], "any", false, false, false, 495);
                yield "</cbc:Percent>
                    <cbc:TaxExemptionReasonCode>";
                // line 496
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "tipAfeIgv", [], "any", false, false, false, 496);
                yield "</cbc:TaxExemptionReasonCode>
                    ";
                // line 497
                $context["afect"] = Greenter\Xml\Filter\TributoFunction::getByAfectacion(CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "tipAfeIgv", [], "any", false, false, false, 497));
                // line 498
                yield "                    <cac:TaxScheme>
                        <cbc:ID>";
                // line 499
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["afect"] ?? null), "id", [], "any", false, false, false, 499);
                yield "</cbc:ID>
                        <cbc:Name>";
                // line 500
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["afect"] ?? null), "name", [], "any", false, false, false, 500);
                yield "</cbc:Name>
                        <cbc:TaxTypeCode>";
                // line 501
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["afect"] ?? null), "code", [], "any", false, false, false, 501);
                yield "</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
            ";
                // line 505
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "otroTributo", [], "any", false, false, false, 505)) {
                    // line 506
                    yield "                <cac:TaxSubtotal>
                    <cbc:TaxableAmount currencyID=\"";
                    // line 507
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 507);
                    yield "\">";
                    yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "mtoBaseOth", [], "any", false, false, false, 507));
                    yield "</cbc:TaxableAmount>
                    <cbc:TaxAmount currencyID=\"";
                    // line 508
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 508);
                    yield "\">";
                    yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "otroTributo", [], "any", false, false, false, 508));
                    yield "</cbc:TaxAmount>
                    <cac:TaxCategory>
                        <cbc:Percent>";
                    // line 510
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "porcentajeOth", [], "any", false, false, false, 510);
                    yield "</cbc:Percent>
                        <cac:TaxScheme>
                            <cbc:ID>9999</cbc:ID>
                            <cbc:Name>OTROS</cbc:Name>
                            <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                        </cac:TaxScheme>
                    </cac:TaxCategory>
                </cac:TaxSubtotal>
            ";
                }
                // line 519
                yield "            ";
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "icbper", [], "any", false, false, false, 519)) {
                    // line 520
                    yield "            <cac:TaxSubtotal>
                <cbc:TaxAmount currencyID=\"";
                    // line 521
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 521);
                    yield "\">";
                    yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "icbper", [], "any", false, false, false, 521));
                    yield "</cbc:TaxAmount>
                <cbc:BaseUnitMeasure unitCode=\"NIU\">";
                    // line 522
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "cantidad", [], "any", false, false, false, 522);
                    yield "</cbc:BaseUnitMeasure>
                <cac:TaxCategory>
                    <cbc:PerUnitAmount currencyID=\"";
                    // line 524
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 524);
                    yield "\">";
                    yield $this->env->getFilter('n_format')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "factorIcbper", [], "any", false, false, false, 524));
                    yield "</cbc:PerUnitAmount>
                    <cac:TaxScheme>
                        <cbc:ID>7152</cbc:ID>
                        <cbc:Name>ICBPER</cbc:Name>
                        <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
            ";
                }
                // line 533
                yield "        </cac:TaxTotal>
        <cac:Item>
            <cbc:Description><![CDATA[";
                // line 535
                yield Twig\Extension\EscaperExtension::raw(CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "descripcion", [], "any", false, false, false, 535));
                yield "]]></cbc:Description>
            ";
                // line 536
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "codProducto", [], "any", false, false, false, 536)) {
                    // line 537
                    yield "            <cac:SellersItemIdentification>
                <cbc:ID>";
                    // line 538
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "codProducto", [], "any", false, false, false, 538);
                    yield "</cbc:ID>
            </cac:SellersItemIdentification>
            ";
                }
                // line 541
                yield "            ";
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "codProdGS1", [], "any", false, false, false, 541)) {
                    // line 542
                    yield "            <cac:StandardItemIdentification>
                <cbc:ID>";
                    // line 543
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "codProdGS1", [], "any", false, false, false, 543);
                    yield "</cbc:ID>
            </cac:StandardItemIdentification>
            ";
                }
                // line 546
                yield "            ";
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "codProdSunat", [], "any", false, false, false, 546)) {
                    // line 547
                    yield "            <cac:CommodityClassification>
                <cbc:ItemClassificationCode>";
                    // line 548
                    yield CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "codProdSunat", [], "any", false, false, false, 548);
                    yield "</cbc:ItemClassificationCode>
            </cac:CommodityClassification>
            ";
                }
                // line 551
                yield "            ";
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "atributos", [], "any", false, false, false, 551)) {
                    // line 552
                    yield "                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "atributos", [], "any", false, false, false, 552));
                    $context['loop'] = [
                      'parent' => $context['_parent'],
                      'index0' => 0,
                      'index'  => 1,
                      'first'  => true,
                    ];
                    if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                        $length = count($context['_seq']);
                        $context['loop']['revindex0'] = $length - 1;
                        $context['loop']['revindex'] = $length;
                        $context['loop']['length'] = $length;
                        $context['loop']['last'] = 1 === $length;
                    }
                    foreach ($context['_seq'] as $context["_key"] => $context["atr"]) {
                        // line 553
                        yield "                    <cac:AdditionalItemProperty >
                        <cbc:Name>";
                        // line 554
                        yield CoreExtension::getAttribute($this->env, $this->source, ($context["atr"] ?? null), "name", [], "any", false, false, false, 554);
                        yield "</cbc:Name>
                        <cbc:NameCode>";
                        // line 555
                        yield CoreExtension::getAttribute($this->env, $this->source, ($context["atr"] ?? null), "code", [], "any", false, false, false, 555);
                        yield "</cbc:NameCode>
                        ";
                        // line 556
                        if ( !(null === CoreExtension::getAttribute($this->env, $this->source, ($context["atr"] ?? null), "value", [], "any", false, false, false, 556))) {
                            // line 557
                            yield "                        <cbc:Value>";
                            yield CoreExtension::getAttribute($this->env, $this->source, ($context["atr"] ?? null), "value", [], "any", false, false, false, 557);
                            yield "</cbc:Value>
                        ";
                        }
                        // line 559
                        yield "                        ";
                        if (((CoreExtension::getAttribute($this->env, $this->source, ($context["atr"] ?? null), "fecInicio", [], "any", false, false, false, 559) || CoreExtension::getAttribute($this->env, $this->source, ($context["atr"] ?? null), "fecFin", [], "any", false, false, false, 559)) || CoreExtension::getAttribute($this->env, $this->source, ($context["atr"] ?? null), "duracion", [], "any", false, false, false, 559))) {
                            // line 560
                            yield "                            <cac:UsabilityPeriod>
                                ";
                            // line 561
                            if (CoreExtension::getAttribute($this->env, $this->source, ($context["atr"] ?? null), "fecInicio", [], "any", false, false, false, 561)) {
                                // line 562
                                yield "                                <cbc:StartDate>";
                                yield $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, ($context["atr"] ?? null), "fecInicio", [], "any", false, false, false, 562), "Y-m-d");
                                yield "</cbc:StartDate>
                                ";
                            }
                            // line 564
                            yield "                                ";
                            if (CoreExtension::getAttribute($this->env, $this->source, ($context["atr"] ?? null), "fecFin", [], "any", false, false, false, 564)) {
                                // line 565
                                yield "                                <cbc:EndDate>";
                                yield $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, ($context["atr"] ?? null), "fecFin", [], "any", false, false, false, 565), "Y-m-d");
                                yield "</cbc:EndDate>
                                ";
                            }
                            // line 567
                            yield "                                ";
                            if (CoreExtension::getAttribute($this->env, $this->source, ($context["atr"] ?? null), "duracion", [], "any", false, false, false, 567)) {
                                // line 568
                                yield "                                <cbc:DurationMeasure unitCode=\"DAY\">";
                                yield CoreExtension::getAttribute($this->env, $this->source, ($context["atr"] ?? null), "duracion", [], "any", false, false, false, 568);
                                yield "</cbc:DurationMeasure>
                                ";
                            }
                            // line 570
                            yield "                            </cac:UsabilityPeriod>
                        ";
                        }
                        // line 572
                        yield "                    </cac:AdditionalItemProperty>
                ";
                        ++$context['loop']['index0'];
                        ++$context['loop']['index'];
                        $context['loop']['first'] = false;
                        if (isset($context['loop']['length'])) {
                            --$context['loop']['revindex0'];
                            --$context['loop']['revindex'];
                            $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['atr'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 574
                    yield "            ";
                }
                // line 575
                yield "        </cac:Item>
        <cac:Price>
            <cbc:PriceAmount currencyID=\"";
                // line 577
                yield CoreExtension::getAttribute($this->env, $this->source, ($context["doc"] ?? null), "tipoMoneda", [], "any", false, false, false, 577);
                yield "\">";
                yield $this->env->getFilter('n_format_limit')->getCallable()(CoreExtension::getAttribute($this->env, $this->source, ($context["detail"] ?? null), "mtoValorUnitario", [], "any", false, false, false, 577), 10);
                yield "</cbc:PriceAmount>
        </cac:Price>
    </cac:InvoiceLine>
    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['detail'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 581
            yield "</Invoice>
";
            return; yield '';
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 1
        yield Twig\Extension\CoreExtension::spaceless($___internal_parse_0_);
        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "invoice2.1.xml.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  1803 => 1,  1798 => 581,  1778 => 577,  1774 => 575,  1771 => 574,  1756 => 572,  1752 => 570,  1746 => 568,  1743 => 567,  1737 => 565,  1734 => 564,  1728 => 562,  1726 => 561,  1723 => 560,  1720 => 559,  1714 => 557,  1712 => 556,  1708 => 555,  1704 => 554,  1701 => 553,  1683 => 552,  1680 => 551,  1674 => 548,  1671 => 547,  1668 => 546,  1662 => 543,  1659 => 542,  1656 => 541,  1650 => 538,  1647 => 537,  1645 => 536,  1641 => 535,  1637 => 533,  1623 => 524,  1618 => 522,  1612 => 521,  1609 => 520,  1606 => 519,  1594 => 510,  1587 => 508,  1581 => 507,  1578 => 506,  1576 => 505,  1569 => 501,  1565 => 500,  1561 => 499,  1558 => 498,  1556 => 497,  1552 => 496,  1548 => 495,  1541 => 493,  1535 => 492,  1532 => 491,  1520 => 482,  1516 => 481,  1509 => 479,  1503 => 478,  1500 => 477,  1498 => 476,  1492 => 475,  1489 => 474,  1486 => 473,  1467 => 470,  1461 => 469,  1457 => 468,  1453 => 467,  1449 => 465,  1431 => 464,  1428 => 463,  1425 => 462,  1406 => 459,  1400 => 458,  1396 => 457,  1392 => 456,  1388 => 454,  1370 => 453,  1368 => 452,  1365 => 451,  1356 => 447,  1353 => 446,  1344 => 442,  1341 => 441,  1339 => 440,  1332 => 438,  1326 => 437,  1322 => 436,  1319 => 435,  1302 => 434,  1294 => 432,  1286 => 430,  1283 => 429,  1275 => 427,  1272 => 426,  1264 => 424,  1261 => 423,  1253 => 421,  1250 => 420,  1242 => 418,  1240 => 417,  1234 => 416,  1230 => 414,  1215 => 404,  1212 => 403,  1209 => 402,  1194 => 392,  1188 => 391,  1185 => 390,  1182 => 389,  1167 => 379,  1161 => 378,  1158 => 377,  1155 => 376,  1142 => 366,  1136 => 365,  1133 => 364,  1130 => 363,  1115 => 353,  1109 => 352,  1106 => 351,  1103 => 350,  1090 => 340,  1084 => 339,  1081 => 338,  1078 => 337,  1065 => 327,  1059 => 326,  1056 => 325,  1053 => 324,  1038 => 314,  1032 => 313,  1029 => 312,  1026 => 311,  1011 => 301,  1005 => 300,  1002 => 299,  1000 => 298,  994 => 297,  991 => 296,  985 => 293,  981 => 292,  977 => 291,  973 => 290,  969 => 288,  966 => 287,  963 => 286,  960 => 285,  941 => 282,  934 => 281,  928 => 279,  926 => 278,  922 => 277,  918 => 275,  900 => 274,  897 => 273,  894 => 272,  875 => 269,  869 => 268,  865 => 267,  861 => 266,  857 => 264,  839 => 263,  836 => 262,  833 => 261,  814 => 258,  810 => 257,  807 => 256,  789 => 255,  786 => 254,  783 => 253,  766 => 250,  760 => 249,  756 => 248,  752 => 246,  734 => 245,  731 => 244,  727 => 242,  719 => 240,  717 => 239,  713 => 238,  709 => 236,  706 => 235,  700 => 232,  696 => 230,  693 => 229,  687 => 226,  683 => 225,  679 => 224,  671 => 219,  666 => 217,  662 => 215,  659 => 214,  656 => 213,  647 => 207,  641 => 204,  636 => 202,  632 => 201,  627 => 200,  621 => 198,  619 => 197,  615 => 196,  610 => 193,  607 => 192,  604 => 191,  599 => 188,  595 => 186,  589 => 184,  586 => 183,  580 => 181,  578 => 180,  575 => 179,  573 => 178,  570 => 177,  563 => 173,  557 => 170,  554 => 169,  548 => 167,  546 => 166,  543 => 165,  540 => 164,  538 => 163,  534 => 162,  526 => 159,  521 => 156,  518 => 155,  516 => 154,  512 => 152,  508 => 150,  502 => 148,  499 => 147,  493 => 145,  491 => 144,  488 => 143,  486 => 142,  483 => 141,  476 => 137,  470 => 134,  467 => 133,  461 => 131,  459 => 130,  456 => 129,  453 => 128,  451 => 127,  447 => 126,  439 => 123,  434 => 120,  432 => 119,  428 => 117,  424 => 115,  418 => 113,  415 => 112,  409 => 110,  407 => 109,  404 => 108,  402 => 107,  395 => 103,  389 => 100,  384 => 98,  380 => 97,  375 => 96,  369 => 94,  367 => 93,  363 => 92,  359 => 91,  356 => 90,  354 => 89,  350 => 88,  347 => 87,  341 => 84,  338 => 83,  336 => 82,  331 => 80,  316 => 68,  310 => 65,  304 => 62,  301 => 61,  298 => 60,  279 => 55,  273 => 52,  269 => 51,  265 => 50,  262 => 49,  244 => 48,  241 => 47,  238 => 46,  221 => 43,  217 => 42,  214 => 41,  196 => 40,  193 => 39,  190 => 38,  173 => 35,  169 => 34,  166 => 33,  148 => 32,  145 => 31,  139 => 28,  136 => 27,  134 => 26,  129 => 25,  123 => 23,  120 => 22,  101 => 20,  84 => 19,  77 => 18,  71 => 16,  69 => 15,  65 => 14,  61 => 13,  55 => 12,  51 => 10,  49 => 9,  40 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% apply spaceless %}
<?xml version=\"1.0\" encoding=\"utf-8\"?>
<Invoice xmlns=\"urn:oasis:names:specification:ubl:schema:xsd:Invoice-2\" xmlns:cac=\"urn:oasis:names:specification:ubl:schema:xsd:CommonAggregateComponents-2\" xmlns:cbc=\"urn:oasis:names:specification:ubl:schema:xsd:CommonBasicComponents-2\" xmlns:ds=\"http://www.w3.org/2000/09/xmldsig#\" xmlns:ext=\"urn:oasis:names:specification:ubl:schema:xsd:CommonExtensionComponents-2\">
    <ext:UBLExtensions>
        <ext:UBLExtension>
            <ext:ExtensionContent/>
        </ext:UBLExtension>
    </ext:UBLExtensions>
    {% set emp = doc.company %}
    <cbc:UBLVersionID>2.1</cbc:UBLVersionID>
    <cbc:CustomizationID>2.0</cbc:CustomizationID>
    <cbc:ID>{{ doc.serie }}-{{ doc.correlativo }}</cbc:ID>
    <cbc:IssueDate>{{ doc.fechaEmision|date('Y-m-d') }}</cbc:IssueDate>
    <cbc:IssueTime>{{ doc.fechaEmision|date('H:i:s') }}</cbc:IssueTime>
    {% if doc.fecVencimiento %}
    <cbc:DueDate>{{ doc.fecVencimiento|date('Y-m-d') }}</cbc:DueDate>
    {% endif %}
    <cbc:InvoiceTypeCode listID=\"{{ doc.tipoOperacion }}\">{{ doc.tipoDoc }}</cbc:InvoiceTypeCode>
    {% for leg in doc.legends %}
    <cbc:Note languageLocaleID=\"{{ leg.code }}\"><![CDATA[{{ leg.value }}]]></cbc:Note>
    {% endfor %}
    {% if doc.observacion %}
    <cbc:Note><![CDATA[{{ doc.observacion }}]]></cbc:Note>
    {% endif %}
    <cbc:DocumentCurrencyCode>{{ doc.tipoMoneda }}</cbc:DocumentCurrencyCode>
    {% if doc.compra %}
    <cac:OrderReference>
        <cbc:ID>{{ doc.compra }}</cbc:ID>
    </cac:OrderReference>
    {% endif %}
    {% if doc.guias %}
    {% for guia in doc.guias %}
    <cac:DespatchDocumentReference>
        <cbc:ID>{{ guia.nroDoc }}</cbc:ID>
        <cbc:DocumentTypeCode>{{ guia.tipoDoc }}</cbc:DocumentTypeCode>
    </cac:DespatchDocumentReference>
    {% endfor %}
    {% endif %}
    {% if doc.relDocs %}
    {% for rel in doc.relDocs %}
    <cac:AdditionalDocumentReference>
        <cbc:ID>{{ rel.nroDoc }}</cbc:ID>
        <cbc:DocumentTypeCode>{{ rel.tipoDoc }}</cbc:DocumentTypeCode>
    </cac:AdditionalDocumentReference>
    {% endfor %}
    {% endif %}
    {% if doc.anticipos %}
    {% for ant in doc.anticipos %}
    <cac:AdditionalDocumentReference>
        <cbc:ID>{{ ant.nroDocRel }}</cbc:ID>
        <cbc:DocumentTypeCode>{{ ant.tipoDocRel }}</cbc:DocumentTypeCode>
        <cbc:DocumentStatusCode>{{ loop.index }}</cbc:DocumentStatusCode>
        <cac:IssuerParty>
            <cac:PartyIdentification>
                <cbc:ID schemeID=\"6\">{{ emp.ruc }}</cbc:ID>
            </cac:PartyIdentification>
        </cac:IssuerParty>
    </cac:AdditionalDocumentReference>
    {% endfor %}
    {% endif %}
    <cac:Signature>
        <cbc:ID>{{ emp.ruc }}</cbc:ID>
        <cac:SignatoryParty>
            <cac:PartyIdentification>
                <cbc:ID>{{ emp.ruc }}</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyName>
                <cbc:Name><![CDATA[{{ emp.razonSocial|raw }}]]></cbc:Name>
            </cac:PartyName>
        </cac:SignatoryParty>
        <cac:DigitalSignatureAttachment>
            <cac:ExternalReference>
                <cbc:URI>#GREENTER-SIGN</cbc:URI>
            </cac:ExternalReference>
        </cac:DigitalSignatureAttachment>
    </cac:Signature>
    <cac:AccountingSupplierParty>
        <cac:Party>
            <cac:PartyIdentification>
                <cbc:ID schemeID=\"6\">{{ emp.ruc }}</cbc:ID>
            </cac:PartyIdentification>
\t\t\t{% if emp.nombreComercial %}
            <cac:PartyName>
                <cbc:Name><![CDATA[{{ emp.nombreComercial|raw }}]]></cbc:Name>
            </cac:PartyName>
\t\t\t{% endif %}
            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[{{ emp.razonSocial|raw }}]]></cbc:RegistrationName>
                {% set addr = emp.address %}
                <cac:RegistrationAddress>
                    <cbc:ID>{{ addr.ubigueo }}</cbc:ID>
                    <cbc:AddressTypeCode>{{ addr.codLocal }}</cbc:AddressTypeCode>
                    {% if addr.urbanizacion %}
                    <cbc:CitySubdivisionName>{{ addr.urbanizacion }}</cbc:CitySubdivisionName>
                    {% endif %}
                    <cbc:CityName>{{ addr.provincia }}</cbc:CityName>
                    <cbc:CountrySubentity>{{ addr.departamento }}</cbc:CountrySubentity>
                    <cbc:District>{{ addr.distrito }}</cbc:District>
                    <cac:AddressLine>
                        <cbc:Line><![CDATA[{{ addr.direccion|raw }}]]></cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode>{{ addr.codigoPais }}</cbc:IdentificationCode>
                    </cac:Country>
                </cac:RegistrationAddress>
            </cac:PartyLegalEntity>
            {% if emp.email or emp.telephone %}
            <cac:Contact>
                {% if emp.telephone %}
                <cbc:Telephone>{{ emp.telephone }}</cbc:Telephone>
                {% endif %}
                {% if emp.email %}
                <cbc:ElectronicMail>{{ emp.email }}</cbc:ElectronicMail>
                {% endif %}
            </cac:Contact>
            {% endif %}
        </cac:Party>
    </cac:AccountingSupplierParty>
    {% set client = doc.client %}
    <cac:AccountingCustomerParty>
        <cac:Party>
            <cac:PartyIdentification>
                <cbc:ID schemeID=\"{{ client.tipoDoc }}\">{{ client.numDoc }}</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[{{ client.rznSocial|raw }}]]></cbc:RegistrationName>
                {% if client.address %}
                {% set addr = client.address %}
                <cac:RegistrationAddress>
                    {% if addr.ubigueo %}
                    <cbc:ID>{{ addr.ubigueo }}</cbc:ID>
                    {% endif %}
                    <cac:AddressLine>
                        <cbc:Line><![CDATA[{{ addr.direccion|raw }}]]></cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode>{{ addr.codigoPais }}</cbc:IdentificationCode>
                    </cac:Country>
                </cac:RegistrationAddress>
                {% endif %}
            </cac:PartyLegalEntity>
            {% if client.email or client.telephone %}
            <cac:Contact>
                {% if client.telephone %}
                <cbc:Telephone>{{ client.telephone }}</cbc:Telephone>
                {% endif %}
                {% if client.email %}
                <cbc:ElectronicMail>{{ client.email }}</cbc:ElectronicMail>
                {% endif %}
            </cac:Contact>
            {% endif %}
        </cac:Party>
    </cac:AccountingCustomerParty>
    {% set seller = doc.seller %}
    {% if seller %}
    <cac:SellerSupplierParty>
        <cac:Party>
            <cac:PartyIdentification>
                <cbc:ID schemeID=\"{{ seller.tipoDoc }}\">{{ seller.numDoc }}</cbc:ID>
            </cac:PartyIdentification>
            <cac:PartyLegalEntity>
                <cbc:RegistrationName><![CDATA[{{ seller.rznSocial|raw }}]]></cbc:RegistrationName>
                {% if seller.address %}
                {% set addr = seller.address %}
                <cac:RegistrationAddress>
                    {% if addr.ubigueo %}
                    <cbc:ID>{{ addr.ubigueo }}</cbc:ID>
                    {% endif %}
                    <cac:AddressLine>
                        <cbc:Line><![CDATA[{{ addr.direccion|raw }}]]></cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode>{{ addr.codigoPais }}</cbc:IdentificationCode>
                    </cac:Country>
                </cac:RegistrationAddress>
                {% endif %}
            </cac:PartyLegalEntity>
            {% if seller.email or seller.telephone %}
            <cac:Contact>
                {% if seller.telephone %}
                <cbc:Telephone>{{ seller.telephone }}</cbc:Telephone>
                {% endif %}
                {% if seller.email %}
                <cbc:ElectronicMail>{{ seller.email }}</cbc:ElectronicMail>
                {% endif %}
            </cac:Contact>
            {% endif %}
        </cac:Party>
    </cac:SellerSupplierParty>
    {% endif %}
    {% if doc.direccionEntrega %}
        {% set addr = doc.direccionEntrega %}
        <cac:Delivery>
            <cac:DeliveryLocation>
                <cac:Address>
                    <cbc:ID>{{ addr.ubigueo }}</cbc:ID>
                    {% if addr.urbanizacion %}
                    <cbc:CitySubdivisionName>{{ addr.urbanizacion }}</cbc:CitySubdivisionName>
                    {% endif %}
                    <cbc:CityName>{{ addr.provincia }}</cbc:CityName>
                    <cbc:CountrySubentity>{{ addr.departamento }}</cbc:CountrySubentity>
                    <cbc:District>{{ addr.distrito }}</cbc:District>
                    <cac:AddressLine>
                        <cbc:Line><![CDATA[{{ addr.direccion|raw }}]]></cbc:Line>
                    </cac:AddressLine>
                    <cac:Country>
                        <cbc:IdentificationCode listID=\"ISO 3166-1\" listAgencyName=\"United Nations Economic Commission for Europe\" listName=\"Country\">{{ addr.codigoPais }}</cbc:IdentificationCode>
                    </cac:Country>
                </cac:Address>
            </cac:DeliveryLocation>
        </cac:Delivery>
    {% endif %}
    {% if doc.detraccion %}
    {% set detr = doc.detraccion %}
    <cac:PaymentMeans>
        <cbc:ID>Detraccion</cbc:ID>
        <cbc:PaymentMeansCode>{{ detr.codMedioPago }}</cbc:PaymentMeansCode>
        <cac:PayeeFinancialAccount>
            <cbc:ID>{{ detr.ctaBanco }}</cbc:ID>
        </cac:PayeeFinancialAccount>
    </cac:PaymentMeans>
    <cac:PaymentTerms>
        <cbc:ID>Detraccion</cbc:ID>
        <cbc:PaymentMeansID>{{ detr.codBienDetraccion }}</cbc:PaymentMeansID>
        <cbc:PaymentPercent>{{ detr.percent }}</cbc:PaymentPercent>
        <cbc:Amount currencyID=\"PEN\">{{ detr.mount|n_format }}</cbc:Amount>
    </cac:PaymentTerms>
    {% endif %}
    {% if doc.perception %}
    <cac:PaymentTerms>
        <cbc:ID>Percepcion</cbc:ID>
        <cbc:Amount currencyID=\"PEN\">{{ doc.perception.mtoTotal|n_format }}</cbc:Amount>
    </cac:PaymentTerms>
    {% endif %}
    {% if doc.formaPago %}
    <cac:PaymentTerms>
        <cbc:ID>FormaPago</cbc:ID>
        <cbc:PaymentMeansID>{{ doc.formaPago.tipo }}</cbc:PaymentMeansID>
        {% if doc.formaPago.monto %}
        <cbc:Amount currencyID=\"{{ doc.formaPago.moneda|default(doc.tipoMoneda) }}\">{{ doc.formaPago.monto|n_format }}</cbc:Amount>
        {% endif %}
    </cac:PaymentTerms>
    {% endif %}
    {% if doc.cuotas %}
    {% for cuota in doc.cuotas %}
    <cac:PaymentTerms>
        <cbc:ID>FormaPago</cbc:ID>
        <cbc:PaymentMeansID>Cuota{{ \"%03d\"|format(loop.index) }}</cbc:PaymentMeansID>
        <cbc:Amount currencyID=\"{{ cuota.moneda|default(doc.tipoMoneda) }}\">{{ cuota.monto|n_format }}</cbc:Amount>
        <cbc:PaymentDueDate>{{ cuota.fechaPago|date('Y-m-d') }}</cbc:PaymentDueDate>
    </cac:PaymentTerms>
    {% endfor %}
    {% endif %}
    {% if doc.anticipos %}
    {% for ant in doc.anticipos %}
    <cac:PrepaidPayment>
        <cbc:ID>{{ loop.index }}</cbc:ID>
        <cbc:PaidAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ ant.total|n_format }}</cbc:PaidAmount>
    </cac:PrepaidPayment>
    {% endfor %}
    {% endif %}
    {% if doc.cargos %}
    {% for cargo in doc.cargos %}
    <cac:AllowanceCharge>
        <cbc:ChargeIndicator>true</cbc:ChargeIndicator>
        <cbc:AllowanceChargeReasonCode>{{ cargo.codTipo }}</cbc:AllowanceChargeReasonCode>
        <cbc:MultiplierFactorNumeric>{{ cargo.factor|n_format_limit(5) }}</cbc:MultiplierFactorNumeric>
        <cbc:Amount currencyID=\"{{ doc.tipoMoneda }}\">{{ cargo.monto|n_format }}</cbc:Amount>
        <cbc:BaseAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ cargo.montoBase|n_format }}</cbc:BaseAmount>
    </cac:AllowanceCharge>
    {% endfor %}
    {% endif %}
    {% if doc.descuentos %}
    {% for desc in doc.descuentos %}
    <cac:AllowanceCharge>
        <cbc:ChargeIndicator>false</cbc:ChargeIndicator>
        <cbc:AllowanceChargeReasonCode>{{ desc.codTipo }}</cbc:AllowanceChargeReasonCode>
        {% if desc.factor is not null %}
        <cbc:MultiplierFactorNumeric>{{ desc.factor|n_format_limit(5) }}</cbc:MultiplierFactorNumeric>
        {% endif %}
        <cbc:Amount currencyID=\"{{ doc.tipoMoneda }}\">{{ desc.monto|n_format }}</cbc:Amount>
        <cbc:BaseAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ desc.montoBase|n_format }}</cbc:BaseAmount>
    </cac:AllowanceCharge>
    {% endfor %}
    {% endif %}
    {% if doc.perception %}
    {% set perc = doc.perception %}
    <cac:AllowanceCharge>
        <cbc:ChargeIndicator>true</cbc:ChargeIndicator>
        <cbc:AllowanceChargeReasonCode>{{ perc.codReg }}</cbc:AllowanceChargeReasonCode>
        <cbc:MultiplierFactorNumeric>{{ perc.porcentaje|n_format_limit(5) }}</cbc:MultiplierFactorNumeric>
        <cbc:Amount currencyID=\"PEN\">{{ perc.mto|n_format }}</cbc:Amount>
        <cbc:BaseAmount currencyID=\"PEN\">{{ perc.mtoBase|n_format }}</cbc:BaseAmount>
    </cac:AllowanceCharge>
    {% endif %}
    <cac:TaxTotal>
        <cbc:TaxAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ doc.totalImpuestos|n_format }}</cbc:TaxAmount>
        {% if doc.mtoISC %}
        <cac:TaxSubtotal>
            <cbc:TaxableAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ doc.mtoBaseIsc|n_format }}</cbc:TaxableAmount>
            <cbc:TaxAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ doc.mtoISC|n_format }}</cbc:TaxAmount>
            <cac:TaxCategory>
                <cac:TaxScheme>
                    <cbc:ID>2000</cbc:ID>
                    <cbc:Name>ISC</cbc:Name>
                    <cbc:TaxTypeCode>EXC</cbc:TaxTypeCode>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
        {% endif %}
        {% if doc.mtoOperGravadas %}
        <cac:TaxSubtotal>
            <cbc:TaxableAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ doc.mtoOperGravadas|n_format }}</cbc:TaxableAmount>
            <cbc:TaxAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ doc.mtoIGV|n_format }}</cbc:TaxAmount>
            <cac:TaxCategory>
                <cac:TaxScheme>
                    <cbc:ID>1000</cbc:ID>
                    <cbc:Name>IGV</cbc:Name>
                    <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
        {% endif %}
        {% if doc.mtoOperInafectas %}
            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ doc.mtoOperInafectas|n_format }}</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"{{ doc.tipoMoneda }}\">0</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9998</cbc:ID>
                        <cbc:Name>INA</cbc:Name>
                        <cbc:TaxTypeCode>FRE</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        {% endif %}
        {% if doc.mtoOperExoneradas %}
            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ doc.mtoOperExoneradas|n_format }}</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"{{ doc.tipoMoneda }}\">0</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9997</cbc:ID>
                        <cbc:Name>EXO</cbc:Name>
                        <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        {% endif %}
        {% if doc.mtoOperGratuitas %}
            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ doc.mtoOperGratuitas|n_format }}</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ doc.mtoIGVGratuitas|n_format }}</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9996</cbc:ID>
                        <cbc:Name>GRA</cbc:Name>
                        <cbc:TaxTypeCode>FRE</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        {% endif %}
        {% if doc.mtoOperExportacion %}
            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ doc.mtoOperExportacion|n_format }}</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"{{ doc.tipoMoneda }}\">0</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>9995</cbc:ID>
                        <cbc:Name>EXP</cbc:Name>
                        <cbc:TaxTypeCode>FRE</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        {% endif %}
        {% if doc.mtoIvap %}
        <cac:TaxSubtotal>
            <cbc:TaxableAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ doc.mtoBaseIvap|n_format }}</cbc:TaxableAmount>
            <cbc:TaxAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ doc.mtoIvap|n_format }}</cbc:TaxAmount>
            <cac:TaxCategory>
                <cac:TaxScheme>
                    <cbc:ID>1016</cbc:ID>
                    <cbc:Name>IVAP</cbc:Name>
                    <cbc:TaxTypeCode>VAT</cbc:TaxTypeCode>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
        {% endif %}
        {% if doc.mtoOtrosTributos %}
        <cac:TaxSubtotal>
            <cbc:TaxableAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ doc.mtoBaseOth|n_format }}</cbc:TaxableAmount>
            <cbc:TaxAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ doc.mtoOtrosTributos|n_format }}</cbc:TaxAmount>
            <cac:TaxCategory>
                <cac:TaxScheme>
                    <cbc:ID>9999</cbc:ID>
                    <cbc:Name>OTROS</cbc:Name>
                    <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                </cac:TaxScheme>
            </cac:TaxCategory>
        </cac:TaxSubtotal>
        {% endif %}
        {% if doc.icbper %}
            <cac:TaxSubtotal>
                <cbc:TaxAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ doc.icbper|n_format }}</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cac:TaxScheme>
                        <cbc:ID>7152</cbc:ID>
                        <cbc:Name>ICBPER</cbc:Name>
                        <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
        {% endif %}
    </cac:TaxTotal>
    <cac:LegalMonetaryTotal>
        <cbc:LineExtensionAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ doc.valorVenta|n_format }}</cbc:LineExtensionAmount>
        {% if doc.subTotal is not null %}
        <cbc:TaxInclusiveAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ doc.subTotal|n_format }}</cbc:TaxInclusiveAmount>
        {% endif %}
        {% if doc.sumOtrosDescuentos is not null %}
        <cbc:AllowanceTotalAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ doc.sumOtrosDescuentos|n_format }}</cbc:AllowanceTotalAmount>
        {% endif %}
        {% if doc.sumOtrosCargos is not null %}
        <cbc:ChargeTotalAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ doc.sumOtrosCargos|n_format }}</cbc:ChargeTotalAmount>
        {% endif %}
        {% if doc.totalAnticipos is not null %}
        <cbc:PrepaidAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ doc.totalAnticipos|n_format }}</cbc:PrepaidAmount>
        {% endif %}
        {% if doc.redondeo is not null %}
        <cbc:PayableRoundingAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ doc.redondeo|n_format }}</cbc:PayableRoundingAmount>
        {% endif %}
        <cbc:PayableAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ doc.mtoImpVenta|n_format }}</cbc:PayableAmount>
    </cac:LegalMonetaryTotal>
    {% for detail in doc.details %}
    <cac:InvoiceLine>
        <cbc:ID>{{ loop.index }}</cbc:ID>
        <cbc:InvoicedQuantity unitCode=\"{{ detail.unidad }}\">{{ detail.cantidad }}</cbc:InvoicedQuantity>
        <cbc:LineExtensionAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ detail.mtoValorVenta|n_format }}</cbc:LineExtensionAmount>
        <cac:PricingReference>
            {% if detail.mtoValorGratuito %}
            <cac:AlternativeConditionPrice>
                <cbc:PriceAmount currencyID=\"{{ doc.tipoMoneda }}\">{{  detail.mtoValorGratuito|n_format_limit(10) }}</cbc:PriceAmount>
                <cbc:PriceTypeCode>02</cbc:PriceTypeCode>
            </cac:AlternativeConditionPrice>
            {% else %}
            <cac:AlternativeConditionPrice>
                <cbc:PriceAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ detail.mtoPrecioUnitario|n_format_limit(10) }}</cbc:PriceAmount>
                <cbc:PriceTypeCode>01</cbc:PriceTypeCode>
            </cac:AlternativeConditionPrice>
            {% endif %}
        </cac:PricingReference>
        {% if detail.cargos %}
        {% for cargo in detail.cargos %}
        <cac:AllowanceCharge>
            <cbc:ChargeIndicator>true</cbc:ChargeIndicator>
            <cbc:AllowanceChargeReasonCode>{{ cargo.codTipo }}</cbc:AllowanceChargeReasonCode>
            <cbc:MultiplierFactorNumeric>{{ cargo.factor|n_format_limit(5) }}</cbc:MultiplierFactorNumeric>
            <cbc:Amount currencyID=\"{{ doc.tipoMoneda }}\">{{ cargo.monto }}</cbc:Amount>
            <cbc:BaseAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ cargo.montoBase }}</cbc:BaseAmount>
        </cac:AllowanceCharge>
        {% endfor %}
        {% endif %}
        {% if detail.descuentos %}
        {% for desc in detail.descuentos %}
        <cac:AllowanceCharge>
            <cbc:ChargeIndicator>false</cbc:ChargeIndicator>
            <cbc:AllowanceChargeReasonCode>{{ desc.codTipo }}</cbc:AllowanceChargeReasonCode>
            <cbc:MultiplierFactorNumeric>{{ desc.factor|n_format_limit(5) }}</cbc:MultiplierFactorNumeric>
            <cbc:Amount currencyID=\"{{ doc.tipoMoneda }}\">{{ desc.monto }}</cbc:Amount>
            <cbc:BaseAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ desc.montoBase }}</cbc:BaseAmount>
        </cac:AllowanceCharge>
        {% endfor %}
        {% endif %}
        <cac:TaxTotal>
            <cbc:TaxAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ detail.totalImpuestos|n_format }}</cbc:TaxAmount>
            {% if detail.isc %}
            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ detail.mtoBaseIsc|n_format }}</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ detail.isc|n_format }}</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:Percent>{{ detail.porcentajeIsc }}</cbc:Percent>
                    <cbc:TierRange>{{ detail.tipSisIsc }}</cbc:TierRange>
                    <cac:TaxScheme>
                        <cbc:ID>2000</cbc:ID>
                        <cbc:Name>ISC</cbc:Name>
                        <cbc:TaxTypeCode>EXC</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
            {% endif %}
            <cac:TaxSubtotal>
                <cbc:TaxableAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ detail.mtoBaseIgv|n_format }}</cbc:TaxableAmount>
                <cbc:TaxAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ detail.igv|n_format }}</cbc:TaxAmount>
                <cac:TaxCategory>
                    <cbc:Percent>{{ detail.porcentajeIgv }}</cbc:Percent>
                    <cbc:TaxExemptionReasonCode>{{ detail.tipAfeIgv }}</cbc:TaxExemptionReasonCode>
                    {% set afect = getTributoAfect(detail.tipAfeIgv) %}
                    <cac:TaxScheme>
                        <cbc:ID>{{ afect.id }}</cbc:ID>
                        <cbc:Name>{{ afect.name }}</cbc:Name>
                        <cbc:TaxTypeCode>{{ afect.code }}</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
            {% if detail.otroTributo %}
                <cac:TaxSubtotal>
                    <cbc:TaxableAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ detail.mtoBaseOth|n_format }}</cbc:TaxableAmount>
                    <cbc:TaxAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ detail.otroTributo|n_format }}</cbc:TaxAmount>
                    <cac:TaxCategory>
                        <cbc:Percent>{{ detail.porcentajeOth }}</cbc:Percent>
                        <cac:TaxScheme>
                            <cbc:ID>9999</cbc:ID>
                            <cbc:Name>OTROS</cbc:Name>
                            <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                        </cac:TaxScheme>
                    </cac:TaxCategory>
                </cac:TaxSubtotal>
            {% endif %}
            {% if detail.icbper %}
            <cac:TaxSubtotal>
                <cbc:TaxAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ detail.icbper|n_format }}</cbc:TaxAmount>
                <cbc:BaseUnitMeasure unitCode=\"NIU\">{{ detail.cantidad }}</cbc:BaseUnitMeasure>
                <cac:TaxCategory>
                    <cbc:PerUnitAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ detail.factorIcbper|n_format }}</cbc:PerUnitAmount>
                    <cac:TaxScheme>
                        <cbc:ID>7152</cbc:ID>
                        <cbc:Name>ICBPER</cbc:Name>
                        <cbc:TaxTypeCode>OTH</cbc:TaxTypeCode>
                    </cac:TaxScheme>
                </cac:TaxCategory>
            </cac:TaxSubtotal>
            {% endif %}
        </cac:TaxTotal>
        <cac:Item>
            <cbc:Description><![CDATA[{{ detail.descripcion|raw }}]]></cbc:Description>
            {% if detail.codProducto %}
            <cac:SellersItemIdentification>
                <cbc:ID>{{ detail.codProducto }}</cbc:ID>
            </cac:SellersItemIdentification>
            {% endif %}
            {% if detail.codProdGS1 %}
            <cac:StandardItemIdentification>
                <cbc:ID>{{ detail.codProdGS1 }}</cbc:ID>
            </cac:StandardItemIdentification>
            {% endif %}
            {% if detail.codProdSunat %}
            <cac:CommodityClassification>
                <cbc:ItemClassificationCode>{{ detail.codProdSunat }}</cbc:ItemClassificationCode>
            </cac:CommodityClassification>
            {% endif %}
            {% if detail.atributos %}
                {% for atr in detail.atributos %}
                    <cac:AdditionalItemProperty >
                        <cbc:Name>{{ atr.name }}</cbc:Name>
                        <cbc:NameCode>{{ atr.code }}</cbc:NameCode>
                        {% if atr.value is not null %}
                        <cbc:Value>{{ atr.value }}</cbc:Value>
                        {% endif %}
                        {% if atr.fecInicio or atr.fecFin or atr.duracion %}
                            <cac:UsabilityPeriod>
                                {% if atr.fecInicio %}
                                <cbc:StartDate>{{ atr.fecInicio|date('Y-m-d') }}</cbc:StartDate>
                                {% endif %}
                                {% if atr.fecFin %}
                                <cbc:EndDate>{{ atr.fecFin|date('Y-m-d') }}</cbc:EndDate>
                                {% endif %}
                                {% if atr.duracion %}
                                <cbc:DurationMeasure unitCode=\"DAY\">{{ atr.duracion }}</cbc:DurationMeasure>
                                {% endif %}
                            </cac:UsabilityPeriod>
                        {% endif %}
                    </cac:AdditionalItemProperty>
                {% endfor %}
            {% endif %}
        </cac:Item>
        <cac:Price>
            <cbc:PriceAmount currencyID=\"{{ doc.tipoMoneda }}\">{{ detail.mtoValorUnitario|n_format_limit(10) }}</cbc:PriceAmount>
        </cac:Price>
    </cac:InvoiceLine>
    {% endfor %}
</Invoice>
{% endapply %}
", "invoice2.1.xml.twig", "C:\\xampp\\htdocs\\pharmacy\\vendor\\greenter\\xml\\src\\Xml\\Templates\\invoice2.1.xml.twig");
    }
}
