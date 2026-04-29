<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <style>
        @media print {
            .no-print { display: none !important; }
            body { margin: 0; padding: 0.5cm; }
            .doc-footer { position: absolute; bottom: 0.5cm; width: 100%; }
        }

        body { 
            font-family: 'Times New Roman', serif; 
            color: #000; 
            line-height: 1.8; 
            direction: rtl;
            margin: 40px;
            min-height: 285mm;
            position: relative;
        }

        /* --- Tashi7 l-Header o l-Logos --- */
        .doc-header {
            position: relative;
            height: 180px; /* Bach l-ktiba t-bda taht l-header */
            margin-bottom: 20px;
        }

        .right-header {
            position: absolute;
            right: 0;
            top: 0;
            text-align: center;
            width: 250px;
        }

        .left-header {
            position: absolute;
            left: 0;
            top: 0;
            text-align: center;
            width: 200px;
        }

        .logo-img {
            max-width: 90px;
            height: auto;
            display: block;
            margin: 5px auto;
        }

        .doc-title {
            text-align: center;
            margin: 40px 0;
            font-size: 24pt;
            font-weight: bold;
            text-decoration: underline;
        }

        .doc-body {
            margin: 0 20px;
            font-size: 16pt;
        }

        /* --- Tashi7 l-Espace --- */
        .empty-space {
            display: inline-block;
            min-width: 200px; /* Bach y-koun l-espace mzyan m-bayn l-ktiba */
            padding: 0 10px;
        }

        .info-row {
            margin-top: 30px;
            margin-right: 40px;
        }

        .info-row p { 
            margin: 15px 0; 
            display: flex;
            align-items: baseline;
        }

        .signature-section {
            margin-top: 60px;
            text-align: center;
            width: 450px;
            margin-left: 20px;
        }

        .doc-footer {
            border-top: 1.5px solid #000;
            padding-top: 15px;
            text-align: center;
            width: 100%;
        }

        .footer-content {
            font-size: 10pt;
            line-height: 1.4;
        }
    </style>
</head>
<body>

    <button class="no-print" style="padding:10px; background:#059669; color:white; border:none; cursor:pointer;" onclick="window.print()">طبع الشهادة</button>

    <div class="doc-header">
        <div class="right-header">
            <p style="margin: 0;">المملكة المغربية</p>
            <img src="{{ asset('images/logo_maroc.png') }}" class="logo-img" alt="Logo Maroc">
            <p style="margin: 2px 0;">وزارة النقل واللوجستيك</p>
            <p style="margin: 2px 0;">الوكالة الوطنية للسلامة الطرقية</p>
            <p style="margin: 2px 0;">المديرية الجهوية للعيون</p>
        </div>

        <div class="left-header">
            <img src="{{ asset('images/logo_narsa.png') }}" class="logo-img" alt="Logo NARSA">
            <p style="margin: 0;">نارسا</p>
            <p style="margin: 0;">NARSA</p>
        </div>
    </div>

    <div style="text-align: right; margin-right: 50px; margin-top: 100px;">
        <p>رقم: 2021 / <span class="empty-space"></span></p>
    </div>

    <div class="doc-title">شهادة العمل</div>

    <div class="doc-body">
        <p>إن السيد المدير الجهوي للوكالة الوطنية للسلامة الطرقية لجهة العيون الساقية الحمراء - الداخلة وادي الذهب يشهد أن السيد(ة):</p>
        
        <div class="info-row">
            <p><strong>الاسم العائلي والشخصي:</strong> <span class="empty-space">{{ $emp->nom_prenom }}</span></p>
            <p><strong>الإطار:</strong> <span class="empty-space">{{ $emp->grade }}</span></p>
            <p><strong>تاريخ التعيين بالمديرية:</strong> <span class="empty-space"></span></p>
            <p><strong>رقم التأجير:</strong> <span class="empty-space">{{ $emp->drpp }}</span></p>
            <p><strong>رقم ب.ت.و:</strong> <span class="empty-space">{{ $emp->cin }}</span></p>
        </div>

        <p style="margin-top: 30px;">
            يعمل <span class="empty-space"></span> بالمديرية الجهوية للوكالة الوطنية للسلامة الطرقية لجهة العيون الساقية الحمراء - الداخلة وادي الذهب.
        </p>
        
        <p>وقد سلمت له هذه الشهادة بطلب منه للإدلاء بها عند الاقتضاء.</p>
    </div>

    <div class="signature-section">
        <p>العيون في: ...........................</p>
        <p style="margin-top: 15px; font-weight: bold;">
            عن المدير الجهوي للوكالة الوطنية للسلامة الطرقية لجهة العيون الساقية الحمراء – الداخلة وادي الذهب
        </p>
    </div>

    <div class="doc-footer">
        <div class="footer-content">
            <p>ملتقى شارع الزرقطوني بشارع الأمين فيلا الخير حي مولاي رشيد العيون</p>
            <p>Croisement Avenue Zarqtouni et Avenue Amin Villa el Khayr hay My Rachid Laayoune</p>
            <p>Fax: 0528997251 Tel: 0528891774</p>
        </div>
    </div>

</body>
</html>