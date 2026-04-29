<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <style>
        @media print {
            .no-print { display: none; }
            body { margin: 0; padding: 0; }
        }
        body { font-family: 'DejaVu Sans', sans-serif; direction: rtl; padding: 40px; }
        .header { display: flex; justify-content: space-between; margin-bottom: 50px; }
        .center { text-align: center; margin-top: 20px; }
        .content { margin-top: 50px; line-height: 2; font-size: 18px; }
        .footer { margin-top: 100px; text-align: left; margin-left: 50px; }
        .narsa-logo { width: 150px; }
        .info-table { width: 100%; margin-top: 20px; }
        .info-table td { padding: 5px; }
    </style>
</head>
<body>
    <div class="no-print">
        <button onclick="window.print()" style="padding: 10px 20px; background: #2563eb; color: white; border: none; cursor: pointer;">
            Cliquer pour imprimer (PDF)
        </button>
    </div>

    <div id="print-area">
        <div class="header">
            <div style="text-align: right;">
                <p>المملكة المغربية</p>
                <p>وزارة التجهيز والنقل واللوجستيك والماء</p>
                <p>الوكالة الوطنية للسلامة الطرقية</p>
            </div>
            <div class="center">
                <img src="/path/to/narsa-logo.png" class="narsa-logo" alt="NARSA">
            </div>
            <div style="text-align: left; direction: ltr;">
                <p>Royaume du Maroc</p>
                <p>NARSA</p>
            </div>
        </div>

        <div style="margin-right: 50px;">
            <p><strong>الاسم الشخصي والعائلي:</strong> {{ $employee->nom_prenom }}</p>
            <p><strong>الدرجة:</strong> {{ $employee->grade }}</p>
            <p><strong>الصفة:</strong> {{ $employee->cin }}</p>
            <p><strong>مقر التعيين:</strong> {{ $employee->effet_localite_direction }}</p>
        </div>

        <div class="center">
            <h2 style="text-decoration: underline;">إلى السيد المدير الجهوي للوكالة الوطنية للسلامة الطرقية</h2>
            <p><strong>تحت إشراف السلم الإداري</strong></p>
        </div>

        <div class="content">
            <p><strong>الموضوع: طلب شهادة إدارية</strong></p>
            <p class="center">****</p>
            <p>سلام تام بوجود مولانا الإمام،</p>
            <p>وبعد، يشرفني أن أطلب من سيادتكم منحي شهادة إدارية وذلك لاحتياجي لها لأغراض شخصية.</p>
        </div>

        <div class="footer">
            <p>وتفضلوا بقبول أزكى التحيات</p>
            <p>والسلام</p>
            <br>
            <p><strong>توقيع وخاتم الرئيس المباشر</strong></p>
        </div>
    </div>
</body>
</html>