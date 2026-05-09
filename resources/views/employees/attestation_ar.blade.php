<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="UTF-8">

<style>
/* ===== PAGE SETUP ===== */
body {
    font-family: 'Times New Roman', serif;
    margin: 0;
    background: #fff;
}

.page {
    width: 210mm;
    min-height: 297mm;
    margin: auto;
    padding: 15mm;
    box-sizing: border-box;
    position: relative;
}

/* ===== PRINT ===== */
@media print {
    .no-print { display: none !important; }
    body { margin: 0; }
    .page { width: 100%; min-height: 100%; padding: 10mm; }
}

/* ===== HEADER ===== */
.doc-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 25px;
}

.right-header, .left-header {
    text-align: center;
    width: 35%;
}

.logo-img {
    max-width: 80px;
    margin: 5px 0;
}

/* ===== TITLE ===== */
.doc-title {
    text-align: center;
    font-size: 22pt;
    font-weight: bold;
    margin: 25px 0;
    text-decoration: underline;
}

/* ===== BODY ===== */
.doc-body {
    font-size: 15pt;
    line-height: 1.8;
}

/* FIX TEXT OVERFLOW */
.info-row p {
    margin: 10px 0;
}

/* safer spacing than huge empty spans */
.empty-space {
    display: inline-block;
    min-width: 120px;
}

/* ===== SIGNATURE ===== */
.signature-section {
    margin-top: 60px;
    text-align: center;
}

/* ===== FOOTER ===== */
.doc-footer {
    margin-top: 40px;
    border-top: 1px solid #000;
    padding-top: 10px;
    font-size: 10pt;
    text-align: center;
}
</style>

</head>

<body>

<div class="page">
<div class="no-print" style="text-align:center; margin: 20px 0;">
    <button onclick="window.print()"
        style="padding:10px 20px; background:#059669; color:white; border:none; cursor:pointer;">
        طبع الشهادة
    </button>
</div>

<!-- HEADER -->
<div class="doc-header" style="display:flex; justify-content:space-between; align-items:flex-start;">

    <!-- RIGHT SIDE (Morocco info) -->
    <div style="text-align:center;">
        <img src="/images/logo_maroc.png" alt="Logo" style="width:100px;">

        <div dir="rtl" style="margin-top:5px;">
            المملكة المغربية<br>
            وزارة النقل واللوجستيك<br>
            الوكالة الوطنية للسلامة الطرقية<br>
            الوكالة الجهوية للسلامة الطرقية<br>
            لجهتي العيون الساقية الحمراء والداخلة وادي الذهب<br>
            العيون
        </div>
    </div>

    <!-- LEFT SIDE (NARSA logo + text UNDER it) -->
    <div style="text-align:center;">
        <img src="{{ asset('images/logo_narsa.png') }}" style="width:100px;">

        <div style="margin-top:5px; font-weight:bold;">
            NARSA<br>
            الوكالة الوطنية للسلامة الطرقية
        </div>
    </div>

</div>

    <!-- NUMBER -->
    <div style="text-align:right;">
        <p>رقم: 2021 / <span class="empty-space"></span></p>
    </div>

    <!-- TITLE -->
    <div class="doc-title">شهادة العمل</div>

    <!-- BODY -->
    <div class="doc-body">

        <p>
            إن السيد المدير الجهوي للوكالة الوطنية للسلامة الطرقية لجهة العيون الساقية الحمراء - الداخلة وادي الذهب يشهد أن السيد(ة):
        </p>

        <div class="info-row">

            <p><strong>الاسم:</strong> <span class="empty-space">{{ $employee->nom_prenom }}</span></p>

            <p><strong>الإطار:</strong> <span class="empty-space">{{ $employee->grade }}</span></p>

            <p><strong>رقم التأجير:</strong> <span class="empty-space">{{ $employee->drpp }}</span></p>

            <p><strong>رقم ب.ت.و:</strong> <span class="empty-space">{{ $employee->cin }}</span></p>

        </div>

        <p>
            يعمل بالمديرية الجهوية للوكالة الوطنية للسلامة الطرقية لجهة العيون الساقية الحمراء – الداخلة وادي الذهب.
        </p>

        <p>وقد سلمت له هذه الشهادة بطلب منه للإدلاء بها عند الاقتضاء.</p>

    </div>

    <!-- SIGNATURE -->
    <div class="signature-section">
        <p>العيون في: ....................</p>
        <p><b>عن المدير الجهوي</b></p>
    </div>

    <!-- FOOTER -->
    <div class="doc-footer">
        <p>العيون - المغرب | NARSA</p>
    </div>

</div>

</body>
</html> 