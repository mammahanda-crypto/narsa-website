<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Attestation de Travail - {{ $employee->full_name }}</title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; margin: 0; padding: 0; }
        
        /* تصميم الصفحة A4 */
        .page {
            width: 210mm;
            height: 297mm;
            padding: 20mm;
            margin: auto;
            background: white;
            position: relative;
            box-sizing: border-box;
        }

        /* الهيدر (الشعار والنصوص) */
        .header { display: flex; justify-content: space-between; text-align: center; font-size: 10pt; font-weight: bold; }
        .header img { width: 80px; }
        .header-center { margin-top: 10px; }

        /* المراجع والتاريخ */
        .info-row { display: flex; justify-content: space-between; margin-top: 40px; font-size: 11pt; }

        /* العنوان الرئيسي */
        .title {
            text-align: center;
            margin-top: 50px;
            text-decoration: underline;
            font-style: italic;
            font-size: 18pt;
            font-weight: bold;
        }

        /* نص الشهادة */
        .content { margin-top: 40px; line-height: 1.8; font-size: 12pt; text-align: justify; }
        .details { margin-top: 20px; margin-left: 30px; }
        .details div { margin-bottom: 10px; }
        .details span { display: inline-block; width: 200px; font-style: italic; }

        /* التوقيع */
        .signature {
            margin-top: 60px;
            text-align: center;
            float: right;
            width: 350px;
            font-weight: bold;
            font-size: 11pt;
        }

        /* الفوتر */
        .footer {
            position: absolute;
            bottom: 20mm;
            width: calc(100% - 40mm);
            border-top: 1px solid #000;
            padding-top: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 9pt;
        }

        /* زر الطباعة */
        .no-print {
            text-align: center;
            padding: 20px;
            background: #f4f4f4;
        }
        .btn-print {
            padding: 10px 25px;
            background: #1e40af;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        @media print {
            .no-print { display: none; }
            .page { margin: 0; border: none; width: 100%; height: 100%; }
            body { background: white; }
        }
    </style>
</head>
<body>

    <div class="no-print">
        <button class="btn-print" onclick="window.print()">Imprimer l'Attestation</button>
    </div>

    <div class="page">
        <div class="header">
            <div>
                ROYAUME DU MAROC<br>
                MINISTERE DU TRANSPORT ET DE LA LOGISTIQUE<br>
                AGENCE NATIONALE DE LA SECURITE ROUTIERE<br>
                AGENCE REGIONALE DE LA SECURITE ROUTIERE<br>
                LAAYOUNE SAKIA EL HAMRA ET DAKHLA OUADI EDDAHAB<br>
                LAAYOUNE
            </div>
            <div class="header-center">
                <img src="/images/logo_maroc.png" alt="Logo">
            </div>
            <div dir="rtl">
                المملكة المغربية<br>
                وزارة النقل واللوجستيك<br>
                الوكالة الوطنية للسلامة الطرقية<br>
                الوكالة الجهوية للسلامة الطرقية<br>
                لجهتي العيون الساقية الحمراء والداخلة وادي الذهب<br>
                العيون
            </div>
        </div>

        <div class="info-row">
            <div>N /NARSA/DRSR/LADA / ..........</div>
            <div>Laâyoune le : {{ date('d/m/Y') }}</div>
        </div>

        <div class="title">ATTESTATION DE TRAVAIL</div>

        <div class="content">
            Le Directeur Régional de l'Agence de la Sécurité Routière de Laâyoune Sakia el Hamra et Dakhla Ouadi Eddahab, atteste par la présente que :
            
            <div class="details">
                <div><span>Nom et Prénom</span>: <strong>{{ $employee->full_name }}</strong></div>
                <div><span>Grade</span>: <strong>{{ $employee->grade }}</strong></div>
                <div><span>Effet localité à la direction</span>: <strong>{{ $employee->direction }}</strong></div>
                <div><span>N° DRPP</span>: <strong>{{ $employee->drpp }}</strong></div>
                <div><span>C.I.N</span>: <strong>{{ $employee->cin }}</strong></div>
            </div>

            <p style="margin-top: 30px;">Cette attestation est délivrée à l'intéressé sur sa demande pour servir et valoir ce que de droit.</p>
        </div>

        <div class="signature">
            Le Directeur Régional de l'Agence Nationale de la Sécurité Routière<br>
            de Laâyoune Sakai El Hamra et Dakhla Oued Eddahab.
        </div>

        <div class="footer text-center">
            <div style="display: flex; align-items: center;">
                <img src="{{ asset ('/images/logo_narsa.png') }}" width="50" style="margin-right: 10px;">
                {{-- <small>NARSA</small> --}}
            </div>
            <div style="text-align: center; flex-grow: 1;">
                ملتقى شارع الزرقطوني بشارع الأمين فيلا الخير حي مولاي رشيد العيون<br>
                Croisement Avenue zarqtouni et avenue amin villa el khayr hay my rachid Laayoune<br>
                Fax : 0528997251 Tel : 0528891774
            </div>
        </div>
    </div>

</body>
</html>