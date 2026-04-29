<!DOCTYPE html>
<html>
<head>
    <title>Attestation de Congé - NARSA</title>
    <style>
        body { font-family: 'DejaVu Sans', sans-serif; text-align: right; direction: rtl; }
        .header { text-align: center; margin-bottom: 30px; }
        .logo { width: 150px; }
        .content { margin-top: 50px; line-height: 2; }
        .footer { margin-top: 100px; text-align: left; }
    </style>
</head>
<body>
    <div class="header">
        <img src="logo_narsa.png" class="logo">
        <h2>شهادة إدارية (طلب رخصة congé)</h2>
    </div>

    <div class="content">
        يؤكد نظام الموارد البشرية لـ <strong>NARSA</strong> أن الموظف(ة): 
        <strong>{{ $conge->employee->nom_prenom }}</strong> <br>
        قد استفاد من رخصة من نوع: <strong>{{ $conge->type_conge }}</strong> <br>
        ابتداءا من: {{ $conge->date_debut }} إلى غاية: {{ $conge->date_fin }}
    </div>

    <div class="footer">
        توقيع الإدارة <br>
        ...................
    </div>
</body>
</html>